<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
	<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
		<div class="modal-content bg-gradient-info">
			<div class="modal-header">
				<h2 class="modal-title" id="modal-title-notification">Hello <?= $row['first_name']; ?></h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="py-3 text-center">
					<i class="ni ni-bell-55 ni-3x"></i>
					<h4 class="heading mt-4">You should complete your profile!</h4>
					<p>A complete profile helps readers to know more about you. Click this <strong><a href='add-profile.php' style="color: #1a1e25 !important; font-size: 18px !important;">link</a></strong> to complete your profile</p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">I'll do it later</button>
				<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>