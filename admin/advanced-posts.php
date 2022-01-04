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
							<?php include 'assets/includes/page-name.php';?>
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
										<div class="form-group">
											<select class="form-control" style="border-radius: 50px;">
												<option style="border-radius: 50px;">web development</option>
											</select>
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
</body>
</html>