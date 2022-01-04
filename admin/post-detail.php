<?php
session_start();
include 'assets/includes/connect.php';
include 'assets/includes/session-redirect.php';
include 'assets/includes/slug-function.php';
if (!isset($_GET['id']) || !isset($_GET['post'])) {
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

								<!-- POST SIDEBAR -->
								<div class="col-md-4">
									<div class="tag-section-div">
										<h2>Popular Tags</h2>
										<?php
										$fetch_tags = $conn->query("SELECT tag_name FROM posts GROUP BY tag_name ORDER BY COUNT(tag_name) DESC" ) or die(mysqli_error($conn));
										if (mysqli_num_rows($fetch_tags)) {
											while ($row = mysqli_fetch_assoc($fetch_tags)) {
												$tag_slug = slug($row['tag_name']);
												?>
												<p style="margin:5px;"><a href="tag-posts.php?tag=<?= urlencode($tag_slug); ?>"><span id="tag_name"><?= $row['tag_name'];?></span></a></p>
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

								<!-- POST DETAIL -->

								<div class="col-md-8">
									<?php
									$id = $_GET['id'];
									$post = $_GET['post'];
									$fetch_post_detail = $conn->query("SELECT * FROM posts WHERE id = '$id' AND post_slug = '$post'");
									if (mysqli_num_rows($fetch_post_detail) > 0) {
										while ($post_row = mysqli_fetch_assoc($fetch_post_detail)) {
											if(!empty($post_row['demo_file'])){
												$demo_file = explode('/', $post_row['demo_file']);
											$demo_file = $demo_file[5].'/'.$demo_file[6].'/'.$demo_file[7].'/'.$demo_file[8];
											}
											$profile_image = explode('/', $post_row['post_image']);
											$post_id = $post_row['id'];
											$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
											$post_admin_id = $post_row['admin_id'];
											$fetch_post_admin = $conn->query("SELECT first_name, last_name FROM admin WHERE id ='$post_admin_id'");
											$admin = mysqli_fetch_assoc($fetch_post_admin);
											$admin_name = $admin['first_name'].' '.$admin['last_name'];
											?>
											<div class="post-detail-div">
												<img src="<?= $profile_image; ?>" class="box-shadow">
												<div class="post-detail-stats">
													<span><i class="fa fa-user fa-sm"></i><?= $admin_name; ?></span>
													<span><i class="fa fa-clock fa-sm"></i><?= date('F d, Y', strtotime($post_row['date'])); ?></span>
													<span><i class="fa fa-tags fa-sm"></i><?= $post_row['post_category']; ?></span>
													<span><i class="fa fa-tag fa-sm"></i><?= $post_row['tag_name']; ?></span>
												</div>
												<h1 id="post_title"><?= $post_row['title']; ?></h1>
												<p><?= nl2br($post_row['post_desc']); ?></p>
												<?php if (!empty($post_row['demo_file'])):?>
												<p align="right"><button class="btn bg-gradient-dark"><a href="<?= $demo_file; ?>">Download Demo File</a></button></p>
											<?php endif;?>
												<div class="next-prev-posts">
													<?php
													$previous_sql = $conn->query("SELECT * FROM posts WHERE id < '$post_id' ORDER BY id DESC LIMIT 1"); 
													if (mysqli_num_rows($previous_sql)) {
														while ($previous_row = mysqli_fetch_assoc($previous_sql)) {
															$previous_post_title = $previous_row['title'];
															$previous_image = explode('/', $previous_row['post_image']);
															$previous_image = $previous_image[5].'/'.$previous_image[6].'/'.$previous_image[7].'/'.$previous_image[8];
															?>
															<div class="prev-post box-shadow">
																<h5>Previous Post</h5>
																<img src="<?= $previous_image; ?>">
																<h4><a href="post-detail.php?id=<?= urlencode($previous_row['id']);?>&post=<?= urlencode($previous_row['post_slug']);?>"><?= $previous_post_title; ?></a></h4>
															</div>
															<?php }}?>
															<?php
															$next_sql = $conn->query("SELECT * FROM posts WHERE id > '$post_id' ORDER BY id ASC LIMIT 1"); 
															if (mysqli_num_rows($next_sql)) {
																while ($next_row = mysqli_fetch_assoc($next_sql)) {
																	$next_post_title = $next_row['title'];
																	$next_image = explode('/', $next_row['post_image']);
																	$next_image = $next_image[5].'/'.$next_image[6].'/'.$next_image[7].'/'.$next_image[8];
																	?>
																	<div class="next-post box-shadow">
																		<h5>Next Post</h5>
																		<img src="<?= $next_image; ?>">
																		<h4><a href="post-detail.php?id=<?= urlencode($next_row['id']);?>&post=<?= urlencode($next_row['post_slug']);?>"><?= $next_post_title; ?></a></h4>
																	</div>
																	<?php }}?>
																</div>
															</div>
															<?php
														}
													}else{
														echo "<script>window.location = 'view-posts.php';</script>";
													}
													?> 
													
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
				</body>
				</html>