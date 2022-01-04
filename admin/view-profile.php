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
							<div class="row add-profile-section">
								<div class="col-md-4" id="profile-card-overall">
								</div>
								<div class="col-md-8">
									<div class="card box-shadow">
										<div class="card-header">
											<h2 class="mb-0">More about <?= $row['first_name'].' '.$row['last_name'];?></h2>
										</div>
										<style type="text/css">
											.card .card-body span:first-child{
	padding-right: 0%;
}
										</style>
										<div class="card-body">
											<ul class="nav nav-pills nav-pills-circle" id="tabs_2" role="tablist">
												<li class="nav-item">
													<a class="nav-link rounded-circle active border" id="home-tab" data-toggle="tab" href="#tabs_2_1" role="tab" aria-selected="true">
														<span class="nav-link-icon d-block"><i class="fa fa-cogs"></i></span>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link border" id="profile-tab" data-toggle="tab" href="#tabs_2_2" role="tab" aria-selected="false">
														<span class="nav-link-icon d-block"><i class="fa fa-lock"></i></span>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link border" id="contact-tab" data-toggle="tab" href="#tabs_2_3" role="tab" aria-selected="false">
														<span class="nav-link-icon d-block"><i class="fa fa-camera-retro"></i></span>
													</a>
												</li>
											</ul>
											<div class="card shadow mb-0 mt-3">
												<div class="card-body ">
													<div class="tab-content" id="myTabContent2">
														<div class="tab-pane fade show active" id="tabs_2_1" role="tabpanel" aria-labelledby="home-tab">
															<div class="alert alert-box alert-dismissible fade show" style="width: 100%;" role="alert">
																<span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message"></span></span>
															</div>
															<form class="row edit-profile-form">
																<input type="hidden" id="admin_id" value="<?= $admin_id; ?>">
																<div class="form-group col-md-6">
																	<label class="form-label">First Name *</label>
																	<input type="text" class="form-control" id="first_name" value="<?= (!empty($row['first_name'])?$row['first_name']:''); ?>">
																</div>
																<div class="form-group col-md-6">
																	<label class="form-label">Last Name *</label>
																	<input type="text" class="form-control" id="last_name" value="<?= (!empty($row['last_name'])?$row['last_name']:''); ?>">
																</div>
																<div class="form-group col-md-6">
																	<label class="form-label">Birthdate *</label>
																	<input type="date" class="form-control" id="birthdate" value="<?= (!empty($row['birthdate'])?$row['birthdate']:''); ?>">
																</div>
																<div class="form-group col-md-6">
																	<label class="form-label">Email Address *</label>
																	<input type="email" class="form-control" id="email" value="<?= (!empty($row['email'])?$row['email']:''); ?>">
																</div>
																<div class="form-group col-md-6">
																	<label class="form-label">House/Digital Address *</label>
																	<input type="text" class="form-control" id="address" value="<?= (!empty($row['address'])?$row['address']:''); ?>">
																</div>
																<div class="form-group col-md-6">
																	<label class="form-label">Occupation *</label>
																	<input type="text" class="form-control" id="occupation" value="<?= (!empty($row['occupation'])?$row['occupation']:''); ?>">
																</div>
																<div class="col-md-12" align="center">
																	<h2>Socials</h2>
																</div>
																<div class="form-group col-md-6">
																	<label class="form-label">Facebook URL</label>
																	<input type="url" class="form-control" id="facebook_link" value="<?= (!empty($row['facebook'])?$row['facebook']:''); ?>">
																</div>
																<div class="form-group col-md-6">
																	<label class="form-label">Twitter URL</label>
																	<input type="url" class="form-control" id="twitter_link" value="<?= (!empty($row['twitter'])?$row['twitter']:''); ?>">
																</div>
																<div class="form-group col-md-6">
																	<label class="form-label">LinkedIn URL</label>
																	<input type="url" class="form-control" id="linkedin_link" placeholder="LinkedIn Profile Link" value="<?= (!empty($row['linkedin'])?$row['linkedin']:''); ?>">
																</div>
																<div class="form-group col-md-6">
																	<label class="form-label">Instagram URL</label>
																	<input type="url" class="form-control" id="instagram_link" value="<?= (!empty($row['instagram'])?$row['instagram']:''); ?>">
																</div>
																<div class="form-group col-md-12">
																	<label class="form-label">Description</label>
																	<textarea class="form-control" rows="10" id="description"><?= (!empty($row['description'])?$row['description']:''); ?>"</textarea>
																	<p align="center"><button class="btn bg-gradient-dark" id="update_profile_btn">Update Profile</button></p>
																</div>
															</form>
														</div>
														<div class="tab-pane fade" id="tabs_2_2" role="tabpanel" aria-labelledby="profile-tab">
															<form class="reset-password-form" method="POST">
																<div align="center" class="personal-form-alert">
																	<div class="alert alert-box alert-dismissible fade show" role="alert" id="social-alert-box">
																		<span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message"></span></span>
																	</div>
																</div>
																<input type="hidden" id="admin_id" value="<?= $admin_id; ?>">
																<div class="form-group">
																	<label>Current Password</label>
																	<input type="password" class="form-control" id="old_password">
																</div>
																<div class="form-group">
																	<label>New Password</label>
																	<input type="password" class="form-control" id="new_password">
																	<p id="hasbtn"><span class="fa fa-eye password-icon" onclick="return HOS()"></span></p>
																</div>
																<div class="form-group">
																	<label>Confirm New Password</label>
																	<input type="password" class="form-control" id="confirm_password">
																</div>
																<button class="btn bg-gradient-dark" id="confirm_password_btn">Reset Password</button>
															</form>
														</div>
														<div class="tab-pane fade" id="tabs_2_3" role="tabpanel" aria-labelledby="contact-tab">
															<p align="center"><img id="upload_img" class="box-shadow"></p>
															<form class="edit-profile-pic-form" align="center">
																<p align="center"><input type="file" id="profile_picture" name="profile_picture"></p>
																<button class="btn bg-gradient-dark">Upload Picture</button>
															</form>
															<h2 align="center" id="profile-pictures-h2">Profile Pictures</h2>
															<div class="row profile-pic-rows">
																<?php
																$fetch_profile_pics = $conn->query("SELECT * FROM admin_pictures WHERE admin_id = '$admin_id'");
																if (mysqli_num_rows($fetch_profile_pics) > 0) {
																	while ($pic_row = mysqli_fetch_assoc($fetch_profile_pics)){
																	$profile_image = explode('/', $pic_row['profile_image']);
		$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
		$picture_id = $pic_row['id'];
																?>
																<div class="col-lg-4 hover15">
																	<div class="image-detail">
																		<p><button class="btn del_picture_btn" onclick="return delete_picture_function('<?= $picture_id; ?>')"><span class="fa fa-trash"></span></button>
																		</p>
																		<button class="btn make_profile_pic" onclick="return change_picture('<?= $picture_id; ?>')">Make Profile Picture</button>
																		
																	</div>
									<div class="card shadow overflow-hidden">
										<a href="assets/img/profile.jpg"><img src="<?= $profile_image; ?>" alt="" title="Beautiful Image" style="width: 100%; height: 40vh;" class="img-fluid">
										</a>
									</div>
								</div>
								<?php
							}
						}
								?>

															</div>
														</div>
													</div>
												</div>
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
	</div>
</div>
</div>
<script type="text/javascript" src="assets/js/sidemenu.js"></script>
<script type="text/javascript">
	setInterval(load_profile, 100);
	function load_profile(){
		var admin_id = '<?= $admin_id; ?>';
		$('#profile-card-overall').load('assets/includes/view-profile-card.php', {
			admin_id: admin_id
		})
	}
	var password = $('#new_password');
	var password_icon =$('.password-icon');
	var checked = false;
	$('#hasbtn').click(function(){
		if ($('.password-icon').toggleClass("fa fa-eye-slash")) {
			$('.password-icon').addClass("fa fa-eye");
		}
	})
	function HOS() {
		if (checked === false) {
			password.attr("type", "text");
			checked = true;
		} else if (checked === true) {
			password.attr("type", "password");
			checked = false;
		}
	}
	//Delete profile picture
	function delete_picture_function(id){
		$.ajax({
			url: 'assets/includes/delete-profile-pic.php',
			method: 'POST',
			data:{
				id: id
			},
			success:function(data){
				swal('Info', ''+data, 'info');
			}
		})
	}
	function change_picture(id){
		$.ajax({
			url: 'assets/includes/change-profile-pic.php',
			method: 'POST',
			data:{
				id: id
			},
			success: function (data){
				swal('Info', ''+data, 'info');
			}
		})
	}

</script>
</body>
</html>