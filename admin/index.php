<?php 
session_start();
include 'assets/includes/connect.php';
include 'assets/includes/session-redirect.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'assets/includes/header.php';?>
	<title>Web Blog</title>
</head>
<body class="app sidebar-mini rtl" >
	<div class="page">
		<div class="page-main">
			<!-- Sidebar menu-->
			<?php include 'assets/includes/sidebar.php'; ?>

			<!-- app-content-->
			<div class="app-content ">
				<div class="side-app">
					<div class="main-content">
						<?php include 'assets/includes/top-nav.php';?>

						<!-- Page content -->
						<div class="container-fluid pt-8">
							<?php 
							include 'assets/includes/page-name.php';
							include 'assets/includes/dashboard-stats.php';
							 ?>
							 <?php 
							 include 'assets/includes/footer.php';
							 if (empty($row['occupation']) && empty($row['profile_image'])) {
							 	 include 'assets/includes/notification-modal.php';
							 }
							
							  ?>
						</div>
					</div>
				</div>
			</div>
			<!-- app-content-->
		</div>
	</div>
	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
	<script type="text/javascript" src="assets/js/sidemenu.js"></script>
	<script type="text/javascript">
		$('#modal-notification').modal('toggle');
	</script>

</body>

</html>