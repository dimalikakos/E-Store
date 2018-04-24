<?php include UC_ROOT . '/db.php';
include_once UC_ROOT . '/db_functions.php';
$categories = get_all_categories();
/*$users = get_type_of_users('Y');
$users = get_type_of_users('N');*/

if($_SESSION['isAdmin']=='Y') {
    ?>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>ADMIN: Manage Users</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-bd">
        <div class="container">

            <div class="checkout-box inner-bottom-sm">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseFour">
                                            <span>INF</span>INFORMATION
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div id="collapseFour" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">



                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <?php
                                                if (isset($_SESSION['message'])){
                                                    echo "<span style='color: red; font-size: 20px;'>".$_SESSION['message']."</span>";
                                                    unset($_SESSION['message']);
                                                }
                                                ?>


                                            </div>
                                            <!-- already-registered-login -->

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            <span>REM</span>Remove A User
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">


                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">

                                                <h4 class="checkout-subtitle" >Remove a specific user</h4>
                                                <p class="text title-tag-line">Enter the user ID below to remove him.</p>
                                                <form class="register-form" role="form"  method="post">
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">User ID</label>
                                                        <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter user ID here..." name="userID">
                                                    </div>


                                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue" name="remove_user">CREATE</button>
                                                    <?php


                                                    if (isset($_POST['remove_user'])){

                                                        if (isset($_POST['userID']) && $_POST['userID'] != 1 && $_POST['userID'] != 2 && $_POST['userID'] != 3 ){
                                                            $message = remove_user($_POST['userID']);
                                                        } else {
                                                            $message = "No user ID found or inappropriate ID used . Please enter a valid user ID.";
                                                        }
                                                        $_SESSION['message']=$message;

                                                        header("location: index.php?page=admin/manage-users");

                                                    }
                                                    ?>
                                                </form>
                                            </div>
                                            <!-- already-registered-login -->

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                            <!-- checkout-step-02  -->
                            <div class="panel panel-default checkout-step-02">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
                                            <span>ADM</span>Make User Administrator
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <div class="col-md-6 col-sm-6 guest-login">
                                            <h4 class="checkout-subtitle">Make non-admin into admin.</h4>
                                            <p class="text title-tag-line">Below are all the users that do not have administrator privileges.</p>
                                            <!-- radio-form  -->
                                            <form class="register-form" role="form" method="post" >
                                                <div id="categories-list-radio" class="radio radio-checkout-unicase">
                                                    <?php
                                                    $users = get_type_of_users('N');
                                                    foreach ($users as $user) { ?>
                                                        <input id="<?php echo $user['id'];?>" type="radio" name="userRadio" value="<?php echo $user['id'];?>"  <?php if (isset($_POST['userRadio']) && $_POST['userRadio'] ==  $user['id']){ ?>checked='checked'<?php } ?>>
                                                        <label id="categories-sidebar" class="radio-button guest-check" for="<?php echo $user['id'];?>"><?php echo $user ['email']; ?></label>
                                                        <br>
                                                    <?php } ?>

                                                </div>
                                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue" name="make_user_admin">PROMOTE</button>
                                                <?php
                                                if (isset($_POST['make_user_admin'])){
                                                    if (isset($_POST["userRadio"])) {
                                                        $message = update_user_status('Y',$_POST["userRadio"]);
                                                    } else {
                                                        $message = "Please select user from the list.";
                                                    }
                                                    $_SESSION['message'] = $message;
                                                    header("location: index.php?page=admin/manage-users");
                                                }
                                                ?>
                                            </form>
                                            <!-- radio-form  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-02  -->
                            <!-- checkout-step-03  -->
                            <div class="panel panel-default checkout-step-03">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
                                            <span>ADM</span>Demote user from admin.
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="col-md-6 col-sm-6 guest-login">
                                            <h4 class="checkout-subtitle">Select admin to demote below</h4>

                                            <!-- radio-form  -->
                                            <form class="register-form" role="form" method="post" >
                                                <div id="categories-list-radio" class="radio radio-checkout-unicase">
                                                    <?php
                                                    $users = get_type_of_users('Y');
                                                    foreach ($users as $user) { ?>
                                                        <input id="<?php echo $user['id'];?>" type="radio" name="userRadio2" value="<?php echo $user['id'];?>"  <?php if (isset($_POST['userRadio2']) && $_POST['userRadio2'] ==  $user['id']){ ?>checked='checked'<?php } ?>>
                                                        <label id="categories-sidebar" class="radio-button guest-check" for="<?php echo $user['id'];?>"><?php echo $user ['email']; ?></label>
                                                        <br>
                                                    <?php } ?>

                                                </div>
                                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue" name="demote_user">DEMOTE</button>
                                                <?php
                                                if (isset($_POST['demote_user'])){
                                                    if (isset($_POST["userRadio2"]) && $_POST["userRadio2"] != 1  ) {
                                                        $message = update_user_status('N',$_POST["userRadio2"]);

                                                    } else {
                                                        $message = "Please select user from the list, or one that is not protected (Admin@Admin.com is protected)";
                                                    }
                                                    $_SESSION['message'] = $message;
                                                    header("location: index.php?page=admin/manage-users");
                                                }
                                                ?>
                                            </form>
                                            <!-- radio-form  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-03  -->

                            
                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <?php require UC_ROOT . '/pages/admin/manage-users-sidebar.php' ?>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <?php require UC_ROOT. '/parts/section/brands-carousel.php'; ?>
        </div><!-- /.container -->
    </div><!-- /.body-content -->
<?php }else
    header("location: index.php?page=404");?>