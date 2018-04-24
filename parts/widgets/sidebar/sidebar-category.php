<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';
$brands_array = get_all_brands();
?>
<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
<div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
	<div class="widget-header m-t-20">
		<h4 class="widget-title">Brands</h4>
	</div>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">
			<?php foreach ($brands_array as $brand) {
				?>

				<div class="accordion-group">
					<div class="accordion-heading">
						<a href="#collapse<?php echo $brand['brand'] ?>" data-toggle="collapse" class="accordion-toggle collapsed">
							<?php echo $brand['brand'] ?>
						</a>
					</div><!-- /.accordion-heading -->
					<div class="accordion-body collapse" id="collapse<?php echo $brand['brand'] ?>" style="height: 0px;">
						<div class="accordion-inner">
							<ul>
								<?php
								$products_by_brand = get_products_by_brand ($brand['brand']);
								foreach ($products_by_brand as $product){
									echo " <li><a href='index.php?clickedProduct=true&clickedProd=".$product['id']."'>".$product['pname']."</a></li>";
								}?>
							</ul>
						</div><!-- /.accordion-inner -->
					</div><!-- /.accordion-body -->
				</div><!-- /.accordion-group -->
			<?php } ?>

	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->
