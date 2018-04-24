<?php
require UC_ROOT.'/db.php';
/*<!-- ============================================== CONTACT FORM FUNCTIONS ============================================== -->*/
function send_message($contactEmail,$sentMessage){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare("INSERT INTO dimitris_demo.messages(email,sentMessage)
                             VALUES(?, ?)");
        $results->bindparam(1, $contactEmail);
        $results->bindparam(2, $sentMessage);
        $results->execute();
        $message = "Thank you for sending us an email! We will contact you as soon as possible at your email: ".$contactEmail;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = "Error sending message from : ".$contactEmail;
    }
    return $message;
}



function get_messages () {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->query ("SELECT email,sentMessage
                                FROM messages");


    } catch (PDOException $e) {
        echo "error selecting messages: " . $e;

    }
    $messages = $results->fetchAll (PDO::FETCH_ASSOC);
    return $messages;



}



/*<!-- ============================================== SHOPPING CART FUNCTIONS ============================================== -->*/

function add_to_cart ($productID,$userID){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare("SELECT quantity
                                  FROM dimitris_demo.cart
                                  WHERE userID= ? AND prodID = ?");
        $results->bindparam(1, $userID);
        $results->bindparam(2, $productID);
        $results->execute();
        $quantity = $results->fetchColumn();
        if (isset($quantity[0])) {
            $currentQuantity = intval($quantity[0]);
            $results = $db->prepare ("UPDATE dimitris_demo.cart
                                      SET quantity = ?
                                      WHERE userID = ? AND prodID = ?");
            $updatedQuantity = $currentQuantity + 1;
            $results->bindparam(1,$updatedQuantity );
            $results->bindparam(2,$userID);
            $results->bindparam(3,$productID);
        }else {
            $results = $db->prepare("INSERT INTO dimitris_demo.cart(userID,prodID,quantity)
                                     VALUES(?, ?, ?)");
            $firstInsert = 1;
            $results->bindparam(1,$userID);
            $results->bindparam(2,$productID);
            $results->bindparam(3,$firstInsert);
        }

        $results->execute();
        $message = 'SUCCESS:';

    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = 'ERROR: Something went wrong :'.$e;
    }
    return $message;
}
function remove_from_cart ($productID,$userID){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare("DELETE FROM dimitris_demo.cart
                                 WHERE prodID = ? AND userID = ?");
        $results->bindparam(1,$productID);
        $results->bindparam(2,$userID);
        $results->execute();
        $message = 'SUCCESS: You have successfully removed the product from cart with ID: '.$productID;

    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = 'ERROR: You have NOT successfully removed the product from cart with id: '.$productID;

    }
    return $message;


}
function remove_from_all_carts ($productID){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare("DELETE FROM dimitris_demo.cart
                                 WHERE prodID = ?");
        $results->bindparam(1,$productID);
        $results->execute();
        $message = 'The following product has been deleted from all carts: '.$productID;

    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = 'ERROR: You have NOT successfully removed the product from cart with id: '.$productID;

    }
    return $message;


}

function get_shopping_cart($userID) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("SELECT userID,prodID,quantity
                                FROM cart
                                WHERE userID = ?");
        $results->bindparam(1,$userID);
        $results->execute();

    } catch (PDOException $e) {
        echo "error finding shopping cart" . $e;
        return 0;

    }

    $shopping_cart = $results->fetchAll (PDO::FETCH_ASSOC);
    if (isset($shopping_cart)){
        return $shopping_cart;
    }else {
        return 0;
    }


}


/*<!-- ============================================== RATE PRODUCT FUNCTIONS ============================================== -->*/

function get_average_rating ($productID){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("SELECT AVG(rating)
                                  FROM dimitris_demo.ratings
                                  WHERE prodID= ?");
        $results->bindparam(1,$productID);
        $results->execute();
        $rating = $results->fetchColumn();


    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }
    return $rating;
}



function rating_exists($userID,$productID) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("SELECT rating
                                  FROM dimitris_demo.ratings
                                  WHERE userID = ? AND prodID = ?");
        $results->bindparam(1,$userID);
        $results->bindparam(2,$productID);
        $results->execute();
        $rating = $results->fetchColumn();
        if (isset($rating[0])) {
            return $rating[0];
        }else {
            return 0;
        }

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

}


function rate_a_product ($userID,$productID,$rating,$currentRating) {
    require UC_ROOT.'/db.php';
    try {
        if ($currentRating == 0) {
            $results = $db->prepare("INSERT INTO dimitris_demo.ratings(rating,userID,prodID)
                                     VALUES(?, ?, ?)");
        }else {
            $results = $db->prepare ("UPDATE dimitris_demo.ratings
                                      SET rating = ?
                                      WHERE userID = ? AND prodID = ?");
        }
        $results->bindparam(1,$rating);
        $results->bindparam(2,$userID);
        $results->bindparam(3,$productID);
        $results->execute();
        $message = 'SUCCESS: Your current rating of <span style="color: #0084B9;">'.$rating.'</span> has been submitted. Feel free to change it anytime.';

    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = 'ERROR: Something went wrong :'.$e;
    }
    return $message;
}



/*<!-- ============================================== MANAGE USERS FUNCTIONS ============================================== -->	*/

function remove_user($userID){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare("DELETE FROM dimitris_demo.users
                                 WHERE users.id = ?");
        $results->bindparam(1,$userID);
        $results->execute();
        $message = 'SUCCESS: You have successfully removed the user with ID: '.$userID;

    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = 'ERROR: You have NOT successfully removed the product with ID: '.$userID;
    }
    return $message;
}


function get_all_users () {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->query ("SELECT email, id, isAdmin
                                FROM users
                                ORDER BY id");

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }
    $users = $results->fetchAll (PDO::FETCH_ASSOC);
    return $users;
}

function get_type_of_users ($type) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("SELECT email, id, isAdmin
                                  FROM users
                                  WHERE isAdmin = ?
                                  ORDER BY id");
        $results->bindparam(1,$type);
        $results->execute();

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

    $users = $results->fetchAll (PDO::FETCH_ASSOC);

    return $users;
}

function update_user_status ($status,$id){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("UPDATE dimitris_demo.users
                                  SET isAdmin= ?
                                  WHERE users.id = ?");
        $results->bindparam(1,$status);
        $results->bindparam(2,$id);
        $results->execute();
        $message = "SUCCESS: User privilege status has been updated.";
    } catch (PDOException $e) {
        echo "error selecting products" . $e;
        $message = "ERROR: User privilege status has not been updated.";
    }
    return $message;
}
/*<!-- ============================================== MANAGE USERS FUNCTIONS END============================================== -->	*/
/*<!-- ============================================== GET PRODUCTS FUNCTIONS ============================================== -->	*/


function get_all_products () {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->query ("SELECT pname, price, description, category, products.id, dateAdded
                                FROM products");

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);

    return $products_array;
}

function get_ten_latest_products () {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->query ("SELECT pname, price, description, category, products.id, dateAdded
                                FROM products
                                ORDER BY dateAdded DESC
                                ");

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);

    return $products_array;

}

function get_product_by_ID($productID) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare("SELECT pname, price, description, products.id, dateAdded
                                 FROM products
                                 WHERE products.id = ?");
        $results->bindparam(1,$productID);
        $results->execute();

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

    $product = $results->fetchAll(PDO::FETCH_ASSOC);
    return $product;
}

function update_product_name ($newName,$id){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("UPDATE dimitris_demo.products
                                  SET pname= ?
                                  WHERE products.id = ?");
        $results->bindparam(1,$newName);
        $results->bindparam(2,$id);
        $results->execute();
        $message = "Name of product has been changed to: ".$newName;
    } catch (PDOException $e) {
        echo "error selecting products" . $e;
        $message = "ERROR: Name of category has NOT been changed to: ".$newName;
    }
    return $message;
}

function update_product_category ($newCat,$id){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("UPDATE dimitris_demo.products
                                  SET category= ?
                                  WHERE products.id = ?");
        $results->bindparam(1,$newCat);
        $results->bindparam(2,$id);
        $results->execute();
        $message = "The category that the product is in has been changed to: ".$newCat;
    } catch (PDOException $e) {
        echo "error selecting products" . $e;
        $message = "ERROR: The category the product is in has NOT been changed to: ".$newCat;
    }
    return $message;
}

function update_product_price ($newPrice,$id){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("UPDATE dimitris_demo.products
                                  SET price= ?
                                  WHERE products.id = ?");
        $results->bindparam(1,$newPrice);
        $results->bindparam(2,$id);
        $results->execute();
        $message = "The price of the product has been changed to: ".$newPrice;
    } catch (PDOException $e) {
        echo "error selecting products" . $e;
        $message = "ERROR: The price of the product has NOT been changed to: ".$newPrice;
    }
    return $message;
}

function update_product_brand ($newBrand,$id){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("UPDATE dimitris_demo.products
                                  SET brand= ?
                                  WHERE products.id = ?");
        $results->bindparam(1,$newBrand);
        $results->bindparam(2,$id);
        $results->execute();
        $message = "The product brand has been changed to: ".$newBrand;
    } catch (PDOException $e) {
        echo "error selecting products" . $e;
        $message = "ERROR: The product brand has NOT been changed to: ".$newBrand;
    }
    return $message;
}

function update_product_tags ($newTags,$id){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("UPDATE dimitris_demo.products
                                  SET tags= ?
                                  WHERE products.id = ?");
        $results->bindparam(1,$newTags);
        $results->bindparam(2,$id);
        $results->execute();
        $message = "The product tags have been changed to: ".$newTags;
    } catch (PDOException $e) {
        echo "error selecting products" . $e;
        $message = "ERROR: The product tags have NOT been changed to: ".$newTags;
    }
    return $message;
}

function update_product_description ($newDescription,$id){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("UPDATE dimitris_demo.products
                                  SET description= ?
                                  WHERE products.id = ?");
        $results->bindparam(1,$newDescription);
        $results->bindparam(2,$id);
        $results->execute();
        $message = "The product description has been changed to: ".$newDescription;
    } catch (PDOException $e) {
        echo "error selecting products" . $e;
        $message = "ERROR: The product description has NOT been changed to: ".$newDescription;
    }
    return $message;
}

function add_product ($product_name,$product_category,$product_price,$product_description,$product_tags,$product_brand) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare("INSERT INTO dimitris_demo.products(pname,category,price,description,tags,brand)
                                 VALUES(?, ?, ?, ?, ?, ?)");
        $results->bindparam(1, $product_name);
        $results->bindparam(2, $product_category);
        $results->bindparam(3, $product_price);
        $results->bindparam(4, $product_description);
        $results->bindparam(5, $product_tags);
        $results->bindparam(6, $product_brand);
        $results->execute();
        $message = "You Have Successfully added a product: ".$product_name;



    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = "Error in adding product: ".$product_name;
    }
    return $message;
}
function get_latest_product_ID () {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->query ("SELECT products.id
                                FROM products
                                ORDER BY dateAdded DESC
                                LIMIT 1");

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

    $latest_ID = $results->fetchColumn();
    return $latest_ID;

}



function remove_product($productID) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare("DELETE FROM dimitris_demo.products
                                 WHERE products.id = ?");
        $results->bindparam(1,$productID);
        $results->execute();
        $message = 'SUCCESS: You have successfully removed the product with ID: '.$productID;

    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = 'ERROR: You have NOT successfully removed the product with ID: '.$productID;


    }
    return $message;


}

function get_latest_products () {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->query ("SELECT pname, price, description, category, id
                                FROM products
                                ORDER BY dateadded DESC");

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }
    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);
    return $products_array;
}

function get_products_by_category ($category_id) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("SELECT pname, price,description, cname, dateAdded,products.id
                                  FROM categories, products
                                  WHERE products.category = categories.id AND categories.id = ?
                                  ORDER BY pname ASC ");

        $results -> bindParam (1, $category_id);
        $results -> execute();

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);

    return $products_array;
}

function get_latest_products_by_category ($category_id) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("SELECT pname, price, description, cname,dateAdded,products.id
                                  FROM categories, products
                                  WHERE products.category = categories.id AND categories.id = ?
                                  ORDER BY dateadded DESC");

        $results -> bindParam (1, $category_id);

        $results -> execute();

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);

    return $products_array;
}

function get_cheapest_products_by_category ($category_id) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("SELECT pname, price, description, cname,dateAdded,products.id
                                  FROM categories, products
                                  WHERE products.category = categories.id AND categories.id = ?
                                  ORDER BY price ASC ");

        $results -> bindParam (1, $category_id);

        $results -> execute();

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);

    return $products_array;
}

function get_expensive_products_by_category ($category_id) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("SELECT pname, price, description, cname,dateAdded,products.id
                                  FROM categories, products
                                  WHERE products.category = categories.id AND categories.id = ?
                                  ORDER BY price DESC");

        $results -> bindParam (1, $category_id);

        $results -> execute();

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);

    return $products_array;
}

/*<!-- ============================================== GET PRODUCTS FUNCTIONS END ============================================== -->	*/
/*<!-- ============================================== CATEGORY FUNCTIONS ============================================== -->	*/

function update_category_name ($newName,$id){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare ("UPDATE dimitris_demo.categories
                                  SET cname= ?
                                  WHERE id=?");
        $results->bindparam(1,$newName);
        $results->bindparam(2,$id);
        $results->execute();
        $message = "Name of category has been changed to: ".$newName;
    } catch (PDOException $e) {
        echo "error selecting products" . $e;
        $message = "ERROR: Name of category has NOT been changed to: ".$newName;
    }


    return $message;
}

function get_category_name ($categoryID){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare("SELECT cname
                                 FROM categories
                                 WHERE categories.id = ?");
        $results->bindparam(1,$categoryID);
        $results->execute();

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

    $categoryName = $results->fetchAll(PDO::FETCH_ASSOC);
    return $categoryName;
}

function add_Category ($categoryName) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare("INSERT INTO dimitris_demo.categories(cname)
                                 VALUES(?)");
        $results->bindparam(1,$categoryName);
        $results->execute();
            $message = 'You have successfully created the category: '.$categoryName;


    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = 'ERROR: You have NOT successfully created the category: '.$categoryName;


    }
    return $message;
}

function remove_category($categoryID) {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->prepare("DELETE FROM dimitris_demo.categories
                                 WHERE categories.id = ?");
        $results->bindparam(1,$categoryID);
        $results->execute();
        $message = 'SUCCESS: You have successfully removed the category: '.$categoryID;

    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = 'ERROR: You have NOT successfully removed the category: '.$categoryID;


    }
    return $message;
}

function get_all_categories() {
    require UC_ROOT.'/db.php';
    try {
        $results = $db->query ("SELECT id, cname
                                FROM categories
                                ORDER BY cname ASC");

    } catch (PDOException $e) {
        echo "error selecting categories" . $e;

    }

    $categories_array = $results->fetchAll (PDO::FETCH_ASSOC);

    return $categories_array;
}
/*<!-- ============================================== CATEGORY FUNCTIONS END============================================== -->	*/
/*<!-- ============================================== BRANDS FUNCTIONS ============================================== -->	*/

function get_all_brands(){
    require UC_ROOT.'/db.php';
    try {
        $results = $db->query ("SELECT brand
                                FROM products ");

    } catch (PDOException $e) {
        echo "error selecting categories" . $e;

    }

    $brands_array = $results->fetchAll (PDO::FETCH_ASSOC);
    $brands_array = array_map("unserialize", array_unique(array_map("serialize", $brands_array))); //this line removes all duplicates from brands

    return $brands_array;
}

function get_products_by_brand ($brand_name){
    require UC_ROOT.'/db.php';
    try {

        $results = $db->prepare ("SELECT pname, price, description, category, id
                                  FROM products
                                  WHERE products.brand = ?" );
        $results -> bindParam (1, $brand_name);
        $results -> execute();



    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }
    $products_by_brand = $results->fetchAll (PDO::FETCH_ASSOC);
    return $products_by_brand;
}
/*<!-- ============================================== BRANDS FUNCTIONS END============================================== -->	*/


function search ($search) {
    require UC_ROOT.'/db.php';
    $search = strtoupper($search);
    try {
        $results = $db->prepare ("SELECT pname, price,description, category, products.id
                                  FROM  products, categories
                                  WHERE products.category = categories.id
                                  AND (UPPER(pname) LIKE ? OR UPPER(description) LIKE ? OR price LIKE ?)");
        $search = "%" . $search . "%";

        $results -> bindParam (1, $search);
        $results -> bindParam (2, $search);
        $results -> bindParam (3, $search);

        $results -> execute();

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }

    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);

    return $products_array;
}
function recommender ($search) {
    require UC_ROOT.'/db.php';
    $search = strtoupper($search);
    try {
        $results = $db->prepare ("SELECT pname, price,description, category, products.id
                                  FROM  products, categories
                                  WHERE products.category = categories.id
                                  AND (UPPER(tags) LIKE ? OR UPPER(description) LIKE ?)");
        $search = "%" . $search . "%";

        $results -> bindParam (1, $search);
        $results -> bindParam (2, $search);

        $results -> execute();

    } catch (PDOException $e) {
        echo "error selecting products" . $e;

    }
    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);
    return $products_array;
}



function displayCategory($selectedCategory){
    $_SESSION['hideSort']=false;
    if ($_SESSION['latest']) {
        $productsByCat = get_latest_products_by_category($selectedCategory);
        $_SESSION['latest'] = false;
    }else if ($_SESSION['priceASC']) {
        $productsByCat = get_cheapest_products_by_category($selectedCategory);
        $_SESSION['priceASC'] = false;
    }else if ($_SESSION['priceDESC']){
        $productsByCat = get_expensive_products_by_category($selectedCategory);
        $_SESSION['priceDESC']=false;
    }else if ($_SESSION['brands']) {
        $productsByCat = get_products_by_brand($selectedCategory);
        $_SESSION['active_brand']= $selectedCategory;
        $_SESSION['brands'] = false;
        $_SESSION['hideSort']=true;
    }else {
        $productsByCat = get_products_by_category($selectedCategory);
    }
    ?>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <!--<li><a href="#">Home</a></li>
                    <li class='active'></li>-->
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row outer-bottom-sm'>
                <div class='col-md-3 sidebar'>
                    <?php require UC_ROOT.'/parts/navigation/sidemenu.php' ?>
                    <div class="sidebar-module-container">
                        <h3 class="section-title">shop by</h3>
                        <div class="sidebar-filter">
                            <?php require UC_ROOT . '/parts/widgets/sidebar/sidebar-category.php' ?>
                        </div><!-- /.sidebar-filter -->
                    </div><!-- /.sidebar-module-container -->
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <?php require UC_ROOT.'/parts/section/category-page-slider.php' ?>
                    <?php require UC_ROOT.'/parts/section/filter-container.php' ?>
                    <div class="search-result-container">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product  inner-top-vs">
                                    <div class="row">
                                        <?php

                                        require UC_ROOT.'/parts/section/category-grid.php';
                                        ?>
                                    </div><!-- /.row -->
                                </div><!-- /.category-product -->

                            </div><!-- /.tab-pane -->

                            <div class="tab-pane "  id="list-container">
                                <div class="category-product  inner-top-vs">
                                    <?php
                                    require UC_ROOT.'/parts/section/category-list.php';
                                    ?>
                                </div><!-- /.category-product -->
                            </div><!-- /.tab-pane #list-container -->
                        </div><!-- /.tab-content -->
                        <div class="clearfix filters-container">

                            <div class="text-right">
                                <?php require UC_ROOT.'/parts/section/pagination.php' ?>
                            </div><!-- /.text-right -->
                        </div><!-- /.filters-container -->
                    </div><!-- /.search-result-container -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            <?php require UC_ROOT. '/parts/section/brands-carousel.php'; ?>
        </div><!-- /.container -->
    </div><!-- /.body-content -->
<?php } ?>



<?php
function displayProduct($productName,$price,$dateAdded,$id){
    $average = round(floatval(get_average_rating($id)));
    $actionType = 'all';

    ?>
    <div class="product">
         <a style="display: block;" href='index.php?clickedProduct=true&clickedProd=<?php echo $id ?>'>
            <div class="product-image">
                <div class="image"
                    <a style="display: block;" href='index.php?clickedProduct=true&clickedProd=<?php echo $id ?>'><img style="height: 243px; width: 195px;" src="assets/images/product_images/<?php echo $id?>/195x243.jpg"  alt=""></a>
                </div><!-- /.image -->
            </div><!-- /.product-image -->
         </a>
        <div class="product-info text-left">
            <h3 class="name"><a href='index.php?page=detail&clickedProduct=true&clickedProd=<?php echo $id ?>'><?php echo $productName;?></a></h3>
            <div data-rateit-value="<?php echo $average ?>" class="rating rateit-small"></div>
            <div class="description"></div>
            <div class="product-price">
				<span class="price">
					&euro;<?php echo $price;?>
				</span>
                <?php echo "</br>".$dateAdded;?>
            </div><!-- /.product-price -->
        </div><!-- /.product-info -->
        <?php
        if ($_GET['clickedProduct']== true ){
            $_SESSION['selectedProduct']= $_GET['clickedProd'];
            header("location: index.php?page=detail&clickedProd=".$_SESSION['selectedProduct']);
        }
        ?>
        <?php if($actionType == 'all'): ?>
            <div class="cart clearfix animate-effect">
                <div class="action">
                    <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                            <a href="index.php?addToCart=<?php echo $id ?>">
                                <button class="btn btn-primary" type="submit" >Add to cart</button>
                            </a>
                            <?php
                                if (isset($_GET['addToCart'])){
                                    $_SESSION['clickedADD'] = true;
                                    header("location: index.php?page=shopping-cart&addToCart=".$_GET['addToCart']);
                                }
                            ?>

                        </li>
                    </ul>
                </div><!-- /.action -->
            </div><!-- /.cart -->
        <?php elseif($actionType == 'cart'): ?>
            <div class="action"><a href="#" class="lnk btn btn-primary">Add to Cart</a></div>
        <?php elseif($actionType == 'homepage-cart'): ?>
            <div class="cart clearfix animate-effect">
                <div class="action">
                    <button class="btn btn-primary" type="button">Add to cart</button>
                    <button class="left btn btn-primary" type="button"><i class="icon fa fa-heart"></i></button>
                    <button class="left btn btn-primary" type="button"><i class="fa fa-retweet"></i></button>
                </div><!-- /.action -->
            </div><!-- /.cart -->
        <?php endif; ?>
    </div><!-- /.product -->
    <?php
}
?>

<?php
function display_horizontal_menu($productsArray){
?>
<ul class="dropdown-menu mega-menu">
    <li class="yamm-content">
        <div class="row">
    <?php
    if ($productsArray != null) {
        foreach ($productsArray as $product) {
            ?>
            <div class="col-sm-12 col-md-3">
                <ul class="links list-unstyled">
            <?php
            echo "<li><a href='index.php?page=detail&clickedProduct=true&clickedProd=".$product['id']."'>".$product['pname']."</a></li>";
            ?>
                </ul>
            </div>
            <?php
        }
    }
    if ($_GET['clickedProduct']== true ){
        $_SESSION['selectedProduct']= $_GET['clickedProd'];
        header("location: index.php?page=detail&clickedProd=".$_SESSION['selectedProduct']);
    }
    ?>
            </div><!-- /.row -->
        </li><!-- /.yamm-content -->
    </ul><!-- /.dropdown-menu -->
<?php }?>

<?php
function displayListProduct($productName,$price,$description,$dateAdded,$id){
    $average = round(floatval(get_average_rating($id)));
    $classType = 'all';
    ?>
    <div class="product-list product">
        <div class="row product-list-row">
            <div class="col col-sm-4 col-lg-4">
                <div class="product-image">
                    <div class="image">
                        <img style="height: 243px; width: 195px;"  src="assets/images/product_images/<?php echo $id?>/195x243.jpg" alt="">
                    </div>
                </div><!-- /.product-image -->
            </div><!-- /.col -->
            <div class="col col-sm-8 col-lg-8">
                <div class="product-info">
                    <h3 class="name"><a href='index.php?page=detail&clickedProduct=true&clickedProd=<?php echo $id ?>'><?php echo $productName;?></a></h3>
                    <div data-rateit-value="<?php echo $average ?>" class="rating rateit-small"></div>
                    <div class="product-price">
					<span class="price">
						&euro;<?php echo $price;?>
					</span>
                    </div><!-- /.product-price -->
                    <div class="description m-t-10"><?php echo $description."</br>".$dateAdded;?></div>
                    <?php if($classType == 'all'): ?>
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <a href="index.php?addToCart=<?php echo $id ?>">
                                            <button class="btn btn-primary" type="submit" >Add to cart</button>
                                        </a>
                                        <?php
                                        if (isset($_GET['addToCart'])){
                                            $_SESSION['clickedADD'] = true;
                                            header("location: index.php?page=shopping-cart&addToCart=".$_GET['addToCart']);
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div><!-- /.action -->
                        </div><!-- /.cart -->
                    <?php elseif($classType == 'homepage-cart'): ?>
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <button class="btn btn-primary" type="button">Add to cart</button>
                                <button class="left btn btn-primary" type="button"><i class="icon fa fa-heart"></i></button>
                                <button class="left btn btn-primary" type="button"><i class="fa fa-retweet"></i></button>
                            </div><!-- /.action -->
                        </div><!-- /.cart -->
                    <?php endif; ?>
                </div><!-- /.product-info -->
            </div><!-- /.col -->
        </div><!-- /.product-list-row -->

    </div><!-- /.product-list -->
<?php } ?>
