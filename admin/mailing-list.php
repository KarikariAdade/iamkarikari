<?php
session_start();
include 'assets/includes/connect.php';
include 'assets/includes/session-redirect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/includes/header.php';?>
	<title>AK Web | Mailing List</title>
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
							<div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                 <th>Email Address</th>
                                 <th>Date Subscribed</th>
                             </tr>
                         </thead>
                         <tbody>
                         	<?php
                         	$fetch_mail = $conn->query("SELECT * FROM newsletter ORDER BY id DESC");
                         	if (mysqli_num_rows($fetch_mail) > 0) {
                         		while ($row = mysqli_fetch_assoc($fetch_mail)) {
                         	?>
                         	<tr>
                         		<td><?= $row['email']; ?></td>
                         		<td><?= date('l F d, Y', strtotime($row['date'])); ?></td>
                         	</tr>
                         	<?php
                         		}
                         	}
                         	?>
                         </tbody>
                     </table>
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