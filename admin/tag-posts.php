<?php
session_start();
include 'assets/includes/connect.php';
include 'assets/includes/session-redirect.php';
include 'assets/includes/slug-function.php';
if (!isset($_GET['tag'])) {
	echo "<script>window.location = 'view-posts.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/includes/header.php';?>
	<title>Web Blog</title>
</head>
<body class="app sidebar-mini rtl" >
	<div class="page">
		<div class="page-main">
			<?php include 'assets/includes/sidebar.php'; ?>
			<div class="app-content ">
				<div class="side-app">
					<div class="main-content">
						<?php include 'assets/includes/top-nav.php';?>
						<!-- Page content -->
						<div class="container-fluid pt-8">
							<?php 
							include 'assets/includes/page-name.php';?>
							<div class="row view-post-section">
								<div class="col-md-4">
									<div class="tag-section-div">
										<h2>Popular Tags</h2>
										<?php
										$fetch_tags = $conn->query("SELECT * FROM tags ORDER BY id DESC");
										if (mysqli_num_rows($fetch_tags) > 0) {
											while ($tag_row = mysqli_fetch_assoc($fetch_tags)) {
												$tag_id = $tag_row['id'];
												$tag_name = $tag_row['tag_name'];
												?>
												<p><a href="#"><span id="tag_name" onclick="return show_tag('<?= $tag_id;?>')"><?= $tag_row['tag_name']; ?></span></a></p>
												<?php
											}
										}else{
											echo '<h4>There are no post tags at the moment </h4>';
										}
										?>
									</div>
								</div>
								<div class="col-md-8">
									<div class="row tag_show">
										<?php
										$tag = $_GET['tag'];
										$tag_post_fetch = $conn->query("SELECT * FROM tags WHERE tag_slug = '$tag'") or die(mysqli_error($conn));
										if (mysqli_num_rows($tag_post_fetch) > 0) {
											$tag_row = mysqli_fetch_assoc($tag_post_fetch);
											$tag_name = $tag_row['tag_name'];
											$fetch_post = $conn->query("SELECT * FROM posts WHERE tag_name = '$tag_name' ORDER BY id DESC LIMIT 1");
											while($tag_post = mysqli_fetch_assoc($fetch_post)){
												$tag_post_id = $tag_post['id'];
												$admin_id = $tag_post['admin_id'];
												$post_image = $tag_post['post_image'];
												$profile_image = explode('/', $tag_post['post_image']);
												$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
												$fetch_admin_id = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
												$post_admin = mysqli_fetch_assoc($fetch_admin_id);
												?>
												
												<div class="col-md-6" style="margin:0;">
													<div class="card">
														<small id="card-tag"><?= $tag_post['tag_name']; ?></small>
														<div class="card-img">
															<img src="<?= $profile_image;?>" class="card-img-top">
														</div>
														<div class="card-body">
															<span><i class="fa fa-clock fa-sm"></i><?= date('M Y', strtotime($tag_post['date'])) ?></span>
															<span><i class="fa fa-user fa-sm"></i><?= $post_admin['first_name'].' '.$post_admin['last_name']; ?></span>
															<h5><a href="post-detail.php?id=<?= urlencode($tag_post['id']);?>&post=<?= urlencode($tag_post['post_slug']);?>"><?= $tag_post['title']; ?></a></h5>
															<div class="card-buttons">
															<button class="btn bg-gradient-dark"><a href="edit-post.php?id=<?= urlencode($tag_post['id']);?>&post=<?= urlencode($tag_post['post_slug']);?>"><span class="fa fa-edit fa-sm"></span></a></button>
															<button class="btn bg-gradient-dark" id="del_post_btn" onclick="return delete_post('<?= $tag_post_id; ?>')"><span class="fa fa-trash fa-sm"></span></button>
															<button class="btn bg-gradient-dark add-file-modal" data-toggle="modal" data-target="#modal-form" data-id="<?= $row['id']; ?>"><span class="fa fa-file-code fa-sm"></span></button>
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
												<?php
											}
										}else{
											echo "<h2>No posts have been made under ".$tag."</h2>";
										}
										?>
									</div>
									<button class="btn bg-gradient-dark" id="show_tag_posts_btn_1"><span class="fa fa-arrow-down"></span></button>
									<!-- <button class="btn bg-gradient-dark" id="show_tag_posts_btn_2"><span class="fa fa-arrow-down"></span></button> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include 'assets/includes/footer.php'; ?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="assets/js/sidemenu.js"></script>
	<script type="text/javascript">
		function show_tag(tag_id){
			$.ajax({
				url: 'assets/includes/tag-posts.php',
				method: 'POST',
				data: {
					tag_id: tag_id
				},
				beforeSend: function(){
					$('.tag_show').html('Processing...');
				},
				success:function (data){
					$('.tag_show').html(data);
				}
			})
		}
		function delete_post(post_id){
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover deleted posts",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Yes, delete!",
			cancelButtonText: "No, cancel!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm){
			if (isConfirm) {
				$.ajax({
					url: 'assets/includes/delete-post.php',
					method: 'POST',
					data: {
						post_id: post_id
					},
					success:function(data){
						if (data == "Post deleted successfully. Page will refresh") {
							swal('Info', ''+data, 'info');
							setInterval(refresh, 3000);
						}else{
							swal('Info', ''+data, 'info');
						}

					}
				})
			} else {
					swal("Cancelled", "Post was not deleted", "error");
				}
			
		})
		
	}
	function refresh (){
		window.location.reload();
	}
	var more_posts = 10;
	$('#show_tag_posts_btn_1').click(function(){
		more_posts = more_posts + 10;
		var tag = '<?= $tag; ?>';
		$('.tag_show').load('assets/includes/load-tag-posts.php',{
			more_posts: more_posts,
			tag: tag
		})
	})
	</script>
</body>
</html>