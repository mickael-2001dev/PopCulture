<?php  

class Post extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new PostModel();
	}

	protected function index($category)
	{

		$data['post'] = $this->model->selectByCategoria($category);
		//var_dump($data['post']);
		$this->view->load('nav');
		$this->view->load('post', $data);
		$this->view->load('footer');
	}
}