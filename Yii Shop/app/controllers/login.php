<?php
class Login extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->view->render('login/index',['title'=>'YII SHOP: login','meta'=>['author', 'mike']]);
	}

	function login()
	{
		$errors = $this->model->login();
		if (!$errors) {
			header('Location: dashboard');
			die;
		}
		$this->view->render('login/index',['title'=>'Yii-shop: Login-form', 'meta'=>['author', 'mike'], 'errors'=>$errors]);
	}
}