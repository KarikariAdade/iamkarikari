<div class="container-fluid modal-overlay">
		<div class="popup-modal box-shadow">
			<div class="row">
				<div class="col-md-5">
					<img src="../img/vector5.png">
				</div>
				<div class="col-md-7">
					<span class="close-icon" onclick="setCookie('Webblog', 'user', 7);$('.popup-modal, .modal-overlay').hide(500);"><i class="fa fa-times"></i></span>
					<h4>Join our Mailing List</h4>
					<p>Sign Up for our exclusive email list and be the first to know about new posts and tutorials</p>
					<p id="notif-error"></p>
					<form method="POST" class="newsletter-form">
						<input required type="email" id="newsletter_email" placeholder="Email Address"><br>
						<button type="submit" id="subscribe_btn">Subscribe</button>
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
	$('.popup-modal, .modal-overlay').hide();
	function setCookie(cname,cvalue,exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires=" + d.toGMTString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}
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
		var user = getCookie('Webblog');
		if (user != '') {
			$('.modal-overlay').hide();
		}else{
			$('.popup-modal, .modal-overlay').show();	
		}
	}
	$(document).ready(function (){
		setTimeout(check_cookie, 7000);
	})
	function writeCookie(){
		setCookie('Webblog', 'user', 7);
		$('.popup-modal, .modal-overlay').hide(500);
	}
		$('.newsletter-form').submit(function (e){
	e.preventDefault();
	var newsletter_email = $('#newsletter_email').val();
	var subscribe_btn = $('#subscribe_btn').val();
	$.ajax({
		url: '../includes/add-newsletter.php',
		method: 'POST',
		data:{
			newsletter_email: newsletter_email,
			subscribe_btn: subscribe_btn
		},
		success: function(data){
			if (data == 'Thanks for signing up to the mailing list.') {
				setCookie('Webblog', newsletter_email, 7);
				setInterval(popup_hide, 2000);
		function popup_hide(){
			$('.popup-modal, .modal-overlay').hide(500);
		}
			}
			$('#notif-error').html(data);
		}
	})
})
	</script>