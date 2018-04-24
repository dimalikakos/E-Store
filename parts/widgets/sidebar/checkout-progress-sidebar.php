<!-- checkout-progress-sidebar -->
<?php include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';
$categories = get_all_categories();
//var_dump($categories);

?>
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Current Catogories</h4>
		    </div>
		    <div class="panel-body">
				<ul class="nav nav-checkout-progress list-unstyled">
					<?php foreach ($categories as $category) { ?>
						<li ><a id="categories-sidebar" href="../products.php?category=<?php echo $category ['id']; ?>">
								<?php echo $category ['cname']; ?></a></li>
					<?php } ?>
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->