<?php
/**
* Controller Class - parent class for our controllers, load view and model
*/
class Controller
{

	protected $model;

	protected $view;


	/**
	 * Load our view
	 */
	function __construct()
	{
		$this->view = new View();
	}

	/**
	 * loadModel($model) - call Bootstrap, load our model from app/model/*_model.php
	 *
	 * @param string $model
	 */
	function loadModel($model)
	{
		$mPath = APP_DIR . 'app/models/' . $model . '_model.php';
		if (file_exists($mPath)) {
			require $mPath;
			$mName = ucfirst($model).'_Model';
			$this->model = new $mName();
		}
	}
}