<?php  

class MessageAbstract
{
	private $id;
	private $message;
	private $email;
	private $name_ms;
	private $deleted;
	private $dt_update;

	public function __construct($message, $email, $name_ms, $id = null,  $deleted = null, $dt_update = null)
	{
		$this->id = $id;
		$this->message = $message;
		$this->email = $email;
		$this->name_ms = $name_ms;
		$this->deleted = $deleted;
		$this->dt_update = $dt_update;
	}

	public function getId(){
		return $this->id;
	}

	public function getMessage(){
		return $this->message;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getName_ms(){
		return $this->name_ms;
	}

	public function getDeleted(){
		return $this->deleted;
	}

	public function getDt_update(){
		return $this->dt_update;
	}
}