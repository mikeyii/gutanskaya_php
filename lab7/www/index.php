<?php
const APP_DIR = '../';
$url = $_SERVER['REQUEST_URI'];

$store =
[
	'/' =>
	[
		'rname' => 'Главная',
		'name' => 'home',
		'title' => 'Главная страница',
		'content' => 'Это главная страница сайта, для того, чтобы посмотреть задания, перейдите по любой из ссылок выше'
	],
	'/upload' => 
	[
		'rname' => 'Загрузка',
		'name' => 'upload',
		'title' => 'Загрузка файла',
	],
	'/files' =>
	[
		'rname' => 'Файлы',
		'name' => 'files',
		'title' => 'Просмотр содержимого папки'
	],
	'/search' =>
	[
		'rname' => 'Поиск',
		'name' => 'search',
		'title' => 'Поиск'
	],
	'/test' =>
	[
		'rname' => 'Тестовая страница',
		'name' => 'home',
		'title' => 'Тестовая страница',
		'content' => 'Это тестовая страница сайта'
	]
];
if (!array_key_exists($url, $store)) {
	echo 'Error 404 Page Not Found';
	die;
}
extract($store[$url]);
require APP_DIR . 'views/header_temp.php';
require APP_DIR . 'views/'.$store[$url]['name'].'.php';
require APP_DIR . 'views/footer_temp.php';