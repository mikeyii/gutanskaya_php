<?php
	if (!empty($_POST['type'])) {
		require 'db.php';
		$sql = 'SELECT * FROM `operations` WHERE `id_client` = ? AND `type` = ?';

		$stmt = $pdo->prepare($sql);

		$stmt->execute(array($_POST['client'], $_POST['type']));

		$ar = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$result = '';

		
		foreach ($ar as $key => $value) {
			$result .= 'Операция('.$key.')';
			foreach ($value as $key => $val) {
				$result.= $key.': '. $val.'<br>';
			}
			
		}
		echo 	$result;
	}