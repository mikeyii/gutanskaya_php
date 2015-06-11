<?php
if (!empty($_POST['client']) AND empty($_POST['type'])) {

	require 'db.php';

	$sql = 'SELECT DISTINCT `type` FROM `operations` WHERE `id_client` = ?';

	$stmt = $pdo->prepare($sql);

	$stmt->execute(array($_POST['client']));

	$ar = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$result = '';

	foreach ($ar as $key => $value) {
		
		foreach ($value as $key => $val) {
			$result.= '<option value ="'.$val.'">'.$val.'</option>';
		}
		
	}
	echo 	$result;
} else {
	echo 'err';
}