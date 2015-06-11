<?php
class Home extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$gds = $this->model->get_gds();
		$this->view->render('home/index',['title'=>'YII SHOP','meta'=>['author', 'mike'], 'gds' => $gds]);
	}

	function about()
	{
		$this->view->render('about/index', ['title'=>'About page']);
	}

	function error404()
	{
		header404();
		echo 'Error 404: Page Not Found';
	}

}