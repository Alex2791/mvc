<?php

class Model_Registr extends Model
{



    public function get_info($array)
    {
        var_dump($array);
    }
    function input_var($login,$password,$fio)
    {
        $userstable = "reg";
        $conn = $this->connectDb();
        $conn->set_charset("utf8");
        $query = "INSERT INTO $userstable  VALUES('','".$login."','".$password."','".$fio."')";
        $res = $conn->query($query) or die($conn->error);
        return $res;

    }

    function check_field($login,$password,$fio)
    {
        if($login==''||$password==''||$fio=='')
        {
            return "Вы не заполнили одно из полей";
        }

        if(!preg_match('|^[0-9a-zA-Z]+$|i', $login))
        {
            return "В поле login есть недопустимые символы(только лат)";
        }
        if(!preg_match('|^[0-9a-zA-Z]+$|i', $password))
        {
            return "В поле password есть недопустимые символы(только лат)";
        }
        $login=$this->check_login($login);
        if(!empty($login))
        {
            return "Такой пользователь уже есть";
        }

        return 1;
    }

    function check_login($login)
    {
        $userstable = "reg";
        $conn = $this->connectDb();
        $conn->set_charset("utf8");
        $query = "SELECT *  FROM $userstable WHERE login = '".$login."'";
        $result = $conn->query($query) or die($conn->error);
        return $result;
    }

    function check_user($login,$password)
    {
        $userstable = "reg";
        $conn = $this->connectDb();
        $conn->set_charset("utf8");
        $query = "SELECT *  FROM $userstable WHERE login = '".$login."' and password = '".$password."'";
        $result = $conn->query($query) or die($conn->error);
        $result = mysqli_fetch_assoc($result);
        if($result)
        {
            $this->check_role($login,$password);
        }
        return $result;
    }
    // метод распределения ролей зарег. пользователей
    public function check_role($login,$password)
    {
        if( ($login==ADMIN_LOGIN) and ($password==$password))
        {
            $_SESSION['user']['role']=2;
        }
        else
        {
            $_SESSION['user']['role']=1;
        }
    }
}
