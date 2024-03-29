<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Web Blog - Post Detail</title>
	<?php include 'includes/header.php';?>
</head>
<body>
	<div class="page-wrapper">
		<?php include 'includes/navbar.php';?>
		<div class="container post-intro-container">
			<div class="row post-detail-row">
				<div class="col-md-8">
				<?php
				include 'includes/post-detail-text.php';
				
				include 'includes/post-author.php';
				include 'includes/read-more-posts.php'; 
				?>
			</div>
			<?php include 'includes/post-sidebar.php';?>
			</div>
		</div>
		<?php include 'includes/footer.php'; ?>
	</div>
	<script src="js/script.js"></script>
	
</body>
</html>