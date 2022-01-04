<?php
include 'includes/connect.php';
include 'includes/highlight-function.php';
if (!isset($_POST['search-input']) || empty($_POST['search-input'])) {
	echo "<script>window.location = 'home';</script>";
}
$search_input = $_POST['search-input'];
$search_query = $conn->query("SELECT * FROM posts WHERE title LIKE '%$search_input%' OR tag_name LIKE '%$search_input%'") or die(mysqli_error($conn));
$search_counter = mysqli_num_rows($search_query);
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
	<title>Web Blog | Search - <?= ucwords($_POST['search-input']);?></title>
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
				<h3>Showing results for <strong>'<?= $_POST['search-input'];?>'</strong></h3>
				<p><?= (($search_counter > 0)?$search_counter.' search results found.':'No results found for <strong>"'.$search_input.'</strong>." Go back <a href="home">Home</a>'); ?></p>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="row view-posts-row">
						<?php 
						include 'includes/search-results.php'; ?>
					</div>
				</div>
				<?php include 'includes/post-sidebar.php'; ?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>