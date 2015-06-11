<?php
/**
 * Файл с функциями заголовками сервера
 * redirect($url)
 * header404()
 * headerRefresh($time)
 * headerRefreshRedirect($time, $url)
 * headerHTML()
 */
function redirect($url) {
	header('Location: '.$url);
}

function header404() {
	header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
}

function headerRefresh($time) {
	header('Refresh:'.$time);
}

function headerRefreshRedirect($time, $url) {
	header("Refresh: $time; url=$url");
}

function headerDownload($filename) {
	header('Content-Disposition: attachment; filename="$filename"');
}

function headerHTML() {
	header('Content-type: text/html; charset=utf-8');
}