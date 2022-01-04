<?php

// This form add / update social media links of admins
include 'connect.php';
$success = false;
if (isset($_POST['submit_social_form_btn'])) {
	$facebook_link = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['facebook_link']));
	$twitter_link = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['twitter_link']));
	$admin_id = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['admin_id']));
	$linkedin_link = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['linkedin_link']));
	$instagram_link = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['instagram_link']));
	//check if accounts already created
	if (empty($facebook_link) && empty($twitter_link) && empty($linkedin_link) && empty($instagram_link)) {
		echo "Add at least one social media link before submitting";
	}else{
		$update_social = $conn->query("UPDATE admin SET 
			facebook = '$facebook_link',
			twitter = '$twitter_link',
			linkedin = '$linkedin_link',
			instagram = '$instagram_link' WHERE id = '$admin_id'") or die(mysqli_error($conn));
		if ($update_social) {
			$success = true;
			echo "Social links have been updated successfully";
		}
	}
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	if (success == true) {
		$('#social-alert-box').css('background-color','#18b16f');
	}else{
		$('#facebook_link').focus();
	}
</script>