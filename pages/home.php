<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">
	<!-- ============================================== SIDEBAR ============================================== -->	
		<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
			<?php  require UC_ROOT.'/parts/product/product-micro.php';  ?>

			<?php require UC_ROOT.'/parts/navigation/sidemenu.php' ?>

			<?php /*require UC_ROOT.'/parts/widgets/sidebar/sidebar-advertisement.php' */?>
				<div class="sidebar-module-container">
					<?php require UC_ROOT . '/parts/widgets/sidebar/sidebar-detail-category.php' ?>
				</div>


		</div><!-- /.sidemenu-holder -->
		<!-- ============================================== SIDEBAR : END ============================================== -->

		<!-- ============================================== CONTENT ============================================== -->
		<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
			<?php require UC_ROOT.'/parts/section/home-page-slider1.php' ?>	

			<?php require UC_ROOT.'/parts/section/info-boxes.php' ?>

			<?php require UC_ROOT. '/parts/product/product-slider.php'; ?>

			<?php require UC_ROOT . '/parts/section/recommended.php'; ?>

			<?php require UC_ROOT. '/parts/section/wide-banners.php'; ?>


		</div><!-- /.homebanner-holder -->
		<!-- ============================================== CONTENT : END ============================================== -->
	</div><!-- /.row -->
	<?php require UC_ROOT. '/parts/section/brands-carousel.php'; ?>

	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->



