<?php  

class AdminVideo extends Admin
{
	private $imagem;
	private $video;

	public function __construct()
	{
		parent::__construct();
		$this->model = new VideoPageModel();
		$this->imagem = new ImagemModel();
		$this->video = new VideoModel();
		
	}

	public function index()
	{
		$this->view->load('header');
		$this->view->load('nav');
		$this->view->load('videos');
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

	public function delete($id)
	{
		$this->model->delete($id);
	}

	public function add() 
	{
		$this->view->load('header');
		$this->view->load('header');
        $this->view->load('nav');
        $this->view->load('add-video');
        $this->view->load('footer');
	}

	public function save()
	{
		
			$index = Form::IndexInput($_POST, 'article');

			Form::verifyInputIndexes($index);

			$index['date_time'] = new DateTime($index['date_time']);
			$index['date_time'] = $index['date_time']->format('y-m-d');

			if($_FILES['image']) {
				if(!$this->saveImagem($_FILES['image'], $this->imagem)){
					die;
				} 
			}

			if(!$this->video->insert($index['codevideo'])){
				Message::error("Não foi possível salvar o video!");
				die;
			}

			if($this->model->insert(new VideoPageAbstract($index['title'], $index['article'],  $index['date_time'])) && $this->model->insertImagem($this->imagem->selectLatest(), $this->model->selectLatest()) && $this->model->insertVideo($this->video->selectLatest(), $this->model->selectLatest())){

				Message::success("Adicionada com sucesso!");
			} else {
				Message::error("Tem parada errada ai mermão!");
			}
		
	}

	public function saveUpdate($id)
	{	
	
		$index = Form::IndexInput($_POST, 'article');

		Form::verifyInputIndexes($index);
		

		$index['date_time'] = new DateTime($index['date_time']);
		$index['date_time'] = $index['date_time']->format('y-m-d');
	

		if($this->model->update(new VideoPageAbstract($index['title'], $index['article'],  $index['date_time'], null, null, $id))){
			die;
		}
	
	}

	

	

}