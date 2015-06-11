<?php
/**
* 
*/
class Dashboard_model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function is_login()
	{
		$this->db->where('session', $_SESSION['auth']);
		$user = $this->db->getOne('users');
		if (empty($user)) {
			header('Location: /');
			die;
		}
	}
}