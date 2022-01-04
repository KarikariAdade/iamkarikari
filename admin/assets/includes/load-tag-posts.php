<?php
include 'connect.php';
include 'slug-function.php';
$output = '';
$more_posts = $_POST['more_posts'];
$tag = $_POST['tag'];
$tag_post_fetch = $conn->query("SELECT * FROM tags WHERE tag_slug = '$tag'") or die(mysqli_error($conn));
if (mysqli_num_rows($tag_post_fetch) > 0) {
	$tag_row = mysqli_fetch_assoc($tag_post_fetch);
	$tag_name = $tag_row['tag_name'];
	$fetch_post = $conn->query("SELECT * FROM posts WHERE tag_name = '$tag_name' ORDER BY id DESC LIMIT $more_posts");
	while($tag_post = mysqli_fetch_assoc($fetch_post)){
		$tag_post_id = $tag_post['id'];
		$admin_id = $tag_post['admin_id'];
		$post_image = $tag_post['post_image'];
		$profile_image = explode('/', $tag_post['post_image']);
		$date = date('M Y', strtotime($tag_post['date']));
		$tag_post_slug = $tag_post['post_slug'];
		$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
		$title = $tag_post['title'];
		$tag_name = $tag_post['tag_name'];
		$fetch_admin_id = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
		$post_admin = mysqli_fetch_assoc($fetch_admin_id);
		$admin_name = $post_admin['first_name'].' '.$post_admin['last_name'];
		$output .='<div class="col-md-6" style="margin:0;">
		<div class="card">
		<small id="card-tag">'.$tag_name.'</small>
		<div class="card-img">
		<img src="'.$profile_image.'" class="card-img-top">
		</div>
		<div class="card-body">
		<span><i class="fa fa-clock fa-sm"></i>'.$date.'</span>
		<span><i class="fa fa-user fa-sm"></i>'.$admin_name.'</span>
		<h5><a href="post-detail.php?id='.urlencode($tag_post_id).'&post='.urlencode($tag_post_slug).'">'.$title.'</a></h5>
		<div class="card-buttons">
		<button class="btn bg-gradient-dark"><a href="edit-post.php?id='.urlencode($tag_post_id).'&post='.urlencode($tag_post_slug).'"><span class="fa fa-edit fa-sm"></span></a></button>
		<button class="btn bg-gradient-dark" id="del_post_btn" onclick="return delete_post('.$tag_post_id.')"><span class="fa fa-trash fa-sm"></span></button>
		<button class="btn bg-gradient-dark add-file-modal" data-toggle="modal" data-target="#modal-form" data-id="'.$tag_post_id.'"><span class="fa fa-file-code fa-sm"></span></button>
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

		</div>';
	}
}
echo $output;
?>
<script type="text/javascript">
	$('.add-file-modal').click(function(){
		var id = $(this).attr('data-id');
		$.ajax({
			url: 'assets/includes/attach-file-modal.php?id='+id,
			cache: false,
			success:function (result){
				$('.modal-content').html(result);
			}
		})
	})

</script>