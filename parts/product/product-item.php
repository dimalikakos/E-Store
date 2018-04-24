<?php
foreach($productsByCat as $product){
?>
	<div class="item item-carousel">
		<div class="products">
			<?php displayProduct($product['pname'], $product['price'],$product['dateAdded'],$product['id']) ; ?>
		</div><!-- /.products -->
	</div><!-- /.item -->

<?php }?>
	