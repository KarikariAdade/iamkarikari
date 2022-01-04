<?php
include 'connect.php';
$success = false;
if (isset($_POST['contact_btn'])) {
	$full_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['full_name']));
	$email_address = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email_address']));
	$phone = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['phone']));
	$subject = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['subject']));
	$message = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['message']));
	if (!empty($full_name) && !empty($email_address) && !empty($phone) && !empty($subject) && !empty($message)) {
		if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid Email Address";
		}else{
			$add_message = $conn->query("INSERT INTO messages (full_name, email, phone, subject, message) VALUES ('$full_name', '$email_address','$phone', '$subject', '$message')") or die(mysqli_error($conn));
			if (isset($add_message)) {
				$success = true;
				echo "Message successfully sent. You will hear from us soon. Thanks";
			}
		}
	}else{
		echo "Fill all fields before submitting.";
	}
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	if (success == true) {
		$('.alert-box').css('background-color', '#18b16f');
	}
</script>