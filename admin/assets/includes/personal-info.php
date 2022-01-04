<?php
include 'connect.php';
$success = false;
if (isset($_POST['add_personal_form_btn'])) {
	$admin_id = $_POST['admin_id'];
	$birthdate = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['birthdate']));
	$address = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['address']));
	$description = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['description']));
	$occupation = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['occupation']));
	if (!empty($birthdate) && !empty($address) && !empty($description)) {
		if (strlen($description) < 20) {
			echo "Description field should contain <strong>more than 20</strong> characters";
		}else{
			$update = $conn->query("UPDATE admin SET
				birthdate = '$birthdate',
				address = '$address',
				description = '$description',
				occupation = '$occupation' WHERE id = '$admin_id'") or die(mysqli_error($conn));
			if ($update) {
				$success = true;
				echo "Personal Information updated";
			}
		}
	}else{
		echo "Fill all fields before submitting";
	}
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	if (success == true) {
		$('.alert-box').css('background-color','#18b16f');
	}else{
		$('#birthdate').focus();
	}
</script>