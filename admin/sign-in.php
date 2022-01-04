<?php
session_start();
if (isset($_SESSION['admin_id'])) {
	echo "<script>window.location = 'index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/includes/header.php';?>
	<title>Web Blog Sign In</title>
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>

	<div class="container-fluid login-section">
		<?php include 'assets/includes/forgot-password-form.php'; ?>
		<div class="login-form-class">
			<h1>Sign In</h1>
			<div align="center" class="sign-up-alert">
			<div class="alert alert-box alert-dismissible fade show" role="alert">
				<span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message"></span></span>
			</div>
		</div>
			<p id="first-p"></p>
			<p id="last-p"></p>
			<form class="login-form" method="POST">
				<div class="form-group">
					<input type="text" class="form-control" name="user_email" id="user_email" required>
					<label>Email Address</label>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="user_password" name="user_password" required>
					<label>Password</label>
				</div>
				<p align="right" id="forgot-password" data-toggle="modal" data-target="#forgot-password-form-modal"><a href="#"><small>Forgot your Password?</small></a></p>
				<p align="center"><button type="submit" class="btn-style-one sign_in_btn" name="sign_in_btn"><span class="txt">Sign In</span></button></p>
			</form>
		</div>
	</div>
</body>
</html>