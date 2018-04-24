<!-- checkout-progress-sidebar -->
<?php include UC_ROOT . '/db.php';
include_once UC_ROOT . '/db_functions.php';
$categories = get_all_categories();
//var_dump($categories);
if($_SESSION['isAdmin']=='Y') {
?>
<div class="checkout-progress-sidebar ">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="unicase-checkout-title">Current Categories</h4>
            </div>
            <div class="panel-body">
                <ul class="nav nav-checkout-progress list-unstyled">
                    <?php foreach ($categories as $category) { ?>
                        <li ><a id="categories-sidebar" href="index.php?page=category&category=<?php echo $category['cname']; ?>"  >
                                <?php echo $category ['cname']; ?></a></li>
                    <?php }
                    foreach ($categories as $category) {
                        if ($_GET['category'] == $category['cname']) {
                            $_SESSION['selectedCategory'] = $category['id'];
                            header("location: index.php?page=category&category=".$_SESSION['selectedCategory']);
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- checkout-progress-sidebar -->
<?php }else
    header("location: index.php?page=404");?>