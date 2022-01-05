<?php include 'slug-function.php'; ?>
<footer class="kilimanjaro_area">
        <!-- Top Footer Area Start -->
        <div class="foo_top_header_one section_padding_100_70">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="kilimanjaro_part">
                            <h5>About Us</h5>
                            <p>It includes rich features & contents. It's designed & developed based on One Page/ Multi-page Layout,blog themes,world press themes and blogspot. You can use any layout from any demo anywhere.</p>
                           
                        </div>
                        <div class="kilimanjaro_part m-top-15">
                            <h5>Social Links</h5>
                            <ul class="kilimanjaro_social_links">
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                                <li><a href="#"><i class="fab fa-pinterest" aria-hidden="true"></i> Pinterest</a></li>
                                <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i> YouTube</a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i> Linkedin</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="kilimanjaro_part">
                            <h5>Most Read Categories</h5>
                            <ul class=" kilimanjaro_widget">
                            	<?php
						$fetch_tags = $conn->query("SELECT tag_name FROM posts GROUP BY tag_name ORDER BY COUNT(tag_name) DESC LIMIT 7" ) or die(mysqli_error($conn));
						if (mysqli_num_rows($fetch_tags)) {
							while ($tag_row = mysqli_fetch_assoc($fetch_tags)) {
								$tag_name = $tag_row['tag_name'];
								$tag = slug($tag_name);
								?>
                                <li><a href="tags/<?= urlencode($tag); ?>"><?= $tag_row['tag_name']; ?></a></li>
                            <?php }}?>
                        </div>

                        <div class="kilimanjaro_part m-top-15">
                        	<?php 
                            	$fetch_tags = $conn->query("SELECT tag_name FROM posts GROUP BY tag_name ORDER BY COUNT(tag_name) DESC LIMIT 7, 14" ) or die(mysqli_error($conn));
						if (mysqli_num_rows($fetch_tags)) {
                        	?>
                            <h5>Important Links</h5>
                            <ul class="kilimanjaro_links">
                            	<?
							while ($tag_row = mysqli_fetch_assoc($fetch_tags)) {
								$tag_name = $tag_row['tag_name'];
								$tag = slug($tag_name);
								?>
                                <li><a href="tags/<?= urlencode($tag); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?= $tag_row['tag_name']; ?></a></li>
                            <?php }
                        }
                        ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="kilimanjaro_part">
                            <h5>Latest News</h5>
                            <?php
        $fetch_posts = $conn->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3");
        while ($post_row = mysqli_fetch_assoc($fetch_posts)) {
            if (!empty($post_row['post_image'])) {
                $admin_id = $post_row['admin_id'];
                $post_image = explode('/', $post_row['post_image']);
            $post_image = $post_image[4].'/'.$post_image[5].'/'.$post_image[6].'/'.$post_image[7].'/'.$post_image[8];
            }
            $slug = $post_row['post_slug'];
            $fetch_admin_id = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
            $post_admin = mysqli_fetch_assoc($fetch_admin_id);
            if (!empty($post_admin['profile_image'])) {
                 $admin_image = explode('/', $post_admin['profile_image']);
                 $admin_image = $admin_image[4].'/'.$admin_image[5].'/'.$admin_image[6].'/'.$admin_image[7].'/'.$admin_image[8];
            }
            ?>
                            <div class="kilimanjaro_blog_area">
                                <div class="kilimanjaro_thumb">
								<img class="img-fluid" src="<?= $post_image; ?>" alt="">

                                </div>
                                <a href="article/<?= urlencode($slug); ?>"><?= $post_row['title']; ?></a>
                                <p class="kilimanjaro_date"><?= date('M Y', strtotime($post_row['date'])); ?></p>
                               
                            </div>
                            <?php 
                        }

                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="kilimanjaro_part">
                            <h5>Quick Contact</h5>
                            <div class="kilimanjaro_single_contact_info">
                                <h5>Phone:</h5>
                                <p>+255 255 54 53 52 <br> +255 255 53 52 51</p>
                            </div>
                            <div class="kilimanjaro_single_contact_info">
                                <h5>Email:</h5>
                                <p>support@email.com <br> company@email.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom Area Start -->
        <div class=" kilimanjaro_bottom_header_one section_padding_50 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>© All Rights Reserved by <a href="#">Health in Totality 💖</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<!-- <footer class="container-fluid">
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
</footer> -->