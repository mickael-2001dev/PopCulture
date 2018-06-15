<?php  

class CategoriaAbstract
{
	private $categoria;
	private $id;

	public function __construct($categoria, $id = null)
	{
		$this->categoria = $categoria;
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getCategoria()
	{
		return $this->categoria;
	}
}