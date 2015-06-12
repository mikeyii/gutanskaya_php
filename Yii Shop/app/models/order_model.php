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

	function send_ord() {
		
		if ( !preg_match("/\\d\\-\\d\\d\\d\\-\\d\\d\\d\\-\\d\\d\\-\\d\\d/", $_POST['tel']) )
			return '<div class="alert alert-danger">Телефон должен быт указанного формата</div>';

		$sum = 0;
		foreach ($_SESSION['order'] as $ord) {
			if (!empty($ord)) {

				$this->db->where('id', $ord['id']);
				$gd = $this->db->getOne('gds');
				$price = $gd['price'];

				$sum += $price * $ord['count'];
			}
			
		}

		$data = [
			'tel' => $_POST['tel'],
			'gds_data' => serialize($_SESSION['order']),
			'sum' => $sum,
			'date' => $this->db->now()
		];

		$id = $this->db->insert('orders', $data);
		if(!$id)
			return 'Ошибка добавления данных в бд';
	}
}