<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/includes/header.php';?>
	<title>Web Blog Sign In</title>
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
	<style type="text/css">
	@media(min-width: 1000px){
		.login-form{
			margin-bottom: -24% !important;
		}
	}
</style>
</head>
<body>
	<div class="container-fluid login-section">
		<div class="login-form-class">
			<h1>Reset Password</h1>
			<?php
			include 'assets/includes/connect.php';
			if (isset($_GET['user']) && isset($_GET['token'])):
			?>
			<?php
			date_default_timezone_set("Africa/Accra");
			$user = $_GET['user'];
			$token = $_GET['token'];
			$fetch_user = $conn->query("SELECT * FROM admin WHERE id = '$user' AND token = '$token'") or die(mysqli_erro($conn));
			if (mysqli_num_rows($fetch_user) > 0) {
				$row = mysqli_fetch_assoc($fetch_user);
				if (!empty($row['profile_image'])) {
					$profile_image = explode('/', $row['profile_image']);
				$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
				}
				$current_time = date('Y-m-d H:i:s');
				$token_time = date('Y-m-d H:i:s', strtotime($row['token_time']));
				if ($token_time > $current_time) {
				
			?>
			<div align="center" class="user-img-class">
				<img src="<?= $profile_image; ?>" class="user-img">
				<p><?= $row['first_name'].' '.$row['last_name']; ?></p>
			</div>
			<form class="login-form" id="password-reset-form" method="POST">
				<input type="hidden" id="user" value="<?= $user; ?>">
				<input type="hidden" id="token" value="<?= $token; ?>">
				<div class="form-group">
					<input type="password" class="form-control" id="new_password" required>
					<label>New Password</label>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="confirm_new_password" required>
					<label>Confirm New Password</label>
				</div>
				<p align="center"><button type="submit" class="btn-style-one confirm_new_password_btn"><span class="txt">Reset Password</span></button></p>
			</form>
			
			<p id="first-p"></p>
			<p id="last-p"></p>
			<?php
		}else{
			echo '<h3 id="expired-token">Token has expired or invalid. Please <a href="sign-in.php">Sign Up</a> or <a href="sign-in.php">Sign In</a> again.</h3>';
		}
		}else{
			echo '<h3 id="expired-token">Token has expired or invalid. Please <a href="sign-in.php">Sign Up</a> or <a href="sign-in.php">Sign In</a> again.</h3>';
		}?>
		<?php else:?>
			<h3 id="expired-token">Token has expired or invalid. Please <a href="sign-in.php">Sign Up</a> or <a href="sign-in.php">Sign In</a> again.</h3>
		<?php endif;?>
		</div>
	</div>
</body>
</html>