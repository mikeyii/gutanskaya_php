<?php
/**
* Model Class - parent class for our models, connect with DB
*/
class Model
{
	
	/**
	 * __construct - connect with our db();
	 */
	function __construct()
	{
		$this->db = new MysqliDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	/**
	 * __destroy - close our db
	 */
	function __destroy()
	{
		$this->db->close();
	}
}