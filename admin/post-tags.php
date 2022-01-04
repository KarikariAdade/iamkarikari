<?php
session_start();
include 'assets/includes/connect.php';
include 'assets/includes/session-redirect.php';
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
									<div class="box-shadow tag-section-div" id="tag-section-div">
										<h2>Post Tags</h2>
										<?php
										$fetch_tags = $conn->query("SELECT * FROM tags ORDER BY id DESC");
										if (mysqli_num_rows($fetch_tags) > 0) {
											while ($tag_row = mysqli_fetch_assoc($fetch_tags)) {
												$tag_id = $tag_row['id'];
												$tag_name = $tag_row['tag_name'];
												?>
												<p><a href="#"><span id="tag_name" onclick="return show_tag('<?= $tag_id;?>')"><?= $tag_row['tag_name']; ?></span></a><i class="fa fa-times fa-sm" onclick="return delete_tag('<?= $tag_id; ?>')"></i></p>
												<?php
											}
										}else{
											echo '<h4>There are no post tags at the moment </h4>';
										}
										?>
									</div>
									<div class="box-shadow tag-section-div">
										<h2>Add Tags Here</h2>
										<div class="alert alert-box alert-dismissible fade show" style="width: 100%;" role="alert">
											<span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message"></span></span>
										</div>
										<form method="POST" class="add-tag-form">
											<div class="form-group">
												<label>Select Category</label>
												<select class="form-control select2 w-100 select2-hidden-accessible" tabindex="-1" id="tag_category">
													<option></option>
													<option>Front-end Development</option>
													<option>Back-end Development</option>
													<option>Tutorials</option>
													<option>Others</option>
												</select>
											</div>
											<div class="form-group">
												<label class="form-label">Tag Name</label>
												<input type="hidden" id="admin_id" value="<?= $admin_id; ?>">
												<input type="text" class="form-control" id="add_tag_name">
											</div>
											<p align="center" style="background-color: #fff;"><button class="btn bg-gradient-dark" id="add_tag_form_btn">Add Tag</button></p>
										</form>
									</div>
								</div>
								<div class="col-md-8">
									<div class="row tag_show" style="margin: 0;">
										<h2>Select Tags to reveal posts</h2>
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
		function delete_tag(tag_id){
			swal({
				title: "Are you sure?",
				text: "You will not be able to recover deleted tags",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, delete!",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {
					$.ajax({
						url: 'assets/includes/delete-tag.php',
						method: 'POST',
						data: {
							tag_id: tag_id
						},
						success:function (data){
							swal('Success', ''+data, 'success');
						}
					})
				} else {
					swal("Cancelled", "Post Tag was not deleted", "error");
				}
			});
			
		}
		function show_tag(tag_id){
			// swal('Info', ''+tag, 'info');
			// $('.tag_show').html(tag);
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
	</script>
</body>
</html>