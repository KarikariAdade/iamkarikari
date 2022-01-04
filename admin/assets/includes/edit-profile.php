<?php

//This form edits admin profile (view profile section)
include 'connect.php';
$success = false;
if (isset($_POST['update_profile_btn'])) {
	$first_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['first_name']));
	$last_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['last_name']));
	$birthdate = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['birthdate']));
	$email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));
	$address = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['address']));
	$occupation = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['occupation']));
	$admin_id = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['admin_id']));
	$description = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['description']));

	//Social links
	$facebook = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['facebook_link']));
	$twitter = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['twitter_link']));
	$linkedin = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['linkedin_link']));
	$instagram = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['instagram_link']));
	if (!empty($first_name) && !empty($last_name) && !empty($birthdate) && !empty($email) && !empty($address) && !empty($occupation) && !empty($description)) {
		if (strlen($first_name) < 3) {
				echo "First Name is too short";
			}elseif (strlen($last_name) < 3) {
				echo "Last Name is too short";
			}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "Invalid email address";
			}else{
				$update_profile = $conn->query("UPDATE admin SET
					first_name = '$first_name',
					last_name = '$last_name',
					birthdate = '$birthdate',
					email = '$email',
					address = '$address',
					occupation = '$occupation',
					description = '$description' WHERE id = '$admin_id'") or die(mysqli_error($conn));
				$update_socials = $conn->query("UPDATE admin SET
					facebook = '$facebook',
					twitter = '$twitter',
					linkedin = '$linkedin',
					instagram = '$instagram' WHERE id = '$admin_id'") or die(mysqli_error($conn));
				if ($update_profile && $update_socials) {
					$success = true;
					echo "Profile successfully updated";
				}
			}
	}else{
		echo "Fill all starred (*) fields before submitting";
	}
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	if (success == true) {
		$('.alert-box').css('background-color','#18b16f');
	}
</script>