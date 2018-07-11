<?php  

class MessageModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function select()
	{
		$message = [];

		$results = parent::getAll('message', true);

		foreach ($results as $row) {
			$message[] = new MessageAbstract(
				$row['message'],
				$row['email'],
				$row['name_ms'],
				$row['id']
			);
		}

		return $message;
	}

	public function selectById($id)
	{
		$results = parent::getAllById('message', $id);

		$message = new MessageAbstract(
			$results['message'],
			$results['email'],
			$results['name_ms'],
			$results['id']
		);

		return $message;
	}

	public function insert($message) 
	{

		$sql = "INSERT INTO message(message, email, name_ms) VALUES (:message, :email, :name_ms)";

		if($this->ExecuteCommand($sql,[':message'=>$message->getMessage(), ':email'=>$message->getEmail(), ':name_ms'=>$message->getName_ms()])){
			return true;
		} else {
			return false;
		}
	}

	public function getJson() {
		$results = [];

		foreach ($this->select() as $row) {
			$results[] = [
				'id'=>$row->getId(),
				'message'=>$row->getMessage(),
				'email'=>$row->getEmail(),
				'name_ms'=>$row->getName_ms()
			];
		}


		return json_encode($results);
	}

	public function getJsonById($id) {
		
		$row = $this->selectById($id);
		$results = [
			'id'=>$row->getId(),
			'message'=>$row->getMessage(),
			'email'=>$row->getEmail(),
			'name_ms'=>$row->getName_ms()
		];
		

		return json_encode($results);
	}

	public function getTotal()
	{
		$sql = "SELECT COUNT(id) FROM message WHERE deleted = 0";
		$results = (int)$this->ExecuteQuery($sql, array(),PDO::PARAM_INT)[0]['COUNT(id)'];


		return $results;
	}

	public function delete($id)
	{
		$return = false;
		$sql = "UPDATE message SET deleted = 1 WHERE id = :id";
		if($this->ExecuteCommand($sql,  [':id'=>$id])){
			$return = true;
		}

		return $return;
	}

	public function deleteDefinitive($id)

	{
		$result = parent::delete('message', $id);

		return $result;
	}


}