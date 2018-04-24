<?php
	include UC_ROOT . '/db.php';
	include_once UC_ROOT . '/db_functions.php';
	$categories = get_all_categories();
	?>
<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
	<div class="nav-outer">
		<ul class="nav navbar-nav">
			<li class="dropdown yamm-fw">
				<a href="index.php?page=home"  >Home</a>
			</li>


			<li class="dropdown yamm-fw">
				<a href="index.php?page=home" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Categories</a>
				<ul class="dropdown-menu">
					<li>
						<div class="yamm-content">
							<div class="row">
								<div class="col-md-8 col-sm-8">
									<div class="row">
										<div class='col-md-12'>
											<?php foreach ($categories as $category) {
											?>
											<div style='float: left; width: 150px;'  class="col-xs-12 col-sm-6 col-md-3">
												<a href="index.php?page=category&category=<?php echo $category['cname']; ?>" ><h2 style="cursor: pointer;" class="title"><?php echo $category['cname'] ?></h2></a>
												<ul class="links">
													<?php
													echo    "</ul>
                   						</div>";
													}
													foreach ($categories as $category) {
														if ($_GET['category'] == $category['cname']) {
															$_SESSION['selectedCategory'] = $category['id'];
															header("location: index.php?page=category&category=".$_SESSION['selectedCategory']);
														}
													}
													?>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
									</div>
								</div><!-- /.row -->
					</li>
				</ul>
			</li>
			<li class="dropdown yamm" >
				<a href="index.php?page=home" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Brands</a>
				<ul class="dropdown-menu" style="width: 1100px;">
					<li >
						<?php require UC_ROOT . '/parts/navigation/megamenu-fullwidth.php';?>
					</li>
				</ul>
			</li>
			<li class="dropdown yamm-fw">
				<a href="index.php?page=home" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Products</a>
				<ul class="dropdown-menu">
					<li>
						<?php require UC_ROOT . '/parts/navigation/megamenu.php';?>
					</li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="index.php?page=contact">Contact</a>
			</li>
			<li class="dropdown">
				<a href="index.php?page=faq">FAQs</a>
			</li>
			<?php
			if(isset($_SESSION['email'])== false) {
				?>
				<li class="dropdown">
					<a href="index.php?page=sign-in">Sign-In</a>
				</li>
				<?php
			}
			?>
		</ul><!-- /.navbar-nav -->
		<div class="clearfix"></div>				
	</div><!-- /.nav-outer -->
</div><!-- /.navbar-collapse -->


