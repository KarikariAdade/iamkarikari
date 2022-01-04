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
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody class="mail_body">
                                      <?php
                                      $fetch_mail = $conn->query("SELECT * FROM newsletter ORDER BY id DESC");
                                      if (mysqli_num_rows($fetch_mail) > 0) {
                                         while ($row = mysqli_fetch_assoc($fetch_mail)) {
                                            $mail_id = $row['id'];
                                            ?>
                                            <tr>
                                             <td><?= $row['email']; ?></td>
                                             <td><?= date('l F d, Y', strtotime($row['date'])); ?></td>
                                             <td id="table_btn"><button class="btn btn-danger btn-sm" onclick="return mail('<?= $mail_id; ?>');"><span class="fa fa-trash"></span></button></td>
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
<script type="text/javascript">
    function mail(user){
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
                    url: 'assets/includes/mail-del.php',
                    method: 'POST',
                    data: {
                        user: user
                    },
                    success:function(data){
                        swal('Success', ''+data, 'success');
                    }
                })
            }else{
                swal("Cancelled", "Post was not deleted", "error");
            }
        })
    }
</script>
</body>
</html>