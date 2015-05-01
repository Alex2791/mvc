<?php

class Controller_Contacts extends Controller
{
	
	function action_index()
	{
		$this->generate('contacts_view.php', 'template_view.php');
	}
}
