<?php
include 'includes/connect.php';
?>
<!DOCTYPE html>
<html>
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
	<title>Blog - AK Web | About AK Web</title>
	<?php include 'includes/header.php';?>
</head>
<body>
	<div class="page-wrapper">
		<?php 
		include 'includes/navbar.php';
		include 'includes/modal-pop-up.php';
		?>
		<div class="container about-container" style="position: relative;z-index: 89 !important;">
			<h1>About</h1>
			<p>Chris on Code and Nick Cerminara created Scotch as a place where developers could help developers by sharing knowledge, tips, and tactics to get better at their craft. They wanted everyone to learn not only how to get better at the mechanics of coding, but to understand the deep decisions at the heart of creating awesome code.
				<br><br>
				Scotch quickly grew to a global community of developers helping developers, producing top-shelf tutorials and tips.
				<br><br>
				In 2019, Scotch joined DigitalOcean. In addition to being known for its developer-centric infrastructure and upstack offerings, DigitalOcean is famous for its Community site – which has become the premier destination for high-quality, professionally written dev tutorials. The Scotch and DigitalOcean developer communities have joined forces to make the developer experience accessible and incredible for anyone, anywhere.
				<br><br>
			Scotch and DigitalOcean are working together to continue creating the best educational resource for developers on the planet. If you’d like to be a part of this, consider contributing content to Scotch or participating in our Write for DOnations program.</p>
		</div>
		<?php include 'includes/footer.php';?>
	</div>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>