<?php
include 'connect.php';
if (isset($_POST['mail'])) {
	$mail = mysqli_real_escape_string($conn, $_POST['mail']);
	$del_sql = $conn->query("UPDATE messages SET trashed = 1 WHERE id = '$mail'") or die(mysqli_error($conn));
	if ($del_sql) {
		echo "Message deleted successfully";
	}
}
?>