<?php  

class Image
{
	private $file;
	private $name;
	private $tmp_name;
	private $types;
	private $type_image;
	private $dir;
	private $path;

	
	public function __construct($file, $types)
	{
		$this->file = $file;
		$this->name = $file['name'];
		$this->tmp_name = $file['tmp_name'];
		$this->types = $types;
		$this->type_image = false;
		$this->dir = 'views/img/';
		$this->path = $this->dir.''.$this->name;
	}

	private function verifyType()
	{
		$return = false;

		foreach ($this->types as $type) {
			if($this->file['type'] === $type){
				$return = true;
			}
		}

		return $return;
	}

	public function saveImage()
	{
		$return = "Tipo de imagem não suportado!";

		if($this->verifyType()) {
			return $this->uploadImage();
			die;
		} 

		return $return;

	}

	private function uploadImage()
	{
		$return = "Falha no upload de imagem, tente mais tarde!";
	
		if(move_uploaded_file($this->tmp_name, $this->path)){
			$return = true;
		}
		return $return;
	}

	public function getName()
	{
		return $this->name;
	}

	
}