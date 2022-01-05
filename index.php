<!DOCTYPE html>
<html lang="en">
<head>
    <meta property="og:locale" content="en_US" />
    <meta name="Health In Totality" description="The Healthcare Blog">
    <meta name="description" content="The Healthcare Blog">
    <meta name="og:description" content="The Healthcare Blog">
    <meta name="keywords" content="News, Reviews, Healthcare, Technology, Health Issues, Pharmacy">
    <meta property='og:title' content='Health in Totality'>
    <meta property='og:type' content='article'>
    <meta name="og:url" content="www.healthintotality.com">
    <meta charset="utf-8">
    <title>Health In Totality</title>
    <?php include 'includes/header.php';?>
</head>
<body>
    <div class="page-wrapper">
        <?php include 'includes/navbar.php';?>
        <?php include 'includes/modal-pop-up.php'; ?>
        <div class="container post-intro-container">
            <div class="welcome-section">
                <h3>Welcome to health in totality</h3>
                <p>the healthcare blog</p>
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