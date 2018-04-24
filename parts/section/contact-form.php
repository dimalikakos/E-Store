<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';
?>
<div class="col-md-9 contact-form">
	<div class="col-md-12 contact-title">
		<h4>Contact Form</h4>
	</div>
	<form class="register-form" role="form" method="post">
		<div class="col-md-4">
				<div class="form-group">
					<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
					<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="contactEmail" placeholder="Type email here...">
				</div>
		</div>
		<div class="col-md-4 ">
				<div class="form-group">
				<label class="info-title" for="exampleInputName">Your Name <span></span></label>
				<input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="Type name here...">
			  </div>
		</div>
		<div class="col-md-4">
				<div class="form-group">
				<label class="info-title" for="exampleInputTitle">Title <span></span></label>
				<input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="Title">
			  </div>
		</div>
		<div class="col-md-12">
				<div class="form-group">
				<label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
				<textarea class="form-control unicase-form-control" id="exampleInputComments" name="sentMessage"></textarea>
			  </div>
		</div>
		<div class="col-md-12 outer-bottom-small m-t-20">
			<a href="index.php?page=contactmessage"><button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="send_message">Send Message</button></a>
		</div>
		<?php
		
		if(isset($_POST['send_message'])){
			if(strlen(trim($_POST['contactEmail'])) != 0 && strlen(trim($_POST['sentMessage']))!= 0 ) {
				$_SESSION['messageStatus'] = send_message($_POST['contactEmail'], $_POST['sentMessage']);
				header("location: index.php?page=contactmessage");
			}else{
				echo "<span style='color:red;'>To send an email, please type an message and provide your email address.</span>";
			}
		}
		?>
	</form>
</div>
<div class="col-md-3 contact-info">
	<div class="contact-title">
		<h4>INFORMATION</h4>
	</div>
	<div class="clearfix address">
		<span class="contact-i"><i class="fa fa-map-marker"></i></span>
		<span class="contact-span">Gravias 6, Athina 153 42</span>
	</div>
	<div class="clearfix phone-no">
		<span class="contact-i"><i class="fa fa-mobile"></i></span>
		<span class="contact-span"> (210) 600 9800 <br> (210) 600 9811</span>
	</div>
	<div class="clearfix email">
		<span class="contact-i"><i class="fa fa-envelope"></i></span>
		<span class="contact-span">d.alikakos@acg.edu <br>paparuneleos@gmail.com</span>
	</div>
</div>