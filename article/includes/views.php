<?php
include '../../includes/connect.php';
$slug = $_POST['slug'];
$conn->query("UPDATE posts SET views = views + 1 WHERE post_slug = '$slug'") or die(mysqli_error($conn));
?>