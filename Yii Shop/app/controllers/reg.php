<?php
class Reg extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->view->render('reg/index',['title'=>'YII SHOP: reg','meta'=>['author', 'mike']]);
	}

}