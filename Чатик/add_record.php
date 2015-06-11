<?php
if (!empty($_POST)) {
	session_start();
	if (empty($_SESSION['auth'])) {
		header('Location: index.php');
		die;
	}
	require 'db.php';
	// VALID LOGIN
	$sql = 'SELECT * FROM `users` WHERE `session` = ?';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$_SESSION['auth']]);

	$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if (count($user) !== 1) {
		header('Location: index.php');
		die;
	}
	$user = $user[0];
	$login = $user['login'];
	$msg = htmlspecialchars($_POST['msg']);

	// INSERT
	$sql = 'INSERT INTO `chat`(`author`, `msg`, `data`) VALUES (?,?,NOW())';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$login, $msg]);
	// SELECT
	echo require 'get_records.php';
}
if (empty($_POST)) {
	require 'db.php';
	// SELECT
	echo require 'get_records.php';
}
