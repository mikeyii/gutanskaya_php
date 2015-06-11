<style>
	.form {
		margin-top: 10px;
	}
</style>
<?php
		$_SESSION['order'][] = $_POST;
?>
<?php foreach ($gds as $gd): ?>
	<div class="col-md-4">
		<div class="thumbnail good">
			<div class="caption">
				<h3 class="text-left"><?=$gd['name']?></h3>
				<h4 class="text-right text-danger"><?=$gd['price']?>р.</h4>
			</div>
			<div class="img-wrap text-center">
				<img src="<?=IMG_GDS.$gd['img']?>" class="img-gd img-responsive">
			</div>
			<div class="caption">
				<p><?=$gd['desc']?></p>
				<div class="row">
					<form action="" method=POST>
						<input type="hidden" name="id" value="<?=$gd['id']?>">
						<div class="col-md-4 col-xs-3">
							<input type="number" name="count" class="form-control" value=1>
						</div>
						<div class="col-md-4 col-xs-5">
							<button type="submit" class="btn btn-primary">В корзину <i class="fa fa-cart-arrow-down"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>
<div class="row">
	<div class="col-md-6 col-md-offset-4">
		<ul class="pagination pagination-lg">
		  <li class="disabled"><a href="#">&laquo;</a></li>
		  <li  class="active"><a href="#">1</a></li>
<!-- 		  <li><a href="#">2</a></li>
		  <li><a href="#">3</a></li>
		  <li><a href="#">4</a></li>
		  <li><a href="#">5</a></li>
		  <li><a href="#">6</a></li> -->
		  <li><a href="#">&raquo;</a></li>
		</ul>
	</div>
</div>