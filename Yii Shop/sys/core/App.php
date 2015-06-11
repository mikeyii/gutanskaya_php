<?php
/**
 * App Class
 */
class App {

	/**
	 * init our Application - load router, url-helper, and bootstrap
	 */
	function init()
	{
		// Load libs
		$bootstrap = new Bootstrap();
		$router = new AltoRouter();
		// Set default parh
		$router->setBasePath(BASE_PATH);
		// Load Router map
		$map = require APP_DIR . 'options/router_map.php';
		$router->addRoutes($map);
		// Get match
		$match = $router->match();
		// Load pages in Url-helper
		Url::set_router($router);
		// Load page
		$bootstrap->load($match);
	}

}