<?php
include 'connect.php';
$success = false;
//Password reset form (view profile)
if (isset($_POST['confirm_password_btn'])) {
	$old_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['old_password']));
	$new_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['new_password']));
	$confirm_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['confirm_password']));
	$admin_id = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['admin_id']));
	$old_password = sha1($old_password);
	if (!empty($old_password) && !empty($new_password) && !empty($confirm_password)) {
		$fetch_password = $conn->query("SELECT * FROM admin WHERE password = '$old_password' AND id = '$admin_id'");
		if (mysqli_num_rows($fetch_password) > 0) {
			$number = preg_match('@[0-9]@', $new_password);
			$uppercase = preg_match('@[A-Z]@', $new_password);
			$lowercase = preg_match('@[a-z]@', $new_password);
			if (!$number) {
				echo "New password should contain <strong>at least</strong> a number";
			}elseif (!$uppercase) {
				echo "New password should contain <strong>uppercase</strong> letters";
			}elseif (!$lowercase) {
				echo "New password should contain <strong>lowercase</strong> letters";
			}elseif ($new_password != $confirm_password) {
				echo "New passwords do not match";
			}else{
				$confirm_password = sha1($confirm_password);
				$reset = $conn->query("UPDATE admin SET password = '$confirm_password' WHERE id = '$admin_id'");
				if ($reset) {
					$success = true;
					echo "Password has been changed successfully";
				}
			}
		}else{
			echo "Current password is incorrect";
		}
	}else{
		echo "Fill all fields before submitting";
	}
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	if (success == true) {
		$('#social-alert-box').css('background-color','#18b16f');
	}
</script>