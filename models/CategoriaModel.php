<?php  

class CategoriaModel extends Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function select() {
		$categoria = [];
		parent::getAll('categoria');

		foreach ($results as $row) {
			$categoria[] = new CategoriaAbstract
			(
				$row['categoria'],
				$row['id']
			);

		}
		return $categoria;
	}

	public function encodeJson()
	{
		$categoria = $this->select();
		$data = [
			'categoria:'=>$categoria->getCategoria(),
			'id:'=>$categoria->getId()
		]

		return json_encode($data);
	}
}