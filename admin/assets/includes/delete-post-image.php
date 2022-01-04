<?php
include 'connect.php';
if (isset($_POST['image_id'])) {
	$image_id = $_POST['image_id'];
	$fetch_image = $conn->query("SELECT post_image FROM posts WHERE id = '$image_id'");
	$row = mysqli_fetch_assoc($fetch_image);
	$image_file = explode('/', $row['post_image']);
	$unlink = unlink('../uploads/posts/'.$image_file[8]);
	$del_sql = $conn->query("UPDATE posts SET post_image = NULL WHERE id = '$image_id'") or die(mysqli_error($conn));
	if ($unlink && $del_sql) {
		echo "Image file deleted successfully. Page will reload.";
	}
}
?>