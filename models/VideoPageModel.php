<?php  

class VideoPageModel extends Model implements InterfaceModel
{
	
	public function select()
	{
		$videopage = [];
		$results = parent::getAll('videopage', true);
		

		foreach ($results as $row) {

			$videopage[] = new  VideoPageAbstract(
				$row['title'],
				$row['article'],
				$row['date_time'],
				$this->selectImagemVideoPage($row['id']),
				$this->selectVideoVideoPage($row['id']),
				$row['id']
			);
		}

		return $videopage;

	}

	public function selectById($id) 
	{
		$results = parent::getAllById('videopage', $id);
		//var_dump($results);
		//echo $results['title'];
		//var_dump($this->selectVideoVideoPage($results['id']));
		$videopage = new VideoPageAbstract(
			$results['title'],
			$results['article'],
			$results['date_time'],
			$this->selectImagemVideoPage($results['id']),
			$this->selectVideoVideoPage($results['id']),
			$results['id']
		);

		return $videopage;
	}

	public function selectLatest()
	{
		$sql = "SELECT id FROM videopage ORDER BY id desc LIMIT 1";
		$result = $this->ExecuteSimpleQuery($sql);

		return $result;

	}

	public function selectImagemVideoPage($id)
	{
		//echo $id;
		$imagem = [];
		$sql = "SELECT im.* FROM videopage_has_imagem as vip
				INNER JOIN videopage as vp ON vp.id = vip.idvideopage
				INNER JOIN imagem as im ON im.id = vip.idimagem
				WHERE vip.idvideopage = :id";
		$results = $this->ExecuteQuery($sql, [':id'=>$id]);


		foreach($results as $row){
			$imagem[] = new ImagemAbstract($row['src'], $row['id']);
		}

		
		//var_dump($imagem);
		return $imagem;
	}

	public function selectVideoVideoPage($id)
	{
		//echo $id;
		$video = [];
		$sql = "SELECT v.* FROM videopage_has_video as vip
				INNER JOIN videopage as vp ON vp.id = vip.idvideopage
				INNER JOIN video as v ON v.id = vip.idvideo
				WHERE vip.idvideopage = :id";
		$results = $this->ExecuteQuery($sql, [':id'=>$id]);


		foreach($results as $row){
			$video[] = new VideoAbstract($row['code'], $row['id']);
		}

		
		//var_dump($video);
		return $video;
	}

	public function insert($videopage) 
	{

		$sql = "INSERT INTO videopage(article, title, date_time) VALUES (:article, :title, :date_time)";
		if($this->ExecuteCommand($sql,
			[
			':article'=>$videopage->getArticle(), 
			':title'=>$videopage->getTitle('2'),
			'date_time'=>$videopage->getDateTime()
			]
			)
		){
			return true;
		} else {
			return false;
		}
	}

	public function insertImagem($idimagem, $idvideopage) {
		//var_dump($idimagem);
		//var_dump($idvideopage);
		$sql = "INSERT INTO videopage_has_imagem(idimagem, idvideopage) VALUES (:idimagem, :idvideopage)";
		if($this->ExecuteCommand($sql, [':idimagem'=>$idimagem['id'], ':idvideopage'=>$idvideopage['id']])){
			return true;
		} else {
			return false;
		}
	}

	public function insertVideo($idvideo, $idvideopage) {
		//var_dump($idvideo);
		//var_dump($idvideopage);
		$sql = "INSERT INTO videopage_has_video(idvideo, idvideopage) VALUES (:idvideo, :idvideopage)";
		if($this->ExecuteCommand($sql, [':idvideo'=>$idvideo['id'], ':idvideopage'=>$idvideopage['id']])){
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$return = false;
		$sql = "UPDATE videopage SET deleted = 1 WHERE id = :id";
		if($this->ExecuteCommand($sql,  [':id'=>$id])){
			$return = true;
		}

		return $return;
	}

	public function deleteDefinitive($id)

	{
		$result = parent::delete('videopage', $id);

		return $result;
	}



	public function update($videopage) 
	{

		$return = false;
		$date = new DateTime();
		$date = $date->format('Y-m-d');
		$sql = "UPDATE videopage SET title = :title, article = :article, date_time = :date_time, dtupdate = :dt_update 
		WHERE id = :id";
		if($this->ExecuteCommand($sql,  
		[':title'=>$videopage->getTitle(), 
			':article'=>$videopage->getArticle(),
			':date_time'=>$videopage->getDateTime(),
			'dt_update'=>$date,
			':id'=>$videopage->getId()])){
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
		$sql = "SELECT COUNT(id) FROM videopage WHERE deleted = 0";
		$result = (new self)->ExecuteSimpleQuery($sql);

		return $result;

	}

	public static function getDeleted()
	{
		$sql = "SELECT COUNT(id) FROM videopage WHERE deleted = 1";
		$result = (new self)->ExecuteSimpleQuery($sql);

		return $result;

	}

	public static function getUpdated()
	{
		$sql = "SELECT COUNT(id) FROM videopage WHERE dtupdate IS NOT NULL";
		$result = (new self)->ExecuteSimpleQuery($sql);

		return $result;

	}

}

