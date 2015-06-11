<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Ajax</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="">
					<select name="client" id="client">
						<?php foreach ($all_clients as $client): ?>
							<option value="<?=$client?>"><?=$client?></option>
						<?php endforeach ?>
					</select>
					<div id="client_info">
						
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Default JS -->
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="chr.js"></script>
</body>
</html>