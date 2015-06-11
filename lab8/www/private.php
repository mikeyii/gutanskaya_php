<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('Location: login.php');
	die;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Личный кабинет</title>
</head>
<body>
	<h1>Добро пожаловать, <?=$_SESSION['login']?></h1>
	<a href="exit.php">Выход</a>
</body>
</html>