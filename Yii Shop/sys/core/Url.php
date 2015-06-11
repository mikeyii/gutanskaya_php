<?php
/**
* Url Class - helper for url
*/
class Url
{
	/**
	 * @var AltoRouter $router
	 */
	static $router;

	/**
	 * set_router - set our router with method "generate"
	 *
	 * @param AltoRouter $router
	 */
	static function set_router($router)
	{
		self::$router = $router;
	}

	/**
	 * get - get our page_url
	 *
	 * @param string name
	 * @param array $params
	 */
	static function get($name, $params = null)
	{
		if (isset($params)) {
			return self::$router->generate($name, $params);
		}
		return self::$router->generate($name);
	}
}
