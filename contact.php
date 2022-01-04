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
        <div class="container post-intro-container">
            <div class="welcome-section">
                <h3>Drop a Message</h3>
                <p>fun and practical web development tutorials</p>
            </div>
            <div class="row contact_us_row">
                <div class="col-md-8">
                    <div align="center">
                        <p id="before_send"></p>
                        <div class="alert alert-box alert-dismissible alert-danger fade show" role="alert">
                            <span class="alert-inner--text"><strong><i class="fa fa-info-circle"></i></strong> <span id="error_message"></span></span>
                        </div>
                    </div>
                    <form method="POST" class="row contact_us_form">
                        <div class="form-group col-md-6">
                            <input type="text" id="full_name" placeholder="Full Name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" id="email_address" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="tel" id="phone" placeholder="Phone (Should contain country code)" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" id="subject" placeholder="Subject" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea rows="10" id="message" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <p align="center"><button class="btn btn-style-one" id="contact_btn"><span class="txt">Send Message</span></button></p>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <p><i class="fa fa-map-marker-alt contact_icon"></i> Plot 235, Block K. Agona, Ashanti</p>
                    <p><i class="fa fa-phone contact_icon"></i> +233548876922</p>
                    <p><i class="fa fa-phone contact_icon"></i> +233269568019</p>
                    <p><i class="fa fa-envelope-open contact_icon"></i> iamkarikari98@gmail.com</p>
                    <hr>
                    <ul class="contact_with_socail">
                            <li><a href="#"><i class="fab fa-google-plus-g icon"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook-f icon"></i></a></li>
                            <li><a target="_blank" href=""><i class="fab fa-instagram icon"></i></a></li>
                            <li><a target="_blank" href=""><i class="fab fa-twitter icon"></i></a></li>
                            <li><a target="_blank" href=""><i class="fab fa-youtube icon"></i></a></li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>