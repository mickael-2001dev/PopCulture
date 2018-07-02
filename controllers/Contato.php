<?php  

class Contato extends Controller
{
	public function __construct() 
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Contato";
 		$this->view->load('header', $data);
		$this->view->load('nav');
		$this->view->load('contato');
		$this->view->load('footer');
	}
}