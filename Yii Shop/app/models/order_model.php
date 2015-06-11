<?php
/**
* 
*/
class Order_model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_order()
	{
		$order = $_SESSION['order'];
		$gds = [];
		foreach ($order as $ord) {
			if (!empty($ord)){
				$this->db->where('id', $ord['id']);
				$gd = $this->db->getOne('gds');
				$gd['count'] = $ord['count'];
				$gds[] = $gd;
			}
		}
		return $gds;
	}
	function del($del_ord)
	{
		$del_ord = unserialize($del_ord);
		$order = $_SESSION['order'];
		$gds = [];
		foreach ($order as $key=>$ord) {
			if (!empty($ord)){
				if ($ord['id']==$del_ord['id'] AND $ord['count'] == $del_ord['count']) {
					unset($_SESSION['order'][$key]);
					return;
				}
			}
		}
	}
}