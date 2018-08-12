<?php  

class AdminData extends Admin
{

	public function __construct()
	{
		parent::__construct();	
	}

	public function inserctions()
	{
		$this->view->load('header');
		$this->view->load('nav');
		$this->view->load('inserctions');
		$this->view->load('footer');


	}

	
	

	

}