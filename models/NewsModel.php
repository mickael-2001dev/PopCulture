<?php  


class NewsModel extends Model implements InterfaceModel
{
	
	public function select()
	{
		$news = [];
		$results = parent::getAll('news', true);
		

		foreach ($results as $row) {

			$news[] = new NewsAbstract(
				$row['title'],
				$row['article'],
				$row['date_time'],
				$this->selectImagemNews($row['id']),
				$row['id']
			);
		}

		return $news;

	}

	public function selectById($id) 
	{
		$results = parent::getAllById('news', $id);
		//var_dump($results);
		//echo $results['title'];
		
		$news = new NewsAbstract(
			$results['title'],
			$results['article'],
			$results['date_time'],
			$this->selectImagemNews($results['id']),
			$results['id']
		);

		return $news;
	}

	public function selectUpdated()
	{
		$sql = "SELECT * FROM news WHERE dtupdate IS NOT NULL";

		$results = $this->ExecuteQuery($sql, array());

		foreach ($results as $row) {

			$news[] = new NewsAbstract(
				$row['title'],
				$row['article'],
				$row['date_time'],
				$this->selectImagemNews($row['id']),
				$row['id'],
				0,
				$row['dtupdate']
			);
		}

		return $news;
	} 

	public function selectLatest()
	{
		$sql = "SELECT id FROM news ORDER BY id desc LIMIT 1";
		$result = $this->ExecuteSimpleQuery($sql);

		return $result;

	}

	
	public function selectImagemNews($id)
	{
		//echo $id;
		$imagem = [];
		$sql = "SELECT im.* FROM news_has_imagem as ni
				INNER JOIN news as n ON n.id = ni.idnews
				INNER JOIN imagem as im ON im.id = ni.idimagem
				WHERE ni.idnews = :id";
		$results = $this->ExecuteQuery($sql, [':id'=>$id]);


		foreach($results as $row){
			$imagem[] = new ImagemAbstract($row['src'], $row['id']);
		}

		
		//var_dump($imagem);
		return $imagem;
	}

	public function insert($news) 
	{

		$sql = "INSERT INTO news(article, title, date_time) VALUES (:article, :title, :date_time)";
		if($this->ExecuteCommand($sql,
			[
			':article'=>$news->getArticle(), 
			':title'=>$news->getTitle('2'),
			'date_time'=>$news->getDateTime()
			]
			)
		){
			return true;
		} else {
			return false;
		}
	}

	public function insertImagem($idimagem, $idnews) {
		//var_dump($idimagem);
		//var_dump($idnews);
		$sql = "INSERT INTO news_has_imagem(idimagem, idnews) VALUES (:idimagem, :idnews)";
		if($this->ExecuteCommand($sql, [':idimagem'=>$idimagem['id'], ':idnews'=>$idnews['id']])){
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$return = false;
		$sql = "UPDATE news SET deleted = 1 WHERE id = :id";
		if($this->ExecuteCommand($sql,  [':id'=>$id])){
			$return = true;
		}

		return $return;
	}

	public function deleteDefinitive($id)

	{
		$result = parent::delete('news', $id);

		return $result;
	}



	public function update($news) 
	{

		$return = false;
		$date = new DateTime();
		$date = $date->format('Y-m-d');
		$sql = "UPDATE news SET title = :title, article = :article, date_time = :date_time, dtupdate = :dt_update 
		WHERE id = :id";
		if($this->ExecuteCommand($sql,  
		[':title'=>$news->getTitle(), 
			':article'=>$news->getArticle(),
			':date_time'=>$news->getDateTime(),
			'dt_update'=>$date,
			':id'=>$news->getId()])){
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
				'date_time'=>date_create($row->getDateTime())
			];
		}

		for($i = 0; $i < count($results); $i++){
			$results[$i]['date_time'] = date_format($results[$i]['date_time'], 'd/m/y');
		}

		return json_encode($results);
	}

	public function getUpdatedJson() {
		$results = [];

		foreach ($this->selectUpdated() as $row) {
			$results[] = [
				'id'=>$row->getId(),
				'title'=>$row->getTitle(),
				'article'=>substr(filter_var($row->getArticle(), FILTER_SANITIZE_STRING), 0, 80)."...",
				'date_time'=>date_create($row->getDateTime()),
				'dtupdate'=>date_create($row->getDtupdate())
			];
		}

		for($i = 0; $i < count($results); $i++){
			$results[$i]['date_time'] = date_format($results[$i]['date_time'], 'd/m/y');
			$results[$i]['dtupdate'] = date_format($results[$i]['dtupdate'], 'd/m/y');
		}

		return json_encode($results);
	}

	public function getJsonById($id) {
		
		$row = $this->selectById($id);
		$results = [
			'id'=>$row->getId(),
			'title'=>$row->getTitle(),
			'article'=>$row->getArticle(),
			'date_time'=>date_create($row->getDateTime())
		];
		

		
		$results['date_time'] = date_format($results['date_time'], 'd/m/y');
		

		return json_encode($results);
	}

	public static function getInserted()
	{
		$sql = "SELECT COUNT(id) FROM news WHERE deleted = 0";
		$result = (new self)->ExecuteSimpleQuery($sql);

		return $result;

	}

	public static function getDeleted()
	{
		$sql = "SELECT COUNT(id) FROM news WHERE deleted = 1";
		$result = (new self)->ExecuteSimpleQuery($sql);

		return $result;

	}

	public static function getUpdated()
	{
		$sql = "SELECT COUNT(id) FROM news WHERE dtupdate IS NOT NULL";
		$result = (new self)->ExecuteSimpleQuery($sql);

		return $result;

	}

}

