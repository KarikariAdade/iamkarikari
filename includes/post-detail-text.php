<div class="post-detail-text">
	<img src="<?= $post_image; ?>" class="img-fluid post-detail-img" alt="Post Detail Goes here">
	<div class="post-stats">
		<span><?= $post_admin['first_name'].' '.$post_admin['last_name']; ?></span>
		<span><?= date('M d, Y', strtotime($detail['date'])) ?></span>
		<span>4 Comments</span>
	</div>
	<h2><?= $detail['title']; ?></h2>
	<p id="post-detail"><?= nl2br($detail['post_desc']); ?>
	</p>
	<div id="disqus_thread"></div>
	
	<?php
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
	?>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
    this.page.url = '<?= $CurPageURL; ?>';  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = '<?= $detail['id'] ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'http://blog-dibiorganics-com.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script id="dsq-count-scr" src="//iamkarikari-com.disqus.com/count.js" async></script>
</div>