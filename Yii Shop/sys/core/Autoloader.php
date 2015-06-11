<?php
/**
 * Load all class_files from inc array
 */
function __autoload($class_name) {
	$inc = ['sys/core/', 'sys/libs/'];
	foreach ($inc as $in) {
		$path = APP_DIR . $in . $class_name . '.php';
		if (file_exists($path)) {
			include $path;
		}
	}
}
/**
 * Load functions from sys/functions dir
 */
$dir = APP_DIR . 'sys/functions/';
load_files_from_dir($dir);

/**
 * Load all files_functions.php from this dir
 *
 * @param string $dir - our dir
 */
function load_files_from_dir($dir) {

	$catalog = opendir($dir);

	while ($filename = readdir($catalog )) // перебираем наш каталог 
	{
			if (getEndFile($filename) === 'functions.php') {
				$filename = $dir.'/'.$filename;
				include($filename); // один раз подрубаем, чтоб не повторяться 
			}
	}

	closedir($catalog);

}

/**
 * get our end file after "_"
 *
 * @param string @fileName
 */
function getEndFile($fileName) {
	return substr(strrchr($fileName, '_'), 1);
}