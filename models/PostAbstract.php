<?php  

class PostAbstract 
{
	
	public function __construct($title, $article, $date_time, $categoria, $listimagens = null, $id = null, $deleted = 0, $dtupdate = null)
	{
		$this->title = $title;
		$this->article = $article
		$this->date_time = $date_time;
		$this->deleted = $deleted;
		$this->dtupdate = $dtupdate;
		$this->listimagens = $listimagens;
		$this->id = $id;
	}

	public function getId() 
	{
		return $this->id;
	}

	public function getTitle() 
	{
		return $this->title;
	}

	public function getArticle() 
	{
		return $this->article;
	}

	public function getDateTime()
	{
		return $this->date_time;
	}

	public function getDeleted()
	{
		return $this->deleted;
	}

	public function getDtupdate()
	{
		return $this->dtupdate;
	}

	public function getCategoria()
	{
		return $this->categoria;
	}

	public function getListimagens()
	{
		return $this->listimagens;
	}

	public function setId($val)
	{
		$this->id = $val;
	}

	public function setTitle($val)
	{
		$this->title = $val;
	}

	public function setArticle($val)
	{
		$this->article = $val;
	}

}