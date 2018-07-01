<?php

class VideoModel extends Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function select()
	{
		$video = [];
		$results = parent::getAll('video');

		foreach ($results as $row) {
			$video[] = new VideoAbstract
			(
				$row['src'],
				$row['id']
			);

		}
		return $video;
	}

	public function selectLatest()
	{
		$sql = "SELECT id FROM video ORDER BY id desc LIMIT 1";
		$result = $this->ExecuteSimpleQuery($sql);

		return $result;
	}

	public function insert($code)
	{
		$sql = "INSERT INTO video(code) VALUES(:code)";
		if($this->ExecuteCommand($sql,[':code'=>$code])){
			return true;
		} else {
			return false;
		}
	}
}


