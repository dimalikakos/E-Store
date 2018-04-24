<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';
$categories = get_all_categories();
?>
<div class="yamm-content">
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="row">
                <div class='col-md-12'>
                    <?php foreach ($categories as $category) {
                    ?>
                    <div style='float: left; width: 150px;'  class="col-xs-12 col-sm-6 col-md-3">
                        <h2 class="title"><?php echo $category['cname'] ?></h2>
                        <ul class="links">
                            <?php
                            $productsArray = get_products_by_category($category['id']);
                            if ($productsArray != null) {
                                foreach ($productsArray as $product) {
                                    echo "<li><a href='index.php?page=detail&clickedProduct=true&clickedProd=".$product['id']."'>" . $product['pname'] . "</a></li>";
                                }
                            } else {
                            echo "<li><a href='#'> Coming Soon! </a></li>";
                            }
                       echo "</ul>
                    </div>";
                    }
                            if ($_GET['clickedProduct']== true ){
                                $_SESSION['selectedProduct']= $_GET['clickedProd'];
                                header("location: index.php?page=detail&clickedProd=".$_SESSION['selectedProduct']);
                            }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
        </div>
    </div><!-- /.row -->
   
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners megamenu-banner">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-6 col-md-6">
                            <div class="wide-banner cnt-strip">
                                <div class="image">
                                    <img class="img-responsive" data-echo="assets/images/banners/4.jpg" src="assets/images/blank.gif" alt="">
                                </div>  
                                <div class="strip">
                                    <div class="strip-inner text-right">
                                        <h3 class="white">Check Out</h3>
                                        <h2 class="white">Lenovo Yoga</h2>
                                    </div>  
                                </div>
                            </div><!-- /.wide-banner -->
                        </div><!-- /.col -->

                        <div class="col-sm-6 col-md-6">
                            <div class="wide-banner cnt-strip">
                                <div class="image">
                                    <img class="img-responsive" data-echo="assets/images/banners/5.jpg" src="assets/images/blank.gif" alt="">
                                </div>  
                                <div class="strip">
                                    <div class="strip-inner text-left">
                                         <h3 class="orange">Overpriced</h3>
                                        <h2 class="orange">new arrivals</h2>
                                    </div>  
                                </div>
                            </div><!-- /.wide-banner -->
                        </div><!-- /.col -->
                    </div>

                    </div><!-- /.row -->
                </div>
                <div class="col-sm-12 col-md-4 hidden-xs hidden-sm">
                  <p class="text ">The Xenorius products are of Xenorius quality.</p>
                </div>
            </div>
        </div><!-- /.wide-banners -->

<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
 
</div><!-- /.yamm-content -->