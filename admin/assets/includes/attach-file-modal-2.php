	<?php
	include 'connect.php';
	$id = $_GET['id'];
	$fetch_post = $conn->query("SELECT * FROM posts WHERE id = '$id'");
	$post_row = mysqli_fetch_assoc($fetch_post);
	$output = '<div class="modal-header">
	<h2 class="modal-title" id="smallModalLabel">Attach Demo File</h2>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>
	<div class="modal-body attach-file-body">
	<h4 align="center">Attach demo file to the post "'.$post_row["title"].'"</h4>
	<form class="attach-demo-file-form" enctype="multipart/form-data" method="POST">
	<div class="alert alert-box alert-dismissible fade show" id="modal-alert" style="width: 100%;" role="alert">
	<span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message" class="error_message"></span></span>
	</div>
	<div class="form-group mb-3">
	<input type="hidden" value="'.$id.'" name="demo_file_idi" id="demo_file_id">
	<div class="input-group input-group-alternative">
	<input class="form-control" name="demo_file" type="file" id="demo_file">
	</div>
	</div>
	<div class="text-center">
	<button type="button" id="upload_demo_file_btn" class="btn bg-gradient-dark">Upload File</button>
	</div>
	</form>
	</div>
	<div class="modal-footer">
	<button type="button" class="btn bg-gradient-dark" data-dismiss="modal">Close</button>
	<button type="button" data-dismiss="modal" class="btn btn-success">Save changes</button>
	</div>';
	echo $output;
	?>
	<script type="text/javascript">
		$('#upload_demo_file_btn').click(function(e){
			e.preventDefault();
			var form = $('.attach-demo-file-form')[0];
			var data = new FormData(form);
			data.append('data', $('#demo_file_id').val());
			$.ajax({
				url: 'assets/includes/demo-file.php',
				data: data,
				type: 'POST',
				contentType: false,
				async: false,
				processData: false,
				cache: false,
				success:function(data){
					$('#modal-alert').show(400);
					$('.error_message').html(data);
				}
			})
		})
	</script>