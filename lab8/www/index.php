<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h1>Регистрация <small>типо</small></h1>
				<form action="" class="form" method="POST">
					<input type="text" name="login" class="form-control" placeholder="Логин" required>
					<br>
					<input type="password" name="pass" class="form-control" placeholder="Пароль" required>
					<br>
					<input type="text" name="key" class="form-control" placeholder="Ключевое слово" required>
					<br>
					<input type="submit" class="form-control btn btn-primary">
				</form>
				<?php
				if ($_POST) {
					$login = $_POST['login'];
					$pass = $_POST['pass'];
					$key = $_POST['key'];

					$filename = '../protected/.passwd';
						if (!is_writable($filename)) {
							echo 'Файл недоступен для записи, смени права!!!';
							die;
						}
					$users = file($filename);
					foreach ($users as $row) {
						$user_data = explode(':', $row);
						if ($login === $user_data[0]) {
							die('<p class="bg-danger">Пользователь с таким логином уже существует, выберите другой</p>');
						}
					}
					$string = "\n$login:$pass:$key";
					$fp = fopen($filename, 'a');
					if (fwrite($fp, $string)) {
						echo '<p class="bg-success">Пользователь успешно добавлен</p>';
					} else {
						echo '<p class="bg-danger">Ошибка добавления пользователя</p>';
					}
					fclose($fp);
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>
