<?php 

class ImagemAbstract 
{
	private $id;
	private $src;

	public function __construct($src, $id)
	{
		$this->id = $id;
		$this->src = $src;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getSrc()
	{
		return $this->src;
	}
}