<?php
include 'connect.php';
if (isset($_POST['send_mail_btn'])) {
	$to = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['to']));
	$mail_id = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['mail_id']));
	$subject = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['subject']));
	$message = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['message']));
	$date = date('Y-m-d H:i');
	if (!empty($to) && !empty($subject) && !empty($message)) {
		if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid Email Address";
		}elseif (!empty($mail_id)) {
			$reply_sql = $conn->query("UPDATE messages SET status = 1,
			 replied = 1,
			 reply_subject = '$subject',
			 reply_message = '$message',
			 reply_date = '$date' WHERE id = '$mail_id'") or die(mysqli_error($conn));
			if ($reply_sql) {
				echo "Reply has been successfully sent to ".$to;
			}
		}else{
			$compose_sql = $conn->query("INSERT INTO messages (status, reply_subject, reply_message, reply_date)VALUES(1, '$subject', '$message', '$date')") or die(mysqli_error($conn));
			if ($compose_sql) {
				echo "Message successfully sent to ".$to;
			}
		}
	}else{
		echo "Fill all fields before submitting";
	}
}
?>