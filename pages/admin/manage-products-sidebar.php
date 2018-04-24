<!-- checkout-progress-sidebar -->
<?php include UC_ROOT . '/db.php';
include_once UC_ROOT . '/db_functions.php';
$products = get_ten_latest_products();
//var_dump($categories);
if($_SESSION['isAdmin']=='Y') {
    ?>
    <div class="checkout-progress-sidebar ">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="unicase-checkout-title"> Latest Products With ID</h4>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-checkout-progress list-unstyled">
                        <?php foreach ($products as $product) { ?>
                            <li ><a id="categories-sidebar" href='index.php?page=detail&clickedProduct=true&clickedProd=<?php echo $product['id']?>'>
                                    <?php echo $product['pname']."(".$product['id'].")"; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-progress-sidebar -->
<?php }else
    header("location: index.php?page=404");?>