<?php
const MAIN_CONTROLLER = 'Home';
const IMG_GDS = '/public/img/gds/';




if (TYPE === 'dev') {
	error_reporting(E_ALL);
	ini_set('display_errors', E_ALL);
} elseif (TYPE === 'work') {
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
} else {
	die('APP const "TYPE" Not Defined');
}