<div class="body-content outer-top-bd">
    <div class="container">
        <div class="x-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12 x-text text-center">

                    <h1 style="font-size: 70px;"><?php
                        echo 'Message submitted '.$_SESSION['fullname']." !!!";


                        ?></h1>
                    <p><?php
                        if(isset($_SESSION['messageStatus'])){
                            echo $_SESSION['messageStatus'];
                            unset($_SESSION['messageStatus']);
                        } ?>
                        

                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->