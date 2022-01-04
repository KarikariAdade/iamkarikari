<?php
//Fetch Statistics

//fetch admins
$fetch_admins = $conn->query("SELECT * FROM admin");
$fetch_admins_count = mysqli_num_rows($fetch_admins);

//fetch posts
$fetch_posts = $conn->query("SELECT * FROM posts");
$fetch_posts_count = mysqli_num_rows($fetch_posts);

$fetch_tags = $conn->query("SELECT * FROM tags");
$fetch_tags_count = mysqli_num_rows($fetch_tags);

$fetch_mail_list = $conn->query("SELECT * FROM newsletter");
$fetch_mail_list_count = mysqli_num_rows($fetch_mail_list);
?>
<div class="card shadow overflow-hidden">
	<div class="dashboard-stats">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
				<div class="text-center">
					<p class="text-light">
						<i class="fas fa-newspaper mr-2"></i>
						Total Subscribers
					</p>
					<h2 class="text-primary text-xxl"><?= $fetch_mail_list_count; ?></h2>
					<a href="#" class="btn btn-outline-primary btn-pill btn-sm">Total Subscribers</a>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
				<div class="text-center">
					<p class="text-light">
						<i class="fas fa-users mr-2"></i>
						Admin Users
					</p>
					<h2 class="text-yellow text-xxl"><?= $fetch_admins_count;?></h2>
					<a href="#" class="btn btn-outline-yellow btn-pill btn-sm">Total Users</a>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
				<div class="text-center">
					<p class="text-light">
						<i class="fas fa-tags mr-2"></i>
						Total Tags
					</p>
					<h2 class="text-warning text-xxl"><?= $fetch_tags_count; ?></h2>
					<a href="tag-posts.php" class="btn btn-outline-warning btn-pill btn-sm">Total Post Tags</a>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
				<div class="text-center">
					<p class="text-light">
						<i class="fas fa-clipboard-list mr-2"></i>
						Total Posts
					</p>
					<h2 class="text-danger text-xxl"><?= $fetch_posts_count; ?></h2>
					<a href="view-posts.php" class="btn btn-outline-danger btn-pill btn-sm">Total Posts</a>
				</div>
			</div>
			<!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
				<div class="text-center">
					<p class="text-light">
						<i class="fas fa-dollar-sign mr-2"></i>
						Total Subscribers
					</p>
					<h2 class="text-success text-xxl">$ 30</h2>
					<a href="#" class="btn btn-outline-success btn-pill btn-sm">5% increase</a>
				</div>
			</div> -->
			<!-- <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 stats">
				<div class="text-center">
					<p class="text-light">
						<i class="fas fa-briefcase mr-2"></i>
						Last Login
					</p>
					<h2 class="text-primary text-xxl">14/</h2>
					<a href="#" class="btn btn-outline-primary btn-pill btn-sm">View</a>
				</div>
			</div> -->
		</div>
	</div>
</div>