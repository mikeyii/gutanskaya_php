<?php
$dir = APP_DIR . 'upload/';

// Открыть заведомо существующий каталог и начать считывать его содержимое
if (is_dir($dir)) {
	if ($dh = opendir($dir)) {
		$data = [];
		$i = 0;
		while (($file = readdir($dh)) !== false) {
			$data[$i]['file'] = $file;
			$data[$i]['type'] = mime_content_type($dir . $file);
			$i++;
		}
		closedir($dh);
	}
}
array_multisort($data);
?>
<table class="table table-hover">
	<tr>
		<th>Файл</th>
		<th>Тип</th>
	</tr>
	<?php foreach ($data as $key => $value): ?>
		<tr>
			<td><p class="text-danger"><?=$value['file']?></p></td>
			<td><p class="text-primary"><?=$value['type']?></p></td>
		</tr>
	<?php endforeach ?>
</table>