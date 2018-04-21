<?php  


class NewsModel extends Model implements InterfaceModel
{
	
	public function select()
	{
		$news = [];
		parent::getAll('news');
		//var_dump($results);

		foreach ($results as $row) {
			$news[] = new NewsAbstract(
				$row['title'],
				$row['article'],
				$row['date_time'],
				null,
				null,
				$row['id']
			);
		}

		return $news;

	}

	public function selectById($id) 
	{
		parent::getAllById('news', $id);
		
		$news = new NewsAbstract(
			$results['title'],
			$results['article'],
			$results['id']
		);

		return $news;
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

	public function update($var) 
	{
		echo "Atualiza";
	}

	public function encodeJson($results) {
		return json_encode($results);
	}
}
