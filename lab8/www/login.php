<?php
session_start();
if (isset($_SESSION['login'])) {
	header('Location: private.php');
	die;
}
$filename = '../protected/.passwd';
var_dump($_POST);
var_dump($_SESSION);

if ($_POST) {
	$login = isset($_POST['login']) ? $_POST['login'] : null;
	$pass = isset($_POST['pass']) ? $_POST['pass'] : null;
	$key = isset($_POST['key']) ? $_POST['key'] : null;

	if (!is_readable($filename)) {
		echo 'Файл недоступен для чтения, смени права!!!';
		die;
	}
	$users = file($filename);
	foreach ($users as $row) {
		$user_data = explode(':', $row);
		if ($login === $user_data[0] AND $pass === $user_data[1]) {
			// Логин и пароль введены вверно
			$_SESSION['login'] = $login;
			header('Location: private.php');
			die;
		}
		if ($_SESSION['tlogin'] === $user_data[0] AND $key == $user_data[2]) {
			// Верная ключ-фраза(не настя)
			$_SESSION['login'] = $_SESSION['tlogin'];
			unset($_SESSION['tlogin']);
			header('Location: private.php');
			die;
		}
		if ($login === $user_data[0] AND $pass !== $user_data[1]) {
			// Логин введен вверно, а пароль нет
			$_SESSION['tlogin'] = $login;
			$err = true;
		}
	}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Вход в личный кабинет</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h1>Вход в личный кабинет <small>типо</small></h1>
				<form action="" class="form" method="POST">
					<?php 
					if (isset($err)) {
					?>
					<label for="key">Введите ключеве слово <?=$_SESSION['tlogin']?></label>
					<input type="text" class="form-control" name="key" placeholder="Ключевое слово"><br>
					<?php
					} else {
					?>
					<input type="text" name="login" class="form-control" placeholder="Логин" required>
					<br>
					<input type="password" name="pass" class="form-control" placeholder="Пароль" required>
					<br>
					<?php } ?>
					<input type="submit" class="form-control btn btn-primary" value="Отправить">
				</form>
			</div>
		</div>
	</div>
</body>
</html>