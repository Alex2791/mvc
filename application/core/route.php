<?php
session_start();
/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{

	static function start()
	{

        // контроллер и действие по умолчанию11
		$controller_name = 'Main';
		$action_name = 'index';
		
		//реквест юрай получает значение строки после слеша
		//в первой строчке мы разбираем на 2 части и отделяем гет запрос
		//во второй игнорируем то, что было после знака вопроса, разбираемся только после слеша инфу
      /*  var_dump($_SERVER['REQUEST_URI']);
        exit;*/
		$uri = explode('?', $_SERVER['REQUEST_URI']);
		$routes = explode('/', $uri[0]);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// добавляем префиксы
      //  $model_name = 'Model_'.$controller_name;
        if($controller_name=="news")
        {
            if(!$_SESSION['user'])
            {
                $action_name='perm';
            }
        }

        //проверка прав
        if($controller_name=="admin")
        {
            if(!$_SESSION['user'] or $_SESSION['user']['role']!=2)
            {
                $action_name='perm';
            }
        }
        $controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;


		/*echo "Model: $model_name <br>";
		echo "Controller: $controller_name <br>";
		echo "Action: $action_name <br>";*/



        // подцепляем файл с классом модели (файла модели может и не быть)

       /* $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path))
        {
            include "application/models/".$model_file;
        }
        */



        // подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера

            $controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			//Route::ErrorPage404();
		}
	
	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
