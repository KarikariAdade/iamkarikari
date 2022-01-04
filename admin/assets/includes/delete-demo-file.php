<?php
include 'connect.php';
if (isset($_POST['file_id'])) {
	$file_id = $_POST['file_id'];
	$fetch_file = $conn->query("SELECT demo_file FROM posts WHERE id = '$file_id'");
	$row = mysqli_fetch_assoc($fetch_file);
	$demo_file = explode('/', $row['demo_file']);
	$unlink = unlink('../uploads/demo/'.$demo_file[8]);
	$del_sql = $conn->query("UPDATE posts SET demo_file = NULL WHERE id = '$file_id'") or die(mysqli_error($conn));
	if ($unlink && $del_sql) {
		echo "Demo file deleted successfully. Page will reload.";
	}
}
?>