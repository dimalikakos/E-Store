<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';
//include UC_ROOT.'/parts/product/product-item.php';
$productName = 'mrPotato';
$is_new = 'yes';
$productImageURL = 'http://dimitri.students.acg.edu/xenorious/assets/images/search-pictures/6s1.jpg';
$categories = get_all_categories();


?>
<div data-rateit-value="1" class="rating rateit-small"></div>
    </br>



<?php
/*

//displayProduct($productName,$is_new,$is_sale,$is_hot,$productImageURL,$actionType = 'all', $oldPrice = 800.00,$price = 650.99, $score = 4);
$productsByCat = get_products_by_category(4);
foreach ($productsByCat as $product) {
    echo $product["pname"].'</br>';
}
*/?>

<div class="body-content outer-top-bd">
    <div class="container">
        <div class="x-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12 x-text text-center">









                    <h1>TEST</h1>
                    <p>We are sorry, the page you've requested is not available. </p>
                    <form role="form" class="outer-top-vs outer-bottom-xs">
                        <input placeholder="Search" autocomplete="off">
                        <button class="  btn-default le-button">Go</button>
                    </form>
                    <a href="index.php?page=home"><i class="fa fa-home"></i> Go To Homepage</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->