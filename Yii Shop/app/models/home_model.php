<?php
/**
* 
*/
class Home_model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_gds()
	{
		return $this->db->get('gds');
	}
}