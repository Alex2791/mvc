<?php

class Controller_Main extends Controller
{

	function action_index()
	{	
		$this->generate('main_view.php', 'template_view.php');
	}
}