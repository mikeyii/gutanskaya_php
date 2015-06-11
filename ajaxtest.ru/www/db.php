<?php
define("DB_HOST",'127.0.0.1');
define("DB_NAME" ,'workspace');
define("DB_USER", 'root');
define("DB_PASS" ,'');
define("DB_CHARSET", 'UTF8');

$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;

$pdo = new PDO($dsn, DB_USER, DB_PASS) or die('Err db');

$pdo->query('SET NAMES utf8');