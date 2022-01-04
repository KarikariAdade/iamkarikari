<?php
include 'connect.php';
if (isset($_POST['user'])) {
	$user = mysqli_real_escape_string($conn, $_POST['user']);
	$del_mail = $conn->query("DELETE FROM newsletter WHERE id = '$user'") or die(mysqli_error($conn));
	if ($del_mail) {
		echo "Newsletter successfully deleted";
	}
}
?>