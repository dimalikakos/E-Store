<!-- ============================================== SCROLL TABS ============================================== -->
<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';
?>
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
	<div class="more-info-tab clearfix ">
	   <h3 class="new-product-title pull-left">Featured Products</h3>
		<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
			<li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">Smartphones</a></li>
			<li><a data-transition-type="backSlide" href="#smartphone" data-toggle="tab">Tablets</a></li>
			<li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Laptops</a></li>
			<li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Consoles</a></li>
		</ul><!-- /.nav-tabs -->
	</div>

	<div class="tab-content outer-top-xs">
		<div class="tab-pane in active" id="all">			
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

				    <?php
					$productsByCat = get_products_by_category(1);
					require UC_ROOT.'/parts/product/product-item.php'; ?>
				</div><!-- /.home-owl-carousel -->
			</div><!-- /.product-slider -->
		</div><!-- /.tab-pane -->

		<div class="tab-pane" id="smartphone">
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

				    <?php
					$productsByCat = get_products_by_category(2);
					require UC_ROOT.'/parts/product/product-item.php'; ?>
				</div><!-- /.home-owl-carousel -->
			</div><!-- /.product-slider -->
		</div><!-- /.tab-pane -->

		<div class="tab-pane" id="laptop">
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
					<?php
					$productsByCat = get_products_by_category(3);
					require UC_ROOT.'/parts/product/product-item.php'; ?>
				</div><!-- /.home-owl-carousel -->
			</div><!-- /.product-slider -->
		</div><!-- /.tab-pane -->

		<div class="tab-pane" id="apple">
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
					<?php
					$productsByCat = get_products_by_category(4);
					require UC_ROOT.'/parts/product/product-item.php'; ?>
				</div><!-- /.home-owl-carousel -->
			</div><!-- /.product-slider -->
		</div><!-- /.tab-pane -->

	</div><!-- /.tab-content -->
</div><!-- /.scroll-tabs -->
<!-- ============================================== SCROLL TABS : END ============================================== -->