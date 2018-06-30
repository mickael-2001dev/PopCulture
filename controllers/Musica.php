<?php  

class Musica extends Post
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		$data['title'] = 'Músicas';
		$this->view->load('header', $data);
		$this->view->load('musica-header');
		parent::index('musica');
	}
}