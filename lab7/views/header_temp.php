<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<style>
		.nav a {
			text-transform: uppercase;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1><?=$title?></h1>
		<ul class = "nav nav-pills">
		<?php foreach ($store as $key => $value): ?>
			<li <?php if ($url == $key) echo 'class="active"'?>>
			<a href="<?=$key?>"><?=$value['rname']?></a>
			</li>
		<?php endforeach ?>
		<form class="navbar-form navbar-right" role="search" action="search" method="POST">
			<div class="form-group">
				<input type="text" name="search" class="form-control" placeholder="Поиск...">
			</div>
			<button type="submit" class="btn btn-primary">Отправить</button>
		</form>
		</ul>
		<hr>