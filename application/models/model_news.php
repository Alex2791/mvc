<?php

class Model_News extends Model
{
	protected $pages=4; // количество новостей на странице
    public $hr="id";// разделитель

	public function get_news()
	{
		$all=$this->get_rows();
        if(empty($all))
        {
            return $data="<p class='alert-warning'>Нет не одной новости</p>";
        }

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $count=$this->pages;
        $pages_count  = ceil($all / $this->pages);
        $arr_news = $this->get_page_news($page,$count,$pages_count);

        return $arr_news;

	}
    protected function get_page_news($page,$count,$pages_count)
    {
        $str='';
        $conn = $this->connectDb();
        $conn->set_charset("utf8");
        $newstable = "alex";
        $query ="SELECT * FROM $newstable ORDER BY id LIMIT ".(($page-1) * $count).", ".$count;
        $res = $conn->query($query) or die($conn->error);
        while($row=mysqli_fetch_assoc($res))
        {
            $str.= "</p> <a href='/news/one_new?slug=".$row['slug']."'>".$row['title']."</a><hr>";
        }
        //var_dump($str);
       $str.= "<div><ul class='pager'>";

        if($page!=1)
        {
            $str.= "<li> <a href='/news/index?page=".($page - 1)."'>Prev</a></li>";
        }
        for($i=1;$i<=$pages_count;$i++)
        {
            $str.= "<li> <a href='/news/index?page=".$i."'>".$i."</a></li>";
        }
        if($page!=$pages_count)
        {
            $str.= "<li> <a href='/news/index?page=".($page + 1)."'>Next</a></li>";
        }
        $str.="</ul></div>";
        return $str;



    }
    protected function get_rows()
    {
        $conn = $this->connectDb();
        $conn->set_charset("utf8");
        $newstable = "alex";
        $query ="SELECT * FROM $newstable  ORDER BY id DESC";
        $res = $conn->query($query) or die($conn->error) ;
        $res = mysqli_num_rows($res);
        /* while($array_news[]=mysqli_fetch_assoc($res))
         {}*/
          return $res;
    }

    protected function get_all()
    {
        $conn = $this->connectDb();
        $conn->set_charset("utf8");
        $newstable = "alex";
        $query ="SELECT * FROM $newstable";
        $res = $conn->query($query) or die($conn->error) ;
         while($array_news[]=mysqli_fetch_assoc($res))
         {}
        unset($array_news[count($array_news)-1]); // удаляем null в array
        return $array_news;
    }


    // метод генерации ключей из массива
    protected function generate_key($val_arr)
    {
        $str_key = '';
        $hr =$this->hr;
        $arr =array();
        foreach ($val_arr as $key => $value)
        {
            $pos = strpos($key, $hr);
            if(isset($pos) and ($pos===0))
            {
                $str_key.=$value.",";
                $arr[]=$value;
            }

        }
        $ids = implode(',', $arr);
        return $ids;
    }

    public function get_key($val_arr)
    {
        return $this->generate_key($val_arr);
    }


	public function get_one_new()
	{
       $conn = $this->connectDb();
        $conn->set_charset("utf8");
        $newstable = "alex";
		$slug = $_GET['slug'];
        $query ="SELECT * FROM $newstable WHERE slug ='".$slug."'";
        $res = $conn->query($query) or die($conn->error) ;
        $res=mysqli_fetch_assoc($res);
		return $res;
	}

     //генерация записей в таблице
    public function generate_table()
    {
        $arr = $this->get_all();
        $str ="<table>";
        foreach ($arr as $key => $value)
        {

            $str.="<tr>";
            foreach ($value as $key1 => $value2)
            {
                $str.="<td>".$value2."</td>";
            }
            // чекбокс одно
            $str.= "<td><input name='id".$value['id']."' value='".$value['id']."' type='checkbox'/></td>";
            $str.="</tr>";

        }

        $str.="</table>";
        return $str;
    }

    public function delete($keys)
    {
        $conn = $this->connectDb();
        $conn->set_charset("utf8");
        $newstable = "alex";
        $query ='DELETE FROM alex WHERE id IN('.$keys.')';
        $res = $conn->query($query) or die($conn->error) ;
        return $res;

    }

    protected  function translit($str) {
        $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
        return (str_replace($rus, $lat, $str));
    }

    public function create($val_arr)
    {
        $conn = $this->connectDb();
        $conn->set_charset("utf8");
        $newstable = "alex";
        $slug =$this->translit($val_arr['title']);
        $query = "INSERT INTO $newstable  VALUES('','".$slug."','".$val_arr['title']."','".$val_arr['content']."',NOW())";
        $res = $conn->query($query) or die($conn->error) ;
        return $res;
    }

    // генерация полей для редактирования
    public function generate_edit($keys)
    {
        $conn = $this->connectDb();
        $conn->set_charset("utf8");
        $str ='SELECT * FROM alex WHERE id IN('.$keys.')';
        $val =$conn->query($str) or die($conn->error) ;
        $str = "";
        while ($row = mysqli_fetch_assoc($val)) {
           // var_dump($row);
            $str.="</p>
	    id : ".$row['id']."
	    title:	<input type='text' name='title".$row['id']."' value=".$row["title"]."></input>
	    </p>content:</p> <textarea rows='10' cols='45' name='content".$row['id']."'>".$row['content']."</textarea>
	  	<input type='hidden' name='du".$row['id']."' value=".$row["id"].">
		";
        }
        $str .= "</p><input type='submit' name='update' value='apply'/>";
        return $str;

    }
    public function edit ($val_arr)
    {
        $conn = $this->connectDb();
        $conn->set_charset("utf8");
        $array_keys = explode(",", $val_arr['keys']);
        foreach ($array_keys as $key => $value)
        {
            $title ="title".$value;
            $content ="content".$value;
            $slug =$this->translit($val_arr[$title]);
            $query = "UPDATE alex SET slug = '".$slug."',title = '".$val_arr[$title]."',content = '".$val_arr[$content]."', date = NOW() WHERE id =".$value;
            $res = $conn->query($query) or die($conn->error) ;
        }
    }

}
