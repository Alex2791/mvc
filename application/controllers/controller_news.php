<?php

class Controller_News extends Controller
{

	
	function action_index()
	{
		$model = $this->load_model('News');

         $data = $model -> get_news();


		// var_dump($data);
		$this->generate('news_view.php', 'template_view.php', $data);



	}

	function action_one_new()
	{
		/*var_dump($_GET);
        exit;*/
        $model = $this->load_model('News');
        $data = $model -> get_one_new();
     $this->generate('one_new_view.php', 'template_view.php', $data);
	}

    function action_perm()
    {
        $data = "<p class='has-error'>У вас нет прав для просмотра новостей!</p>";
        $this->generate('news_view.php', 'template_view.php', $data);
    }
}
