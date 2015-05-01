<?php

class Controller_Services extends Controller
{

	function action_index()
	{
		$this->generate('services_view.php', 'template_view.php');
	}
}
