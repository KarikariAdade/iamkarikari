<?php
if (isset($_POST['contact_btn'])) {
	$client_name = htmlspecialchars($_POST['client_name']);
	$client_phone = htmlspecialchars($_POST['client_phone']);
	$client_email = htmlspecialchars($_POST['client_email']);
	$client_text = htmlspecialchars($_POST['client_text']);
	$correct_phone = preg_match('@[0-9]@', $client_phone);
	if (!empty($client_name) && !empty($client_phone) && !empty($client_email) && !empty($client_text)) {
		$error = false;
		if (!filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
			$email_error = true;
			echo "Invalid Email Address";
		}elseif (strlen($client_phone) > 15) {
			echo "Phone Number too long";
		}elseif (!$correct_phone) {
			echo "Invalid Phone Number";
		}else{
			$success = true;
			echo "Send Email to iamkarikari@gmail.com";
		}
	}else{
		$error = true;
		echo "Fill all fields before submitting";;
	}
}
?>
<script type="text/javascript">
	var success = '<?= $success;?>';
	if (success == true) {
		$('.client_form').toggle();
		$('#errorSection').css('color', 'green');
	}
</script>