-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 06:43 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` tinyint(4) NOT NULL,
  `first_name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(400) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `profile_image` varchar(400) DEFAULT NULL,
  `description` text,
  `token` varchar(500) DEFAULT NULL,
  `token_time` datetime DEFAULT NULL,
  `total_posts` int(6) NOT NULL DEFAULT '0',
  `facebook` varchar(400) NOT NULL,
  `twitter` varchar(400) NOT NULL,
  `linkedin` varchar(400) NOT NULL,
  `instagram` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `birthdate`, `address`, `occupation`, `profile_image`, `description`, `token`, `token_time`, `total_posts`, `facebook`, `twitter`, `linkedin`, `instagram`) VALUES
(1, 'Karikari', 'Adade', 'iamkarikari98@gmail.com', 'af8616fec384adfdc60d3ac1686bcf4360eac184', '0000-00-00', '', '', NULL, NULL, NULL, NULL, 0, '', '', '', ''),
(2, 'Karikari', 'Adade', 'juniorlecrae@gmail.com', 'af8616fec384adfdc60d3ac1686bcf4360eac184', '1998-08-14', 'Plot 235, Block K. Agona-Ashanti', 'Web Developer', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/profile/IMG_20200101_121842.jpg', 'Gatsby, an open-source tool for building high-performance JAMstack apps, boasts numerous plugins that extend its capabilities. For example, by leveraging source plugins in Gatsby, you can source data from m&quot;&quot;&quot;&quot;&quot;', 'c81e728d9d4c2f636f067f89cc14862c', '2020-05-06 18:50:56', 0, 'https://www.facebook.com', 'https://www.twitte2r.com', 'https://www.linkedin.com', 'https://www.instagram.com'),
(3, 'Oppong', 'Kwabena', 'oppong@gmail.com', 'af8616fec384adfdc60d3ac1686bcf4360eac184', '1985-01-12', 'Plot 235, Block K. Agogo-Ashanti', 'Scientist', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/profile/IMG_20160305_080713.jpg', ' You will need to create a new directory called &quot;uploads&quot; in the directory where &quot;upload.php&quot; file resides. The uploaded files will be saved there.', NULL, NULL, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_pictures`
--

CREATE TABLE `admin_pictures` (
  `id` int(5) NOT NULL,
  `admin_id` int(5) DEFAULT NULL,
  `profile_image` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_pictures`
--

INSERT INTO `admin_pictures` (`id`, `admin_id`, `profile_image`) VALUES
(11, 3, 'C:/xampp/htdocs/web_blog/admin/assets/uploads/profile/IMG-20180204-WA0011.jpg'),
(15, 2, 'C:/xampp/htdocs/web_blog/admin/assets/uploads/profile/IMG_20200101_121842.jpg'),
(17, 3, 'C:/xampp/htdocs/web_blog/admin/assets/uploads/profile/IMG_20160305_080713.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(400) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `subject` varchar(400) DEFAULT NULL,
  `message` text,
  `status` tinyint(4) DEFAULT '0',
  `replied` tinyint(4) DEFAULT '0',
  `reply_subject` varchar(500) DEFAULT NULL,
  `reply_message` text,
  `received_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `reply_date` datetime DEFAULT NULL,
  `trashed` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `full_name`, `email`, `phone`, `subject`, `message`, `status`, `replied`, `reply_subject`, `reply_message`, `received_date`, `reply_date`, `trashed`) VALUES
(2, 'asdf', 'adsf@gmail.com', '', 'Just testing the email system 1', 'One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.\n\nOne of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.\n\nOne of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.', 1, 0, NULL, NULL, '2020-04-10 18:36:55', NULL, 0),
(6, 'Karikari Adade', 'iamkarikari98@gmail.com', '+233548876922', 'This is the subject', 'One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.\nOne of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.\nOne of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.', 1, 1, 'God over Money 2', 'adfasdf', '2020-04-11 10:14:32', '2020-04-11 15:00:00', 0),
(10, 'Oppong', 'oppong@gmail.com', '+233548600060', 'Permission to post', 'I am a Full Stack Developer based in Kumasi, Ghana. I am a dreamer and a fanatic of all digital things. I\'ve worked on a couple of projects for companies and I love web design. I am also the CEO of Bizz Tech Inc.', 1, 1, 'You have permission to post ', 'I am a Full Stack Developer based in Kumasi, Ghana. I am a dreamer and a fanatic of all digital things. I\'ve worked on a couple of projects for companies and I love web design. I am also the CEO of Bizz Tech Inc.', '2020-04-11 18:49:11', '2020-04-11 20:49:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(400) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `date`, `status`) VALUES
(1, 'bizzle@gmail.com', '2020-04-08 21:03:28', 1),
(2, 'juniorlecrae@gmail.com', '2020-04-08 21:09:59', 1),
(4, 'shit@gmail.com', '2020-04-08 21:15:58', 1),
(5, 'iamkarikari98@gmail.com', '2020-04-23 18:21:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `admin_id` int(5) DEFAULT NULL,
  `tag_name` varchar(300) DEFAULT NULL,
  `post_category` varchar(400) DEFAULT NULL,
  `post_slug` varchar(600) DEFAULT NULL,
  `title` varchar(600) DEFAULT NULL,
  `post_image` varchar(400) DEFAULT NULL,
  `post_desc` text,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `views` int(10) DEFAULT '0',
  `demo_file` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `admin_id`, `tag_name`, `post_category`, `post_slug`, `title`, `post_image`, `post_desc`, `date`, `views`, `demo_file`) VALUES
(7, 2, 'Personal', 'Others', 'my-php-story-1-year-of-php', 'My PHP Story - 1 year of PHP', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/20yearsofphp.jpg', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">itâ€™s incredible to think what it has become today. Thinking back to when I first started learning php for doing really basic stuff like simple page includes within a static site.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">I first encountered PHP in 2002 whilst making a fan sites for games I was into at the time, GTA and Total Overdoes if I remeber correctly! I used&nbsp;phpnuke to build and manage the siteâ€™s content and users. phpnuke was powerful for itâ€™s time written in php it could do a lot, at the time I didnâ€™t know php at all. I could only do what the user interface allowed me to do.<br><br>I starting reading tutorials and forums, slowly getting to grips with FTP and editing the php files, constantly breaking my sites! learning how modules and files fit together.&nbsp;<br><br>I got to the point where I was no longer terrible at php! so much so I decided to go to university and get a degree using PHP. Now I spend most days working with PHP itâ€™s the core of my job as a devleoper.<br><br>I feel very lucky to be involved with PHP the community is amazing, the abundence of learning materials and support from fellow developers is fantastic. I could not have got through univeristy without the community!&nbsp;</p>', '2020-04-02 12:32:03', 8, NULL),
(8, 2, 'Personal', 'Others', 'the-php-magazine-you-should-be-reading-php-architect', 'The PHP magazine you should be reading PHP Architect', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/php-architect.png', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">Iâ€™ve recently subscribed to php[architect] and Iâ€™ve been blown away by the quality of the magazine. Whatâ€™s more as soon as youâ€™re&nbsp;a paid subscriber you get access to their full back catalog that goes back to 2002!&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">Check out&nbsp;<a href=\"https://www.phparch.com/magazine/\" style=\"transition: all 0.33s ease 0s; line-height: 1.4;\">https://www.phparch.com/magazine/</a>&nbsp;today!</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">Iâ€™ve read around 4 of their magazines so far, each one I have found multiple things that I want to learn more about.&nbsp;The format is typically the first few articles are in depth tutorials with further links to continue on with monthly columns on various topics like security and community.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">I cannot recommend this magazine enough. Iâ€™ve downloaded the ipub format so I can read using my iPad which works well for me whilst Iâ€™m travling on my daily commute.&nbsp;</p>', '2020-04-02 12:59:20', 40, 'C:/xampp/htdocs/web_blog/admin/assets/uploads/demo/A-to-Z-Resources-for-Students-master.zip'),
(9, 2, 'Development', 'Tutorials', 'speed-up-your-website-using-minify', 'Speed up your website using minify', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/Call_for_Code_Launch_D-Developer-V2-300x250-Nonanimated-Standard_Load-NULL-NULL-NULL-NULL.jpg', '<p>One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.</p><p>One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.</p><p>One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.</p><p>One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.</p><p>One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.<br><br><br><br><br></p>', '2020-04-03 17:02:51', 12, NULL),
(10, 2, 'CSS 3', 'Front-end Development', 'iframe-set-height-to-100', 'iframe set height to 100%', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/republish-content.jpg', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">Iframes are useful to loading external pages into an existing page and avoiding any style conflicts, using an iframe is as simple as putting an iframe tag and itâ€™s src. I really wanted the height to be as tall as my viewable screen without setting a fixed height or using javascript. Thanks to a css property called vh (viewport height) itâ€™s a simple process.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">First create an iframe:</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\"><br></p>\r\n<pre><code class=\"language-css\">\r\n<iframe src=\"http://domain.com\" frameborder=\"0\"></iframe>\r\n</code></pre>\r\n<p>Then style the iframe in css:</p>\r\n<pre><code class=\"language-css\">\r\niframe {\r\n    display:block;\r\n    width:100%;\r\n    height:100vh;\r\n}\r\n</code></pre>', '2020-04-03 17:05:52', 1, NULL),
(11, 2, 'CSS 3', 'Front-end Development', 'create-pure-css-tooltips', 'Create Pure CSS Tooltips', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/flickity-illustration.gif', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">Through this code, you can have your own tooltips using just CSS!!</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">First the styling that goes inside your CSS file</p>\r\n<pre><code class=\"language-css\">\r\na:hover {background:#ffffff; text-decoration:none;} /*BG color is a must for IE6*/\r\na.tooltip span {display:none; padding:2px 3px; margin-left:8px; width:130px;}\r\na.tooltip:hover span{display:inline; position:absolute; background:#ffffff; border:1px solid #cccccc; color:#6c6c6c;}\r\n</code></pre>\r\n<p>To use the tooltip simple give any link a class of tooltip and place ant text you want in a tooltip inside span tags</p>\r\n<p><br></p>\r\n<pre><code class=\"language-php\">\r\n<a class=\"tooltip\" href=\"#\">Tooltiped link<span>This will appear in a tooltip</span></a>\r\n</code></pre>', '2020-04-03 17:09:35', 0, NULL),
(12, 2, 'Vue JS', 'Front-end Development', 'dealing-with-posting-large-number-of-checkboxes', 'Dealing with posting large number of checkboxes', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/dealing-with-posting-large-number-of-checkboxes.png', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">When you have a form with lots of checkboxes, you may hit a limit to how many you can post. I had this issue with a form that had over 125 checkboxes I found once the limit was reached not all checkboxes could be posted.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">My solution was using jQuery&nbsp;to scan all checkboxes read their values then stored as a comma separated list in a hidden input.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">Letâ€™s put this into practice below is a table of records wrapped inside a form, the top checkbox when checked all checkboxes underneath will be checked.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">Each checkbox has a value. Now the jQuery code needed to toggle the checkboxes:</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\"><br></p>\r\n\r\n<pre><code class=\"language-javascript\">\r\n$(document).ready(function () {\r\n\r\n    //on click check each checkbox\r\n    $(\'#selecctall\').click(function (event) {\r\n        if (this.checked) {\r\n            //loop through each checkbox\r\n            $(\'.checkbox\').each(function () { \r\n                $(this).prop(\'checked\', true); //check \r\n            });\r\n        } else {\r\n            //loop through each checkbox\r\n            $(\'.checkbox\').each(function () { \r\n                $(this).prop(\'checked\', false); //uncheck              \r\n            });\r\n        }\r\n\r\n        //collect each checkbox value\r\n        var checkedRows = $(\'.checkbox:checked\').map( function() {\r\n            return this.value;\r\n        }).get().join(\",\");\r\n\r\n        //add the comma seperated list to the input \r\n        $(\'#ids\').val(checkedRows);\r\n\r\n    });\r\n\r\n    //on checking a single checkbox update the comma seperated list\r\n    $(\'.checkbox\').change(function(){\r\n        var checkedRows = $(\'.checkbox:checked\').map( function() {\r\n            return this.value;\r\n        }).get().join(\",\");\r\n\r\n        $(\'#ids\').val(checkedRows);\r\n    });\r\n\r\n});\r\n\r\n</code></pre>', '2020-04-03 17:13:31', 6, NULL),
(13, 2, 'PHP', 'Back-end Development', 'adding-a-drag-and-drop-image-uploads-amp-custom-upload-script-to-ckeditor-4', 'Adding a Drag and Drop image uploads &amp; custom upload script to CKEditor 4', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/8dde2f8f-da80-41c5-a69d-d05c8a310ad5.jpg', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">In order to add drag and drop image upload to CKEditor make sure you\'ve included the&nbsp;<a href=\"https://ckeditor.com/cke4/addon/uploadimage\" style=\"color: rgb(218, 82, 30); transition: all 0.33s ease 0s; line-height: 1.4;\">Upload Image plugin</a>&nbsp;to CKEditor.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">To enable drag and drop and file uploads there are 2 settings that need to be enabled. go to ckeditor/config.js and add these settings:</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">In this case, I\'m using&nbsp;<a href=\"https://studio-42.github.io/elFinder/#elf_l1_Lw\" style=\"color: rgb(218, 82, 30); transition: all 0.33s ease 0s; line-height: 1.4;\">elFinder</a>&nbsp;for the filemanager</p>\r\n\r\n<pre><code class=\"language-php\">\r\nconfig.filebrowserUploadUrl = \'/elfinder/php/upload.php?type=file\';\r\nconfig.imageUploadUrl = \'/elfinder/php/upload.php?type=image\';\r\n</code></pre>\r\n\r\n<p>The filebrowserUploadUrl is for enabling file uploads from the link and image dialog boxes.\r\nThe imageUploadUrl is for allowing drag and drop uploads.\r\n\r\nYou could send these to different files, I\'ve chosen to deal with both cases in the same file called upload.php that I\'ve placed in elfinder/php/upload.php\r\n\r\nThe first task to take care of is ensuring the post request has come from CKEditor and not somewhere else. CKEditor comes with CSRF token out the box so we can use that and compare the value it stores in a cookie against the post request:</p>\r\n\r\n<pre><code class=\"language-php\">//if csrf passes\r\nif ($_COOKIE[\'ckCsrfToken\'] == $_POST[\'ckCsrfToken\']) {</code></pre>\r\n\r\n<p>Now define sizes so we can later use them for calculating file upload sizes. Also set up the base variables:</p>\r\n<pre><code class=\"language-php\">\r\n//define file sizes\r\ndefine(\'KB\', 1024);\r\ndefine(\'MB\', 1048576);\r\ndefine(\'GB\', 1073741824);\r\ndefine(\'TB\', 1099511627776);\r\n\r\n//set variables \r\n$tmpName  	   = $_FILES[\'upload\'][\'tmp_name\'];\r\n$filename 	   = $_FILES[\'upload\'][\'name\'];\r\n$size 		   = $_FILES[\'upload\'][\'size\'];\r\n$filePath      = \"../files/\" . date(\'d-m-Y-H-i-s\').\'-\'.$filename;\r\n$fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));\r\n$type 		   = $_GET[\'type\'];\r\n$funcNum 	   = isset($_GET[\'CKEditorFuncNum\']) ? $_GET[\'CKEditorFuncNum\']: null;\r\n</code></pre>\r\n<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">$tmpName - the tempory name assigned to uploaded files.<br>$filename - is the name of the file eg logo.png.<br>$size - is the size in bytes of the file.<br>$filePath - is where you want to store the file, This code goes up a directory into the files folder and applies a datetime to the start of the filename (optional).<br>$fileExtension - is the extension of the file.<br>$type - will be either file or image depending on the action on the editor.<br>$funcNum - comes from CKEditor and is needed when using the file callback.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">Depending on the type set the file extensions allowed to be uploaded.</p>\r\n\r\n<pre><code class=\"language-php\">\r\nif ($type == \'image\') {\r\n	$allowedfileExtensions = array(\'jpg\', \'jpeg\', \'gif\', \'png\');\r\n} else {\r\n	//file\r\n	$allowedfileExtensions = array(\'jpg\', \'jpeg\', \'gif\', \'png\', \'pdf\', \'doc\', \'docx\');\r\n}\r\n</code></pre>\r\n<p><span style=\"color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif; font-size: 18px;\">Now check if the file/image is allowed otherwise set the error message and when its a file echo a javascript passing in the $funcNum, $filePath and&nbsp;$message. CKEditor will use these to alert the user.&nbsp;</span><br style=\"color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif; font-size: 18px;\"><span style=\"color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif; font-size: 18px;\">For drag and drop uploads return an array containing uploaded 0 for fail, error with an array containing the error message.</span><br></p>\r\n\r\n<pre><code class=\"language-php\">\r\n//contrinue only if file is allowed\r\nif (in_array($fileExtension, $allowedfileExtensions)) {\r\n} else {\r\n	$error = \'The file type uploaded is not allowed.\';\r\n	if ($type == \'file\') {\r\n		$funcNum = $_GET[\'CKEditorFuncNum\'];\r\n		$message = $error;\r\n		exit();\r\n	}\r\n    $data = array(\'uploaded\' =&gt; 0, \'error\' =&gt; array(\'message\' =&gt; $error));\r\n}\r\n</code></pre>\r\n<p><span style=\"color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif; font-size: 18px;\">Now when you can drag and drop images on CKEditor then the uplpad.php script will be triggered and upload the file to the elfinder/php/files folder.</span><br></p>', '2020-04-03 17:21:28', 4, NULL),
(20, 2, 'PHP', 'Back-end Development', 'generate-a-pdf-from-a-web-page', 'Generate a PDF from a web page', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/bg-vector.png', '<p><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXIAAAHWCAYAAABqqQLxAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDphNmU1ZjgwZC0xMTkwLTY3NGItYmUwNC1jZjA3NDY2MjMzZWEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QzJENjcyNjZGOTlEMTFFOUIyRERBM0MyRkZDNUIxODMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QzJENjcyNjVGOTlEMTFFOUIyRERBM0MyRkZDNUIxODMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NWNjYzQ5ZjEtMDk1OC01ZjRiLTkwYTktZWI1NGJjYjI0Y2Y4IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOmE2ZTVmODBkLTExOTAtNjc0Yi1iZTA0LWNmMDc0NjYyMzNlYSIv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\" data-filename=\"bg-shape.png\" style=\"width: 100%;\"><br></p>', '2020-04-05 08:57:45', 2, NULL),
(21, 2, 'News', 'Others', 'pick-up-my-book-beginning-php-for-a-fiver', 'Pick up my book Beginning PHP for a fiver', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/beginning-php.png', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">My Book Beginning PHP is now just $5 to buy from PacktPub</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\"><a href=\"https://www.packtpub.com/application-development/beginning-php\" style=\"transition: all 0.33s ease 0s; line-height: 1.4;\">https://www.packtpub.com/application-development/beginning-php</a></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">Learn all the fundamentals of PHP with a book that blends theory with practice to build up the skills you need for modern web development.</p><h2 style=\"line-height: 1.1; margin-bottom: 10px;\">What You Will Learn</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">Understand the fundamentals of PHP and work with classes and inheritance</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">Learn about database operations and package management with composer</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">Tackle common security concerns and pitfalls using authentication and validation</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">Build effective PHP applications and frameworks for your business needs<br>Authors</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 25px; padding-top: 0px;\">Get it now.&nbsp;<a href=\"https://www.packtpub.com/application-development/beginning-php\" style=\"transition: all 0.33s ease 0s; line-height: 1.4;\">https://www.packtpub.com/application-development/beginning-php</a></p>', '2020-04-05 18:09:07', 17, NULL),
(26, 2, 'News', 'Others', 'pick-up-my-book-beginning-php-for-a-fiver-2', 'Pick up my book Beginning PHP for a fiver 2', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/beginning-php.png', '<p><img src=\"../admin/assets/uploads/posts/a8baa56554f96369ab93e4f3bb068c22.png\"><br></p>', '2020-04-05 19:00:42', 2, NULL),
(27, 2, 'CSS 3', 'Front-end Development', 'trying-out-an-image-in-summernote', 'Trying out an image in summernote', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/logo-mdn.png', '<p>One of the factors to consider when improving your search engine ranking is page speed. Reducing the amount of HTTP requests your website uses will help improve your rank and page speed.</p><p><img src=\"../admin/assets/uploads/posts/698d51a19d8a121ce581499d7b701668.png\" style=\"width: 50%;\"><br></p>', '2020-04-05 20:20:10', 6, NULL),
(28, 2, 'CSS 3', 'Front-end Development', 'css-for-different-versions-of-ie', 'CSS for different versions of IE', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/logo-smashing.png', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">Some times your site looks different in IE 6 then it does in 7 or in Firefox. Most of the time you can combat this with better coding but there\'s times when that just not enough.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">in them situations you can use condition statements for IE6 &amp; IE7 in these conditions you would ran an alternate version of your CSS code an example of this:</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\"><br></p>\r\n<pre><code class=\"language-css\">\r\n#box {\r\n  padding-top:50px;\r\n  text-align:center;\r\n  color:#FFFFFF;\r\n  font-weight:bold;\r\n}\r\n#box {\r\n  padding-top:50px;\r\n  text-align:center;\r\n  color:#FFFFFF;\r\n  font-weight:bold;\r\n}\r\n</code></pre>\r\n<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">This would be placed in between the head tags</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">if lte IE 6 means if the browser is IE 6 then run the following code and the same applies to if lte IE 7</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\">you can either put some simple style changes in the if statement like this</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 18px; line-height: 25px; padding-top: 0px; color: rgb(68, 68, 68); font-family: &quot;Varela Round&quot;, Arial, &quot;Helvetica Neue&quot;, Helvetica, serif;\"><br></p>\r\n<pre><code class=\"language-css\">\r\n#box {\r\n  padding-top:50px;\r\n  text-align:center;\r\n  color:#FFFFFF;\r\n  font-weight:bold;\r\n</code></pre>\r\n<p>or import another stylesheet which is a better approach as your source code looks cleaner. Like this :</p>\r\n<pre><code class=\"language-css\">@import url(\"style/ie6.css\");</code></pre>\r\n<p>any CSS style called inside the if statements take precedence over the main stylesheet and take effect instead of what\'s in the main stylesheet for that element. Hopefully this will help you get around some of the problems you have with different versions of IE.</p>\r\n<pre><code class=\"language-html\"><p>Helloww</p></code></pre>', '2020-04-05 20:58:06', 19, NULL),
(29, 2, 'HTML', 'Front-end Development', 'getting-started-with-html', 'Getting started with HTML', 'C:/xampp/htdocs/web_blog/admin/assets/uploads/posts/logo-stripe.png', '<p><span style=\"color: rgb(57, 66, 92); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">I am a Full Stack Developer based in Kumasi, Ghana. I am a dreamer and a fanatic of all digital things. I\'ve worked on a couple of projects for companies and I love web design. I am also the CEO of Bizz Tech Inc.</span></p><p><span style=\"color: rgb(57, 66, 92); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">I am a Full Stack Developer based in Kumasi, Ghana. I am a dreamer and a fanatic of all digital things. I\'ve worked on a couple of projects for companies and I love web design. I am also the CEO of Bizz Tech Inc.</span><span style=\"color: rgb(57, 66, 92); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><br></span><br></p>', '2020-04-10 18:52:20', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(5) NOT NULL,
  `admin_id` int(5) DEFAULT NULL,
  `tag_name` varchar(400) DEFAULT NULL,
  `tag_slug` varchar(200) NOT NULL,
  `tag_category` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `admin_id`, `tag_name`, `tag_slug`, `tag_category`) VALUES
(1, 2, 'Vue JS', 'vue-js', 'Front-end Development'),
(2, 2, 'CSS 3', 'css-3', 'Front-end Development'),
(3, 2, 'PHP', 'php', 'Back-end Development'),
(4, 2, 'Personal', 'personal', 'Others'),
(5, 2, 'Development', 'development', 'Tutorials'),
(6, 2, 'News', 'news', 'Others'),
(7, 3, 'HTML', 'html', 'Front-end Development');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_pictures`
--
ALTER TABLE `admin_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `posts` ADD FULLTEXT KEY `title` (`title`);
ALTER TABLE `posts` ADD FULLTEXT KEY `post_desc` (`post_desc`);
ALTER TABLE `posts` ADD FULLTEXT KEY `tag_name` (`tag_name`);
ALTER TABLE `posts` ADD FULLTEXT KEY `tag_name_2` (`tag_name`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_pictures`
--
ALTER TABLE `admin_pictures`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
