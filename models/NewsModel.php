<?php  


class NewsModel extends Model implements InterfaceModel
{
	
	public function select()
	{
		$news = [];
		$results = parent::getAll('news');
		

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

	public function delete($id)
	{
		$result = parent::delete('news', $id);

		return $result;
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

	public function update($var) 
	{
		echo "Atualiza";
	}

	public function encodeJson() {
		$results = [];
		foreach ($this->select() as $row) {
			$results[] = [
				'id'=>$row->getId(),
				'title'=>$row->getTitle(),
				'article'=>substr(filter_var($row->getArticle(), FILTER_SANITIZE_STRING), 0, 80)."...",
				'date_time'=>$row->getDateTime()
			];
		}
		

		return json_encode($results);
	}
}

