$(document).ready(function (){
	// Login form request
	$('.login-form').submit(function (e){
		e.preventDefault();
		var user_email = $('#user_email').val();
		var user_password = $('#user_password').val();
		var sign_in_btn = $('.sign_in_btn').val();
		$.ajax({
			url: 'assets/includes/sign-in-validation.php',
			method: 'POST',
			data: {
				user_email: user_email,
				user_password: user_password,
				sign_in_btn: sign_in_btn
			},
			success: function (data){
				$('.alert-box').show(400);
				$('#error_message').html(data);
			}
		})
	})

	//Sign up form request
	$('.sign-up-form').submit(function (e){
		e.preventDefault();
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var email_address = $('#email_address').val();
		var password = $('#password').val();
		var confirm_password = $('#confirm_password').val();
		var sign_up_btn = $('#sign-up-btn').val();
		$.ajax({
			url: 'assets/includes/sign-up.php',
			method: 'POST',
			data: {
				first_name: first_name,
				last_name: last_name,
				email_address: email_address,
				password:password,
				confirm_password: confirm_password,
				sign_up_btn: sign_up_btn
			},
			success: function(data){
				$('.alert-box').show(400);
				$('#error_message').html(data);
			}
		})
	})

	// Add personal Information form (add profile section)
	$('.add-personal-form').submit(function (e){
		e.preventDefault();
		var birthdate = $('#birthdate').val();
		var address = $('#address').val();
		var description = $('#description').val();
		var occupation = $('#occupation').val();
		var admin_id = $('#admin_id').val();
		var add_personal_form_btn = $('#add_personal_form_btn').val();
		$.ajax({
			url:'assets/includes/personal-info.php',
			method: 'POST',
			data: {
				admin_id: admin_id,
				birthdate: birthdate,
				address: address,
				occupation: occupation,
				description: description,
				add_personal_form_btn: add_personal_form_btn
			},
			success: function(data){
				$('#personal-detail-alert').show(400);
				$('#error_message').html(data);
			}
		});
	})

	// Add social links form (add profile section)
	$('.social-form').submit(function (e){
		e.preventDefault();
		var facebook_link = $('#facebook_link').val();
		var twitter_link = $('#twitter_link').val();
		var admin_id = $('#admin_id').val();
		var linkedin_link = $('#linkedin_link').val()
		var instagram_link = $('#instagram_link').val();
		var submit_social_form_btn = $('#submit_social_form_btn').val();
		$.ajax({
			url: 'assets/includes/social-links.php',
			method: 'POST',
			data: {
				facebook_link: facebook_link,
				twitter_link: twitter_link,
				admin_id: admin_id,
				linkedin_link: linkedin_link,
				instagram_link: instagram_link,
				submit_social_form_btn: submit_social_form_btn
			},
			success: function (data){
				$('#social-alert-box').show(400);
				$('#social-alert-box #error_message').html(data);
			}
		})
	})

	//Upload profile picture (add profile section)
	$('.edit-profile-pic-form').submit(function (e){
		e.preventDefault();
		$.ajax({
			url:'assets/includes/add-picture.php',
			method: 'POST',
			data: new FormData(this),
			contentType: false,
			processData: false,
			success: function (data){
				swal('Info', ''+data, 'info');
			}
		})
	})

	//Edit profile form (view profile section)
	$('.edit-profile-form').submit(function (e){
		e.preventDefault();
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var birthdate = $('#birthdate').val();
		var email = $('#email').val();
		var admin_id = $('#admin_id').val();
		var address = $('#address').val();
		var occupation = $('#occupation').val();
		var facebook_link = $('#facebook_link').val();
		var twitter_link = $('#twitter_link').val();
		var linkedin_link = $('#linkedin_link').val();
		var instagram_link = $('#instagram_link').val();
		var description = $('#description').val();
		var update_profile_btn = $('#update_profile_btn').val();
		$.ajax({
			url: 'assets/includes/edit-profile.php',
			method: 'POST',
			data: {
				facebook_link: facebook_link,
				twitter_link: twitter_link,
				linkedin_link: linkedin_link,
				instagram_link: instagram_link,
				admin_id: admin_id,
				first_name: first_name,
				last_name: last_name,
				birthdate: birthdate,
				email: email,
				address: address,
				occupation: occupation,
				description:description,
				update_profile_btn: update_profile_btn
			},
			success: function(data){
				$('.alert-box').show(400);
				$('#first_name').focus();
		$('#error_message').html(data);
			}
		})
	})

	//Reset password form (view profile)
	$('.reset-password-form').submit(function (e){
		e.preventDefault();
		var admin_id = $('#admin_id').val();
		var old_password = $('#old_password').val();
		var new_password = $('#new_password').val();
		var confirm_password = $('#confirm_password').val();
		var confirm_password_btn = $('#confirm_password_btn').val();
		$.ajax({
			url: 'assets/includes/reset-password.php',
			method: 'POST',
			data: {
				admin_id: admin_id,
				old_password: old_password,
				new_password: new_password,
				confirm_password: confirm_password,
				confirm_password_btn: confirm_password_btn
			},
			success:function (data){
				$('#social-alert-box').show(400);
				$('#social-alert-box #error_message').html(data);
			}
		})
	})
	function load_profile_pic(){
		$('.profile-pic-rows').load('assets/includes/profile-pic-rows.php');
	}
	setInterval(load_profile_pic, 2000);

	//Add Post tag (add post section)
	$('.add-tag-form').submit(function (e){
		e.preventDefault();
		var tag_category = $('#tag_category').val();
		var tag_name = $('#add_tag_name').val();
		var add_tag_form_btn = $('#add_tag_form_btn').val();
		var admin_id = $('#admin_id').val();
		$.ajax({
			url: 'assets/includes/add-tag.php',
			method: 'POST',
			data: {
				admin_id: admin_id,
				tag_category: tag_category,
				tag_name: tag_name,
				add_tag_form_btn:add_tag_form_btn
			},
			success: function (data){
				$('.alert-box').show(400);
				$('#error_message').html(data);
			}
		})
	})

	//Load Post tags
	function load_post_tags(){
		$('#tag-section-div').load('assets/includes/load-tags.php');
	}
	setInterval(load_post_tags, 2000);

	$('#post_category').change(function (){
			var post_category = $(this).val();
			$.ajax({
				url: 'assets/includes/fetch-tags.php',
				method: 'POST',
				data: {
					post_category: post_category
				},
				success: function (data){
					$('#tag_category').html(data);
				}
			})
		})


	//Show demo file upload modal
	$('.add-file-modal').click(function(){
		var id = $(this).attr('data-id');
		$.ajax({
			url: 'assets/includes/attach-file-modal.php?id='+id,
			cache: false,
			success:function (result){
				$('.modal-content').html(result);
			}
		})
	})

	var more_posts = 10;
	$('#show_more_posts_btn').click(function (){
		more_posts = more_posts + 10;
		$('.load_posts').load('assets/includes/load-posts.php',{
			more_posts: more_posts
		})
	})	

	function load_mail_list(){
		$('.mail_body').load('assets/includes/load-mail.php');
	}
	setInterval(load_mail_list, 1000);

	$('.forgot-password-form').submit(function (e){
		e.preventDefault();
		var reset_email = $('#reset-email').val();
		var reset_password_btn = $('#reset-password-btn').val();
		$.ajax({
			url: 'assets/includes/verify-email.php',
			method: 'POST',
			data: {
				reset_email: reset_email,
				reset_password_btn: reset_password_btn
			},
			success:function(data){
				$('.alert-box').show(400);
				$('#error_message').html(data);
			}
		})
	})
	$('#password-reset-form').submit(function (e){
		e.preventDefault();
		var user = $('#user').val();
		var token = $('#token').val();
		var new_password = $('#new_password').val();
		var confirm_new_password = $('#confirm_new_password').val();
		var confirm_new_password_btn = $('.confirm_new_password_btn').val();
		$.ajax({
			url: 'assets/includes/forget-pwd-reset.php',
			method: 'POST',
			data: {
				user: user,
				token: token,
				new_password: new_password,
				confirm_new_password: confirm_new_password,
				confirm_new_password_btn: confirm_new_password_btn
			},
			success: function (data){
				swal('Info', ''+data, 'info');
				setInterval(redirect, 2000);
			}
		})
	})

	//Redirect function

	function redirect(){
		window.location = 'sign-in.php';
	}

	//Load mailist function
	function load_maillist(){
		$('.mail_list_load').load('assets/includes/load-mailist.php');
	}
	setInterval(load_maillist, 1000);

	//Load outbox
	function load_outbox(){
		$('.outbox_list').load('assets/includes/load-outbox.php');
	}
	setInterval(load_outbox, 1000);


	//Load mail sidebar function
	function load_mail_sidebar(){
		$('.mail-sidebar').load('assets/includes/load-mail-sidebar.php');
	}
	setInterval(load_mail_sidebar, 1000);

	//Compose Mail function 
	$('.compose-mail-form').submit(function (e){
		e.preventDefault();
		var to = $('#to').val();
		var mail_id = $('#mail_id').val();
		var subject = $('#subject').val();
		var message = $('#message').val();
		var send_mail_btn = $('.send_mail_btn').val();
		$.ajax({
			url: 'assets/includes/send-mail.php',
			method: 'POST',
			data: {
				to: to,
				mail_id: mail_id,
				subject: subject, 
				message: message,
				send_mail_btn: send_mail_btn
			},
			success: function (data){
				swal('Info', ''+data, 'info');
			}
		});
	})

$('.newsletter-notif-icon').click(function (){
		$('.newsletter-notif-number').load('assets/includes/load-newsletter-notif.php');
	})

//Automatically loads notifications
function load_notifications(){
	$('.notif-table').load('assets/includes/load-notification.php');
}
setInterval(load_notifications, 1000);
})