<?php
session_start();
include 'assets/includes/connect.php';
include 'assets/includes/session-redirect.php';
include 'assets/includes/edit-post.php';
if (!isset($_GET['id']) || !isset($_GET['post']) || empty($_GET['id']) || empty($_GET['post'])) {
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
							<?php include 'assets/includes/page-name.php';?>
							<div class="row add-post-section">
								<?php 
								$id = $_GET['id'];
								$post = $_GET['post'];
								$fetch_post = $conn->query("SELECT * FROM posts WHERE post_slug = '$post' AND id = '$id'") or die(mysqli_error($conn));
								if (mysqli_num_rows($fetch_post) > 0) {
									$row = mysqli_fetch_assoc($fetch_post);
								if (!empty($row['demo_file'])) {
									$demo_file = explode('/', $row['demo_file']);
								$demo_file = $demo_file[5].'/'.$demo_file[6].'/'.$demo_file[7].'/'.$demo_file[8];
								}
								if (!empty($row['post_image'])) {
									$post_image = explode('/', $row['post_image']);
								$post_image = $post_image[5].'/'.$post_image[6].'/'.$post_image[7].'/'.$post_image[8];
								}
								}else{
									echo "<script>window.location = 'view-posts.php';</script>";
								}
								
								?>
								<div class="col-md-4 edit_post_col_4">
									<?php if(!empty($row['post_image'])):?>
										<div class="tag-section-div box-shadow">
											<h2>Post Image</h2>
											<img src="<?= $post_image; ?>" class="img-fluid">
											<button id="edit_del_img_btn" class="bg-gradient-white btn"onclick="return delete_image('<?= $id;?>')"><span class="fa fa-trash"></span></button>
										</div>
									<?php endif;?>
									<?php if(!empty($row['demo_file'])):?>
										<div class="tag-section-div box-shadow">
											<h2>Post Demo File</h2>
											<p style="background-color: #fff;"><button class="btn bg-gradient-dark"><a href="<?= $demo_file; ?>">Download Demo File</a></button></p>
											<p style="background-color: #fff;"><button class="btn bg-gradient-dark" onclick="return delete_file('<?= $id;?>')">Delete Demo File</button></p>
										</div>
									<?php endif;?>
								</div>
								<div class="col-md-8 box-shadow">
									<?php 
									if (isset($_POST['update_post_btn'])):
									?>
									<div class="alert alert-box alert-dismissible fade show" style="width: 100%; display: block;" role="alert">
											<span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message"><?= $error_message;?></span></span>
										</div>
									<?php endif; ?>
									<form method="POST" class="row add-post-form" enctype="multipart/form-data">
										<div class="form-group col-md-12">
											<label class="form-label">Post Title</label>
											<input type="hidden" id="post_id" name="post_id" value="<?= $row['id']; ?>">
											<input type="text" class="form-control" name="post_title" id="post_title" value="<?= (isset($_POST['post_title'])?$_POST['post_title']:$row["title"]); ?>">
										</div>
										<div class="form-group col-md-6">
											<label>Select Category</label>
											<select class="form-control select1 w-100 select1-hidden-accessible" tabindex="-1" id="post_category" name="post_category">
												<option><?= (isset($_POST['post_category'])?$_POST['post_category']:$row['post_category']); ?></option>
												<option>Front-end Development</option>
												<option>Back-end Development</option>
												<option>Tutorials</option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label>Select Tag</label>
											<select class="form-control select2 w-100 select2-hidden-accessible" tabindex="-1" id="tag_category" name="tag_category">
												<?= (isset($_POST['tag_category'])?'<option selected>'.$_POST['tag_category'].'</option>':'<option selected>'.$row['tag_name'].'</option>'); ?>
											</select>
										</div>
										<div class="form-group col-md-12">
											<label>Content</label>
											<textarea class="summernote" id="post_desc" name="post_desc"><?= $row['post_desc']; ?></textarea>
										</div>
										<div class="col-md-6 post_img_div box-shadow">
											<img id="post_img_show">
										</div>
										<div class="col-md-6 form-group">
											<input type="file" class="form-control" id="post_image" name="post_image">
										</div>
										<div class="col-md-12" align="center">
											<button class="btn bg-gradient-dark" id="create_post_btn" type="submit" name="update_post_btn">Create Post</button>
										</div>
									</form>
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
		function delete_file (file_id){
			$.ajax({
				url:'assets/includes/delete-demo-file.php',
				method: 'POST',
				data:{
					file_id: file_id
				},
				success:function(data){
					if (data == "Demo file deleted successfully. Page will reload.") {
						swal('Info', ''+data, 'info');
						setInterval(reload, 3000);
					}
					swal('Info', ''+data, 'info');
					
				}
			})
		}
		function delete_image(image_id){
			$.ajax({
				url:'assets/includes/delete-post-image.php',
				method: 'POST',
				data:{
					image_id: image_id
				},
				success:function(data){
					if (data == "Image file deleted successfully. Page will reload.") {
						swal('Info', ''+data, 'info');
						setInterval(reload, 3000);
					}
					swal('Info', ''+data, 'info');
				}
			})
		}
		var success = '<?= $success; ?>';
	if (success == true) {
		$('.alert-box').css('background-color', '#18b16f');
	}
	function reload(){
		window.location.reload();
	}
	</script>
</body>
</html>