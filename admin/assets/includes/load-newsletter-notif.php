<?php
include 'connect.php';
$update = $conn->query("UPDATE newsletter SET status = 1");
if ($update) {
	$fetch_notif = $conn->query("SELECT * FROM newsletter WHERE status = 0");
	$notif_counter = mysqli_num_rows($fetch_notif);
	$success = true;
	echo $notif_counter;
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	if (success == true) {
		$('.newsletter-notif-number').hide();
	}
</script>
