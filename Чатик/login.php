<?php
session_start();

require 'db.php';


$login = $_POST['login'];

$pass = md5($_POST['pass']);

$sql = "SELECT * FROM `users` WHERE `login` = ? AND `pass` = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$login, $pass]);

$ar = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($ar) === 1) {
	$session = uniqid('My_HAsh_key');
	$sql = "UPDATE `users` SET `session`= '$session' WHERE `login` = '$login'";
	$pdo->query($sql);
	$_SESSION['auth'] = $session;
} else {
	echo '<div class="alert alert-danger" role="alert">Пользователь с данным логином и паролем не найден! Попробуйте снова</div>';
}
