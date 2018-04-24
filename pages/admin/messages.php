<?php
session_start();
if($_SESSION['isAdmin']=='Y') {
    ?>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>ADMIN: Messages</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row inner-bottom-sm">
                <div class="shopping-cart">

                    <div class="col-md-12 col-sm-12 shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="cart-product-name item">Message</th>
                                    <th class="cart-total last-item">Email</th>
                                </tr>
                                </thead>
                                <!-- /thead -->
                                <?php
                                $messages= get_messages();
                                foreach ($messages as $message){
                                ?>
                                <tbody>
                                        <tr>
                                            <td class="cart-product-name-info">
                                                <p> <?php echo $message['sentMessage'] ?></p>
                                            </td>

                                            </td>
                                            <td class="cart-product-grand-total">
                                                <span><?php echo $message['email'] ?></span>
                                            </td>
                                        </tr>

                                </tbody>
                                <?php
                                     }
                                 ?>
                                <!-- /tbody -->
                            </table>
                            <!-- /table -->
                        </div>
                    </div>
                    <!-- /.shopping-cart-table -->
                    <?php /*require UC_ROOT . '/parts/section/estimate-ship-tax.php' */?>
                </div>
                <!-- /.shopping-cart -->
            </div>
            <!-- /.row -->
            <?php require UC_ROOT . '/parts/section/brands-carousel.php'; ?>
        </div>
        <!-- /.container -->
    </div><!-- /.body-content -->
    <?php
}else {
    header("location: index.php?page=404");
}
?>