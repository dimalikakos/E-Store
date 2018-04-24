<?php
function displayProductMicro($productName,$price,$ID){
?>
<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="index.php?clickedProduct=true&clickedProd=<?php echo $ID ?>" data-lightbox="image-1" data-title="Nunc ullamcors">
						<img  src="assets/images/product_images/<?php echo $ID ?>/small.jpg" alt="">
						<div class="zoom-overlay"></div>
					</a>					
				</div><!-- /.image -->



			</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="index.php?clickedProduct=true&clickedProd=<?php echo $ID ?>"><?php echo $productName; ?></a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">	
				<span class="price">
					$<?php echo $price; ?>
				</span>

				
			</div><!-- /.product-price -->
				<div class="action"><a href="index.php?clickedProduct=true&clickedProd=<?php echo $ID ?>" class="lnk btn btn-primary">View</a></div>
			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->
      
<?php	
}


?>