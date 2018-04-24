<!-- ============================================== FEATURED PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Reccomended Products Based On Last Search</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
		<?php
		$productsByCat =  recommender($_SESSION["search_data"]);
		?>
	    <?php require UC_ROOT.'/parts/product/product-item.php'; ?>
	</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->