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
                <li class='active'>ADMIN: Manage Products</li>
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
                                        <span>ADD</span>Add a new product
                                    </a>
                                </h4>
                            </div>
                            <!-- panel-heading -->

                            <div id="collapseOne" class="panel-collapse collapse">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">

                                        <!-- guest-login -->

                                        <!-- guest-login -->

                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">

                                            <h4 class="checkout-subtitle" >Add a new product</h4>
                                            <p class="text title-tag-line">Enter the product information below</p>
                                            <form class="register-form" role="form"  method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Product Name (100 character limit)</label>
                                                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter new product name here..." name="newproductname">
                                                </div>
                                                <p>Select product category from below</p>
                                                <div id="categories-list-radio" class="radio radio-checkout-unicase">
                                                    <?php
                                                    foreach ($categories as $category) { ?>
                                                        <input id="<?php echo $category ['id'];?>" type="radio" name="categoryRadioProducts" value="<?php echo $category ['id'];?>"  <?php if (isset($_POST['categoryRadioProducts']) && $_POST['categoryRadioProducts'] ==  $category['id']){ ?>checked='checked'<?php } ?>>
                                                        <label id="categories-sidebar" class="radio-button guest-check" for="<?php echo $category ['id'];?>"><?php echo $category ['cname']; ?></label>
                                                        <br>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Product Price (20 decimal limit) </label>
                                                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter new product price here..." name="newproductprice">
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Brand (20 character limit)</label>
                                                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter new product brand here..." name="newproductbrand">
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Tags (200 character limit)</label>
                                                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter new product tags here..." name="newproducttags">
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputComments">Description (1000 character limit)</label>
                                                    <textarea class="form-control unicase-form-control" id="exampleInputComments" placeholder="Enter description here..." name="newproductdescription"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputComments">Please select product image.</label>
                                                    <input type="hidden" name="size" value="10000000">
                                                    <input type="file" name="imageToUpload" id="imageToUpload"> <br></e><em>Please select a JPG photo for the new product! Maximum size of File is 1MB. </em>
                                                </div>

                                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue" name="add_new_product">CREATE</button>

                                            </form>
                                            <?php

                                            if (isset($_POST['add_new_product'])){
                                                if (isset($_POST["categoryRadioProducts"]) && isset($_POST["newproductname"]) && isset($_POST["newproductprice"]) && isset($_POST["newproductdescription"]) && isset($_POST["newproducttags"]) && isset($_POST["newproductbrand"])
                                                    && strlen(trim($_POST['categoryRadioProducts'])) != 0 && strlen(trim($_POST['newproductname'])) != 0 && strlen(trim($_POST['newproductprice'])) != 0 && strlen(trim($_POST['newproductdescription'])) != 0 && strlen(trim($_POST['newproducttags'])) != 0 && strlen(trim($_POST['newproductbrand'])) != 0) {

                                                    $message =  add_product($_POST['newproductname'],$_POST["categoryRadioProducts"],$_POST['newproductprice'],$_POST['newproductdescription'],$_POST['newproducttags'],strtoupper($_POST['newproductbrand']));
                                                    $latest_ID = get_latest_product_ID ();
                                                    mkdir(UC_ROOT.'/assets/images/product_images/'.$latest_ID);
                                                    $target_dir = UC_ROOT.'/assets/images/product_images/'.$latest_ID.'/';
                                                    $target_file = $target_dir . $_FILES["imageToUpload"]["name"];
                                                    if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
                                                        rename($target_file, $target_dir."original.jpg");
                                                        copy($target_dir."original.jpg",$target_dir."195x243.jpg");
                                                        copy($target_dir."original.jpg",$target_dir."450x370.jpg");
                                                        copy($target_dir."original.jpg",$target_dir."small.jpg");
                                                        copy($target_dir."original.jpg",$target_dir."smaller.jpg");

                                                        $_SESSION['uploadImage'] = ", along with image upload.";
                                                    }else{
                                                        $_SESSION['uploadImage'] = ", but image upload had a problem.";
                                                    }
                                                } else {
                                                    $message = "Please input information in all fields or else product cannot be created.";
                                                }
                                                $_SESSION['message']=$message.$_SESSION['uploadImage'];
                                                unset($_SESSION['uploadImage']);
                                                header("location: index.php?page=admin/manage-products");
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

                        <!-- checkout-step-02  -->
                        <div class="panel panel-default checkout-step-02">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
                                        <span>Rem</span>Remove an existing product
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="col-md-6 col-sm-6 already-registered-login">

                                        <h4 class="checkout-subtitle" >Remove existing products below</h4>
                                        <p class="text title-tag-line">Please type the ID of the product that you would like to remove.</p>
                                        <form class="register-form" role="form" method="post">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Product ID </label>
                                                <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="productforremoval" placeholder="Enter product ID here...">
                                            </div>
                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="remove_a_product" >remove</button>

                                            <?php
                                                if (isset($_POST['remove_a_product'])){
                                                    if ($_POST["productforremoval"] > 12) {
                                                        $message = remove_product($_POST["productforremoval"]);
                                                        unlink(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"] . "/original.jpg");
                                                        unlink(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"] . "/450x370.jpg");
                                                        unlink(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"] . "/195x243.jpg");
                                                        unlink(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"] . "/small.jpg");
                                                        unlink(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"] . "/smaller.jpg");
                                                        rmdir(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"]);
                                                        if (isset($_SESSION['email'])){
                                                            remove_from_all_carts($_POST["productforremoval"]);
                                                        }
                                                    }else if ($_POST["productforremoval"] > 0) {
                                                        $message = "We are sorry, Products with ID's below 13 are protected and cannot be deleted, please select another product, or create one for deletion.";
                                                    }
                                                    $_SESSION['message']=$message;
                                                    header("location: index.php?page=admin/manage-products");
                                                }
                                            ?>
                                        </form>
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
                                        <span>UPD</span>Update the information of a product.
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <h4 class="checkout-subtitle" >Update product information</h4>
                                    <p class="text title-tag-line">Enter the product information below. Any information that is not given, will remain the same.</p>
                                    <form class="register-form" role="form"  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Enter product ID:</label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter product ID here..." name="updateproductID">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Change product name to: (100 character limit)</label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter new product name here..." name="updateproductname">
                                        </div>
                                        <p>Select category for the product from below</p>
                                        <div id="categories-list-radio" class="radio radio-checkout-unicase">
                                            <?php
                                            foreach ($categories as $category) { ?>
                                                <input id="<?php echo $category ['id'];?>" type="radio" name="updatecategoryRadioProducts" value="<?php echo $category ['id'];?>"  <?php if (isset($_POST['categoryRadioProducts']) && $_POST['categoryRadioProducts'] ==  $category['id']){ ?>checked='checked'<?php } ?>>
                                                <label id="categories-sidebar" class="radio-button guest-check" for="<?php echo $category ['id'];?>"><?php echo $category ['cname']; ?></label>
                                                <br>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Product Price (20 decimal limit) </label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter new product price here..." name="updateproductprice">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Brand (20 character limit)</label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter new product brand here..." name="updateproductbrand">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Tags (200 character limit)</label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter new product tags here..." name="updateproducttags">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputComments">Description (1000 character limit)</label>
                                            <textarea class="form-control unicase-form-control" id="exampleInputComments" placeholder="Enter description here..." name="updateproductdescription"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputComments">Please select product image.</label>
                                            <input type="hidden" name="size" value="10000000">
                                            <input type="file" name="imageToUpdate" id="imageToUpdate"> <br></e><em>Please select a JPG photo for the new product! Maximum size of File is 1MB. </em>
                                        </div>

                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue" name="update_a_product">UPDATE</button>
                                        <?php


                                        if (isset($_POST['update_a_product'])){
                                            $message = "The following changes have been made: </br>";
                                            if (isset($_POST['updateproductID'] ) && strlen(trim($_POST['updateproductID'])) != 0 && $_POST['updateproductID'] > 12){
                                                if (isset($_POST['updateproductname'])&& strlen(trim($_POST['updateproductname'])) != 0){

                                                    $message = $message.update_product_name($_POST['updateproductname'],$_POST['updateproductID'])."</br>";
                                                }
                                                if (isset($_POST['updatecategoryRadioProducts'])&& strlen(trim($_POST['updatecategoryRadioProducts'])) != 0){

                                                    $message = $message.update_product_category($_POST['updatecategoryRadioProducts'],$_POST['updateproductID'])."</br>";
                                                }
                                                if (isset($_POST['updateproductprice'])&& strlen(trim($_POST['updateproductprice'])) != 0){

                                                    $message = $message.update_product_price($_POST['updateproductprice'],$_POST['updateproductID'])."</br>";
                                                }
                                                if (isset($_POST['updateproductbrand'])&& strlen(trim($_POST['updateproductbrand'])) != 0){

                                                    $message = $message.update_product_brand($_POST['updateproductbrand'],$_POST['updateproductID'])."</br>";
                                                }
                                                if (isset($_POST['updateproducttags'])&& strlen(trim($_POST['updateproducttags'])) != 0){

                                                    $message = $message.update_product_tags($_POST['updateproducttags'],$_POST['updateproductID'])."</br>";
                                                }
                                                if (isset($_POST['updateproductdescription'])&& strlen(trim($_POST['updateproductdescription'])) != 0){

                                                    $message = $message.update_product_description($_POST['updateproductdescription'],$_POST['updateproductID'])."</br>";
                                                }

                                                unlink(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"] . "/original.jpg");
                                                unlink(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"] . "/450x370.jpg");
                                                unlink(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"] . "/195x243.jpg");
                                                unlink(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"] . "/small.jpg");
                                                unlink(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"] . "/smaller.jpg");
                                                rmdir(UC_ROOT . '/assets/images/product_images/' . $_POST["productforremoval"]);

                                                mkdir(UC_ROOT.'/assets/images/product_images/'.$_POST['updateproductID']);
                                                $target_dir = UC_ROOT.'/assets/images/product_images/'.$_POST['updateproductID'].'/';
                                                $target_file = $target_dir . $_FILES["imageToUpdate"]["name"];
                                                if (move_uploaded_file($_FILES["imageToUpdate"]["tmp_name"], $target_file)) {
                                                    rename($target_file, $target_dir."original.jpg");
                                                    copy($target_dir."original.jpg",$target_dir."195x243.jpg");
                                                    copy($target_dir."original.jpg",$target_dir."450x370.jpg");
                                                    copy($target_dir."original.jpg",$target_dir."small.jpg");
                                                    copy($target_dir."original.jpg",$target_dir."smaller.jpg");


                                                    $_SESSION['updateImage'] = "Also, image upload was uploaded.";
                                                }else{
                                                    $_SESSION['updateImage'] = "Also, Image was not updated.";
                                                }
                                            }else {
                                                $message = "Please enter product ID to update a product, or one that has an ID over 12 ( products with ID under 12 are locked.)";
                                            }



                                            $_SESSION['message']=$message.$_SESSION['updateImage'];
                                            header("location: index.php?page=admin/manage-products");

                                        }
                                        ?>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- checkout-step-03  -->
                    </div><!-- /.checkout-steps -->
                </div>
                <div class="col-md-4">
                    <?php require UC_ROOT . '/pages/admin/manage-products-sidebar.php' ?>
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <?php require UC_ROOT. '/parts/section/brands-carousel.php'; ?>
    </div><!-- /.container -->
</div><!-- /.body-content -->
<?php }else
    header("location: index.php?page=404");?>