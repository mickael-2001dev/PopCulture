<?php  

class AdminNews extends Admin
{
	private $imagem;

	public function __construct()
	{
		parent::__construct();
		$this->model = new NewsModel();
		$this->imagem = new ImagemModel();

		
	}

	public function index()
	{
		$this->view->load('header');
		$this->view->load('nav');
		$this->view->load('news');
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

	public function delete($id)
	{
		$this->model->delete($id);
	}

	public function add() 
	{
		$this->view->load('header');
		$this->view->load('header');
        $this->view->load('nav');
        $this->view->load('add-news');
        $this->view->load('footer');
	}

	public function save()
	{
		if($_POST) {
			$index = $this->indexInput($_POST);

			if($index['title'] && $index['article'] && $index['date_time']) {

				$index['date_time'] = new DateTime($index['date_time']);
				$index['date_time'] = $index['date_time']->format('y-m-d');

				if($_FILES['image']) {
					if(!$this->saveImagem($_FILES['image'])){
						/*$data['msg'] = $this->saveImagem($_FILES['image']);
						/*var_dump($data['msg']);
						$this->error($data);*/
						die;
					} 
				}

				if($this->model->insert(new NewsAbstract($index['title'], $index['article'],  $index['date_time'])) && $this->model->insertImagem($this->imagem->selectLatest(), $this->model->selectLatest())){

					$data['msg']="Adicionada com sucesso!";
					$this->success($data);
				} else {
					$data['msg']="Tem parada errada ai mermão!";
					$this->error($data);
				}
			} else {
				$data['msg']="Informe todos os campo!";
				$this->error($data);
			}
		}
	}

	public function saveUpdate($id)
	{	
		if($_POST) {
			$index = $this->indexInput($_POST);

			if($index['title'] && $index['article'] && $index['date_time']) {

				$index['date_time'] = new DateTime($index['date_time']);
				$index['date_time'] = $index['date_time']->format('y-m-d');
				var_dump($index);

				/*if($_FILES['image']) {
					if(!$this->saveImagem($_FILES['image'])){
						die;
					} 
				}*/
				if($this->model->update(new NewsAbstract($index['title'], $index['article'],  $index['date_time'], null, $id))){
					die;
				} 


		
			} else {
				$data['msg']="Informe todos os campo!";
				$this->error($data);
			}
		}
	}

	

	

}