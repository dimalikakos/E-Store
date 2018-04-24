<?php
include UC_ROOT.'/parts/section/login.php'; // Includes Login Script
include UC_ROOT.'/parts/section/signup.php'; // includes signup script
?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php?page=home">Home</a></li>
				<li class='active'>Authentication</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-6 col-sm-6 sign-in">
					<h4 class="">sign in</h4>
					<p class="">Hello, Welcome to your account.</p>
					<?php
					if(isset($errMsg)){
						echo '<div style="color:#FF0000;">'.$errMsg.'</div>';
					}
					?>
					<div class="social-sign-in outer-top-xs">
						<a href="index.php?page=404" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
						<a href="index.php?page=404" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
					</div>
					<form class="register-form outer-top-xs" role="form" method="post" action="">
						<div class="form-group">
							<label class="info-title" for="email">Email Address <span></span></label>
							<input type="email" class="form-control unicase-form-control text-input" id="email" name="username" >
						</div>
						<div class="form-group">
							<label class="info-title" for="password">Password <span></span></label>
							<input type="password" class="form-control unicase-form-control text-input" id="password" name="password" >
						</div>
						<!--<div class="radio outer-xs">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
							</label>
							<a href="#" class="forgot-password pull-right">Forgot your Password?</a>
						</div>-->
						<button id="login" name="login" type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
					</form>
				</div>
				<!-- Sign-in -->

				<!-- create a new account -->
				<div class="col-md-6 col-sm-6 create-new-account">
					<h4 class="checkout-subtitle">create a new account</h4>
					<p class="text title-tag-line">Create your own Xenorious account.</p>
					<form class="register-form outer-top-xs" role="form" method="post" action="" >
						<div class="form-group">
							<label class="info-title" for="newFullname">Fullname <span>*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" id="newFullname" name="newFullname">
						</div>
						<div class="form-group">
							<label class="info-title" for="email2">Email Address <span>*</span></label>
							<input type="email" class="form-control unicase-form-control text-input" id="email2" name="newEmail">
						</div>
						<div class="form-group">
							<label class="info-title" for="password2">Type a password <span>*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" id="password2" name="newPass">
						</div>
						<div class="form-group">
							<label class="info-title" for="password3">Type password again <span>*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" id="password3" name="newPass2">
						</div>
						<button id="signUp" name="signUp" type="submit" class="btn-upper btn btn-primary checkout-page-button">SignUp</button>
						<?php
						if(isset($error))
						{
							foreach ($error as $error)
							{
								?>
								<div class="alert alert-danger">
									<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
								</div>
								<?php
							}
						}
						else if(isset($_GET['joined']))
						{
							?>
							<div class="alert alert-info">
								<i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
							</div>
							<?php
						}
						?>

					</form>


				</div>
				<!-- create a new account -->
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<?php require UC_ROOT. '/parts/section/brands-carousel.php'; ?>
	</div><!-- /.container -->
</div><!-- /.body-content -->