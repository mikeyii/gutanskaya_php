<?php
const APP_DIR = '../';

const BASE_PATH = '';

const CITY = 'Nizhniy Novgorod';

const TYPE = 'dev';

require APP_DIR . 'options/main.conf.php';
require APP_DIR . 'options/db.conf.php';
require APP_DIR . 'sys/core/Autoloader.php';

session_start();

View::setLayouts(
	['header'=>'header','footer'=>'footer']);

(new App())->init();