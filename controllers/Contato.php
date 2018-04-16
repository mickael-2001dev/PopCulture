<?php  

class Contato extends Controller
{
	public function __construct() 
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->load('header');
		$this->view->load('nav');
		$this->view->load('contato');
		$this->view->load('footer');
	}
}