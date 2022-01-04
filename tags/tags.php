<?php
include '../includes/connect.php';
if (isset($_GET['tag']) || !empty($_GET['tag'])) {
	$tag = $_GET['tag'];
	$fetch_tags = $conn->query("SELECT * FROM tags WHERE tag_slug = '$tag'");
}else{
	echo "<script>window.location = '../home';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta property="og:locale" content="en_US" />
    <meta name="AK Web" description="The blog of Kumasi based Web Developer">
    <meta name="description" content="The blog of Kumasi based Web Developer">
    <meta name="og:description" content="The blog of Kumasi based Web Developer, writing about web tools, CSS, JavaScript, PHP, frameworks etc">
    <meta name="keywords" content="news, ghana news, hot gossip, latest news, music news, ghana news">
    <meta property='og:title' content='Blog - AK Web'>
    <meta property='og:type' content='article'>
    <meta name="og:url" content="https://www.akweb.blog">
    <meta charset="utf-8">
	<title><?= ucwords($tag); ?> - AK Web | Web Development Blog</title>
	<?php include 'includes/header.php';?>
</head>
<body>
	<div class="page-wrapper">
		<?php 
		include 'includes/navbar.php';
		include 'includes/modal-pop-up.php';
		?>
		<div class="container post-intro-container">
			<div class="welcome-section">
				<h3>Posts in Category: <?= ucwords(strtoupper($_GET['tag']));?></h3>
				<!-- <p>showing posts under <strong><?= ucwords(strtoupper($_GET['tag']));?></strong></p> -->
			</div>
			<div class="row">
				<?php 
				include 'includes/tag-post-cards.php';
				include 'includes/post-sidebar.php'; ?>
			</div>
		</div>
		<?php include 'includes/footer.php'; ?>
		<script src="../js/script.js"></script>
	</body>
	</html>