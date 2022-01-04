<div class="post-author-detail">
	<!-- This script fetches the post author -->
	<h1>Written by...</h1>
	<div class="row">
		<div class="col-md-3">
			<?php if(!empty($post_admin['profile_image'])):?>
			<img src="<?= $profile_image; ?>" alt="Admin Picture">
		<?php endif;?>
			<p><?= $post_admin['first_name'].' '.$post_admin['last_name']; ?></p>
		</div>
		<div class="col-md-9">
			<p><?= $post_admin['description']; ?>
			</p>
			<div class="author-socials">
				<button class="btn"><a href="<?= $post_admin['facebook']; ?>"><span class="fab fa-facebook-f author-icon"></span></a></button>
				<button class="btn"><a href="<?= $post_admin['twitter'];?>"><span class="fab fa-twitter author-icon"></span></a></button>
				<button class="btn"><a href="<?= $post_admin['linkedin'];?>"><span class="fab fa-linkedin author-icon"></span></a></button>
				<button class="btn"><a href="<?= $post_admin['instagram'];?>"><span class="fab fa-instagram author-icon"></span></a></button>
			</div>
		</div>
	</div>
</div>