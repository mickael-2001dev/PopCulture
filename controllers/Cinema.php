<?php  

class Cinema extends Post
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	$data['title'] = 'Cinema';
		$this->view->load('header', $data);
		$this->view->load('cinema-header');
		parent::index('cinema');
	}
}