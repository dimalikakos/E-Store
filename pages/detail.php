<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';

$_SESSION['selectedProduct']= $_GET['clickedProd'];
display_product_page($_SESSION['selectedProduct']);
function display_product_page($clickedProductID){


	include UC_ROOT.'/db.php';
	include_once UC_ROOT.'/db_functions.php';
	$selected_product = get_product_by_ID($clickedProductID);

	foreach($selected_product as $productArray){
		$product_name =  $productArray['pname'];
		$product_price =  $productArray['price'];
		$product_description =  $productArray['description'];
		$product_dateAdded =  $productArray['dateAdded'];
	}
	$average = round(floatval(get_average_rating($_SESSION['selectedProduct'])));
?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Products</a></li>
				<li class='active'><?php echo trim($product_name)?></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product outer-bottom-sm '>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
					<?php require UC_ROOT . '/parts/widgets/sidebar/sidebar-detail-category.php' ?>
					<?php /*require UC_ROOT.'/parts/widgets/sidebar/hot-deals.php' */?><!--
					--><?php /*require UC_ROOT.'/parts/widgets/sidebar/sidebar-advertisement.php' */?>


				</div>

			</div><!-- /.sidebar -->
			<div class='col-md-9'>
				<div class="row  wow fadeInUp">
					    <?php
						$_SESSION['selectedProduct']=$clickedProductID;
						require UC_ROOT.'/parts/section/product-gallery.php';?>
        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name"><?php echo $product_name?></h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div data-rateit-value="<?php echo $average ?>" class="rating rateit-small"></div>
									</div>
									<!--<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">(06 Reviews)</a>
										</div>
									</div>-->
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								<?php echo $product_description?>
								<?php echo "</br></br>Date Added: ".$product_dateAdded?>
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<span class="price">&euro;<?php echo $product_price?></span>
										</div>
									</div>

									<!--<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-retweet"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>-->

								</div><!-- /.row -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">
									
									<!--<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" value="1">
							              </div>
							            </div>
									</div>-->

									<a href="index.php?addToCart=<?php echo $_SESSION['selectedProduct'] ?>">
										<button class="btn btn-primary" type="submit" ><i class="fa fa-shopping-cart inner-right-vs"></i>Add to cart</button>
									</a>
									<?php
									if (isset($_GET['addToCart'])){
										$_SESSION['clickedADD'] = true;
										header("location: index.php?page=shopping-cart&addToCart=".$_GET['addToCart']);
									}
									?>
									
								</div>
							</div>
							<!-- /.quantity-container -->

							<div class="product-social-link m-t-20 text-right">
								<span class="social-label">Share :</span>
								<div class="social-icons">
						            <ul class="list-inline">
						                <li><a class="fa fa-facebook" href="#"></a></li>
						                <li><a class="fa fa-twitter" href="#"></a></li>
						                <li><a class="fa fa-linkedin" href="#"></a></li>
						                <li><a class="fa fa-rss" href="#"></a></li>
						                <li><a class="fa fa-pinterest" href="#"></a></li>
						            </ul><!-- /.social-icons -->
						        </div>
							</div>

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
				<?php
				echo "</br></a><h4 class='title' style='color: #0084B9;'><span style='color: red;'>" . $_SESSION['ratingsMessage'] . "</span> </h4></br>";
				unset($_SESSION['ratingsMessage']);
				?>
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">RATING</a></li>

							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"><?php echo $product_description?></p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
										<?php
										if(isset($_SESSION['email'])) {
											?>
											<div class="product-add-review">
												<h4 class="title">Please Rate The <?php echo $product_name ?></h4>

												<div class="review-table">
													<div class="table-responsive">
														<form role="form" class="cnt-form" method="post">
															<table class="table table-bordered">
																<thead>
																<tr>
																	<th class="cell-label">&nbsp;</th>
																	<th>1 star</th>
																	<th>2 stars</th>
																	<th>3 stars</th>
																	<th>4 stars</th>
																	<th>5 stars</th>
																</tr>
																</thead>
																<tbody>
																<tr>
																	<td class="cell-label"><?php echo $product_name ?></td>
																	<td><input type="radio" name="product_rating"
																			   class="radio" value="1"></td>
																	<td><input type="radio" name="product_rating"
																			   class="radio" value="2"></td>
																	<td><input type="radio" name="product_rating"
																			   class="radio" value="3"></td>
																	<td><input type="radio" name="product_rating"
																			   class="radio" value="4"></td>
																	<td><input type="radio" name="product_rating"
																			   class="radio" value="5"></td>
																</tr>
																</tbody>
															</table>
															<!-- /.table .table-bordered -->
															<div class="action text-right">
																<button class="btn btn-primary btn-upper"
																		name="submit_rating">SUBMIT RATING
																</button>
															</div>
															<!-- /.action -->
														</form>
													</div>
													<!-- /.table-responsive -->
												</div>
												<!-- /.review-table -->
												<?php
												$currentRating = (int)rating_exists($_SESSION['currentUserID'], $_SESSION['selectedProduct']);
												if ($currentRating == 0) {

													echo "<h4 class='title' style='color: #0084B9;'>You have not yet rated this product! Feel free to do so!:-)</h4>";
												} else {
													echo "<h4 class='title' style='color: #0084B9;'>Your current rating of this product is: <span style='color: red;'>" . $currentRating . "</span> stars! Feel free to change your rating anytime.</h4>";
												}
												if (isset($_POST['submit_rating'])) {
													if (isset($_POST["product_rating"])) {
														$message = rate_a_product($_SESSION['currentUserID'], $_SESSION['selectedProduct'], $_POST["product_rating"], $currentRating);
													} else {
														$message = "Please select a rating before pressing submit.";
													}
													$_SESSION['ratingsMessage'] = $message;
													echo "<script>alert(" . $message . ")</script>";
													header("location: index.php?page=detail&clickedProd=" . $_SESSION['selectedProduct']);
												}
												?>
											</div><!-- /.product-add-review -->
											<?php
										}else {
											echo "<h4 class='title'>To rate".$product_name." you must be logged in! Please login to rate!:)</h4>";
										}
											?>
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->



							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
		<?php require UC_ROOT. '/parts/section/brands-carousel.php'; ?>
	</div><!-- /.container -->
</div><!-- /.body-content -->
<?php }
?>