<?php
/**
* 
*/
class Login_model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function login()
	{
		$this->db->where('login', $_POST['login']);
		$this->db->where('pass', md5($_POST['pass']));
		$user = $this->db->getOne('users');
		if (!empty($user)) {
			$token = md5(uniqid(rand(), true));
			$_SESSION['auth'] = $token;
			$this->db->where('login', $_POST['login']);
			$this->db->update('users', ['session' => $token]);
			return false;
		}
		return '<div class="alert alert-danger">Неверные логин и/или пароль</div>';
	}
}