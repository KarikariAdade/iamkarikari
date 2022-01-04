<?php include 'time-function.php'; ?>
<div class="p-2 d-block d-sm-none navbar-sm-search">
	<!-- Form -->
	<form class="navbar-search navbar-search-dark form-inline ml-lg-auto" method="POST" action="search-results.php">
		<div class="form-group mb-0">
			<div class="input-group input-group-alternative">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-search"></i></span>
				</div><input class="form-control" placeholder="Search Here" type="text" name="search_term">
			</div>
		</div>
	</form>
</div>
<!-- Top navbar -->
<nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
	<div class="container-fluid">
		<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"><span class="fa fa-align-left"></span></a>

		<!-- Horizontal Navbar -->
		<ul class="navbar-nav align-items-center d-none d-xl-block">
			<li class="nav-item dropdown">
				<a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 d-none d-lg-block" data-toggle="dropdown" href="#" role="button">
					Manage Settings <span class="fa fa-caret-down"></span>
				</a>
				<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
					<a class="dropdown-item" href="view-profile.php"><span>Manage Profile</span></a>
					<a class="dropdown-item" href="mailing-list.php"><span>View Subscribers</span></a>
					<a class="dropdown-item" href="view-posts.php"><span>View Posts</span></a>
				</div>
			</li>
		</ul>

		<!-- Brand -->
		<a class="navbar-brand pt-0 d-md-none" href="index-2.html">
			<img src="<?= $profile_image;?>" class="navbar-brand-img" alt="...">
		</a>
		<!-- Form -->
		<form class="navbar-search navbar-search-dark form-inline mr-3 ml-lg-auto" method="POST" action="search-results.php">
			<div class="form-group mb-0">
				<div class="input-group input-group-alternative">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-search"></i></span>
					</div><input class="form-control" placeholder="Search Here" type="text" name="search_term">
				</div>
			</div>
		</form>
		<!-- User -->
		<ul class="navbar-nav align-items-center ">
			<li class="nav-item dropdown d-none d-md-flex">
				<a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
					<?php
					$fetch_message_notif = $conn->query("SELECT * FROM messages WHERE status = 0 AND full_name IS NOT NULL") or die(mysqli_error($conn));
					function slug_function($text){
						$text = str_replace(' ', '-', $text);
						$text = preg_replace('/[^A-Za-z0-9\-]/', '', $text);
						$text = preg_replace('/-+/', '-', $text);
						$text = strtolower($text);
						return $text;
					}
					?>
					<div class="media align-items-center">
						<i class="fa fa-envelope fa-lg"></i>
						<?php if (mysqli_num_rows($fetch_message_notif) > 0) {
							echo '<span class="bg-gradient-orange" id="notif-icon">'.mysqli_num_rows($fetch_message_notif).'</span>';
						}?>
						
					</div></a>
					<?php if(mysqli_num_rows($fetch_message_notif) > 0):?>
					<div class="dropdown-menu  dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">
						<a href="#" class="dropdown-item text-center">You have <strong><?= mysqli_num_rows($fetch_message_notif); ?> New Messages</strong></a>
						<div class="dropdown-divider"></div>
						<?php
							while($message_notif = mysqli_fetch_assoc($fetch_message_notif)){
								$slug_subject = slug_function($message_notif['subject']);
								?>
								<a href="mail-detail.php?mail=<?= urlencode($message_notif['id']); ?>&subject=<?= urlencode($slug_subject); ?>" class="dropdown-item d-flex">
									<div>
										<strong><?= $message_notif['full_name']; ?></strong> sent a message
										<div class="small text-muted"><?= time_ago($message_notif['received_date']); ?></div>
									</div>
								</a>
								<?php }?>
								<div class="dropdown-divider"></div>
								<a href="mailbox.php" class="dropdown-item text-center">See all Messages</a>
							</div>
						<?php endif;?>
						</li>
						<li class="nav-item dropdown d-none d-md-flex">
							<?php
							$fetch_newsletter_notif = $conn->query("SELECT * FROM newsletter WHERE status = 0 ORDER BY id DESC") or die(mysqli_error($conn));
							$newsletter_counter = mysqli_num_rows($fetch_newsletter_notif);
							?>
							<a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
								<div class="media align-items-center">
									<i class="fa fa-bell fa-lg newsletter-notif-icon"></i>
									<?php if($newsletter_counter > 0):?>
									<span class="bg-gradient-orange newsletter-notif-number" id="notif-icon"><?= $newsletter_counter; ?></span>
								<?php endif;?>
								</div></a>
								<script type="text/javascript">
										
								</script>
								<div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">
									<?php 
									if ($newsletter_counter > 0) {
										while ($notif_row = mysqli_fetch_assoc($fetch_newsletter_notif)) {
									 ?>
									<a href="#" class="dropdown-item d-flex">
										<div>
											<strong><?= $notif_row['email']; ?> signed up to mailing list</strong>
											<div class="small text-muted"><?= time_ago($notif_row['date']); ?></div>
										</div>
									</a>
									<?php 
								}
								}else{
									echo "There are no new notifications";
								}
									?>
									<div class="dropdown-divider"></div>
									<a href="notifications.php" class="dropdown-item text-center">View all Notification</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0" data-toggle="dropdown" href="#" role="button">
									<div class="media align-items-center">
										<span class="avatar avatar-sm"><img alt="Image placeholder" src="<?= $profile_image; ?>" style="width: 45px;height: 45px;"></span>
										<div class="media-body ml-2 d-none d-lg-block">
											<span class="mb-0 "><?= $row['first_name'].' '.$row['last_name']; ?></span>
										</div>
									</div></a>
									<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
										<div class=" dropdown-header noti-title">
											<h6 class="text-overflow m-0">Welcome <?= $row['first_name']; ?>!</h6>
										</div>
										<a class="dropdown-item" href="view-profile.php"><i class="fa fa-user"></i> <span>My profile</span></a>
										<a class="dropdown-item" href="#"><i class="fa fa-clipboard"></i> <span>Post Categories</span></a>
										<div class="dropdown-divider"></div><a class="dropdown-item" href="sign-out.php"><i class="fa fa-power-off"></i> <span>Logout</span></a>
									</div>
								</li>
							</ul>
						</div>
					</nav>
						<!-- Top navbar-->