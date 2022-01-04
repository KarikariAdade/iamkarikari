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
							<?php 
							include 'assets/includes/page-name.php';?>
							<div class="email-app card shadow">
								<?php include 'assets/includes/mail-sidebar.php'; ?>
								<div class="inbox p-0">
									<?php if(isset($_GET['subject'])): ?>
										<ul class="mail_list list-group list-unstyled">
											<?php
											$mail = $_GET['mail'];
											$conn->query("UPDATE messages SET status = 1 WHERE id = '$mail'");
											$fetch_inbox = $conn->query("SELECT * FROM messages WHERE id = '$mail'") or die(mysqli_error($conn));
											if (mysqli_num_rows($fetch_inbox)) {
												$row = mysqli_fetch_assoc($fetch_inbox);
												$message = wordwrap($row['message'],130);
												$message =explode("\n", $message);
												$message = $message[0]."...";
												$slug_subject = slug($row['subject']);
												$date = date('M d, Y', strtotime($row['received_date']));
												$time = date('H:i', strtotime($row['received_date']));
												?>
												<div class="card-body d-none d-lg-block">
													<div class="row mail-stats">
														<div class="col-md-6">
															<h2><?= $row['full_name']; ?></h2>
															<p><span>From: </span> <?= $row['email'];?></p>
															<p><span>Phone: </span> <?= $row['phone']; ?></p>
														</div>
														<div class="col-md-6">
															<p><?= $date.' at '.$time; ?></p>
															<p><?= (($row['replied'] == 1)?'Message has been replied':'Message has not been replied'); ?></p>
														</div>
													</div>
													<div class="toolbar pt-2 pb-3" align="center">
														<div class="btn-group mt-1 mb-1">
															<button type="button" class="btn btn-sm btn-light" title="Reply"><a href="compose-mail.php?mail=<?= urlencode($mail); ?>&subject=<?= urlencode($_GET['subject']);?>" style="color: #70768e;">
																<span class="fas fa-reply"></span></a>
															</button>
														</div>
														<button type="button" class="mt-1 mb-1 btn btn-sm btn-light" title="Delete" onclick="return del_mail(<?= $mail; ?>)">
															<span class="fas fa-trash"></span>
														</button>
													</div>
													<h1 align="center"><?= $row['subject']; ?></h1>
													<p id="mail-message"><?= nl2br($row['message']); ?></p>
												</div>
												<?php
											}
											?>
										</ul>
									<?php else:?>
										<ul class="mail_list list-group list-unstyled">
											<?php
											$mail = $_GET['mail'];
											$fetch_inbox = $conn->query("SELECT * FROM messages WHERE id = '$mail'") or die(mysqli_error($conn));
											if (mysqli_num_rows($fetch_inbox)) {
												$row = mysqli_fetch_assoc($fetch_inbox);
												$reply_message = wordwrap($row['reply_message'],130);
												$reply_message =explode("\n", $reply_message);
												$reply_message = $reply_message[0]."...";
												$slug_subject = slug($row['subject']);
												$subject = $row['subject'];
												$date = date('M d, Y', strtotime($row['reply_date']));
												$time = date('H:i', strtotime($row['reply_date']));
												?>
												<div class="card-body d-none d-lg-block">
													<div class="row mail-stats">
														<div class="col-md-6">
															<h2><?= $row['full_name']; ?></h2>
															<p><span>Date Sent: </span> <?= $date.' at '.$time; ?></p>
															<?php
															if ($row['replied'] == 1) {
																echo "<p><span>Reply to message: </span><a href='mail-detail.php?mail=".urlencode($row['id'])."&subject=".urlencode($slug_subject)."'> ".$subject."</a></p>";
															}
															?>
														</div>
														<div class="col-md-6">
														</div>
													</div>
													<div class="toolbar pt-2 pb-3" align="center">
														<button type="button" class="mt-1 mb-1 btn btn-sm btn-light" title="Delete" onclick="return del_mail(<?= $mail; ?>)">
															<span class="fas fa-trash"></span>
														</button>
													</div>
													<h1 align="center"><?= $row['reply_subject']; ?></h1>
													<p id="mail-message"><?= nl2br($row['reply_message']); ?></p>
												</div>
												<?php
											}
											?>
										</ul>
									<?php endif;?>
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
		function redirect(){
			window.location = 'mailbox.php';
		}
		function del_mail(mail){
			swal({
				title: "Are you sure?",
				text: "Email will be moved to trash",
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
						url: 'assets/includes/del-mail.php',
						method: 'POST',
						data:{mail:mail},
						success:function(data){
							swal('Success', ''+data, 'success');
							setInterval(redirect, 2000);
						}
					})
				}else{
					swal("Cancelled", "Email was not deleted", "error");
				}
			})
		}
	</script>
</body>
</html>