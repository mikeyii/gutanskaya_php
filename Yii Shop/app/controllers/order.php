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

	function send_order()
	{
		$err = $this->model->send_ord();
		if (!$err) {
			header('Refresh: 10; url=/');
			$this->view->render('order/success');
		} else {
			$this->view->render('order/go',['err'=>$err]);
		}
	}

}