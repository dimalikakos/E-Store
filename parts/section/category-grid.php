	<?php 

	foreach($productsByCat as $product){
			?>

		<div class="col-sm-6 col-md-4 wow fadeInUp">
			<div class="products">
				<?php displayProduct($product['pname'], $product['price'],$product['dateAdded'],$product['id']) ; ?>
			</div><!-- /.products -->
		</div><!-- /.item -->
	<?php }?>
	