<?php 

class VideoAbstract 
{
	private $id;
	private $code;

	public function __construct($code, $id)
	{
		$this->id = $id;
		$this->code = $code;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getCode()
	{
		return $this->code;
	}
}