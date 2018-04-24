<?php
session_start();
if(isset($_SESSION['email'])) {

	?>
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="#">Home</a></li>
					<li class='active'>Shopping Cart</li>
				</ul>
			</div>
			<!-- /.breadcrumb-inner -->
		</div>
		<!-- /.container -->
	</div><!-- /.breadcrumb -->

	<div class="body-content outer-top-xs">
		<div class="container">
			<div class="row inner-bottom-sm">
				<div class="shopping-cart">
					<?php
					if ($_SESSION['clickedADD'] == true) {
						echo add_to_cart($_GET['addToCart'], $_SESSION['currentUserID']);
						$_SESSION['clickedADD'] = false;
					}
					$shopping_cart = get_shopping_cart($_SESSION['currentUserID']);
					if (isset($_SESSION['cartMessage'])) {
						echo $_SESSION['cartMessage'];
						$_SESSION['cartMessage'] = "";
					}
					?>

					<div class="col-md-12 col-sm-12 shopping-cart-table ">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
								<tr>
									<th class="cart-romove item">Remove</th>
									<th class="cart-description item">Image</th>
									<th class="cart-product-name item">Product Name</th>
									<th class="cart-qty item">Quantity</th>
									<th class="cart-total last-item">Price</th>
								</tr>
								</thead>
								<!-- /thead -->
								<tfoot>
								<tr>
									<td colspan="7">
										<div class="shopping-cart-btn">
							<span class="">
								<!--<a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>-->
								<a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Check Out
									cart</a>
							</span>
										</div>
										<!-- /.shopping-cart-btn -->
									</td>
								</tr>
								</tfoot>
								<tbody>

								<?php
								foreach($shopping_cart as $item){
									$product_id = intval($item['prodID']);
									$product_array = get_product_by_ID($product_id);
									$average = round(floatval(get_average_rating($product_id)));
									foreach ($product_array as $productitem){
										?>
										<tr>
											<td class="romove-item"><a href="index.php?page=shopping-cart&clickToRemove=true&removeItem=<?php echo $productitem['id']?>" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
											<?php
											if ($_GET['clickToRemove']){
												$_SESSION['cartMessage'] = remove_from_cart($_GET['removeItem'],$_SESSION['currentUserID']);
												header("location: index.php?page=shopping-cart");
											}
											?>
											<td class="cart-image">
												<a class="entry-thumbnail" href='index.php?clickedProduct=true&clickedProd=<?php echo $productitem['id'] ?>'>
													<img style="width: 78px; height: auto; " src="assets/images/product_images/<?php echo $productitem['id']?>/small.jpg" alt="<?php echo $productitem['pname'] ?> ">
												</a>
											</td>
											<td class="cart-product-name-info">
												<h4 class='cart-product-description'><a  href='index.php?clickedProduct=true&clickedProd=<?php echo $productitem['id'] ?>'><?php echo $productitem['pname'] ?> </a></h4>

												<div class="row">
													<div class="col-sm-4">
														<div class="rating rateit-small" data-rateit-value="<?php echo $average ?>"></div>
													</div>

												</div>
												<!-- /.row -->
												<div class="cart-product-info">
													<span class="product-imel">product ID<span><?php echo $productitem['id'] ?></span></span><br>
												</div>
											</td>
											<td class="cart-product-quantity">
												<div class="cart-quantity">
													<div class="quant-input">

														<input type="text" value="<?php echo $item['quantity'] ?>">
													</div>
												</div>
											</td>
											</td>
											<td class="cart-product-grand-total"><span
													class="cart-grand-total-price">&euro;<?php echo $productitem['price'] ?></span></td>
										</tr>
										<?php
									}
								}
								?>
								</tbody>
								<!-- /tbody -->
							</table>
							<!-- /table -->
						</div>
					</div>
					<!-- /.shopping-cart-table -->
					<?php /*require UC_ROOT . '/parts/section/estimate-ship-tax.php' */?>
				</div>
				<!-- /.shopping-cart -->
			</div>
			<!-- /.row -->
			<?php require UC_ROOT . '/parts/section/brands-carousel.php'; ?>
		</div>
		<!-- /.container -->
	</div><!-- /.body-content -->
	<?php
}else {
  header ("location: index.php?page=carterror");
}
?>