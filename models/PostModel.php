<?php 

 class PostModel extends Model implements InterfaceModel
 {

 	private $categoria;
 	
 	public function __construct()
 	{
 		parent:: __construct();
 		$this->categoria = new CategoriaModel();
 	}

 	public function select()
 	{
 		//$categoria = new CategoriaModel();
 		//$test = $categoria->selectById(2);
 		//var_dump($test);
 		$post = [];
 		$results = parent::getAll('post', true);
 		//var_dump($results);

 		foreach ($results as $row) {
 			$post[] = new PostAbstract
 			(
 				$row['title'],
				$row['article'],
				$row['date_time'],
				$this->categoria->selectById($row['idcategoria']),
				$this->selectImagemPost($row['id']),
				$row['id']
 			);
 		}
 	
 		return $post;
 	}

 	public function selectById($id)
 	{
 		$results = parent::getAllById('post', $id);
 		$post = new PostAbstract
 		(
 			$results['title'],
			$results['article'],
			$results['date_time'],
			$this->categoria->selectById($results['idcategoria']),
			$this->selectImagemPost($results['id']),
			$results['id']
 		);

 		return $post;
 	}

 	public function selectByCategoria($categoria)
 	{
 		$post = [];
 		$sql = "SELECT pt.* FROM post as pt 
	 		INNER JOIN categoria as cat ON cat.id = pt.idcategoria 
	 		WHERE cat.categoria LIKE :categoria AND pt.deleted = 0";
	 	$results = $this->ExecuteQuery($sql, [':categoria'=>$categoria.'%']);
	 
	 	foreach($results as $row) {
	 		$post[] = new PostAbstract
	 		(
		 		$row['title'],
		 		$row['article'],
		 		$row['date_time'],
		 		$row['idcategoria'],
		 		$this->selectImagemPost($row['id']),
				$row['id']
			);
	 	}

	 	return $post;
 	}

 	public function selectLatest()
	{
		$sql = "SELECT id FROM post ORDER BY id desc LIMIT 1";
		$result = $this->ExecuteSimpleQuery($sql);

		return $result;

	}

	public function selectImagemPost($id)
	{
		//echo $id;
		$imagem = [];
		$sql = "SELECT im.* FROM post_has_imagem as pt 
				INNER JOIN post as p ON p.id = pt.idpost 
				INNER JOIN imagem as im ON im.id = pt.idimagem 
				WHERE pt.idpost = :id ";
		$results = $this->ExecuteQuery($sql, [':id'=>$id]);


		foreach($results as $row){
			$imagem[] = new ImagemAbstract($row['src'], $row['id']);
		}

		
		//var_dump($imagem);
		return $imagem;
	}

	public function insert($post) 
	{

		$sql = "INSERT INTO post(article, title, date_time, idcategoria) VALUES (:article, :title, :date_time, :idcategoria)";
		if($this->ExecuteCommand($sql,
			[
			':article'=>$post->getArticle(), 
			':title'=>$post->getTitle('2'),
			':date_time'=>$post->getDateTime(),
			':idcategoria'=>$post->getCategoria()
			]
			)
		){
			return true;
		} else {
			return false;
		}
	}

	public function insertImagem($idimagem, $idpost) {
		//var_dump($idimagem);
		//var_dump($idpost);
		$sql = "INSERT INTO post_has_imagem(idimagem, idpost) VALUES (:idimagem, :idpost)";
		if($this->ExecuteCommand($sql, [':idimagem'=>$idimagem['id'], ':idpost'=>$idpost['id']])){
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$return = false;
		$sql = "UPDATE post SET deleted = 1 WHERE id = :id";
		if($this->ExecuteCommand($sql,  [':id'=>$id])){
			$return = true;
		}

		return $return;
	}

	public function deleteDefinitive($id)

	{
		$result = parent::delete('post', $id);

		return $result;
	}


	public function update($post) 
	{
		$date = new DateTime();
		$date = $date->format('Y-m-d');
		$sql = "UPDATE post SET title = :title, article = :article, date_time = :date_time, idcategoria = :idcategoria, dtupdate = :dt_update 
		WHERE id = :id";
		if($this->ExecuteCommand($sql,  
		[':title'=>$post->getTitle(), 
			':article'=>$post->getArticle(),
			':date_time'=>$post->getDateTime(),
			':idcategoria'=>$post->getCategoria(),
			':dt_update'=>$date,
			':id'=>$post->getId()])){
			return true;
			die;
		}
	
		return false;
	}


	public function getJson() {
		$results = [];

		foreach ($this->select() as $row) {
			$results[] = [
				'id'=>$row->getId(),
				'title'=>$row->getTitle(),
				'article'=>substr(filter_var($row->getArticle(), FILTER_SANITIZE_STRING), 0, 80)."...",
				'categoria'=>$row->getCategoria()->getCategoria(),
				'date_time'=>date_create($row->getDateTime())
			];
		}

		for($i = 0; $i < count($results); $i++){
			$results[$i]['date_time'] = date_format($results[$i]['date_time'], 'd/m/y');
		}

		return json_encode($results);
	}

	public function getJsonByCategoria($categoria) {
		$results = [];

		foreach ($this->selectByCategoria($categoria) as $row) {
			$results[] = [
				'id'=>$row->getId(),
				'title'=>$row->getTitle(),
				'article'=>substr(filter_var($row->getArticle(), FILTER_SANITIZE_STRING), 0, 80)."...",
				'date_time'=>date_create($row->getDateTime())
			];
		}

		for($i = 0; $i < count($results); $i++){
			$results[$i]['date_time'] = date_format($results[$i]['date_time'], 'd/m/y');
		}

		return json_encode($results);
	}

	public function getJsonById($id) {
		
		$row = $this->selectById($id);
		$results = [
			'id'=>$row->getId(),
			'title'=>$row->getTitle(),
			'article'=>$row->getArticle(),
			'categoria'=>$row->getCategoria()->getCategoria(),
			'idcategoria'=>$row->getCategoria()->getId(),
			'date_time'=>date_create($row->getDateTime())
		];
		

		
		$results['date_time'] = date_format($results['date_time'], 'd/m/y');
		

		return json_encode($results);
	}

	public static function getInserted()
	{
		$sql = "SELECT COUNT(id) FROM post WHERE deleted = 0";
		$result = (new self)->ExecuteSimpleQuery($sql);

		return $result;

	}

	public static function getDeleted()
	{
		$sql = "SELECT COUNT(id) FROM post WHERE deleted = 1";
		$result = (new self)->ExecuteSimpleQuery($sql);

		return $result;

	}

	public static function getUpdated()
	{
		$sql = "SELECT COUNT(id) FROM post WHERE dtupdate IS NOT NULL";
		$result = (new self)->ExecuteSimpleQuery($sql);

		return $result;

	}

 }