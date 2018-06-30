<?php  

class Tv extends Post
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'TV';
		$this->view->load('header', $data);
		$this->view->load('tv-header');
		parent::index('tv');
	}
}