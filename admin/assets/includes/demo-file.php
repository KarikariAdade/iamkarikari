<?php
// This script attaches demo files to posts
include 'connect.php';
$success = false;
if (isset($_POST['data'])) {
	$demo_file_id = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['data']));
	if (!empty($demo_file_id)) {
		if (!empty($_FILES['demo_file']['name'])) {
			$file_name = $_FILES['demo_file']['name'];
			$file_size = $_FILES['demo_file']['size'];
			$file_tmp_name = $_FILES['demo_file']['tmp_name'];
			$file_target = $_SERVER['DOCUMENT_ROOT'].'/web_blog/admin/assets/uploads/demo/'.$file_name;
			$file_ext = explode('.', $file_name);
			if (isset($file_ext[1])) {
				$file_ext = $file_ext[1];
				$file_ext_array = array('zip','rar','pdf');
				if (!in_array($file_ext, $file_ext_array)) {
					echo "Upload only zip, rar or pdf files.";
				}elseif ($file_size > 9000000) {
					echo "File size too big";
				}else{

					$check = $conn->query("SELECT demo_file FROM posts WHERE id = '$demo_file_id'");
					$row = mysqli_fetch_assoc($check);
					$old_demo_file = $row['demo_file'];
					if (empty($old_demo_file)) {
						if (move_uploaded_file($file_tmp_name, $file_target)) {
							$query = $conn->query("UPDATE posts SET demo_file = '$file_target' WHERE id = '$demo_file_id'") or die (mysqli_error($conn));
							if ($query) {
								$success = true;
								echo "Demo file has been uploaded successfully";
							}
						}
					}else{
						echo "Demo file already exists for this post. Please delete demo file from the edit post section before uploading a new one.";
					}
				}
			}
		}else{
			echo "Add a demo file before uploading";
		}
	}
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	if (success == true) {
		('.alert-box').css('background-color', '#18b16f');
	}
</script>