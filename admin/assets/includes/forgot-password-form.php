<div class="modal fade" id="forgot-password-form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="smallModalLabel" align="center">Enter your email address to verify account</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="fa fa-times"></span>
				</button>
			</div>
			<div class="modal-body" align="center">
				<div class="reset-image-div">
				
			</div>
				<form class="forgot-password-form" method="POST">
					<div class="alert alert-box alert-dismissible fade show" id="modal-alert" role="alert">
						<span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message" class="error_message"></span></span>
					</div>
					<div class="form-group">
					<input type="text" class="form-control" name="reset-email" id="reset-email" required placeholder="Email Address">
				</div>
				<button type="submit" id="reset-password-btn" class="btn btn-style-one" style="padding: 5px 10px;"><span class="txt">Verify Account</span></button>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-style-one"" data-dismiss="modal"><span class="txt">Close</span></button>
		</div>
	</div>
</div>
</div>
