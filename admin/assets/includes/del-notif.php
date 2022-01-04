<?php
include 'connect.php';
if (isset($_POST['notif'])) {
	$notif = mysqli_real_escape_string($conn, $_POST['notif']);
	$del_notif = $conn->query("DELETE FROM newsletter WHERE id = '$notif'") or die(mysqli_error($conn));
	if ($del_notif) {
		echo "Notification deleted successfully";
	}
}
?>