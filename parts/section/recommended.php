<!-- ============================================== FEATURED PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Recommended Products Based On Last Search, And Common Tags.</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
		<?php

		$productsByCat =  recommender($_SESSION["search_data"]);
		shuffle($productsByCat); // so that results change and are of random order.
		?>
	    <?php require UC_ROOT.'/parts/product/product-item.php'; ?>
	</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->