<?php
include 'connect.php';
if (isset($_POST['tag_id'])) {
	$tag_id = $_POST['tag_id'];
	$delete_tag = $conn->query("DELETE FROM tags WHERE id = '$tag_id'") or die(mysqli_error($conn));
	if ($delete_tag) {
		echo "Tag deleted successfully";
	}
}
?>