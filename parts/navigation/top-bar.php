<!-- ============================================== TOP MENU ============================================== -->
<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">
					<?php
					if(isset($_SESSION['email'])){
						echo '<li><a href="index.php?page=shopping-cart"><i class="icon fa fa-user"></i>'.$_SESSION['email'].'</a></li>';
						echo '<li><a href="index.php?page=shopping-cart"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>';
						echo '<li><a href="index.php?page=logoutmessage"><i class="icon fa fa-sign-in"></i>Logout</a></li>';
					}else {
						echo '<li><a href="index.php?page=sign-in"><i class="icon fa fa-user"></i>My Account</a></li>';
						echo '<li><a href="index.php?page=sign-in"><i class="icon fa fa-sign-in"></i>Login</a></li>';
					}
					?>
				</ul>
			</div><!-- /.cnt-account -->
			<?php
			if($_SESSION['isAdmin']=='Y') {
				echo '
						<div class="cnt-block">
							<ul class="list-unstyled list-inline">
								<li class="dropdown dropdown-small">
									<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="key">Admin Panel</span><span class="value">Menu</span><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="index.php?page=admin/manage-categories">Manage Categories</a></li>
										<li><a href="index.php?page=admin/manage-products">Manage Products</a></li>
										<li><a href="index.php?page=admin/manage-users">Manage Users</a></li>
										<li><a href="index.php?page=admin/messages">Messages</a></li>
									</ul>
								</li>
							</ul><!-- /.list-unstyled -->
						</div><!-- /.cnt-cart -->
						';
			}
						?>
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->
<!-- ============================================== TOP MENU : END ============================================== -->