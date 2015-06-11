<?php
/**
* View Class - class with render files and includes layouts
*/
class View
{
	/**
	 * @var string|array $Layout
	 */
	static
		$headerLayout,
		$footerLayout;


	/**
	 * render - render our page with layouts, and extracted data
	 *
	 * @param string $file - view from app/views/
	 * @param array $data - data for render files and layouts
	 */
	public function render($file, array $data=null)
	{
		if (isset($data)) {
			extract($data);
		}
		$this->loadLayout(self::$headerLayout, $data);
		require APP_DIR . 'app/views/' . $file . '.php';
		$this->loadLayout(self::$footerLayout, $data);
	}

	/**
	 * seyLayouts - set our layouts
	 *
	 * @param array $layout = ['header' => ..., 'footer' => ...]
	 */
	static function setLayouts(array $layout)
	{
		if (isset($layout['header'])) {
			self::$headerLayout = $layout['header'];
		}
		if (isset($layout['footer'])) {
			self::$footerLayout = $layout['footer'];
		}
	}

	/**
	 * loadLayout - load our layouts
	 * 
	 * @param string|array $layout
	 * @param array data
	 */
	private function loadLayout($layout, array $data=null)
	{
		if (!empty($layout)) {
			if (is_string($layout)) {
				$path = APP_DIR . 'app/views/layouts/' . $layout . '.php';
				if (!file_exists($path)) {
					die("Layout \"$layout\" not found");
				}
				if (isset($data)) {
					extract($data);
				}
				include $path;
				return;
			}
			if (is_array($layout)) {
				foreach ($layout as $l) {
					$path = APP_DIR . 'app/views/layouts/' . $l . '.php';
					if (!file_exists($path)) {
						die("Layout \"$l\" Not Found");
					}
					if (isset($data)) {
						extract($data);
					}
					include $path;
				}
			}
			return;
		}
	}
}