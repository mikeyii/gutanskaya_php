<div class="col-md-4 col-md-offset-3 panel panel-default">
	<p>Ваш заказ успешно оформлен, оставьте свой номер телефона, чтобы наш менеджер с вами связался</p>
	<form action="" method="POST">
		<label for="">Телефон</label>
		<input type="tel" name="tel" class="form-control" placeholder="8-xxx-xxx-xx-xx" required>
		<br>
		<div class="error"><?=(isset($err)) ? $err : null ?></div>
		<input type="submit" class="btn btn-primary">
		<br>
	</form>
</div>