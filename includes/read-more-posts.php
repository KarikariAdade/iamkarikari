<div>

	<!-- This script fetches post based on views (most popular) -->
	<h1 id="read_also">Read also...</h1>
	<?php
	$fetch_detail = $conn->query("SELECT * FROM posts ORDER BY views DESC LIMIT 3");
	if (mysqli_num_rows($fetch_detail) > 0) {
		while($detail = mysqli_fetch_assoc($fetch_detail)){

			$admin_id = $detail['admin_id'];
			if (!empty($detail['post_image'])) {
				$post_image = explode('/', $detail['post_image']);
				$post_image = '../'.$post_image[4].'/'.$post_image[5].'/'.$post_image[6].'/'.$post_image[7].'/'.$post_image[8];
			}
			$post_desc = wordwrap($detail['post_desc'],300);
			$post_desc =explode("\n", $post_desc);
			$post_desc = $post_desc[0]."...";
			$slug = $detail['post_slug'];
			$fetch_admin_id = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
			$post_admin = mysqli_fetch_assoc($fetch_admin_id);
			if (!empty($post_admin['profile_image'])) {
				$profile_image = explode('/', $post_admin['profile_image']);
				$profile_image = '../'.$profile_image[4].'/'.$profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
				?>
				<div class="more-posts-container">
					<h3><?= $detail['title']; ?></h3>
					<div class="more-posts-stats">
						<img src="<?= $profile_image; ?>" class="">
						<span>Karikari Adade</span>
						<span><i class="fa fa-comment-dots"></i>0 Comments</span>
					</div>
					<p<?= $post_desc;?></p>
					<p><a href="<?= urlencode($slug); ?>">Read More <span class="fa fa-arrow-circle-right"></span></a></p>
					<p id="post-bg-img"><img src="<?= $post_image; ?>" alt="Post Image"></p>
				</div>
				<?php }}}?>
			</div>
