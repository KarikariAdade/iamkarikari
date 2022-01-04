<?php
include 'connect.php';
$success = false;
if (isset($_POST['subscribe_btn'])) {
	$newsletter_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['newsletter_email']));
	$check_mail_list = $conn->query("SELECT * FROM newsletter WHERE email = '$newsletter_email'") or die(mysqli_error($conn));
	if (mysqli_num_rows($check_mail_list) > 0) {
		echo "You have already signed up to the mailing list.";
	}else{
		if (!filter_var($newsletter_email, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid email address";
		}else{
			$add_mail_list = $conn->query("INSERT INTO newsletter (email) VALUES ('$newsletter_email')") or die(mysqli_error($conn));
		if ($add_mail_list) {
			$success = true;
			echo "Thanks for signing up to the mailing list.";
		}
		}
	}
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	var newsletter_email = '<?= $newsletter_email; ?>';
	if (success == true) {
		$('#notif-error').css('color','#18b16f');
		setCookie('Webblog', newsletter_email, 7);
		setInterval(popup_hide, 2000);
		function popup_hide(){
			$('.popup-modal, .modal-overlay').hide(500);
		}
		
	}
</script>