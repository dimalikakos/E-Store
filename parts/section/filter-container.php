<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';

?>
<div class="clearfix filters-container m-t-10">
	<div class="row">
		<div class="col col-sm-6 col-md-2">
			<div class="filter-tabs">
				<ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
					<li class="active">
						<a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-list"></i>Grid</a>
					</li>
					<li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th"></i>List</a></li>
				</ul>
			</div><!-- /.filter-tabs -->
		</div><!-- /.col -->
		<?php
			if ($_SESSION['hideSort']!=true){
		?>
			<div class="col col-sm-12 col-md-6">
				<div class="col col-sm-3 col-md-6 no-padding">
					<div class="lbl-cnt">
						<span class="lbl">Sort by</span>
						<div class="fld inline">
							<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
								<button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
									Select <span class="caret"></span>
								</button>

								<ul role="menu" class="dropdown-menu">
									<li role="presentation"><a href="#">Select</a></li>
									<li role="presentation"><a href="index.php?page=category&category=<?php echo $_SESSION['selectedCategory']; ?>&clickedPriceASC=true">Price: Lowest first
											<?php
											if ($_GET['clickedPriceASC']){
												$_SESSION['priceASC']=true;
												header("location: index.php?page=category&category=".$_SESSION['selectedCategory']);
											}
											?>
										</a></li>
									<li role="presentation"><a href="index.php?page=category&category=<?php echo $_SESSION['selectedCategory']; ?>&clickedPriceDESC=true">Price: Highest first
											<?php
											if ($_GET['clickedPriceDESC']){
												$_SESSION['priceDESC']=true;
												header("location: index.php?page=category&category=".$_SESSION['selectedCategory']);
											}
											?>
										</a></li>

									<li role="presentation"><a href="index.php?page=category&category=<?php echo $_SESSION['selectedCategory']; ?>&clickedLatest=true">Latest Products
											<?php
											if ($_GET['clickedLatest']){
												$_SESSION['latest']=true;
												header("location: index.php?page=category&category=".$_SESSION['selectedCategory']);
											}
											?>
											</a>
									</li>
								</ul>
							</div>
						</div><!-- /.fld -->
					</div><!-- /.lbl-cnt -->
				</div><!-- /.col -->
			</div><!-- /.col -->
		<?php }else {
				echo "No 'sort by' when browsing brands. Sorry.:-(";
			}?>
		<div class="col col-sm-6 col-md-4 text-right">
			<?php require UC_ROOT.'/parts/section/pagination.php' ?>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>