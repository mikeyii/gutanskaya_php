<?php
session_start();
if (empty($_SESSION['auth'])) {
	header('Location: ./');
	die;
}
require 'db.php';

$sql = 'SELECT * FROM `users` WHERE `session` = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['auth']]);

$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($user) !== 1) {
	header('Location: ./');
	die;
}
$user = $user[0];
// SELECT msgs
$lines = require 'get_records.php';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Chat</title>
	<link rel="stylesheet" href="vendor/bootstrap.min.css">
	<style>
		.login {
			cursor: pointer;
			font-weight: bold;
		}
		#chatik {
			height: 300px;
			overflow: auto;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-right">
			Hello, <b><?=$user['login']?></b><br>
			<a href="exit.php">Exit</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h1>Chatик</h1>
			<form action="add_record.php" method="POST" id="add-record">
				<div class="form-control" id="chatik"><?=$lines?></div>
				<div class="input-group">
					<span class="input-group-addon" id="channel">
						Общий
					</span>
					<input type="text" class="form-control" id="msg" required placeholder="Отправить сообщение">
				</div>
			</form>
		</div>
	</div>
</div>
	<script src="vendor/jquery-2.1.4.min.js"></script>
	<script src="chat.js"></script>
</body>
</html>