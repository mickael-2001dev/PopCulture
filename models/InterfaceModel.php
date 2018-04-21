<?php  

interface InterfaceModel
{
	public function select();
	public function selectById($var);
	public function insert($var);
	public function update($var);
	public function delete($var);
}

