<?php

//This script changes the profile picture
include 'connect.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$fetch_profile_pics = $conn->query("SELECT * FROM admin_pictures WHERE id = '$id'") or die(mysqli_error($conn));
	$pic_row = mysqli_fetch_assoc($fetch_profile_pics);
	$admin_id = $pic_row['admin_id'];
	$new_pic = $pic_row['profile_image'];
	$update_picture = $conn->query("UPDATE admin SET profile_image = '$new_pic' WHERE id = '$admin_id'") or die(mysqli_error($conn));
	if ($update_picture) {
		echo "Profile picture changed successfully";
	}
}
?>