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
							<div class="row add-profile-section" id="profile-section">
								<div class="col-md-4">
									<div class="card profile-card">
										<!-- Info here is loaded from add-profile-card -->
									</div>
									<form class="edit-profile-pic-form" align="center">
												<p align="center"><input type="file" name="profile_picture"></p>
												<button class="btn bg-gradient-dark">Upload Picture</button>
											</form>
								</div>
								<div class="col-md-4">
									<div class="personal-form" style="text-align: left !important;">
										<h3>Add Personal Details</h3>
										<div align="center" class="personal-form-alert">
											<div class="alert alert-box alert-dismissible fade show" id="personal-detail-alert" role="alert">
												<span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message"></span></span>
											</div>
										</div>
										<form class="add-personal-form" method="POST">
											<input type="hidden" id="admin_id" value="<?= $admin_id;?>">
											<div class="form-group">
												<label class="form-label">Birthdate</label>
												<input type="date" class="form-control" id="birthdate">
											</div>
											<div class="form-group">
												<label class="form-label">Address</label>
												<input type="text" class="form-control" id="address" placeholder="House / Digital Address">
											</div>
											<div class="form-group">
												<label class="form-label">Occupation</label>
												<input type="text" class="form-control" id="occupation" placeholder="Occupation">
											</div>
											<div class="form-group">
												<label class="form-label">Description</label>
												<textarea class="form-control" rows="10" cols="12" id="description"></textarea>
											</div>
											<button type="submit" class="btn bg-gradient-dark" id="add_personal_form_btn">Update Information</button>
										</form>
									</div>
								</div>
								<div class="col-md-4">
									<div class="personal-form" style="text-align: left !important;">
										<h3>Add Social Links</h3>
										<div align="center" class="personal-form-alert">
											<div class="alert alert-box alert-dismissible fade show" role="alert" id="social-alert-box">
												<span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message"></span></span>
											</div>
										</div>
										<form class="social-form" method="POST">
											<input type="hidden" id="admin_id" value="<?= $admin_id;?>">
											<div class="form-group">
												<label class="form-label">Facebook URL</label>
												<input type="url" class="form-control" id="facebook_link" placeholder="Facebook Profile Link">
											</div>
											<div class="form-group">
												<label class="form-label">Twitter URL</label>
												<input type="url" class="form-control" id="twitter_link" placeholder="Twitter Profile Link">
											</div>
											<div class="form-group">
												<label class="form-label">LinkedIn URL</label>
												<input type="url" class="form-control" id="linkedin_link" placeholder="LinkedIn Profile Link">
											</div>
											<div class="form-group">
												<label class="form-label">Instagram URL</label>
												<input type="url" class="form-control" id="instagram_link" placeholder="Instagram Profile Link">
											</div>
											<button type="submit" class="btn bg-gradient-dark" id="submit_social_form_btn">Update Socials</button>
										</form>
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
	<script type="text/javascript" src="assets/js/sidemenu.js"></script>
	<script type="text/javascript">
		setInterval(load_profile, 1000);
		function load_profile(){
			var admin_id = '<?= $admin_id; ?>';
		$('.profile-card').load('assets/includes/add-profile-card.php', {
			admin_id: admin_id
		})
		}
		
	</script>
</body>
</html>