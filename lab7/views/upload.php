<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form action="" enctype="multipart/form-data" class="form" method="POST">
			<input type="file" class="form-control" name="userfile"><br>
			<input type="submit" class="form-control btn btn-primary">
		</form>
<?php
	if (!empty($_FILES)) {
		$uploaddir = APP_DIR . 'upload/';
		$uploadfile = $uploaddir . $_FILES['userfile']['name'];
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			echo '<p class="bg-success">Файл корректен и был успешно загружен.</p>';
		} else {
			echo '<p class="bg-danger">Возможная атака с помощью файловой загрузки!</p>';
		}
	}
?>
	</div>
</div>