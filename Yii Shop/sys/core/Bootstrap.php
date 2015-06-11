<?php
/**
* Bootstrap class
*/
class Bootstrap
{

	/**
	 * load($match) - load our controller and method (controller->method(params))
	 *
	 * @param array|false $match
	 */
	function load($match)
	{
		if (!$match) {
			$controllerName = MAIN_CONTROLLER;
			$actionName = 'error404';
		} else {
			$target = explode('#', $match['target']);
			$controllerName =  $target[0];
			$actionName = $target[1];
			$params = $match['params'];
		}
		$controllerPath = APP_DIR . 'app/controllers/' . strtolower($controllerName) . '.php';
		if (!file_exists($controllerPath)) {
			header404();
			die("Controller \"$controllerName\" Not Found");
		}
		require $controllerPath;

		if (!method_exists($controllerName, $actionName)) {
			$actionName = 'error404';
		}

		$controller = new $controllerName();

		$controller->loadModel(strtolower($controllerName));

		if (!empty($params)) {
			$controller->{$actionName}(...$params);
			return;
		}

		$controller->{$actionName}();
	}
}