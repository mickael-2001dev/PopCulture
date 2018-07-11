<?php  

class Data 
{

	public static function getInsertedData()
	{	
		$data = 0;
		$data += (int)NewsModel::getInserted()[0]['COUNT(id)'];
		$data += (int)PostModel::getInserted()[0]['COUNT(id)'];
		$data += (int)VideoPageModel::getInserted()[0]['COUNT(id)'];

		return $data;
	}

	public static function getUpdatedData()
	{	
		$data = 0;
		$data += (int)NewsModel::getUpdated()[0]['COUNT(id)'];
		$data += (int)PostModel::getUpdated()[0]['COUNT(id)'];
		$data += (int)VideoPageModel::getUpdated()[0]['COUNT(id)'];

		return $data;
	}


	public static function getDeletedData()
	{	
		$data = 0;
		$data += (int)NewsModel::getDeleted()[0]['COUNT(id)'];
		$data += (int)PostModel::getDeleted()[0]['COUNT(id)'];
		$data += (int)VideoPageModel::getDeleted()[0]['COUNT(id)'];

		return $data;
	}

}