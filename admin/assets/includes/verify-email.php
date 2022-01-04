<?php
date_default_timezone_set("Africa/Accra");
include 'connect.php';
$success = false;
if (isset($_POST['reset_password_btn'])) {
	$reset_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['reset_email']));
	$check_email = $conn->query("SELECT * FROM admin WHERE email = '$reset_email'") or die(mysqli_error($conn));
	$today = date('Y-m-d H:i:s');
	$timestamp = strtotime($today)+1800;
	$token_time = date('Y-m-d H:i:s', $timestamp);

	if (mysqli_num_rows($check_email) > 0) {
		while ($row = mysqli_fetch_assoc($check_email)) {
			if (!empty($row['profile_image'])) {
				$profile_image = explode('/', $row['profile_image']);
				$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
			}
			$user_id = $row['id'];
			$token = md5($row['id']);
			$update = $conn->query("UPDATE admin SET token = '$token', token_time = '$token_time' WHERE email = '$reset_email'") or die(mysqli_error($conn));
			if ($update) {
				//Email verification goes here
				$success = true;
				// echo "Token sent. Please check your email to continue password reset. NB: Token will expire in 30 minutes";
				echo "<script>window.location = 'password-reset.php?user=".urlencode($user_id)."&token=".urlencode($token)."';</script>";
			}
		}
	}else{
		$success = false;
		echo "Email you entered does not exist in our database";
	}
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	var image = '<?= $profile_image; ?>';
	if (success == true) {
		$('#modal-alert').css('background-color','#18b16f');
		$('#reset-image').show(400);
		$('.reset-image-div').html('<img src="'+ image +'" id="reset-image" style="width:50px; height: 50px; border-radius: 50%; margin-bottom: 5%;">');
	}
	if (success == false) {
		$('#reset-image-div').hide();
	}
</script>