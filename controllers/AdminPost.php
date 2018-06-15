<?php  

class AdminPost extends Admin
{
	private $imagem;
	private $categoria;

	public function __construct()
	{
		parent::__construct();
		$this->model = new PostModel();
		$this->imagem = new ImagemModel();
		$this->categoria = new CategoriaModel();
	}

	public function index()
	{
		$this->view->load('header');
		$this->view->load('nav');
		$this->view->load('footer');
	}

	public function add()
	{
		$this->view->load('header');
		$this->view->load('nav');
		$this->view->load('add-post');
		$this->view->load('footer');
	}

	public function getCategoria()
	{
		print $this->categoria->getJson();
	}
}