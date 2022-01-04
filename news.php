<?php
include 'includes/connect.php';
$fetch_tags = $conn->query("SELECT * FROM tags WHERE tag_name = 'News'");
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
    <title>Blog - AK Web | Tech News</title>
	<?php include 'includes/header.php';?>
</head>
<body>
	<div class="page-wrapper">
		<?php 
        include 'includes/navbar.php';
        include 'includes/modal-pop-up.php';
        ?>
		<div class="container post-intro-container">
			<!-- <div class="welcome-section">
				<h3>Welcome to Web Blog</h3>
				<p>fun and practical web development tutorials</p>
			</div> -->
			<div class="row">

<div class="col-md-8">
    <div class="row view-posts-row">
        <?php
        if (mysqli_num_rows($fetch_tags) > 0) {
             while ($tag_row = mysqli_fetch_assoc($fetch_tags)) {
            $tag_name = $tag_row['tag_name'];

            //Fetch posts using tag name
            $button_checker = false;
            $fetch_posts = $conn->query("SELECT * FROM posts WHERE tag_name = '$tag_name'ORDER BY id DESC LIMIT 12") or die(mysqli_error($conn));
            if (mysqli_num_rows($fetch_posts) > 0) {
                while ($post_row = mysqli_fetch_assoc($fetch_posts)) {
                     $admin_id = $post_row['admin_id'];
                $post_image = explode('/', $post_row['post_image']);
            $post_image = $post_image[4].'/'.$post_image[5].'/'.$post_image[6].'/'.$post_image[7].'/'.$post_image[8];
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
                        <span><i class="fa fa-clock"></i> <?= date(' M d, Y', strtotime($post_row['date'])); ?></span>
                        <h5><a href='article/<?= urlencode($slug); ?>'><?= $post_row['title']; ?></a></h5>
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
            }else{
                $button_checker = true;
                echo "<h4>The are no posts that match <strong>".$tag_name."</strong> at the moment. <a href='home'>Go Home</a></h4>
                ";
            }
        }
        }
            ?>
            
        </div>
        <p align="center" id="personal-view-more-btn" data-id="<?= $tag_name;?>"><button class="btn-style-one"><span class="txt">View More</span></button></p>
    </div>
				<?php
				include 'includes/post-sidebar.php'; ?>
			</div>
		</div>
		<?php include 'includes/footer.php'; ?>
		<script src="js/script.js"></script>
        <script type="text/javascript">
            var button_checker = '<?= $button_checker; ?>';
    if (button_checker == true) {
        $('#tags-view-more-btn').hide();
    }
        </script>
	</body>
	</html>