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
							<div class="row">
								<div class="col-md-12">
									<div class="card" style="margin-top: -20px;">
										<div class="table-responsive">
											<table class="table card-table">
												<thead class="thead-light">
													<tr>
														<th>Notification</th>
														<th>Date</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody class="notif-table">
													<?php 
													$fetch_notification = $conn->query("SELECT * FROM newsletter ORDER BY id DESC");
													if (mysqli_num_rows($fetch_notification) > 0) {
														while ($row = mysqli_fetch_assoc($fetch_notification)) {
															$notif_id = $row['id'];
															?>
															<tr>
																<td class="text-sm font-weight-600"><?= $row['email']; ?> signed up to your mailing list</td>
																<td class="text-nowrap"><?= time_ago($row['date']); ?></td>
																<td class=""><button class="btn btn-sm" onclick="return del_notif('<?= $notif_id;?>')"><span class="fa fa-trash"></span></button></td>
															</tr>
															<?php
														}
													}else{
														echo "<h2>There are no notifications at the moment</h2>";
													}
													?>
												</tbody>
											</table>
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
	<script type="text/javascript" src="assets/js/sidemenu.js"></script>
	<script type="text/javascript">
		function del_notif(notif){
			swal({
				title: "Are you sure?",
				text: "Notification will be deleted",
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
						url: 'assets/includes/del-notif.php',
						method: 'POST',
						data:{notif:notif},
						success:function(data){
							swal('Success', ''+data, 'success');
						}
					})
				}else{
					swal("Cancelled", "Notification was not deleted", "error");
				}
			})
		}
	</script>
</body>
</html>