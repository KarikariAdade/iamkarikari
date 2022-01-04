<?php
session_start();
$admin_id = $_SESSION['admin_id'];
// This form uploads profile picture (add profile section)
include 'connect.php';
if (isset($_FILES['profile_picture']['name'])) {
	$file_name = $_FILES['profile_picture']['name'];
	$file_size = $_FILES['profile_picture']['size'];
	$file_tmp_name = $_FILES['profile_picture']['tmp_name'];

	//Target directory of file
	$file_target = $_SERVER['DOCUMENT_ROOT'].'/web_blog/admin/assets/uploads/profile/'.$file_name;
	//file name, extension, size, move
	$file_ext = explode('.', $file_name);
	if (isset($file_ext[1])) {
		$file_ext = $file_ext[1];
	$file_ext_array = array('jpg','jpeg', 'png', 'gif');
	if (!in_array($file_ext, $file_ext_array)) {
		echo "Only upload image files";
	}elseif ($file_size > 2000000) {
		echo "File size too big";
	}else{
		if (move_uploaded_file($file_tmp_name, $file_target)) {
			$query = $conn->query("UPDATE admin SET profile_image = '$file_target' WHERE id = '$admin_id'") or die(mysqli_error($conn));

			$fetch_pictures = $conn->query("SELECT * FROM admin_pictures WHERE profile_image = '$file_target'") or die(mysqli_error($conn));
			if (mysqli_num_rows($fetch_pictures) > 0) {
				$success = true;
			}else{
				$add_pic = $conn->query("INSERT INTO admin_pictures (admin_id, profile_image) VALUES ('$admin_id', '$file_target')") or die(mysqli_error($conn));
			
			}
			if ($query) {
				echo "Profile picture successfully updated";
			}
			
		}
	}
	}else{
	echo "Select a picture before clicking upload";
}
	
	
}
?>