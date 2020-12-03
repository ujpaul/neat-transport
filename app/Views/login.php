
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Neat transport</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="manifest" href="site.webmanifest">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- CSS here -->
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/slicknav.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/flaticon.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/progressbar_barfiller.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/gijgo.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/animate.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/animated-headline.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/magnific-popup.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/themify-icons.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/slick.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/nice-select.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/login/css/style.css">
</head>
<body>
<!-- ? Preloader Start -->
<div id="preloader-active">
	<div class="preloader d-flex align-items-center justify-content-center">
		<div class="preloader-inner position-relative">
			<div class="preloader-circle"></div>
			<div class="preloader-img pere-text">
				<img src="<?=base_url();?>assets/img/logo2.png" alt="">
			</div>
		</div>
	</div>
</div>
<main>
	<!-- login Area Start -->
	<div class="login-form-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-7 col-lg-8">
					<div class="login-form">
						<form action="<?=base_url('login_pro');?>" method="post">
						<!-- Login Heading -->
						<div class="login-heading">
							<span>Login</span>
							<img src="<?= base_url()?>assets/img/logo2.png" style="width: 330px;">
						</div>
						<?php
						if (!empty($error)) {
							?>
							<div class="alert alert-danger">
								<label class="alert-heading"><?= lang("loginFailed"); ?></label>
								<p><?= $error; ?></p>
							</div>
							<?php
						}
						?>
						<!-- Single Input Fields -->
						<div class="input-box">
							<div class="single-input-fields">
								<label>Username</label>
								<input type="text" placeholder="username" name="email">
							</div>
							<div class="single-input-fields">
								<label>Password</label>
								<input type="password" placeholder="Password" name="password">
							</div>
							<div class="single-input-fields login-check">
								<input type="checkbox" id="fruit1" name="keep-log">
								<label for="fruit1">Keep me logged in</label>
								<a href="#" class="f-right">Forgot Password?</a>
							</div>
						</div>
						<!-- form Footer -->
						<div class="login-footer">
							<button class="submit-btn3" type="submit">Login</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- login Area End -->
</main>

<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="<?=base_url();?>assets/login/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="./assets/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<!-- Progress -->
<script src="./assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script src="./assets/js/jquery.countdown.min.js"></script>
<script src="./assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?=base_url();?>assets/login/js/plugins.js"></script>
<script src="<?=base_url();?>assets/login/js/main.js"></script>

</body>
</html>
