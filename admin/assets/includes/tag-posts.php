<?php
include 'connect.php';
include 'slug-function.php';
$output = '';
if (isset($_POST['tag_id'])) {
	$tag_id = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['tag_id']));
	$fetch_tags = $conn->query("SELECT * FROM tags WHERE id = '$tag_id'") or die(mysqli_error($conn));
	$tag_row = mysqli_fetch_assoc($fetch_tags);
	$tag_name = $tag_row['tag_name'];

	$fetch_post = $conn->query("SELECT * FROM posts WHERE tag_name = '$tag_name' ORDER BY id DESC");
	if (mysqli_num_rows($fetch_post) > 0) {
		while ($row = mysqli_fetch_assoc($fetch_post)) {
			$post_id = $row['id'];
			$admin_id = $row['admin_id'];
			$post_tag_name = $row['tag_name'];
			$post_category = $row['post_category'];
			$post_slug = $row['post_slug'];
			$title = $row['title'];
			$post_image = $row['post_image'];
			$post_desc = $row['post_desc'];
			$profile_image = explode('/', $row['post_image']);
			$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
			$date = date('M Y', strtotime($row['date']));
			$fetch_admin_id = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
			$post_admin = mysqli_fetch_assoc($fetch_admin_id);
			$post_admin_name = $post_admin['first_name'].' '.$post_admin['last_name'];
			$output .= '
			<div class="col-md-6" style="margin:0;">
			<div class="card">
			<small id="card-tag">'.$post_tag_name.'</small>
			<div class="card-img">
			<img src="'.$profile_image.'" class="card-img-top">
			</div>
			<div class="card-body">
			<span><i class="fa fa-clock fa-sm"></i>'.$date.'</span>
			<span><i class="fa fa-user fa-sm"></i>'.$post_admin_name.'</span>
			<h5><a href="post-detail.php?id='.urlencode($post_id).'&post='.urlencode($post_slug).'">'.$title.'</a></h5>
			<div class="card-buttons">
			<button class="btn bg-gradient-dark"><a href="edit-post.php?id='.urlencode($post_id).'&post='.urlencode($post_slug).'"><span class="fa fa-edit fa-sm"></span></a></button>
			<button class="btn bg-gradient-dark" id="del_post_btn" onclick="return delete_post('.$post_id.')"><span class="fa fa-trash fa-sm"></span></button>
			<button class="btn bg-gradient-dark add-file-modal" data-toggle="modal" data-target="#modal-form" data-id="'.$post_id.'"><span class="fa fa-file-code fa-sm"></span></button>
			</div>
	<style type="text/css">
	.modal-backdrop{
		display: none;
	}
</style>
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1220 !important;">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">

		</div>
	</div>
</div>
</div>

</div>

</div>
			';
		}
	}else{
		$output = "<h3>There are no posts under the selected tag.</h3>";
	}
	echo $output;
}
?>
<script type="text/javascript">
	$('.add-file-modal').click(function(){
		var id = $(this).attr('data-id');
		$.ajax({
			url: 'assets/includes/attach-file-modal-2.php?id='+id,
			cache: false,
			success:function (result){
				$('.modal-content').html(result);
			}
		})
	})

</script>