<?php

include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';

		foreach($productsByCat as $product):
			?>

		<div class="category-product-inner wow fadeInUp">
			<div class="products">				
	            <?php displayListProduct($product['pname'],$product['price'],$product['description'],$product['dateAdded'],$product['id']) ; ?>
			</div><!-- /.products -->
		</div><!-- /.category-product-inner -->
		
	<?php endforeach;?>
	