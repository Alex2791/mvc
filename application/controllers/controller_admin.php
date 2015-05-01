<?php

class Controller_Admin extends Controller
{

	public $model;
    function __construct()
    {
        $this->model = $this->load_model('News');
    }

    function action_index()
	{	

        $this->generate('main_view.php', 'template_view.php');
	}

    function action_viewtable($fields=null)
    {
        $model=$this->model;
        $data['table'] = $model ->generate_table();
        if($fields!=null)
        {
            $data['fields']=$fields;
        }

        $this->generate('tabnew_view.php', 'template_view.php', $data);

    }
    function action_actform()
    {
       // $model = $this->load_model('News');
        $model=$this->model;
        if (isset($_POST['update']))
        {
            $model->hr="du";
        }
        $fields=null;
        if ($_POST)
        {
            $val_arr=$_POST;
            $keys =$model -> get_key($val_arr);

            if($_POST["act"]=="Delete" and !empty($keys))
            {
               $model->delete($keys); // вызов модели на удаление в кейс ключи которые удаляем
            }
            if (isset($_POST['create']))
            {
               if(!empty($val_arr['title'] )and !empty($val_arr['content'])) //проверка на заполнение полей
               {
                   $model->create($val_arr);
               }
            }
            // генерация записей на редакт.
             if ($_POST["act"]=="Edit" and !empty($keys))
             {
                  $fields=$model->generate_edit($keys);
             }
            // обновление отредактированных записей
            if (isset($_POST['update']))
            {
                $val_arr['keys']=$keys;
                $model->edit($val_arr);
            }


        }
        $this->action_viewtable($fields);
    }

    function action_perm()
    {
        $data['table'] = "<p class='has-error'>У вас нет прав для просмотра этой страницы!</p>";
        $this->generate('404_view.php', 'template_view.php', $data);
    }

}