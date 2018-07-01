<?php  

class Videos extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new VideoPageModel;
	}

	public function index() 
	{

		$data['videos'] = $this->model->select();
		$data['title'] = "Videos";
		$this->view->load('header', $data);
		$this->view->load('nav');
		$this->view->load('videos', $data);
		$this->view->load('footer');
	}

	public function article($id)
	{
		$data['video'] = $this->model->selectById($id);
		$data['title'] = $data['video']->getTitle();

		$this->view->load('header', $data);
		$this->view->load('nav');
		$this->view->load('viewvideo', $data);
		$this->view->load('footer');

	}

	public function page()
	{
		echo "YEY";
	}
}