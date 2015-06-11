<?php
class Order extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		if (isset($_POST['del'])) {
			$this->model->del($_POST['ord']);
		}
		if (!empty($_SESSION['order'])) {
			$order = $this->model->get_order();
			$this->view->render('order/index',['title'=>'YII SHOP','meta'=>['author', 'mike'],'order'=>$order]);
		} else {
			header('Location: /');
			die;
		}
	}

	function go()
	{
		$this->view->render('order/go');
	}

}