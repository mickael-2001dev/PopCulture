<?php 

 class PostModel extends Model implements InterfaceModel
 {

 	private $categoria;
 	
 	public function __construct()
 	{
 		parent::__construct();

 		$this->categoria = new CategoriaModel();
 	}

 	public function select()
 	{
 		$post = [];
 		$results = parent::getAll('post');

 		foreach ($results as $row) {
 			$post[] = new PostAbstract
 			(
 				$row['title'],
				$row['article'],
				$row['date_time'],
				$this->selectImagemNews($row['id']),
				$this->categoria->selectById($row['idcategoria']),
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
			$this->selectImagemNews($results['id']),
			$this->categoria->selectById($results['idcategoria']),
			$results['id']
 		);

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
				INNER JOIN post as p ON n.id = pt.idnews
				INNER JOIN imagem as im ON im.id = pt.idimagem
				WHERE ni.idnews = :id";
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
			':idcategoria'=>$post->getCategoria()->getId()
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
		$return = false;
		$date = new DateTime();
		$date = $date->format('Y-m-d');
		$sql = "UPDATE post SET title = :title, article = :article, date_time = :date_time, idcategoria = :idcategoria dtupdate = :dt_update 
		WHERE id = :id";
		if($this->ExecuteCommand($sql,  
		[':title'=>$post->getTitle(), 
			':article'=>$post->getArticle(),
			':date_time'=>$post->getDateTime(),
			':idcategoria'=>$post->getCategoria()->getId(),
			'dt_update'=>$date,
			':id'=>$post->getId()])){
			$return = true;
		}

		return $return;
	}


	public function getJson() {
		$results = [];

		foreach ($this->select() as $row) {
			$results[] = [
				'id'=>$row->getId(),
				'title'=>$row->getTitle(),
				'article'=>substr(filter_var($row->getArticle(), FILTER_SANITIZE_STRING), 0, 80)."...",
				':idcategoria'=>$row->getCategoria()->getId(),
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
			':idcategoria'=>$row->getCategoria()->getId(),
			'date_time'=>date_create($row->getDateTime())
		];
		

		
		$results['date_time'] = date_format($results['date_time'], 'd/m/y');
		

		return json_encode($results);
	}

 }