<?php  

class AdminMessage extends Admin
{
	

	public function __construct()
	{
		parent::__construct();
		$this->model = new MessageModel();
		
	}

	public function index()
	{
		$this->view->load('header');
		$this->view->load('nav');
		$this->view->load('messages');
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

	public function replyMessage($id)
	{
		$person = $this->model->selectById($id);
		$message = filter_input(INPUT_POST, 'message');
		

		if($this->sendMail($person->getEmail(), $message, null, "PopCulture Brasil")){
			Message::success("Respondida com sucesso!");
		} else {
			Message::error("Erro ao responder mensagem!");
		}

	}
	
}