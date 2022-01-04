<?php
include 'connect.php';
$output = '';
if (isset($_POST['post_category'])) {
	$post_category = $_POST['post_category'];
	$fetch_tags = $conn->query("SELECT * FROM tags WHERE tag_category = '$post_category'") or die(mysqli_error($conn));
	if (mysqli_num_rows($fetch_tags) > 0) {
		while ($row = mysqli_fetch_assoc($fetch_tags)) {
			$tag_name = $row['tag_name'];
			$output .= '<option>'.$tag_name.'</option>';
		}
	}
	echo $output;
}
?>