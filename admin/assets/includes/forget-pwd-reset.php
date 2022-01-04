<?php
include 'connect.php';
$success = false;
if (isset($_POST['confirm_new_password_btn'])) {
	$user = mysqli_real_escape_string($conn, $_POST['user']);
	$token = mysqli_real_escape_string($conn, $_POST['token']);
	$new_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['new_password']));
	$confirm_new_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['confirm_new_password']));

	$number = preg_match('@[0-9]@', $new_password);
	$uppercase = preg_match('@[A-Z]@', $new_password);
	$lowercase = preg_match('@[a-z]@', $new_password);
	if (!empty($new_password) && !empty($confirm_new_password)) {
		if (strlen($new_password) < 8) {
			echo "Password should be more than 8 characters";
		}elseif (!$number) {
			echo "Password should contain at least a Number";
		}elseif (!$uppercase) {
			echo "Password should contain Uppercase letters";
		}elseif (!$lowercase) {
			echo "Password should contain Lowercase letters";
		}elseif ($new_password != $confirm_new_password) {
			echo "Passwords do not match";
		}else{
			$confirm_new_password = sha1($confirm_new_password);
			$reset = $conn->query("UPDATE admin SET password = '$confirm_new_password', token = NULL, token_time = NULL WHERE id = '$user' AND token = '$token'") or die (mysqli_error($conn));
			if ($reset) {
				$success = true;
				echo "Password reset successfull. You will are being redirected.";
			}
		}
	}else{
		echo "Fill all fields before submitting";
	}

}
?>
