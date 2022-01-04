<?php
include 'connect.php';
$output = '';
if (isset($_POST['admin_id'])) {
	$admin_id = $_POST['admin_id'];
	$fetch_profile = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
	$row = mysqli_fetch_assoc($fetch_profile);
	if (isset($row['profile_image'])) {
		$profile_image = explode('/', $row['profile_image']);
		$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
		$occupation = $row['occupation'];
		$output .= '
		<div class="card-profile-img">
		<img src="'.$profile_image.'">
		</div>
		<h2>'.$row["first_name"].' '.$row["last_name"].'</h2>
		<h5>'.$occupation.'</h5>
		<p>'.$row["description"].'</p>
		<h4>Social Links</h4>
		<div class="author-socials">';
		if (!empty($row['facebook'])) {
			$output .= '<button class="btn"><a href="'.$row["facebook"].'"><span class="fab fa-facebook-f author-icon"></span></a></button>';
		}
		if (!empty($row['twitter'])) {
			$output .= '<button class="btn"><a href="'.$row["twitter"].'"><span class="fab fa-twitter author-icon"></span></a></button>';
		}
		if (!empty($row['linkedin'])) {
			$output .= '<button class="btn"><a href="'.$row["linkedin"].'"><span class="fab fa-linkedin author-icon"></span></a></button>';
		}
		if (!empty($row['instagram'])) {
			$output .= '<button class="btn"><a href="'.$row["instagram"].'"><span class="fab fa-instagram author-icon"></span></a></button>';
		}
		$output .= '</div>';
		
		echo $output;
	}
}

?>

