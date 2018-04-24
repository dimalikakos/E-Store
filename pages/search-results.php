<?php include_once UC_ROOT.'/db_functions.php';
include UC_ROOT.'/db.php';
$categories = get_all_categories();
$page_title = "Search Results";
$page="search-results.php";
$_SESSION["search_data"] = $_GET ['search'];
?>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="index.php?page=home">Home</a></li>
                <li class='active'>Search Results</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
    <div class="container">
        <div class="my-wishlist-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="4">Search Results For : <span style="color: red;"> <?php echo $_SESSION["search_data"] ?></span></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $found = 0;
                            $products =search($_SESSION["search_data"]);
                            foreach ($products as $product) {
                                $found=1;
                                $average = round(floatval(get_average_rating($product["id"])));
                                ?>
                                <tr >
                                    <td  style="border-top: 1px solid #ddd;" class="col-md-2"><img src="assets/images/product_images/<?php echo $product["id"] ?>/195x243.jpg" alt="<?php echo $product["pname"] ?>"></td>
                                    <td style="border-top: 1px solid #ddd;" class="col-md-6">
                                        <div class="product-name"><a href='index.php?page=detail&clickedProduct=true&clickedProd=<?php echo $product['id']?>' ><?php echo $product["pname"]; ?></a></div>
                                        <div data-rateit-value="<?php echo $average ?>" class="rating rateit-small"></div>
                                        <div class="price">
                                            &euro;<?php echo $product["price"] ?>
                                        </div>
                                    </td>
                                    <td style="border-top: 1px solid #ddd;" class="col-md-2">
                                        <a href='index.php?page=detail&clickedProduct=true&clickedProd=<?php echo $product['id']?>' class="btn-upper btn btn-primary">View Details</a>
                                    </td>
                                </tr>
                                <?php
                                if ($_GET['clickedProduct']== true ){
                                    $_SESSION['selectedProduct']= $_GET['clickedProd'];
                                    header("location: index.php?page=detail&clickedProd=".$_SESSION['selectedProduct']);
                                }

                            }
                            if ($found == 0){
                                echo '<tr><td class="col-md-2"><h1 id="middleheader">Sorry, but no results were found. Please try searching again. :-)</h1></td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <?php require UC_ROOT. '/parts/section/brands-carousel.php'; ?>
    </div><!-- /.container -->
</div><!-- /.body-content -->