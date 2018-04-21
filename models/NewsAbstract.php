<?php  

class NewsAbstract
{
	private $title;
	private $article;
	private $date_time;
	private $deleted;
	private $dtupdate;
	private $id;

	public function __construct($title, $article, $date_time, $deleted = 0, $dtupdate = null, $id = null)
	{
		$this->title = $title;
		$this->article = $article;
		$this->date_time = $date_time;
		$this->deleted = $deleted;
		$this->dtupdate = $dtupdate;
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