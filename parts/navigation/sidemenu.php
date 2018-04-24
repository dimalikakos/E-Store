<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';
$categories = get_all_categories();
?>
<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            <?php foreach ($categories as $category) {
                //below is a loop that selects appropriate icon.
                if ($category['cname']== "phones") {
                    $icon = "fa-mobile";
                }else if($category['cname']== "consoles") {
                    $icon = "fa-gamepad";
                }else if($category['cname']== "tablets") {
                    $icon = "fa-tablet";
                }else if($category['cname']== "laptops") {
                    $icon = "fa-laptop";
                } else {
                    $icon = "fa-desktop";
                }
                echo "<li class='dropdown menu-item'>";
                ?>
               <a href='#' class='dropdown-toggle' data-toggle='dropdown' style='text-transform: capitalize;'><i class='icon fa <?php echo $icon ?> fa-fw'></i> <?php echo $category['cname'] ?> </a>
            <?php
                $productsArray = get_products_by_category($category['id']);
                display_horizontal_menu($productsArray);
                echo "</li>";
            }

            ?>
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->