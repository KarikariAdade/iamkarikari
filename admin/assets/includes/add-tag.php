<?php
include 'connect.php';
include 'slug-function.php';
$success = false;
if (isset($_POST['add_tag_form_btn'])) {
	$tag_category = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['tag_category']));
	$tag_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['tag_name']));
	$admin_id = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['admin_id']));
	$tag_slug = slug($tag_name);
	if (!empty($tag_category) && !empty($tag_name)) {
		$check_tag = $conn->query("SELECT * FROM tags WHERE tag_name = '$tag_name'") or die(mysqli_error($conn));
		if (mysqli_num_rows($check_tag) > 0) {
			echo "Tag already exists";
		}else{
			$add_tag = $conn->query("INSERT INTO tags (admin_id, tag_name, tag_slug, tag_category) VALUES ('$admin_id', '$tag_name', '$tag_slug', '$tag_category')") or die(mysqli_error($conn));
			if ($add_tag) {
				$success = true;
				echo "New Post Tag has been added";
			}
		}
	}else{
		echo "Fill all fields before submitting";
	}
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	if (success == true) {
		$('.alert-box').css('background-color','#18b16f');
	}
</script>