<?php  
/*Diferente das outras classes com nome parecido, essa classe serve 
para manipular as mensagens que irão aparecer na tela do usuário(UI), já as
outras são referentes a mensagens que o usuário manda ao sistema.*/
class Message 
{
	private $view;

	public function __construct()
	{
		$this->view = new View();
	}

	public static function success($message)
	{
		$data['msg'] = $message;
		(new self)->view->load('success', $data);
	}

	public static function error($message)
	{
		$data['msg'] = $message;
		(new self)->view->load('error', $data);
	}


}