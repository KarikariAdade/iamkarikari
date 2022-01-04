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
    <title>Blog - AK Web | Web development made simpler</title>
    <?php include 'includes/header.php';?>
</head>
<body>
    <div class="page-wrapper">
        <?php include 'includes/navbar.php';?>
        <?php include 'includes/modal-pop-up.php'; ?>
        <div class="container post-intro-container">
            <div class="welcome-section">
                <h3>Welcome to akweb.com</h3>
                <p>fun and practical web development tutorials</p>
            </div>
            <div class="row">
                <?php 
                include 'includes/index-posts.php';
                include 'includes/post-sidebar.php'; ?>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
        <script src="js/script.js"></script>
    </body>
    </html>