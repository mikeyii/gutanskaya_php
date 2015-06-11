<?php 
if (isset($_POST['search'])) {
	$count = 0;
?>
<p>Результаты поиска:</p>
<ul>
<?php
	$search = '/' . $_POST['search'] . '/';
	foreach ($store as $key => $value) {
		$title = $value['title'];
		$content = $value['content'];
		if (preg_match($search, $title)) {
			$count++;
?>
<li>
	<a href="<?=$key?>"><?=$value['title']?></a>
</li>
<?php
		} elseif (preg_match($search, $content)) {
			$count++;
?>
<li>
	<a href="<?=$key?>"><?=$value['title']?></a><br>
	<p><?=$content?></p>
</li>
<?php
		}
	}
	if (!$count) {
		echo '<p class="bg-danger">Страницы с данной поисковой фразой не надены, попробуйте снова</p>';
	}
} else {
?>
<p>Для того, чтобы начать поиск, введите поисковую фразу в поле сверху.</p>
<?php } ?>