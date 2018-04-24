	<!-- ========================================== SECTION – HERO ========================================= -->

	<div id="category" class="category-carousel hidden-xs">
		<div class="item">	
			<div class="image">
				<img src="assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive">
			</div>
			<div class="container-fluid">
				<div class="caption vertical-top text-left">
					<div class="big-text" style="font-size: 70px; color: yellow;">
							<?php
								if ($_GET['brandsMode']){
									echo $_GET['category'];
								}else {
									$categoryName = get_category_name($_GET['category']);
									foreach ($categoryName as $cname){
										echo $cname['cname'];
									}
								}
							?>
					</div>


					
				</div><!-- /.caption -->
			</div><!-- /.container-fluid -->
		</div>
</div>

		

			
<!-- ========================================= SECTION – HERO : END ========================================= -->