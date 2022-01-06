<?php
include '../includes/connect.php';
?>
<header class="main-header">
    <div class="header-top">
        <div class="auto-container clearfix">
            <div class="top-right clearfix">
                <ul class="social-icons">
                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-upper">
        <div class="inner-container">
            <div class="auto-container clearfix">
                <div class="logo-outer">
                    <div class="logo"><a href="home"><img src="../img/healthintotality.jpeg" alt="" title=""></a></div>
                </div>
                <div class="nav-outer clearfix"><div class="mobile-nav-toggler"><span class="icon fa fa-bars"></span></div>
                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="navbar-header">   
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon fa fa-search"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li><a href="home.html"><span data-hover="Home">Home</span></a></li>
                            <li><a href="about"><span data-hover="About">About</span></a></li>
                            <li class="dropdown has-mega-menu"><a href="#"><span data-hover="Categories">Categories</span></a>
                                <div class="mega-menu">
                                    <div class="mega-menu-bar row clearfix">
                                        <?php
                                        $fetch_post_tags = $conn->query("SELECT * FROM tags ORDER BY id DESC");
                                        while ($tag_row = mysqli_fetch_assoc($fetch_post_tags)) {
                                            $tag = $tag_row['tag_slug'];
                                            ?>
                                            <div class="column col-md-3 col-xs-12">
                                                <ul>
                                                    <li><a href="tags/<?= urlencode($tag); ?>"><?= $tag_row['tag_name']; ?></a></li>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </li>
                            <li><a href="personal"><span data-hover="Personal">Personal</span></a></li>
                            <li class="dropdown mobile-dropdown"><a href="#"><span data-hover="Category"> Category</span></a>
                                <ul>
                                  <?php
                                  $fetch_post_tags = $conn->query("SELECT * FROM tags ORDER BY id DESC");
                                  while ($tag_row = mysqli_fetch_assoc($fetch_post_tags)) {
                                    $tag = $tag_row['tag_slug'];
                                    ?>
                                    <li><a href="tags/<?= urlencode($tag); ?>"><?= $tag_row['tag_name']; ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>

                        <!-- <li><a href="news"><span data-hover="News">News</span></a></li>
                        <li><a href="../../iamkarikari"><span data-hover="Portfolio"> Portfolio</span></a></li> -->
                        <li><a href="contact"><span data-hover="Contact">Contact</span></a></li>

                    </ul>
                </div>
            </nav>
            <!-- Main Menu End-->

            <!-- Main Menu End-->
            <div class="outer-box clearfix">
                <!-- Search Btn -->
                <div class="search-box-btn"><span class="icon fa fa-search"></span></div>
                
            </div>
        </div>
    </div>
</div>
</div>
<!--End Header Upper-->

<!--Sticky Header-->
<div class="sticky-header">
    <div class="auto-container clearfix">
        <!--Logo-->
        <div class="logo pull-left">
            <a href="home" class="img-responsive"><img src="../img/healthintotality.jpeg" alt="" title=""></a>
        </div>

        <!--Right Col-->
        <div class="right-col pull-right">
            <!-- Main Menu -->
            <nav class="main-menu navbar-expand-md">
                <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                    <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
                </div>
            </nav><!-- Main Menu End-->
        </div>

    </div>
</div>
<!--End Sticky Header-->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><span class="icon fa fa-window-close"></span></div>

    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
    <nav class="menu-box">
        <div class="nav-logo"><a href="home"><img src="../img/healthintotality.jpeg" style="width:100px !important; height:100px !important;" alt="" title=""></a></div>

        <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
    </nav>
</div>
</header>
<div id="search-popup" class="search-popup">
    <div class="close-search theme-btn"><span class="fa fa-times"></span></div>
    <div class="popup-inner">
        <div class="overlay-layer"></div>
        <div class="search-form">
            <form method="POST" action="search">
                <div class="form-group">
                    <fieldset>
                        <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                        <input type="submit" value="Search" class="theme-btn">
                    </fieldset>
                </div>
            </form>
            <br>
            <h3>Recent Search Keywords</h3>
            <ul class="recent-searches">
               <?php
               $fetch_post_tags = $conn->query("SELECT * FROM tags ORDER BY id DESC LIMIT 18");
               while ($tag_row = mysqli_fetch_assoc($fetch_post_tags)) {
                $tag = $tag_row['tag_slug'];
                ?>
                <li><a href="tags/<?= $tag;?>"><?= $tag_row['tag_name']; ?></a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>