<?php include UC_ROOT . '/db.php';
include_once UC_ROOT . '/db_functions.php';
$categories = get_all_categories();
//var_dump($categories);
if($_SESSION['isAdmin']=='Y') {
?>

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>ADMIN: Manage Categories</li>
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
                                            echo $_SESSION['message'];
                                            ?>


                                        </div>
                                        <!-- already-registered-login -->

                                    </div>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- checkout-step-01  -->
                        <!-- step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <!-- panel-heading -->
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                        <span>ADD</span>Add a new category
                                    </a>
                                </h4>
                            </div>
                            <!-- panel-heading -->

                            <div id="collapseOne" class="panel-collapse collapse">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">



                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">

                                            <h4 class="checkout-subtitle">Create a new category for products.</h4>
                                            <p class="text title-tag-line">Reminder: Category name must be unique!</p>
                                            <form class="register-form" role="form" name="insertCategory" method="post">
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Category Name </label>
                                                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name='categoryName' placeholder="Enter new category name here...">
                                                </div>

                                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="add_a_category" >CREATE</button>
                                                <?php
                                                if (isset($_POST['add_a_category'])){
                                                    if (isset($_POST['categoryName']) && strlen(trim($_POST['categoryName'])) != 0) {
                                                        $message = add_Category($_POST['categoryName']);
                                                        $_SESSION['message'] = $message;

                                                    }else {
                                                        $_SESSION['message'] = "You have not entered a valid category name, please try again.";
                                                    }
                                                    header("location: index.php?page=admin/manage-categories");
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
                                        <span>Rem</span>Remove an existing category
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="col-md-6 col-sm-6 guest-login">
                                        <h4 class="checkout-subtitle">Select category below for removal.</h4>
                                        <p class="text title-tag-line">Reminder: All of the products are assigned into a category, by removing a category, certain products will need to be assigned to a new category.</p>
                                        <!-- radio-form  -->
                                        <form class="register-form" role="form" method="post" >
                                            <div id="categories-list-radio" class="radio radio-checkout-unicase">
                                                <?php
                                                foreach ($categories as $category) { ?>
                                                    <input id="<?php echo $category ['id'];?>" type="radio" name="categoryRadio" value="<?php echo $category ['id'];?>"  <?php if (isset($_POST['categoryRadio']) && $_POST['categoryRadio'] ==  $category['id']){ ?>checked='checked'<?php } ?>>
                                                    <label id="categories-sidebar" class="radio-button guest-check" for="<?php echo $category ['id'];?>"><?php echo $category ['cname']; ?></label>
                                                    <br>
                                                <?php } ?>

                                            </div>
                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue" name="remove_category">Remove</button>
                                            <?php
                                            if (isset($_POST['remove_category'])){
                                                if (isset($_POST["categoryRadio"])) {
                                                    $message =  remove_category($_POST["categoryRadio"]);
                                                } else {
                                                    $message = "You have not selected a category, please try again.";
                                                }
                                                $_SESSION['message'] = $message;
                                                header("location: index.php?page=admin/manage-categories");
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
                                        <span>UPD</span>Update the name of a category.
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="col-md-6 col-sm-6 guest-login">
                                        <h4 class="checkout-subtitle">Select category below for name change.</h4>

                                        <!-- radio-form  -->
                                        <form class="register-form" role="form" method="post">
                                            <div class="radio radio-checkout-unicase">
                                                <?php
                                                foreach ($categories as $category) { ?>
                                                    <input id="<?php echo $category ['id'];?>" type="radio" name="categoryRadio3" value="<?php echo $category ['id'];?>"  <?php if (isset($_POST['categoryRadio3']) && $_POST['categoryRadio3'] ==  $category['id']){ ?>checked='checked'<?php } ?>>
                                                    <label id="categories-sidebar" class="radio-button guest-check" for="<?php echo $category ['id'];?>"><?php echo $category ['cname']; ?></label>
                                                    <br>
                                                <?php } ?>
                                            </div>
                                            <p class="text title-tag-line">Enter the new name below, for the selected category.</p>
                                            <label class="info-title" for="exampleInputEmail1">Category Name </label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter new category name here..." name="new_category_name">
                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue" name="update_category_name">UPDATE</button>
                                            <?php

                                            if (isset($_POST['update_category_name'])){

                                                if (isset($_POST["categoryRadio3"]) && isset($_POST["new_category_name"])) {
                                                    $message = update_category_name($_POST["new_category_name"],$_POST["categoryRadio3"]);
                                                    
                                                } else {
                                                    $message = "Please select BOTH a category, and insert new name.";
                                                }
                                                $_SESSION['message'] = $message;
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
                    <?php require UC_ROOT . '/pages/admin/manage-categories-sidebar.php' ?>
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <?php require UC_ROOT. '/parts/section/brands-carousel.php'; ?>
    </div><!-- /.container -->
</div><!-- /.body-content -->
<?php }else
    header("location: index.php?page=404");?>