<?php
if ($search_counter > 0) {
	while ($post_row = mysqli_fetch_assoc($search_query)) {
		$word = explode(' ', $search_input);
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
            <div class="col-md-6">
                <div class="card">
                    <small id="card-tag"><?= $post_row['tag_name']; ?></small>
                    <div class="card-img">
                        <img src="<?= $post_image; ?>" class="card-img-top" alt="Post Image">
                    </div>
                    <div class="card-body">
                        <span><i class="fa fa-clock"></i> <?= date('M Y', strtotime($post_row['date'])); ?></span>
                        <h5><a href='article/<?= urlencode($slug); ?>'><?= highlightWords($post_row['title'], $word); ?></a></h5>
                        <div class="footer">
                            <small><a href="article/<?= urlencode($slug); ?>">Read More <span class="fa fa-arrow-circle-right fa-sm"></span></a></small>
                            <div class="footer-detail">
                                <img src="<?= $admin_image; ?>" class="img-fluid news-reporter">
                                <small><?= $post_admin['first_name'].' '.$post_admin['last_name']; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
	}
}
?>