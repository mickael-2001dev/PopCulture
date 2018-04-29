<?php  

class ImagemModel extends Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function insert()
	{
		$imagem = [];
		parent::getAll('imagem');

		foreach ($results as $row) {
			$imagem[] = new ImagemAbstract
			(
				$row['src'],
				$row['id']
			);

		}
		return $imagem;
	}

	
}