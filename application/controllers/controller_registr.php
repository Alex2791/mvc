<?php

class Controller_Registr extends Controller
{


    public function action_index()
	{
		if($_SESSION['user'])
        {
            $this->generate('enter_view.php', 'template_view.php');
        }
        else
        {
            $this->generate('registr_view.php', 'template_view.php');
        }

	}


   public function action_reg()
    {
        if($_POST)
        {
            $model = $this->load_model('Registr');
            //$model -> get_info($_POST);
            $data = $model -> check_field($_POST['login'],$_POST['password'],$_POST['fio']);
            if($data==1)
            {
                $array['success'] = $model ->input_var($_POST['login'],$_POST['password'],$_POST['fio']);
            }
            else
            {
                $array['error'] = $data;
            }
        }
        $this->generate('registr_view.php', 'template_view.php', $array);

    }

    public function action_exit()
    {
        unset($_SESSION['user']);
        $this->action_index();
    }
    function action_enter()
    {
       $data = null;
       if($_POST)
        {
            $model = $this->load_model('Registr');
            $str=$model->check_user($_POST['login'],$_POST['password']);
            if(!$str)
            {
                $data['error'] = "Такого пользователя нет.Введите корректные данные или Пройдите регистрацию по ссылке <a href='/registr/'>ссылка</a>";
            }
            else
            {
                $_SESSION['user']['info']=$str;
            }
        }
      //  var_dump($_SESSION);
       // exit;
        $this->generate('enter_view.php', 'template_view.php',$data);
    }


}
