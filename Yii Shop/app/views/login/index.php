<div class="col-md-6 col-md-offset-3">
	<h1>Форма входа</h1>
	<form action="" id="login-form" method="POST">
		<label for="login-i">Логин</label>
		<input type="text" name="login" class="form-control" id="login-i" placeholder="Ваш логин" required>
		<label for="pass-i">Пароль</label>
		<input type="password" name="pass" class="form-control" id="pass-i" placeholder="Ваш пароль" required><br>
		<input type="submit" class="btn btn-primary btn-block"><br>
		<div class="error"><?=(isset($errors)) ? $errors : null?></div>
		<a href="reg">Регистрация</a>
	</form>
</div>