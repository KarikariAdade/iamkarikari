<?php
include 'connect.php';
include 'slug-function.php';
$error_message = '';
$success = false;
if (isset($_POST['update_post_btn'])) {
	$post_id = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['post_id']));
	$post_title = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['post_title']));
	$post_category = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['post_category']));
	$tag_category = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['tag_category']));
	$post_desc = mysqli_real_escape_string($conn,$_POST['post_desc']);
	if (!empty($post_title) && !empty($post_category) && !empty($tag_category) && !empty($post_desc)) {
		$post_slug = slug($post_title);

		//Fetch Post for image
		$fetch_post = $conn->query("SELECT post_image FROM posts WHERE id = '$post_id'");
		$row = mysqli_fetch_assoc($fetch_post);
		if (!empty($_FILES['post_image']['name'])) {
			if (empty($row['post_image'])) {
				$file_name = $_FILES['post_image']['name'];
				$file_size = $_FILES['post_image']['size'];
				$file_tmp_name = $_FILES['post_image']['tmp_name'];

			//Target directory of file
				$file_target = $_SERVER['DOCUMENT_ROOT'].'/web_blog/admin/assets/uploads/posts/'.$file_name;
				$file_ext = explode('.', $file_name);
				if (isset($file_ext[1])) {
					$file_ext = $file_ext[1];
					$file_ext_array = array('jpg', 'jpeg', 'png', 'gif');
					if (!in_array($file_ext, $file_ext_array)) {
						$error_message = 'Only upload image files';
					}elseif ($file_size > 2000000) {
						$error_message = 'File size too big';
					}else{
						if (move_uploaded_file($file_tmp_name, $file_target)) {
							$query = $conn->query("UPDATE posts SET
								title = '$post_title',
								tag_name = '$tag_category',
								post_category = '$post_category',
								post_slug = '$post_slug',
								post_image = '$file_target',
								post_desc = '$post_desc' WHERE id = '$post_id'") or die(mysqli_error($conn));
							if ($query) {
								$success = true;
								$error_message = 'Post successfully updated';
							} 
						}
					}
				}


			}else{
				$error_message = "Delete old post image before adding a new one to save space";
			}
		}else{
			$query = $conn->query("UPDATE posts SET
				title = '$post_title',
				tag_name = '$tag_category',
				post_category = '$post_category',
				post_slug = '$post_slug',
				post_desc = '$post_desc' WHERE id = '$post_id'") or die(mysqli_error($conn));
			if ($query) {
				$success = true;
				$error_message = 'Post successfully updated';
			}
		}
		$row = mysqli_fetch_assoc($fetch_post);
	}else{
		$error_message = 'Fill all fields before submitting';
	}

}
?>