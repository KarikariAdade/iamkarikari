<?php
include 'connect.php';
$success = false;
if (isset($_POST['sign_up_btn'])) {
	$first_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['first_name']));
	$last_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['last_name']));
	$email_address = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email_address']));
	$password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));
	$confirm_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['confirm_password']));
	$number = preg_match('@[0-9]@', $password);
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);


	// Check if user account already exists
	$fetch_user = $conn->query("SELECT * FROM admin WHERE email = '$email_address'");
	if (mysqli_num_rows($fetch_user) > 0) {
		echo "Account already exists. Please <a href='sign-in.php'>login</a> using your email and password";
	}else{
		if (!empty($first_name) && !empty($last_name) && !empty($email_address) && !empty($password)) {
			if (strlen($first_name) < 3) {
				echo "First Name is too short";
			}elseif (strlen($last_name) < 3) {
				echo "Last Name is too short";
			}elseif (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
				echo "Invalid email address";
			}elseif (!$number) {
				echo "Password should contain at least a <strong>Number</strong>";
			}elseif (!$uppercase) {
				echo "Password should contain at least an <strong>Uppercase</strong> letter";
			}elseif (!$lowercase) {
				echo "Password should contain <strong>Lowercase</strong> letters";
			}elseif ($password != $confirm_password) {
				echo "Passwords do not match";
			}else{
				$confirm_password = sha1($confirm_password);
				$query = $conn->query("INSERT INTO admin (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email_address', '$confirm_password')") or die(mysqli_error($conn));
				if ($query) {
					$success = true;
					echo "Account successfully created. Please click <a href='sign-in.php'>here</a> to log in";
				}
			}
		}else{
			echo "Fill all form fields before submitting";
		}
	}
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	if (success == true) {
		$('.alert-box').css('background-color','#18b16f');
	}
</script>