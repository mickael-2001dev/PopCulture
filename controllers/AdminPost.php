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
		$this->view->load('post');
		$this->view->load('footer');
	}

	public function get($id = null)
	{
		$return = $this->model->getJson();

		if($id) {
			$return = $this->model->getJsonById($id);
		}

		print $return;

	}

	public function getUpdated()
	{
		$return = $this->model->getUpdatedJson();

		print $return;
	}

	public function getDeleted()
	{
		$return = $this->model->getDeletedJson();

		print $return;
	}

	public function getSpecific($categoria)
	{
		print $this->model->getJsonByCategoria($categoria);
	}
	
	public function add()
	{
		$this->view->load('header');
		$this->view->load('nav');
		$this->view->load('add-post');
		$this->view->load('footer');
	}

	public function delete($id)
	{
		$this->model->delete($id);
	}

	public function save()
	{
		
			$index = Form::indexInput($_POST, 'article');

			Form::verifyInputIndexes($index);

		
			$index['date_time'] = new DateTime($index['date_time']);
			$index['date_time'] = $index['date_time']->format('y-m-d');

			if($_FILES['image']) {
				if(!$this->saveImagem($_FILES['image'], $this->imagem)){
					die;
				} 
			}

			if($this->model->insert(new PostAbstract($index['title'], $index['article'],  $index['date_time'], $index['categoria'])) && $this->model->insertImagem($this->imagem->selectLatest(), $this->model->selectLatest())){

				Message::success("Adicionado com sucesso!");
			} else {
				Message::error("Tem parada errada ai mermão!");
			}

		
		
	}

	public function saveUpdate($id)
	{
		$index = Form::indexInput($_POST, 'article');

		if(!$index) {
			Message::error("Nada foi enviado!");
		}

		Form::verifyInputIndexes($index);	
		

		$index['date_time'] = new DateTime($index['date_time']);
		$index['date_time'] = $index['date_time']->format('y-m-d');

				/*if($_FILES['image']) {
					if(!$this->saveImagem($_FILES['image'])){
						die;
					} 
				}*/
		if($this->model->update(new PostAbstract($index['title'], $index['article'],  $index['date_time'],  $index['categoria'], null, $id))){

					//$data['msg']="Alterado com sucesso!";
			print "Deu";
			die;
		} else {
				//$data['msg']="Tem parada errada ai mermão!";
			print "Não deu, mas deu";
		}
		
	}

	public function getCategoria()
	{
		print $this->categoria->getJson();
	}
}