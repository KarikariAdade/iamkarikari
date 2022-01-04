<div class="col-md-4 blog-sidebar">
	<h3>SEARCH</h3>
	<form id="sidebar-search-form" method="POST" action="../search">
		<div class="form-group" style="position: relative;">
			<input type="text" class="form-control" name="search-input" placeholder="Type keywords and press enter...">
			<!-- <button class="btn btn-sm"><span class="fa fa-search fa-lg"></span></button> -->
		</div>
	</form>
	<h3>BROWSE BY CATEGORY</h3>
	<?php

	//Display Tags
	$fetch_post_tags = $conn->query("SELECT * FROM tags ORDER BY id DESC");
	while ($tag_row = mysqli_fetch_assoc($fetch_post_tags)) {
		$tag = $tag_row['tag_slug'];
		?>
		<p><a href="../tags/<?= urlencode($tag); ?>"><span><?= $tag_row['tag_name'];?></span></a></p>
		<?php }?>
		<div class="sidebar-suggests">
			<h3>SUGGESTED POSTS</h3>
			<?php

			// Display Most resent Posts

			$fetch_posts = $conn->query("SELECT * FROM posts ORDER BY id DESC LIMIT 8");
			while ($post_row = mysqli_fetch_assoc($fetch_posts)) {
				if (!empty($post_row['post_image'])) {
					$post_image = explode('/', $post_row['post_image']);
					$post_image = '../'.$post_image[4].'/'.$post_image[5].'/'.$post_image[6].'/'.$post_image[7].'/'.$post_image[8];
				}
				$admin_id = $post_row['admin_id'];
				$slug = $post_row['post_slug'];
				$fetch_admin_id = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
				$post_admin = mysqli_fetch_assoc($fetch_admin_id);

				?>
				<div class="suggest-post">
					<img src="<?= $post_image; ?>" class="img-fluid" alt="Post Image">
					<p><a href="<?= urlencode($slug); ?>"><?= $post_row['title'];?></a><br>
						<small><span class="fa fa-user"></span> <?= $post_admin['first_name'].' '.$post_admin['last_name'];?></small></p>
					</div>
					<?php
				}
				?>

			</div><br><br>
			<div class="sidebar-suggests">
				<h3>POPULAR POSTS</h3>
				<?php

				//Display most viewed posts
				$fetch_posts = $conn->query("SELECT * FROM posts ORDER BY views DESC LIMIT 8");
				while ($post_row = mysqli_fetch_assoc($fetch_posts)) {
					if (!empty($post_row['post_image'])) {
						$post_image = explode('/', $post_row['post_image']);
						$post_image = '../'.$post_image[4].'/'.$post_image[5].'/'.$post_image[6].'/'.$post_image[7].'/'.$post_image[8];
					}
					$admin_id = $post_row['admin_id'];
					$slug = $post_row['post_slug'];
					$fetch_admin_id = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
					$post_admin = mysqli_fetch_assoc($fetch_admin_id);

					?>
					<div class="suggest-post">
						<img src="<?= $post_image; ?>" class="img-fluid" alt="Post Image">
						<p><a href="<?= urlencode($slug); ?>"><?= $post_row['title'];?></a><br>
							<small><span class="fa fa-user"></span> <?= $post_admin['first_name'].' '.$post_admin['last_name'];?></small></p>
						</div>
						<?php
					}
					?>

				</div>

			</div>