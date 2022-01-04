<?php
	//Fetch admin profile using section
$fetch_admin = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
$row = mysqli_fetch_assoc($fetch_admin);
$profile_image = explode('/', $row['profile_image']);
		$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
?>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar ">
	<div class="sidebar-img">
		<img src="assets/img/left-bg2.png">
		<!-- <a class="navbar-brand" href="#"><img alt="..." class="navbar-brand-img main-logo" src="assets/img/brand/icon1.png"> <img alt="..." class="navbar-brand-img logo" src="assets/img/brand/icon1.png"></a> -->
	</div>
	<div>
		<h1 id="hour_minute"></h1>
		<h4 id="today"><?= date('l F d, Y'); ?></h4>
		<script type="text/javascript">
			function wow (){
				var date = new Date();
				var hour = date.getHours();
				var minute = date.getMinutes();
				var seconds = date.getSeconds();
				var hour_minute = document.getElementById('hour_minute');
				hour_minute.innerHTML = hour + ':' + minute;
			}
			setInterval(wow, 30000);
			wow();
		</script>
		<ul class="side-menu">
			<li>
				<a class="side-menu__item" href="index.php"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Dashboard</span></a>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Your Profile</span><i class="angle fa fa-angle-right"></i></a>
				<ul class="slide-menu">
					<?php if (empty($row['occupation'])):?>
					<li>
						<a href="add-profile.php" class="slide-item">Add Profile</a>
					</li>
				<?php endif;?>
					<li>
						<a href="view-profile.php" class="slide-item">View Profile</a>
					</li>
				</ul>
			</li>

			<li>
				<a class="side-menu__item" href="post-tags.php"><i class="side-menu__icon fa fa-tags"></i><span class="side-menu__label">Post Tags</span></a>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-clipboard-list"></i><span class="side-menu__label">Posts</span><i class="angle fa fa-angle-right"></i></a>
				<ul class="slide-menu">
					<li>
						<a href="add-post.php" class="slide-item">Add Post</a>
					</li>
					<li>
						<a href="view-posts.php" class="slide-item">View Posts</a>
					</li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-newspaper"></i><span class="side-menu__label">Newsletter</span><i class="angle fa fa-angle-right"></i></a>
				<ul class="slide-menu">
					<li>
						<a href="mailing-list.php" class="slide-item">View Mailing List</a>
					</li>
					<li>
						<a href="edit-mailing-list.php" class="slide-item">Edit Mailing List</a>
					</li>
				</ul>
			</li>
			<li>
				<a class="side-menu__item" href="mailbox.php"><i class="side-menu__icon fa fa-envelope"></i><span class="side-menu__label">Mailbox</span></a>
			</li>
			<li>
				<a class="side-menu__item" href="sign-out.php"><i class="side-menu__icon fa fa-power-off"></i><span class="side-menu__label">Sign Out</span></a>
			</li>
		</ul>
	</div>
	<div class="sidebar-img">
		<img src="assets/img/left-bg1.png">
	</div>
</aside>
	
<!-- Sidebar menu-->
