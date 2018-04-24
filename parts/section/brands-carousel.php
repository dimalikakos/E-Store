<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';
$brands_array = get_all_brands();
?>
<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<h3 class="section-title">Our Brands</h3>
		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">

				<?php
				foreach ($brands_array as $brand) {
				?>
					<div class="item m-t-15">
						<a href="index.php?page=category&currentBrand=<?php echo $brand['brand']; ?>" class="image">
							<img data-echo="assets/images/brands/<?php echo $brand['brand'] ?>.png" src="assets/images/blank.gif" alt="">
						</a>
					</div><!--/.item-->
   				<?php
				}
				foreach ($brands_array as $brand) {
					if ($_GET['currentBrand'] == $brand['brand']) {
						$_SESSION['selectedCategory'] =$brand['brand'];
						$_SESSION['brands'] = true;
						header("location: index.php?page=category&category=".$_SESSION['selectedCategory']."&brandsMode=true");
					}
				}

				?>







		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->