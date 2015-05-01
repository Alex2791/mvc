<?php

class Controller {
	
	public $model;
	
	function __construct()
	{
		//$this->view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}

	function generate($content_view, $template_view, $data = null)
	{
		
		/*
		if(is_array($data)) {
			
			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/
		
		/*
		динамически подключаем общий шаблон (вид),
		внутри которого будет встраиваться вид
		для отображения контента конкретной страницы.
		*/
		include 'application/views/'.$template_view;
	}

		public function load_model($name)
	{
		$model_name = 'Model_'.$name;
		// подцепляем файл с классом модели (файла модели может и не быть)
		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
			return new $model_name;
		}
		else {
			return false;
		}
	}
}

// $ob = new Controller();