<div class="body-content outer-top-bd">
    <div class="container">
        <div class="x-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12 x-text text-center">
                    <?php
                    header( "refresh:6;url=index.php" );
                    ?>
                    <script>
                        function startTimer(duration, display) {
                            var timer = duration, seconds;
                            setInterval(function () {
                                seconds = parseInt(timer % 60, 10);
                                seconds = seconds < 10 ? seconds : seconds;
                                display.textContent = seconds;
                                if (--timer < 0) {
                                    timer = duration;
                                }
                            }, 1000);
                        }
                        window.onload = function () {
                            var timeleft = 6,
                                display = document.querySelector('#time');
                            startTimer(timeleft, display);
                        };
                    </script>
                    <h1 style="font-size: 70px;"><?php
                        echo 'Welcome '.$_SESSION['fullname'];

                        ?></h1>
                    <p>You have successfully logged in! You will be redirected in <span id="time"></span>. Please wait. </p>

                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->