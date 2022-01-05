<?php
include '../includes/connect.php';
include 'includes/first-sentence.php';
if (isset($_GET['slug'])) {
	$slug = $_GET['slug'];
}else{
	echo "<script>window.location = '../home';</script>";
}
$fetch_detail = $conn->query("SELECT * FROM posts WHERE post_slug = '$slug'");
if (mysqli_num_rows($fetch_detail) > 0) {
	$detail = mysqli_fetch_assoc($fetch_detail);
	$admin_id = $detail['admin_id'];
	if (!empty($detail['post_image'])) {
		$post_image = explode('/', $detail['post_image']);
		$post_image = '../'.$post_image[4].'/'.$post_image[5].'/'.$post_image[6].'/'.$post_image[7].'/'.$post_image[8];
	}
	
	$fetch_admin_id = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
	$post_admin = mysqli_fetch_assoc($fetch_admin_id);
	if (!empty($post_admin['profile_image'])) {
		$profile_image = explode('/', $post_admin['profile_image']);
		$profile_image = '../'.$profile_image[4].'/'.$profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
	}
}else{
	echo "<script>window.location = '../home';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta itemprop="name" content="<?= $detail['title']; ?>">
	<meta itemprop="description" content="<?= first_sentence($detail['post_desc']); ?>">
	<meta itemprop="image" content="<?= $post_image; ?>">
	<meta name='description' content="<?= first_sentence($detail['post_desc']); ?>">
	<meta property='og:description' content="<?= first_sentence($detail['post_desc']); ?>">
	<meta property='og:title' content="<?= $detail['title']; ?>">
	<meta property='og:type' content='article'>
	<meta property='og:url' content="www.akweb.blog/article/<?= urlencode($slug);?>">
	<meta property="og:image" content="<?= $post_image; ?>"/>
	<meta property="og:site_name" content="AKWeb blog" />
	<meta property="article:published_time" content="<?= $detail['date']; ?>" />
	<meta charset="utf-8">
	<title><?= $detail['title']; ?></title>

	<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=61d6108d06175100190c145b&product=sop' async='async'></script>
	<?php include 'includes/header.php';?>
	<script type="text/javascript">
		function views(slug){
			$('#views-hidden').load('includes/views.php',{slug: slug});
		}
		
	</script>
</head>
<body>
	<p id="views-hidden"><script type="text/javascript">views('<?= $slug; ?>');</script></p>
	<div class="page-wrapper">
		<?php
		include 'includes/navbar.php';
		include 'includes/modal-pop-up.php';
		?>
		<div class="container post-intro-container">
			<div class="row post-detail-row">
				<div class="col-md-8">
					<?php
					include '../includes/post-detail-text.php';
					include '../includes/post-author.php';
					include '../includes/read-more-posts.php'; 
					?>
				</div>
				<?php include 'includes/post-sidebar.php';?>
			</div>
		</div>
		<?php include 'includes/footer.php'; ?>
	</div>
	<script src="../js/script.js"></script>
	
</body>
</html>