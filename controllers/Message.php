<?php  

class Message extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new MessageModel();
	}

	public function sendMessage()
	{

		
		$index = $this->indexInput($_POST);
			
			if($index['message'] && $index['email'] && $index['name_ms']) {
				if($this->model->insert(new MessageAbstract($index['message'], $index['email'], $index['name_ms'])) && $this->sendMail($index['email'], "Obrigado por enviar a mensagem! Se possível responderemos!", null, "PopCulture Brasil")) {
					
					$data['msg'] = "Obrigado por enviar uma mensagem!";
					$this->view->load('success', $data);

				} else {
					$data['msg'] = "Erro ao enviar";
					$this->view->load('error', $data);
				}
			}
		
	}


}