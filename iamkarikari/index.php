<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include 'includes/header.php';?>
    <title>Karikari | Home</title>
</head>
<body class="backgrond-dark">
    <!-- =========== Start of Sidebar Navigation (off canvas) ============ -->
    <?php include 'includes/nav.php';?>
    <div class="main-wrapper">
        <div class="container-fluid hero-section" id="home">
        	<div class="row">
                <div class="col-md-6 mobile-section">
                    <div class="img">
                        <img src="img/profile.jpg">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="intro-details">
                        <span><h4>Hello I'm</h4></span>
                        <h2>Karikari <small>Adade</small></h2>
                        <h3>Web Developer</h3>
                        <ul>
                            <li><p><span class="fa fa-envelope fa-sm"></span> iamkarikari98@gmail.com</p></li>
                            <li><p><span class="fa fa-phone fa-sm"></span> +233548876922</p></li>
                            <li><p><span class="fa fa-map-marker-alt fa-sm"></span> Plot 235, Block K. Agona-Ashanti,Ghana</p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                   <div class="cut-image">
                   </div>
               </div>
           </div>
       </div>

       <!--================= WHO AM I SECTION  ===================== -->
       <div class="container who_am_i_section" id="about">
        <div class="row">
            <div class="col-md-5">
                <div class="who_am_i">
                    <img src="img/profile.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-md-7">
                <h4>Who Am I?</h4>
                <h2>Passionate about Web Design <br> and App Functionality</h2>
                <p>I am a Full Stack Developer based in Kumasi, Ghana. I am a dreamer and a fanatic of all digital things. I've worked on a couple of projects for companies and I love web design. I am also the CEO of Bizz Tech Inc.</p>
                <button class="btn btn--primary">Download CV</button>
            </div>
        </div>
    </div>


    <!-- ================= WHAT I DO SECTION ============== -->
    <div class="container what_i_do_section">
        <div class="row">
            <div class="col-md-4">
                <div class="what_i_do_details">
                    <div class="icon">
                        <span class="fa fa-5x fa-code"></span>
                    </div>
                    <div class="what_i_do_text">
                        <h5>UI Web Design</h5>
                        <p>This is the text.this is the textthis is the textthis is the textthis is the textthis is the textthis is the textthis is the textthis is the text</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="what_i_do_details">
                    <div class="icon">
                        <span class="fa fa-5x fa-code"></span>
                    </div>
                    <div class="what_i_do_text">
                        <h5>Web Development</h5>
                        <p>This is the text.this is the textthis is the textthis is the textthis is the textthis is the textthis is the textthis is the textthis is the text</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="what_i_do_details">
                    <div class="icon">
                        <span class="fa fa-5x fa-code"></span>
                    </div>
                    <div class="what_i_do_text">
                        <h5>Digital Marketing (SEO)</h5>
                        <p>This is the text.this is the textthis is the textthis is the textthis is the textthis is the textthis is the textthis is the textthis is the text</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================ FUN FACTS SECTION =============== -->
    <div class="container-fluid fun_facts_section" id="skills">
        <div class="fun_facts">
            <p align="center"><span id="bg-text">FunFacts</span></p>
            <div class="container">
                <h4>Let's see <br>What I'm good at </h4>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Technical Skills</h3>
                        <span id="progress_desc">HTML & CSS</span>
                        <div id="progressbar1"></div>
                        <span id="progress_desc">Javascript</span>
                        <div id="progressbar2"></div>
                        <span id="progress_desc">PHP</span>
                        <div id="progressbar3"></div>
                        <span id="progress_desc">SEO</span>
                        <div id="progressbar4"></div>
                    </div>
                    <div class="col-md-6">
                        <h3>Professional Skills</h3>
                        <div class="professional-skills">
                            <ul class="professional-progress">
                                <li>
                                    <div class="mh-progress mh-progress-circle" data-progress="85"></div>
                                    <div class="pr-skill-name">Communication</div>
                                </li>
                                <li>
                                    <div class="mh-progress mh-progress-circle" data-progress="80"></div> 
                                    <div class="pr-skill-name">Team Work</div>
                                </li>
                                <li>
                                    <div class="mh-progress mh-progress-circle" data-progress="78"></div>
                                    <div class="pr-skill-name">Project Management</div>
                                </li> 
                                <li>
                                    <div class="mh-progress mh-progress-circle" data-progress="87"></div>
                                    <div class="pr-skill-name">Creativity</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/portfolio.php';?>
    <div class="container hire_me_section">
        <div class="row hire_me">
            <div class="col-md-9">
                <p>Have any project in mind? <span>Just Say hello </span></p>
            </div>
            <div class="col-md-3">
                <button class="btn--primary"><a href='#contact'>Hire Me</a></button>
            </div>
        </div>
    </div>
    <?php include 'includes/testimonials.php'; ?>
    <footer id="contact">
        <div class="container-fluid footer_section">
            <div class="row" id="footer-inner">
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
            </div>
        </div>
        <div class="footer-outer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row-inner">
                            <div class="row-icon">
                                <span class="fa fa-2x fa-map-marker-alt"></span><br><br>
                                <p>Plot 235, Block K <br>
                                    Agona, Ashanti <br> Ghana</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row-inner">
                                <div class="row-icon">
                                    <span class="fa fa-2x fa-envelope-open"></span><br><br><br>
                                    <p>iamkarikari98@gmail.com <br>juniorlecrae@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row-inner">
                                <div class="row-icon">
                                    <span class="fa fa-2x fa-phone"></span><br><br>
                                    <p>+233548876922 <br><br> +233269568019</p>
                                </div>
                            </div>
                        </div>
                        <?php include 'includes/contact-form.php'; ?>
                        <div class="after_img">
                            <img src="img/bg8.png" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript">
       lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'fitImagesInViewport': true,
        'alwaysShowNavOnTouchDevices': true,
    })
</script>
</body>


</html>