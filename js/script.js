$(document).ready(function (){
	
	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(200).fadeOut(500);
		}
	}
	
	
	//Update Header Style and Scroll to Top
	function headerStyle() {
		if($('.main-header').length){
			var windowpos = $(window).scrollTop();
			var siteHeader = $('.main-header');
			var sticky_header = $('.main-header .sticky-header');
			var scrollLink = $('.scroll-to-top');
			if (windowpos > 100) {
				siteHeader.addClass('fixed-header');
				sticky_header.addClass("animated slideInDown");
				scrollLink.fadeIn(300);
			} else {
				siteHeader.removeClass('fixed-header');
				sticky_header.removeClass("animated slideInDown");
				scrollLink.fadeOut(300);
			}
		}
	}
	
	headerStyle();
	

	
	//Submenu Dropdown Toggle
	if($('.main-header li.dropdown ul').length){
		$('.main-header .navigation li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
		
		//Dropdown Button
		$('.main-header .navigation li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('ul').slideToggle(500);
		});
		
		//Disable dropdown parent link
		$('.main-header .navigation li.dropdown > a').on('click', function(e) {
			e.preventDefault();
		});
	}
	
	
	
	//Search Popup
	if($('#search-popup').length){
		
		//Show Popup
		$('.search-box-btn').on('click', function() {
			$('#search-popup').addClass('popup-visible');
		});
		$(document).keydown(function(e){
			if(e.keyCode == 27) {
				$('#search-popup').removeClass('popup-visible');
			}
		});
		//Hide Popup
		$('.close-search,.search-popup .overlay-layer').on('click', function() {
			$('#search-popup').removeClass('popup-visible');
		});
	}
	
	
	
	//Mobile Nav Hide Show
	if($('.mobile-menu').length){
		
		var mobileMenuContent = $('.main-header .nav-outer .main-menu .navigation').html();
		$('.mobile-menu .navigation').append(mobileMenuContent);
		$('.sticky-header .navigation').append(mobileMenuContent);
		$('.mobile-menu .close-btn').on('click', function() {
			$('body').removeClass('mobile-menu-visible');
		});
		//Dropdown Button
		$('.mobile-menu li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('ul').slideToggle(500);
		});
		//Menu Toggle Btn
		$('.mobile-nav-toggler').on('click', function() {
			$('body').addClass('mobile-menu-visible');
		});

		//Menu Toggle Btn
		$('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
			$('body').removeClass('mobile-menu-visible');
		});

	}
	

/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */

   $(window).on('scroll', function() {
   	headerStyle();
   });
	//The scripts below loads posts on their subsequent pages
	$('.loader').hide();
	var more_posts = 12;
	$('#index-view-more-btn').click(function (){
		more_posts = more_posts + 12;
		$.ajax({
			url: 'includes/view-index-posts.php',
			method: 'POST',
			data:{
				more_posts: more_posts
			},
			beforeSend:function(){
				$('.loader').show();
			},
			success:function(data){
				$('.loader').hide();
				$('.view-posts-row').html(data);
			}
		})
	})

	$('#tags-view-more-btn').click(function(){
		var tag_name = $(this).attr('data-id');
		more_posts = more_posts + 12;
		$.ajax({
			url: 'includes/view-tag-posts.php',
			method: 'POST',
			data:{
				more_posts: more_posts,
				tag_name: tag_name
			},
			beforeSend:function(){
				$('.loader').show();
			},
			success:function(data){
				$('.loader').hide();
				$('.view-posts-row').html(data);
			}
		})
	})

	$('#personal-view-more-btn').click(function(){
		var tag_name = $(this).attr('data-id');
		more_posts = more_posts + 12;
		$.ajax({
			url: 'includes/view-personal-posts.php',
			method: 'POST',
			data:{
				more_posts: more_posts,
				tag_name: tag_name
			},
			beforeSend:function(){
				$('.loader').show();
			},
			success:function(data){
				$('.loader').hide();
				$('.view-posts-row').html(data);
			}
		})
	})
	$('.contact_us_form').submit(function (e){
		e.preventDefault();
		var full_name = $('#full_name').val();
		var email_address = $('#email_address').val();
		var phone = $('#phone').val();
		var subject = $('#subject').val();
		var message = $('#message').val();
		var contact_btn = $('#contact_btn').val();
		if (/^\+[-0-9]{6,20}$/.test(phone) == false) {
			$('.alert-box').show(400);
			$('#error_message').html('Invalid Phone Number, phone number should contain country code.');
			return;
		}
		$.ajax({
			url: 'includes/contact.php',
			method: 'POST',
			data: {
				full_name: full_name,
				email_address: email_address,
				phone: phone,
				subject: subject,
				message: message,
				contact_btn: contact_btn
			},
			beforeSend: function(){
				$('#before_send').html('Processing...');
			},
			success:function(data){
				$('#before_send').hide(400);
				$('.alert-box').show(400);
				$('#error_message').html(data);
				$('#full_name').focus();
			}
		})
	})
})