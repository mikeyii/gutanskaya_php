<?php
/**
 * HTML Class - class helper for HTML
 */
class HTML
{

	private static $tags = [
		'css'		=> 'link rel="stylesheet" href',
		'js' 		=> 'script src',
		'meta' 	=> 'meta'
		];

	private static $needCloseTag = ['js'];

	/**
	 * load -  return html tags with params from views
	 *
	 * @param string $arg is load('css','js',...)
	 * @return string HTML tags
	 */
	static function load($arg, $value) 
	{
		if (!empty($value)) {
			$param = $value;
			$load = '';
			if (is_array($param)) {
				if ($arg === 'meta') {
					if (is_array($param[0])) {
						foreach ($param as $p) {
							$load .= self::generateLoad($arg, $p[0], $p[1])."\n\t";
						}
					}
					if (is_string($param[0]))
					$load = self::generateLoad($arg, $param[0], $param[1]);
				}
				if ($arg !== 'meta') {
					foreach ($param as $value) {
						$load .= self::generateLoad($arg, $value)."\n\t";
					}
				}
				$load = rtrim($load, "\t");
				return $load;
			}
			if (is_string($param)) {
				$load .= self::generateLoad($arg, $param);
				return $load;
			}
		}
	}

	/**
	 * generateLoad - generate one HTML tag
	 *
	 * @param string $arg(css, js, etc)
	 * @param string $value - value our arg from tag
	 * @param boolean $meta if is meta - load under type tag
	 */
	static function generateLoad($arg, $value, $meta = false) 
	{
		if (isset(self::$tags[$arg])) {
			$attr = self::$tags[$arg];

			if (in_array($arg, self::$needCloseTag)) {
				return "<$attr=\"$value\"></$attr>";
			}
			if ($meta)
				return "<$attr name=\"$value\" content=\"$meta\">";
			return "<$attr=\"$value\">";
		}
	}
}