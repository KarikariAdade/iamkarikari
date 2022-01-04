<?php
session_start();
include 'assets/includes/connect.php';
include 'assets/includes/session-redirect.php';
include 'assets/includes/add-post.php';
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
							<div class="row add-post-section">
								<div class="col-md-4">
									<div class="tag-section-div">
									<h2>Popular Tags</h2>
									<?php
									$fetch_tags = $conn->query("SELECT tag_name FROM posts GROUP BY tag_name ORDER BY COUNT(tag_name) DESC" ) or die(mysqli_error($conn));
									if (mysqli_num_rows($fetch_tags)) {
										while ($row = mysqli_fetch_assoc($fetch_tags)) {
											$tag_slug = slug($row['tag_name']);
											?>
											<p style="margin:5px;"><a href="tag-posts.php?tag=<?= urlencode($tag_slug); ?>"><span onclick="return show_tag('<?= $tag_id;?>')" id="tag_name"><?= $row['tag_name'];?></span></a></p>
											<?php
										}
									}else{
										echo "nothing to display";
									}
									?>
								</div>
								</div>
								<div class="col-md-8 box-shadow">
									<h2 align="center">Create Post</h2>
									<?php 
									if (isset($_POST['create_post_btn'])):
									?>
									<div class="alert alert-box alert-dismissible fade show" style="width: 100%; display: block;" role="alert">
											<span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message"><?= $error_message;?></span></span>
										</div>
									<?php endif; ?>
									<form method="POST" class="row add-post-form" enctype="multipart/form-data">
										<div class="form-group col-md-12">
												<label class="form-label">Post Title</label>
												<input type="hidden" id="admin_id" name="admin_id" value="<?= $admin_id; ?>">
												<input type="text" class="form-control" name="post_title" id="post_title" value="<?= (isset($_POST['post_title'])?$_POST['post_title']:''); ?>">
											</div>
											<div class="form-group col-md-6">
												<label>Select Category</label>
												<select class="form-control select1 w-100 select1-hidden-accessible" tabindex="-1" id="post_category" name="post_category">
													<option><?= (isset($_POST['post_category'])?$_POST['post_category']:''); ?></option>
													<option>Front-end Development</option>
													<option>Back-end Development</option>
													<option>Tutorials</option>
													<option>Others</option>
												</select>
											</div>
											<div class="form-group col-md-6">
											<label>Select Tag</label>
												<select class="form-control select2 w-100 select2-hidden-accessible" tabindex="-1" id="tag_category" name="tag_category">
													<?= (isset($_POST['tag_category'])?'<option selected>'.$_POST['tag_category'].'</option>':''); ?>
												</select>
											</div>
											<div class="form-group col-md-12">
												<label>Content</label>
												<textarea class="summernote" id="post_desc" name="post_desc"><?= (isset($_POST['post_desc'])?$_POST['post_desc']:''); ?></textarea>
											</div>
											<div class="col-md-6 post_img_div box-shadow">
												<img id="post_img_show">
											</div>
											<div class="col-md-6 form-group">
												<input type="file" class="form-control" id="post_image" name="post_image">
											</div>
											<div class="col-md-12" align="center">
												<button class="btn bg-gradient-dark" id="create_post_btn" type="submit" name="create_post_btn">Create Post</button>
											</div>
									</form>
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
	var success = '<?= $success; ?>';
	if (success == true) {
		$('.alert-box').css('background-color', '#18b16f');
	}
</script>
</body>
</html>