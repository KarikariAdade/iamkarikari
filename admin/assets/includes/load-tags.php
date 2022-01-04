<?php
include 'connect.php';
$output = '';
$fetch_tags = $conn->query("SELECT * FROM tags ORDER BY id DESC");
$output .='<h2> Post Tags</h2>';
if (mysqli_num_rows($fetch_tags) > 0) {
	while ($tag_row = mysqli_fetch_assoc($fetch_tags)) {
		$tag_id = $tag_row['id'];
		$admin_id = $tag_row['admin_id'];
		$tag_name = $tag_row['tag_name'];
		$output .= '<p style="margin:5px;"><a href="#"><span id="tag_name" onclick="return show_tag('.$tag_id.')">'.$tag_name.'</span></a><i class="fa fa-times fa-sm" onclick="return delete_tag('.$tag_id.')"></i></p>';
	}
}else{
	$output .= '<h4>There are no post tags at the moment. </h4>';
}
echo $output;
		?>