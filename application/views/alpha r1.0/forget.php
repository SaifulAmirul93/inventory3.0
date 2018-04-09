<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V20</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/main.css">
<!--===============================================================================================-->
</head>
<body>
		<div class="container-login200">
			<img src="<?= base_url(); ?>/img/logo-4.png" alt="logo"/>
		</div>
	<div class="limiter">
		
		<div class="container-login100">

			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Reset Password
					</span>
					
					<div class="wrap-input300 rs4 validate-input" data-validate = "Email is required">
						<input class="input100" type="email" name="email">
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input200 rs3 validate-input" data-validate="Phone number is required">
						<input class="input100" type="text" name="phone">
						<span class="label-input100">Last 4 Digit of Phone No.</span>
					</div>
					<!-- <div class="wrap-input200 rs3">
						<select class="input200 validate-input" name="access">
						<option>Choose Inventory Access</option>							
						<option value="1">Raw Material</option>
						<option value="2">Apparel</option>
						<option value="3">Merchandise</option>
						<option value="4">Event</option>
						<option value="5">Project X</option>
						<option value="6">Lab</option>
					</select>
					</div> -->
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							reset
						</button>
					</div>
					
					
				</form>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>js/main.js"></script>

</body>
</html>