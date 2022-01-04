<?php include 'slug-function.php'; ?>
<footer class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="row footer-inner-row">
					<div class="col-md-4">
						<img src="img/new_logo.png" class="img-fluid">
					</div>
					<div class="col-md-8">
						<h3>AK Web</h3>
						<p>Top shelf learning. Dev tutorials explaining the code and the choices behind it all.<br><br>
						Made with 💖 by Karikari Adade.</p>
						<ul class="contact_with_socail">
							<li><a href="#"><i class="fab fa-google-plus-g icon"></i></a></li>
							<li><a href="#"><i class="fab fa-facebook-f icon"></i></a></li>
							<li><a target="_blank" href=""><i class="fab fa-instagram icon"></i></a></li>
							<li><a target="_blank" href=""><i class="fab fa-twitter icon"></i></a></li>
							<li><a target="_blank" href=""><i class="fab fa-youtube icon"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-5" align="">
				<h3 id="popular-tag-h3" style="">Popular Tags</h3>
				<div class="row footer-tags">
					<div class="col-md-6">
						<?php
						$fetch_tags = $conn->query("SELECT tag_name FROM posts GROUP BY tag_name ORDER BY COUNT(tag_name) DESC LIMIT 7" ) or die(mysqli_error($conn));
						if (mysqli_num_rows($fetch_tags)) {
							while ($tag_row = mysqli_fetch_assoc($fetch_tags)) {
								$tag_name = $tag_row['tag_name'];
								$tag = slug($tag_name);
								?>
								<ul>
									<li><a href="tags/<?= urlencode($tag); ?>"><?= $tag_row['tag_name']; ?></a></li>
								</ul>
								<?php
							}
						}
						?>
					</div>
					<div class="col-md-6">
						<?php
						$fetch_tags = $conn->query("SELECT tag_name FROM posts GROUP BY tag_name ORDER BY COUNT(tag_name) DESC LIMIT 7, 14" ) or die(mysqli_error($conn));
						if (mysqli_num_rows($fetch_tags)) {
							while ($tag_row = mysqli_fetch_assoc($fetch_tags)) {
								$tag_name = $tag_row['tag_name'];
								$tag = slug($tag_name);
								?>
								<ul>
									<li><a href="tags/<?= urlencode($tag); ?>"><?= $tag_row['tag_name']; ?></a></li>
								</ul>
								<?php
							}
						}
						?>
					</div>


				</div>
			</div>
			<div class="col-md-12 copyright-footer" align="center">
				<p>Copyright &copy <?= date('Y');?></p>
			</div>
		</div>
	</div>
</footer>