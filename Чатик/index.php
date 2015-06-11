<?php
session_start();
if (!empty($_SESSION['auth'])) {
	require 'db.php';

	$sql = 'SELECT * FROM `users` WHERE `session` = ?';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$_SESSION['auth']]);

	$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if (count($user) === 1) {
		header('Location: /chat.php');
		die;
	}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>AJAX чатик</title>
	<link rel="stylesheet" href="vendor/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Chatик <br><small>Hello, it is login form, enter your login and pass</small></h1>
				<form action="login" id="login-form">
					<label for="login-i">Логин</label>
					<input type="text" class="form-control" id="login-i" placeholder="Ваш логин" required>
					<label for="pass-i">Пароль</label>
					<input type="password" class="form-control" id="pass-i" placeholder="Ваш пароль" required><br>
					<input type="submit" class="btn btn-primary btn-block"><br>
					<a href="reg.php">Добавить пользователя</a>
					<div class="error"></div>
				</form>
			</div>
		</div>
	</div>
	<script src="vendor/jquery-2.1.4.min.js"></script>
	<script src="chr.js"></script>
</body>
</html>