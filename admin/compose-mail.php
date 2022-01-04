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
							<div class="email-app card shadow">
								<?php include 'assets/includes/mail-sidebar.php'; ?>
							<div class="inbox card-body pt-4 pl-3">
								<?php
								if (isset($_GET['mail']) && isset($_GET['subject'])):?>
								<?php
									$mail_id = $_GET['mail'];
									$fetch_mail = $conn->query("SELECT * FROM messages WHERE id = '$mail_id'");
									$row = mysqli_fetch_assoc($fetch_mail);
								?>
									<form method="POST" class="compose-mail-form">
										<div class="form-row mb-4">
											<input type="hidden" id="mail_id" value="<?= (isset($_GET['mail'])?$_GET['mail']:''); ?>">
											<label for="to" class="col-3 col-sm-2 col-md-3 col-lg-2 col-form-label">To:</label>
											<div class="col-9 col-sm-10 col-md-9 col-lg-10">
												<input type="email" class="form-control" id="to" value="<?= $row['email']; ?>">
											</div>
										</div>
										<div class="form-row mb-4">
											<label for="Subject" class="col-3 col-sm-2 col-md-3 col-lg-2 col-form-label">Subject</label>
											<div class="col-9 col-sm-10 col-md-9 col-lg-10">
												<input type="text" class="form-control" id="subject" placeholder="Type Subject">
											</div>
										</div>
										<div class="form-row mb-4">
											<label for="Subject" class="col-3 col-sm-2 col-md-3 col-lg-2 col-form-label">Message</label>
											<div class="col-9 col-sm-10 col-md-9 col-lg-10">
												<textarea class="form-control" id="message" rows="12" placeholder="Click here to reply"></textarea>
											</div>
										</div>
										<p align="center"><button class="btn bg-gradient-dark send_mail_btn">Send Message</button></p>
									</form>
								<?php else:?>
									<form method="POST" class="compose-mail-form">
										<div class="form-row mb-4">
											<label for="to" class="col-3 col-sm-2 col-md-3 col-lg-2 col-form-label">To:</label>
											<input type="hidden" id="mail_id" value="<?= (isset($_GET['mail'])?$_GET['mail']:''); ?>">
											<div class="col-9 col-sm-10 col-md-9 col-lg-10">
												<input type="email" class="form-control" id="to" placeholder="Type email" value="">
											</div>
										</div>
										<div class="form-row mb-4">
											<label for="Subject" class="col-3 col-sm-2 col-md-3 col-lg-2 col-form-label">Subject</label>
											<div class="col-9 col-sm-10 col-md-9 col-lg-10">
												<input type="text" class="form-control" id="subject" placeholder="Type Subject">
											</div>
										</div>
										<div class="form-row mb-4">
											<label for="Subject" class="col-3 col-sm-2 col-md-3 col-lg-2 col-form-label">Message</label>
											<div class="col-9 col-sm-10 col-md-9 col-lg-10">
												<textarea class="form-control" id="message" name="body" rows="12" placeholder="Click here to reply"></textarea>
											</div>
										</div>
										<p align="center"><button class="btn bg-gradient-dark send_mail_btn">Send Message</button></p>
									</form>
								<?php endif;?>
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