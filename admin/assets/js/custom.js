$(document).ready(function (){
	// ______________ Back to top Button
	$(window).on("scroll", function(e) {
		// ______________ SCROLL TOP
		if ($(this).scrollTop() >300) {
			$('#back-to-top').fadeIn('slow');
		} else {
			$('#back-to-top').fadeOut('slow');
		}
	});
	$('#back-to-top').on("click", function() {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
	//side bar
	$(function(e) {
		$(".app-sidebar a").each(function() {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
		
	});
	   function readURL(input){
         if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e){
                   $('#upload_img, #post_img_show').attr('src', e.target.result);
             }
             reader.readAsDataURL(input.files[0]);
             // $('#featured_image_del_btn').hide();
       }
}

 $('#profile_picture, #post_image').change(function (){
   readURL(this);
})
  $('.summernote').summernote({
  	tabsize: '21',
  	height: '200',
    callbacks:{
       onImageUpload: function(image) {
                uploadImage(image[0]);
            }
    }
           
  });
  function uploadImage (image) {
        var data = new FormData();
        data.append('image', image);

        $.ajax({
            type: 'POST',
            url: 'assets/includes/upload.php',
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            success: function (url) {
                var image = $('<img>').attr('src',''+url);
                $('.summernote').summernote('insertNode', image[0]);
            },
            error: function (data) {
                alert(data);
            }
        });
    };
});