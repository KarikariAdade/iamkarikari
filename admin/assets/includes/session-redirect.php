<?php
if (!isset($_SESSION['admin_id'])) {
	echo "<script>window.location = 'sign-in.php';</script>";
}else{
	$admin_id = $_SESSION['admin_id'];

}
?>