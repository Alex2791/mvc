<?php

class Controller_Portfolio extends Controller
{


	function action_index()
	{
        $model = $this->load_model('Portfolio');
        $data = $model->get_data();
		$this->generate('portfolio_view.php', 'template_view.php', $data);
	}
}
