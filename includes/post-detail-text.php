<div class="post-detail-text">
	<img src="<?= $post_image; ?>" class="img-fluid post-detail-img" alt="Post Detail Goes here">
	<div class="post-stats">
		<span><?= $post_admin['first_name'].' '.$post_admin['last_name']; ?></span>
		<span><?= date('M d, Y', strtotime($detail['date'])) ?></span>
		<!-- <span>Comments</span> -->
	</div>
	<h2><?= $detail['title']; ?></h2>
	<p id="post-detail"><?= nl2br($detail['post_desc']); ?>
	</p>
	<div id="disqus_thread"></div>
	

</div>