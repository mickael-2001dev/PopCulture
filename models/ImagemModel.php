<?php  

class ImagemModel extends Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function select()
	{
		$imagem = [];
		$results = parent::getAll('imagem');

		foreach ($results as $row) {
			$imagem[] = new ImagemAbstract
			(
				$row['src'],
				$row['id']
			);

		}
		return $imagem;
	}

	public function selectLatest()
	{
		$sql = "SELECT id FROM imagem ORDER BY id desc LIMIT 1";
		$result = $this->ExecuteSimpleQuery($sql);

		return $result;
	}

	public function insert($src)
	{
		$sql = "INSERT INTO imagem(src) VALUES(:src)";
		if($this->ExecuteCommand($sql,[':src'=>$src])){
			return true;
		} else {
			return false;
		}
	}
}