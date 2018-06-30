<?php  

class Quadrinhos extends Post
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		$data['title'] = 'Quadrinhos';
		$this->view->load('header', $data);
		$this->view->load('hq-header');
		parent::index('quadrinhos');
	}
}