<?php
include 'connect.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$fetch_picture = $conn->query("SELECT * FROM admin_pictures WHERE id = '$id'");
	$row = mysqli_fetch_assoc($fetch_picture);
	$img_seg = explode('/', $row['profile_image']);
	$file_name = $img_seg[8];
	$unlink = unlink('../uploads/profile/'.$file_name);
	$remove = $conn->query("DELETE FROM admin_pictures WHERE id = '$id'") or die(mysqli_error($conn));
	if ($unlink && $remove) {
		echo "Picture successfully deleted";
	}else{
		echo "Picture could not be deleted";
	}
}
?>