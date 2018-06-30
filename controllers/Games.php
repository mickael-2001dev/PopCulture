<?php  

class Games extends Post
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	$data['title'] = 'Games';
		$this->view->load('header', $data);
		$this->view->load('games-header');
		parent::index('games');
	}
}