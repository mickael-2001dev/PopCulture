<?php  

class News extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new NewsModel;
	}

	public function index() 
	{

		$data['news'] = $this->model->select();
		$data['title'] = "Notícias";
		$this->view->load('header', $data);
		$this->view->load('nav');
		$this->view->load('news', $data);
		$this->view->load('footer');
	}
}