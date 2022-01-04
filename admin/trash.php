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
									<ul class="mail_list list-group list-unstyled">
										<?php
										$fetch_inbox = $conn->query("SELECT * FROM messages WHERE trashed = 1") or die(mysqli_error($conn));
										if (mysqli_num_rows($fetch_inbox)) {
											while ($row = mysqli_fetch_assoc($fetch_inbox)) {
												$mail_id = $row['id'];
												$reply_message = wordwrap($row['reply_message'],130);
												$reply_message =explode("\n", $reply_message);
												$reply_message = $reply_message[0]."...";
												$message = wordwrap($row['message'],130);
												$message =explode("\n", $message);
												$message = $message[0]."...";
												$slug_subject = slug($row['reply_subject']);
												$reply_date = date('M d, Y', strtotime($row['reply_date']));
												$reply_time = date('H:i', strtotime($row['reply_date']));
												$date = date('M d, Y', strtotime($row['received_date']));
												$time = date('H:i', strtotime($row['received_date']));
												?>
												<li class="list-group-item load-trash">
													<div class="media">
														<div class="pull-left" style="margin-right: 20px;">
															<div class="controls">
																<button class="btn btn-danger btn-sm" onclick="return del_mail(<?= $mail_id; ?>)"><span class="fa fa-trash fa-sm"></span></button>
																<button class="btn btn-primary btn-sm" onclick="return recycle(<?= $mail_id; ?>)"><span class="fa fa-recycle fa-sm"></span></button>
															</div>
														</div>
														<div class="media-body">
															<div class="media-heading">
																<?php if(!empty($row['subject'])):?>
																	<a href="mail-detail.php?mail=<?= urlencode($row['id']); ?>&subject=<?= urlencode($slug_subject); ?>" class="mr-2"><?= $row['subject']; ?></a>
																	<?= (($row['status'] == 0)?'<span class="badge bg-gradient-dark text-white">Unread</span>':'<span class="badge bg-success text-white">Read</span>');?>
																	<small class="float-right text-muted"><time class="hidden-sm-down"></time><i class="zmdi zmdi-attachment-alt ml-2"></i> <?= $date.' at '.$time; ?></small>
																	<p class="msg"><?= $message; ?></p>
																<?php else:?>
																	<a href="mail-detail.php?mail=<?= urlencode($row['id']); ?>&outbox=<?= urlencode($slug_subject); ?>" class="mr-2"><?= $row['reply_subject']; ?></a>
																	<?= (($row['status'] == 0)?'<span class="badge bg-gradient-dark text-white">Unread</span>':'<span class="badge bg-success text-white">Read</span>');?>
																	<small class="float-right text-muted"><time class="hidden-sm-down"></time><i class="zmdi zmdi-attachment-alt ml-2"></i> <?= $reply_date.' at '.$reply_time; ?></small>
																	<p class="msg"><?= $reply_message; ?></p>
																<?php endif;?>

															</div>
															
														</div>
													</div>
												</li>
												<?php
											}
										}else{
											echo "<h2 align='center' class='pt-3'>Trash is empty</h2>";
										}
										?>
									</ul>
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
			window.location.reload();
		}
		function del_mail(mail){
			swal({
				title: "Are you sure?",
				text: "Email will be deleted permanently",
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
						url: 'assets/includes/del-message.php',
						method: 'POST',
						data:{mail:mail},
						success:function(data){
							swal('Success', ''+data, 'success');
							setInterval(redirect, 2000);
						}
					})
				}else{
					swal("Cancelled", "Mail was not deleted", "error");
				}
			})
		}
	</script>
</body>
</html>