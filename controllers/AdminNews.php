<?php  

class AdminNews extends Admin
{
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new NewsModel();
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
				if($this->model->insert(new NewsAbstract($index['title'], $index['article'],  $index['date_time'], null, null, null))){
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

}