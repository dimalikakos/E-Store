<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';
?>
<!-- ============================================== HEADER ============================================== -->
<header class="<?php echo $headerClass;?>">

	<?php require UC_ROOT.'/parts/navigation/top-bar.php';?>

	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
					<div class="logo">
						<a href="index.php?page=home">

							<img src="assets/images/logo.png" alt="">

						</a>
					</div><!-- /.logo -->
					<!-- ============================================================= LOGO : END ============================================================= -->
				</div><!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
					<div class="contact-row">
						<div class="phone inline">
							<i class="icon fa fa-phone"></i> (210) 600 9800
						</div>
						<div class="contact inline">
							<i class="icon fa fa-envelope"></i> d.alikakos@acg.edu
						</div>
					</div><!-- /.contact-row -->
					<!-- ============================================================= SEARCH AREA ============================================================= -->
					<div class="search-area">
						<form method="GET" action="index.php?page=search-results" >
							<div class="control-group">



								<input class="search-field" placeholder="Search here... " id="search" name="search" type="text" />
								<button class="search-button" type="submit" id="searchbttn" name="sbttn" ></button>
								<?php
								if(isset($_GET['sbttn'])){
									$_SESSION["search_data"] = $_GET ['search'];
									header("location: index.php?page=search-results&search=".$_SESSION["search_data"]);
								}

								;?>

							</div>
						</form>
					</div><!-- /.search-area -->
					<!-- ============================================================= SEARCH AREA : END ============================================================= -->
				</div><!-- /.top-search-holder -->

				<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
					<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
				<?php
				if(isset($_SESSION['email'])) {
					$shopping_cart = get_shopping_cart($_SESSION['currentUserID']);
					$cartCounter = 0;
						foreach($shopping_cart as $item) {
							$cartCounter = $cartCounter + 1;
						}
					?>
					<div class="dropdown dropdown-cart">
						<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
							<div class="items-cart-inner">
								<div class="total-price-basket">
									<span class="lbl">cart -</span>
					<span class="total-price">
						<!--<span class="sign">$</span>-->
						<span class="value">View</span>
					</span>
								</div>
								<div class="basket">
									<i class="glyphicon glyphicon-shopping-cart"></i>
								</div>
								<div class="basket-item-count"><span class="count"><?php echo $cartCounter ?></span></div>

							</div>
						</a>
						<ul class="dropdown-menu">
							<li>

								<?php
								foreach($shopping_cart as $item) {
									$product_id = intval($item['prodID']);
									$product_array = get_product_by_ID($product_id);
									$average = round(floatval(get_average_rating($product_id)));
									foreach ($product_array as $productitem) {
										?>


										<div class="cart-item product-summary">
											<div class="row">
												<div class="col-xs-4">
													<div class="image">
														<a href="index.php?page=detail"><img
																style="width: 38px; height: auto; "
																src="assets/images/product_images/<?php echo $productitem['id']?>/smaller.jpg"
																alt=""></a>
													</div>
												</div>
												<div class="col-xs-7">

													<h3 class="name"><a  href='index.php?clickedProduct=true&clickedProd=<?php echo $productitem['id'] ?>' ><?php echo $productitem['pname'] ?></a>
													</h3>

													<div class="price">&euro;<?php echo $productitem['price'] ?></div>
												</div>
												<div class="col-xs-1 action">
													<a href="index.php?page=shopping-cart&clickToRemove=true&removeItem=<?php echo $productitem['id']?>"><i class="fa fa-trash"></i></a>
													<?php
													if ($_GET['clickToRemove']){
														$_SESSION['cartMessage'] = remove_from_cart($_GET['removeItem'],$_SESSION['currentUserID']);
														header("location: index.php?page=shopping-cart");
													}
													?>
												</div>
											</div>
										</div>

										<?php
									}
								}
								?>



								<div class="clearfix"></div>
								<hr>

								<div class="clearfix cart-total">
									<!--<div class="pull-right">

										<span class="text">Sub Total :</span><span class='price'>$600.00</span>

									</div>
									<div class="clearfix"></div>-->

									<a href="index.php?page=shopping-cart"
									   class="btn btn-upper btn-primary btn-block m-t-20">View Cart</a>
								</div>
								<!--//.cart-total-->


							</li>
						</ul>
						<!-- /.dropdown-menu-->
					</div><!-- /.dropdown-cart -->
					<?php
						}
					?>

					<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div><!-- /.main-header -->

	<?php require UC_ROOT.'/parts/navigation/navbar.php';?>

</header>

<!-- ============================================== HEADER : END ============================================== -->