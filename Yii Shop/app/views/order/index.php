<table class="table table-bordered table-hover table-condensed">
	<tr>
		<th>Название товара</th>
		<th>Цена</th>
		<th>Количество</th>
		<th>Стоимость</th>
	</tr>
	<?php foreach ($order as $ord): ?>
	<tr>
		<td>
			<form action="" method="POST">
				<input type="hidden" name="ord" value='<?=serialize($ord)?>'>
				<img src="<?=IMG_GDS.'35x35/'.$ord['img']?>" alt=""> 
				<?=$ord['name'] ?> <button name="del" type="submit" class="times"><i class="fa fa-times"></i></button>
			</form>
		</td>
		<td class="price"><?=$ord['price'] ?>р</td>
		<td contenteditable="true" class="count"><?=$ord['count'] ?></td>
		<td class="all" class="text-danger"><?=$price[]=$ord['price']*$ord['count'] ?>р.</td>
	</tr>
	<?php endforeach ?>
	<tr>
		<td></td>
		<td></td>
		<th>Итого:</th>
		<td class="text-danger" id="sum">
			<?php
			if (isset($price)) {
				$s = 0;
				foreach ($price as $p) {
					$s +=$p;
				}
				echo $s.'р.';
			} else {
				$NO = true;
			}
			?>
		</td>
	</tr>
</table>
<a href="order-go" class="btn btn-primary" <?=(isset($NO))?'disabled':null?>>Отправить заказ</a>
<a href="/exit" class="btn btn-default" <?=(isset($NO))?'disabled':null?>>Очистить заказ</a>
<script>
	$('.count').focusout(function() {
		var price, count, all, newall, minus, sum;
		price = parseInt($(this).prev('.price').html())
		count = $(this).html();
		all = parseInt($(this).next('.all').html());
		$(this).next('.all').html(price * count+'р.');
		newall = parseInt($(this).next('.all').html());
		minus = newall - all;
		sum = parseInt($('#sum').html());
		$('#sum').html(sum+minus+'р.');
	})
</script>