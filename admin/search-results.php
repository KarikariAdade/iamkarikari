<?php
session_start();
include 'assets/includes/connect.php';
include 'assets/includes/session-redirect.php';
include 'assets/includes/slug-function.php';
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
										$fetch_tags = $conn->query("SELECT tag_name FROM posts GROUP BY tag_name ORDER BY COUNT(tag_name) DESC" ) or die(mysqli_error($conn));
										if (mysqli_num_rows($fetch_tags)) {
											while ($tag_row = mysqli_fetch_assoc($fetch_tags)) {
												$tag_slug = slug($tag_row['tag_name']);
												?>
												<p style="margin:5px;"><a href="tag-posts.php?tag=<?= urlencode($tag_slug); ?>"><span id="tag_name"><?= $tag_row['tag_name'];?></span></a></p>
												<?php
											}
										}
										?>
									</div>
									<div class="tag-section-div">
										<h2 style="margin-bottom: 5%;">Most Recent Posts</h2>
										<?php 
										$fetch_recent = $conn->query("SELECT * FROM posts ORDER BY id DESC LIMIT 7");
										while ($recent_row = mysqli_fetch_assoc($fetch_recent)) {
											$profile_image = explode('/', $recent_row['post_image']);
											$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
											?>
											<div class="recent-post">
												<img src="<?= $profile_image; ?>">
												<h3><a href="post-detail.php?id=<?= urlencode($recent_row['id']);?>&post=<?= urlencode($recent_row['post_slug']);?>"><?= $recent_row['title']; ?></a></h3>
											</div>
											<?php
										}
										?>
									</div>
								</div>
								<div class="col-md-8">
									<div class="row">
									<?php
									if (isset($_POST['search_term'])) {
										$search_term = strip_tags(mysqli_real_escape_string($conn, $_POST['search_term']));
										$fetch_term = $conn->query("SELECT * FROM posts WHERE tag_name LIKE '%$search_term%' OR post_category LIKE '%$search_term%' OR title LIKE '%$search_term%' ORDER BY id DESC") or die(mysqli_error($conn));
										if (mysqli_num_rows($fetch_term) > 0) {
											while ($row = mysqli_fetch_assoc($fetch_term)) {
												$post_id = $row['id'];
												$admin_id = $row['admin_id'];
												$post_image = $row['post_image'];
												$profile_image = explode('/', $row['post_image']);
												$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
												$fetch_admin_id = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
												$post_admin = mysqli_fetch_assoc($fetch_admin_id);
									?>
									<div class="col-md-6" style="margin:0;">
													<div class="card">
														<small id="card-tag"><?= $row['tag_name']; ?></small>
														<div class="card-img">
															<img src="<?= $profile_image;?>" class="card-img-top">
														</div>
														<div class="card-body">
															<span><i class="fa fa-clock fa-sm"></i><?= date('M Y', strtotime($row['date'])) ?></span>
															<span><i class="fa fa-user fa-sm"></i><?= $post_admin['first_name'].' '.$post_admin['last_name']; ?></span>
															<h5><a href="post-detail.php?id=<?= urlencode($row['id']);?>&post=<?= urlencode($row['post_slug']);?>"><?= $row['title']; ?></a></h5>
															<div class="card-buttons">
															<button class="btn bg-gradient-dark"><a href="edit-post.php?id=<?= urlencode($row['id']);?>&post=<?= urlencode($row['post_slug']);?>"><span class="fa fa-edit fa-sm"></span></a></button>
																<button class="btn bg-gradient-dark" id="del_post_btn" onclick="return delete_post('<?= $post_id; ?>')"><span class="fa fa-trash fa-sm"></span></button>
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
									echo "<h1 align='center'>No results match your keywords</h1>";
								}
								}else{
									echo "<h1 align='center'>Enter keywords in the search form to get results</h1>";
								}
									?>
									
								</div>
							</div>
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
</script>
</body>
</html>