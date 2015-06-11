<?php
/**
* 
*/
class Dashboard extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->model->is_login();
		$this->view->render('dashboard/index', ['title'=>'YII SHOP: dashboard']);
	}

	function exit_u()
	{
		session_unset();
		session_destroy();
		header('Location: /');
		die;
	}
}