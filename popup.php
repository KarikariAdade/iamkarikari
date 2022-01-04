<!DOCTYPE html>
<html>
<head>
	<?php include 'includes/header.php';?>
	<title>pop up</title>
	<style type="text/css">
	.modal-overlay{
		position: relative;
		height: 100vh !important;
		display: none;
	}
	.modal-overlay::after{
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0; 
		background-color: rgba(0,0,0,.9);
	}
	.popup-modal{
		background-color: #fff;
		z-index: 100;
		position: relative;
		width: 100%;
		display: table;
		table-layout: fixed;
		top: 20%;
		border-radius: 5px;
	}
	.popup-modal .row .col-md-5{
		display: none;
	}
	.popup-modal .row .col-md-7{
		padding: 30px 30px;
		width: 100%;
		text-align: center;
	}
	.popup-modal .row .col-md-7 h4{
		/*font-size: 20px;*/
		text-align: center;
    margin: 0 0 0px 0;
    color: #000000;
    letter-spacing: 0.08em;
    text-transform: uppercase;
	}
	.popup-modal .row .col-md-7 .close-icon{
		position: absolute;
		top: -3%;
		right: 1%;
		cursor: pointer;
		background-color: #000;
		padding: 2px 8px;
		border-radius: 50%;
	}
	.popup-modal .row .col-md-7 p{
		padding: 2px 8px;
		text-align: center;
		padding-top: 5%;
		font-size: 15px;
	}
	.popup-modal .row .col-md-7 form input{
		width: 85%;
		border: 1px solid #e8e9eb;
		margin: 0 auto 20px;
		padding: 6px 10px;
	}
	.popup-modal .row .col-md-7 .close-icon .fa-times{
		color: #fbc25e;
	}
	.popup-modal .row .col-md-7 form button{
		padding: 5px 15px;
  	font-weight: 600;
  	background-color: #fbc25e;
  	overflow: hidden;
  	overflow:hidden;
  	transition: .5s;
  	border:2px solid #fbc25e;
  	font-size: 13px;
  	box-shadow: 0 5px 10px rgba(0,0,0,.3);
  	text-transform: uppercase;
  	letter-spacing: 1px;
  		}
  		.popup-modal .row .col-md-7 .icons a{
  			margin-right: 50px;
  		}
  		.popup-modal .row .col-md-7 .icons a .social-icon{
  			transition: all .5s;
  		}
  		.popup-modal .row .col-md-7 .icons a .social-icon:hover{
  			color: #1a1e25;
  		}
  		.popup-modal .row .col-md-7 .icons a:last-child{
  			margin-right: 0;
  		}
  		.popup-modal .row .col-md-7 form button:hover{
  			background-color: #1a1e25;
  			color: #fbc25e;
  			border:2px solid #1a1e25;
  		}
	@media (min-width: 1000px){
		.popup-modal{
			height: 5vh !important;
			padding: 0;
			margin: 0;
			background-color: #fff;
			z-index: 100;
			position: relative;
			width: 55%;
			display: table;
			table-layout: fixed;
			top: 25%;
			left: 20%;
		}
		.popup-modal .row .col-md-5{
		display: block;
		padding: 0;
		background-color: #1a1e25;
		/*margin: 0;*/

	}
	.popup-modal .row .col-md-7{
		padding: 20px 20px;
		width: 100%;
		background-color: #fff;
		text-align: center;
	}
	.popup-modal .row .col-md-7 .close-icon{
		position: absolute;
		top: -3%;
		cursor: pointer;
		right: -3%;
		background-color: #000;
		padding: 2px 8px;
	}
	.popup-modal .row .col-md-5 img{
		height: 305px;
		width: 100%;
		padding: 5% 20px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
	}
	.popup-modal .row .col-md-7 form button{
		padding: 5px 15px;
  	font-weight: 600;
  	background-color: #fbc25e;
  	overflow: hidden;
  	overflow:hidden;
  	transition: .5s;
  	border:2px solid #fbc25e;
  	box-shadow: 0 5px 10px rgba(0,0,0,.3);
  	text-transform: uppercase;
  	letter-spacing: 1px;
  		}
	}
	</style>
</head>
<body>
	<div class="container-fluid modal-overlay">
		<div class="popup-modal box-shadow">
			<div class="row">
				<div class="col-md-5">
					<img src="img/vector5.png">
				</div>
				<div class="col-md-7">
					<span class="close-icon"><i class="fa fa-times"></i></span>
					<h4>Join our Mailing List</h4>
					<p>Sign Up for our exclusive email list and be the first to know about new posts and tutorials</p>
					<!-- <p style="margin:0;margin-top: -10px; padding:0;padding-bottom: 10px;">Invalid Email Address</p> -->
					<form method="POST">
						<input type="text" name="" placeholder="Email Address"><br>
						<button type="button" onclick="return writeCookie()">Subscribe</button>
					</form>
					<div class="icons" style="padding-top: 20px;">
						<a href=""><span class="fab fa-facebook-f social-icon"></span></a>
						<a href=""><span class="fab fa-twitter social-icon"></span></a>
						<a href=""><span class="fab fa-instagram social-icon"></span></a>
						<a href=""><span class="fab fa-linkedin social-icon"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
$('.close-icon').click(function(){
	$('.popup-modal').hide();
})
		$('.popup-modal, .modal-overlay').hide();
		function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
// setCookie('Karikari', 'user', 2);
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function check_cookie (){
	var user = getCookie('Karikari');
	if (user != '') {
		alert('cookie is set');
	}else{
		alert('cookie is not set');
		$('.popup-modal, .modal-overlay').show();
		
		
	}
}
$(document).ready(function (){
	// var user_cookie = check_cookie();
	setTimeout(check_cookie, 9000);
})
function writeCookie(){
	alert('bout to write cookie');
	setCookie('Karikari', 'user', 2);
	$('.popup-modal, .modal-overlay').hide(500);
	alert('Cookie is set');
}
</script>
</body>
</html>