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

	public function delete($id)
	{
		$this->model->delete($id);
	}

	public function save()
	{
		if($_POST) {
			$index = $this->indexInput($_POST);

			if($index['title'] && $index['article'] && $index['date_time'] && $index['categoria']) {
				$index['date_time'] = new DateTime($index['date_time']);
				$index['date_time'] = $index['date_time']->format('y-m-d');

				if($_FILES['image']) {
					if(!$this->saveImagem($_FILES['image'])){
						die;
					} 
				}

				if($this->model->insert(new PostAbstract($index['title'], $index['article'],  $index['date_time'], $index['categoria'])) && $this->model->insertImagem($this->imagem->selectLatest(), $this->model->selectLatest())){

					$data['msg']="Adicionada com sucesso!";
					$this->success($data);
				} else {
					$data['msg']="Tem parada errada ai mermão!";
					$this->error($data);
				}

			} else {
				$data['msg'] = "Informe todos os campos!";
				$this->view->error($data);
			}
		}
	}

	public function saveUpdate($id)
	{
		if($_POST) {
			$index = $this->indexInput($_POST);

			if($index['title'] && $index['article'] && $index['date_time'] && $index['categoria']) {

				$index['date_time'] = new DateTime($index['date_time']);
				$index['date_time'] = $index['date_time']->format('y-m-d');

				/*if($_FILES['image']) {
					if(!$this->saveImagem($_FILES['image'])){
						die;
					} 
				}*/
				if($this->model->update(new NewsAbstract($index['title'], $index['article'],  $index['date_time'],  $index['categoria'], null, $id))){

					//$data['msg']="Alterado com sucesso!";
					print "Deu";
					die;
				} else {
					//$data['msg']="Tem parada errada ai mermão!";
					print "Não deu, mas deu";
				}
			} else {
				$data['msg']="Informe todos os campo!";
				$this->error($data);
			}
		}
	}

	public function getCategoria()
	{
		print $this->categoria->getJson();
	}
}