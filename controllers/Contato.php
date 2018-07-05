<?php  

class Contato extends Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->model = new MessageModel();
	}

	public function index()
	{
		$data['title'] = "Contato";
 		$this->view->load('header', $data);
		$this->view->load('nav');
		$this->view->load('contato');
		$this->view->load('footer');
	}

	public function sendMessage()
	{

		
		$index = $this->indexInput($_POST);

		if(!$index) {
			Message::error("Nada foi enviado!");
		}
			
		
		if($this->model->insert(new MessageAbstract($index['message'], $index['email'], $index['name_ms'])) && $this->sendMail($index['email'], "Obrigado por enviar a mensagem! Se possível responderemos!", null, "PopCulture Brasil")) {
					
			Message::success("Obrigado por enviar uma mensagem!");

		} else {
			Message::error("Erro ao enviar");
		}
	
		
	}
}