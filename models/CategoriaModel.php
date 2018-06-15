<?php  

class CategoriaModel extends Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function select() {
		$categoria = [];
		$results = parent::getAll('categoria');

		foreach ($results as $row) {
			$categoria[] = new CategoriaAbstract
			(
				$row['categoria'],
				$row['id']
			);

		}
		return $categoria;
	}

	public function selectById($id) {

		$results = parent::getAllById('categoria', id);

		
		$categoria = new CategoriaAbstract
		(
			$results['categoria'],
			$results['id']
		);

		return $categoria;
	}

	public function getJson() {
		$results = [];

		foreach ($this->select() as $row) {
			$results[] = [
				'id'=>$row->getId(),
				'categoria'=>$row->getCategoria()
			];
		}

		return json_encode($results);
	}
}