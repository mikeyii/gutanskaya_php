<?php	
	// require 'db.php';
	// SELECT
	$sql = "SELECT `author`, `msg`, DATE_FORMAT(`data`,'%H:%i:%s') as `data` FROM `chat` ORDER BY `id`";
	$stmt = $pdo->query($sql);
	$msgs = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$lines = '';

	foreach ($msgs as $key => $msg) {
		$login = $msg['author'];
		$login = '<span class="text-danger login">'.$login.'</span>';
		$date = '['.$msg['data'].'] ';
		$date = '<span class="text-info">'.$date.'</span>';
		$lines .= $date.$login.': '.$msg['msg'].'<br>';
	}
	return $lines;