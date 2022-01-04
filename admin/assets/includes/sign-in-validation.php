<?php
session_start();
include 'connect.php';
if (isset($_POST['sign_in_btn'])) {
	$user_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['user_email']));
	$user_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['user_password']));
	$user_password = sha1($user_password);
	$fetch_user = $conn->query("SELECT * FROM admin WHERE email ='$user_email' AND password = '$user_password'");
	if (mysqli_num_rows($fetch_user) > 0) {
		$row = mysqli_fetch_assoc($fetch_user);
		$_SESSION['admin_id'] = $row['id'];
		$_SESSION['admin_email'] = $row['email'];
		echo "<script>window.location = 'index.php';</script>";
		// header('Location: index.php');
	}else{
		echo "Invalid Email Address or Password";
	}
}
?>