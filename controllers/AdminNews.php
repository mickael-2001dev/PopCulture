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

				/*if($_FILES['image']) {
					if(!$this->saveImagem($_FILES['image'])){
						die;
					} 
				}*/
				if($this->model->update(new NewsAbstract($index['title'], $index['article'],  $index['date_time'], null, $id))){
					$data['msg']="Alterado com sucesso!";
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

	public function saveImagem($image)
	{
		$types = ['image/jpeg', 'image/png', 'image/gif'];
        $type_image = false;
        $dir = 'views/img/'.$image['name'];
        //var_dump($image);
        foreach($types as $type){
            if($image['type'] == $type){
               $type_image = true;
            }
        }
        //var_dump($dir);
        if($type_image){
           	if(move_uploaded_file($image['tmp_name'], $dir)){
           		if($this->imagem->insert($image['name'])){
           			return true;
           		}
  			} else {
                $data['msg'] = "Não foi possível realizar o upload!";
                $this->error($data);
            } 
  		} else {
            $data['msg'] = "Extensão não suportada!";
            $this->error($data); 
        }
	}

	

}