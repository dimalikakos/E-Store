<!-- checkout-progress-sidebar -->
<?php include UC_ROOT . '/db.php';
include_once UC_ROOT . '/db_functions.php';
$users = get_all_users();
if($_SESSION['isAdmin']=='Y') {
    ?>
    <div class="checkout-progress-sidebar ">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="unicase-checkout-title">Users (Red means ADMIN)</h4>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-checkout-progress list-unstyled">
                        <?php foreach ($users as $user) { ?>
                            <li ><a id="categories-sidebar" href="#">
                                    <span
                                        <?php
                                        if ($user['isAdmin']== 'Y'){
                                            echo " style='color: red;'";
                                        }
                                        ?>


                                        ><?php echo $user['email']."(".$user['id'].")"; ?></span></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-progress-sidebar -->
<?php }else
    header("location: index.php?page=404");?>