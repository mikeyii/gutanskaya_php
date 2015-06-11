<?php
if (!empty($_POST)) {
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	require 'db.php';
	$sql = 'SELECT * FROM `users` WHERE `login` = ?';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$login]);

	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if (count($users) > 0) {
		$err = '<div class="alert alert-danger">Пользователь с данным логином уже существует, выберите другой!</div>';
	} else {
		$sql = 'INSERT INTO `users` (`login`, `pass`) VALUES (?, ?)';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$login, md5($pass)]);
		$err = '<div class="alert alert-success">Пользователь успешно добавлен</div>';
	}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Добавить пользователя</title>
	<link rel="stylesheet" href="vendor/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Add user</h1>
				<form action="<?=$_SERVER['PHP_SELF']?>" id="login-form" method="POST">
					<label for="login-i">Логин</label>
					<input type="text" name="login" class="form-control" id="login-i" placeholder="Ваш логин" required>
					<label for="pass-i">Пароль</label>
					<input type="password" name="pass" class="form-control" id="pass-i" placeholder="Ваш пароль" required><br>
					<input type="submit" class="btn btn-primary btn-block" value="Добавить пользователя"><br>
					<div class="error"><?=isset($err)?$err:null?></div>
					<a href="./">Войти</a><br>
				</form>
			</div>
		</div>
	</div>
</body>
</html>