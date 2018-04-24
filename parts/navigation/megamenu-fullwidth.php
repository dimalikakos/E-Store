<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';
$brands_array = get_all_brands();
?>
<div class="yamm-content" style="width: 1100px;">
    <div class="row">
        <div class='col-sm-12'>
           <?php
           foreach ($brands_array as $brand) {
               echo "<div style='float: left; width: 150px; min-height: 100px;' class='col-xs-12 col-sm-12 col-md-4'>";
               echo "<h2 class='title'>".$brand['brand']."</h2>";
               echo "<ul class='links'>";
               $products_by_brand = get_products_by_brand ($brand['brand']);
               foreach ($products_by_brand as $product){
                   echo " <li><a href='index.php?page=detail&clickedProduct=true&clickedProd=".$product['id']."'>".$product['pname']."</a></li>";
               }
               echo " </ul>
            </div> ";
           }
        if ($_GET['clickedProduct']== true ){
            $_SESSION['selectedProduct']= $_GET['clickedProd'];
            header("location: index.php?page=detail&clickedProd=".$_SESSION['selectedProduct']);
        }
           ?>


        </div>
    </div><!-- /.row -->
</div><!-- /.yamm-content -->