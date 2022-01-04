<?php
include 'connect.php';
include 'slug-function.php';
$error_message = '';
$success = false;
if (isset($_POST['create_post_btn'])) {
	$post_title = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['post_title']));
	$admin_id = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['admin_id']));
	$post_category = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['post_category']));
	$tag_category = (isset($_POST['tag_category'])?htmlspecialchars(mysqli_real_escape_string($conn,$_POST['tag_category'])):'');
	$post_desc = mysqli_real_escape_string($conn,$_POST['post_desc']);
	//Truncate post title
	$post_slug = slug($post_title);
	if (!empty($post_title) && !empty($post_category) && !empty($tag_category) && !empty($post_desc)) {
		if (!empty($_FILES['post_image']['name'])) {
			$file_name = $_FILES['post_image']['name'];
			$file_size = $_FILES['post_image']['size'];
			$file_tmp_name = $_FILES['post_image']['tmp_name'];

			//Target directory of file
			$file_target = $_SERVER['DOCUMENT_ROOT'].'/web_blog/admin/assets/uploads/posts/'.$file_name;
			$file_ext = explode('.', $file_name);
			if (isset($file_ext[1])) {
				$file_ext = $file_ext[1];
				$file_ext_array = array('jpg', 'jpeg','png','gif');
				if (!in_array($file_ext, $file_ext_array)) {
					$error_message = 'Only upload image files';
				}elseif ($file_size > 2000000) {
					$error_message = 'File size too big';
				}else{
					if (move_uploaded_file($file_tmp_name, $file_target)) {
						$query = $conn->query("INSERT INTO posts (tag_name, admin_id,post_category, post_slug, title, post_image, post_desc) VALUES ('$tag_category','$admin_id', '$post_category', '$post_slug', '$post_title', '$file_target','$post_desc')") or die(mysqli_error($conn));
						if ($query) {
							$success = true;
							$error_message = 'Post created successfully';
						}
					}
				}
			}
		}else{
			$error_message = 'Add a post image';
		}
	}
	else{
		$error_message = 'Fill all fields before submitting';
	}
	
}
?>
