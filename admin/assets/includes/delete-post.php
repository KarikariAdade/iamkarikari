<?php
include 'connect.php';
if (isset($_POST['post_id'])) {
	$post_id = $_POST['post_id'];
	$fetch_post = $conn->query("SELECT * FROM posts WHERE id = '$post_id'");
	$row = mysqli_fetch_assoc($fetch_post);
	$post_image = $row['post_image'];
	$post_img = explode('/', $post_image);
	$unlink_image = unlink('../uploads/posts/'.$post_img[8]);
	if (!empty($row['demo_file'])) {
		$demo_file = $row['demo_file'];
		$demo_file = explode('/', $demo_file);
	unlink('../uploads/demo/'.$demo_file[8]);
	}
	$delete_post = $conn->query("DELETE FROM posts WHERE id = '$post_id'");
	if ($delete_post && $unlink_image) {
		echo "Post deleted successfully. Page will refresh";
	}
}
?>