<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Default meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.jpg">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<script src="public/js/jquery.min.js"></script>
	<style>
		.times {
			display: inline;
			padding: 0;
			margin: 0;
			background-color: transparent;
			border: none;
			outline: none;
			color: #a94442;
		}
		.times:hover{
			color: #CB3330;
		}
		.img-gd {
			height: 340px;
			width: 340px;
			margin: 0 auto;
		}
		.good .img-wrap {
			height: 340px;
		}
		.good {
			height: 550px;
		}
		#footer {
			margin-top: 40px;
			min-height: 171px;
			background-color: #101010;
			color: #9d9d9d;
			padding: 50px;
		}
		#content {
			min-height: 400px;
		}
	</style>
	<!-- Upload meta -->
	<?php
	if (isset($meta))
		echo HTML::load('meta', $meta);
	?>
	<title><?=$title?></title>
</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
				<a class="navbar-brand" href="/">YII SHOP</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li <?=($_SERVER['REQUEST_URI']===url::get('home')) ? 'class="active"' : null?>><a href="/">Главная</a></li>
					<li <?=isset($btn2)?$btn2:null?>><a href="#">Акции</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Тип товара <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Яблоки</a></li>
							<li><a href="#">Апельсины</a></li>
							<li><a href="#">Киви</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<!-- <?php if (isset($_SESSION['auth'])): ?>
					<li <?=($_SERVER['REQUEST_URI']===url::get('dashboard')) ? 'class="active"' : null?>><a href="<?=url::get('dashboard')?>">Личный кабинет</a></li>
					<li><a href="/exit">Выход</a></li>
				<?php else : ?>
					<li <?=($_SERVER['REQUEST_URI']===url::get('reg')) ? 'class="active"' : null?>><a href="/reg">Регистрация</a></li>
					<li <?=($_SERVER['REQUEST_URI']===url::get('login')) ? 'class="active"' : null?>><a href="/login">Вход</a></li>
				<?php endif; ?> -->
				<li><a href="/order">В корзине 
				<?=(isset($_SESSION['count_tov'])) ? $_SESSION['count_tov'] : 0 ?>
				 товаров</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<form class="navbar-form" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Поиск...">
						</div>
						<button type="submit" class="btn btn-default">Найти</button>
					</form>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="content">
