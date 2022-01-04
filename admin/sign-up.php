<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/includes/header.php';?>
	<title>Web Blog Sign Up</title>
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>
	<div class="container-fluid login-section">
		<div class="container sign-up-form-class">
			<h1>Sign Up</h1>
			<div align="center" class="sign-up-alert">
			<div class="alert alert-box alert-dismissible fade show" role="alert">
				<span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message"></span></span>
			</div>
		</div>
			<p id="first-p"></p>
			<p id="last-p"></p>
			<form class="sign-up-form row" method="POST">
				<div class="form-group col-md-6">
					<input type="text" class="form-control" id="first_name" required>
					<label>First Name</label>
				</div>
				<div class="form-group col-md-6">
					<input type="text" class="form-control" id="last_name" required>
					<label>Last Name</label>
				</div>
				<div class="form-group col-md-12">
					<input type="email" class="form-control" id="email_address" required>
					<label>Email Address</label>
				</div>
				<div class="form-group col-md-6">
					<input type="password" class="form-control" id="password" required>
					<label>Password</label>
				</div>
				<div class="form-group col-md-6">
					<input type="password" class="form-control" id="confirm_password" required>
					<label>Confirm Password</label>
				</div>
				<div class="col-md-12">
				<p align="right" id="forgot-password"><a href="sign-in.php"><small>Already have an account?</small></a></p>
				<p align="center"><button class="btn-style-one" id="sign-up-btn" type="submit"><span class="txt">Sign In</span></button></p>
			</div>
			</form>
		</div>
	</div>
	<!-- is-valid state-valid has-success (use as classes during validation) -->
</body>
</html>