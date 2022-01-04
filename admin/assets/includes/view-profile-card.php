<?php
//Loads view profile cards
include 'connect.php';
$output = '';
if (isset($_POST['admin_id'])) {
	$admin_id = $_POST['admin_id'];
	$fetch_admin = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'") or die(mysqli_error($conn));
	$profile_row = mysqli_fetch_assoc($fetch_admin);
	$output .= '<div class="card profile-card box-shadow">';
	if (!empty($profile_row['profile_image'])) {
		$profile_image = explode('/', $profile_row['profile_image']);
		$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
	$output .= '
	<div class="card-profile-img">
	<img src="'.$profile_image.'">
	</div>';
	}
	$output .= '<h2>'.$profile_row["first_name"].' '.$profile_row["last_name"].'</h2>
	<h5>'.$profile_row["occupation"].'</h5>
	<p>'.$profile_row["description"].'</p>
	';

	//Fetch Socials
	$fetch_socials = $conn->query("SELECT * FROM admin WHERE id = '$admin_id'");
		if (mysqli_num_rows($fetch_socials) > 0) {
			
			$row = mysqli_fetch_assoc($fetch_socials);

			if (!empty($row['facebook'])) {
				$output .='<h4>Social Links</h4>
	<div class="author-socials">';
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
		}
		$output .= '</div></div>';

		//Personal Details
		$output .= '<div class="card box-shadow personal-detail-card">
		<h2>Personal Details</h2>
		';
		if (!empty($profile_row['birthdate'])) {
			$output .= '<p>
			<span>Birthday</span>
			<span>'.$profile_row["birthdate"].'</span>
			</p>
			';
		}
		if (!empty($profile_row['email'])) {
			$output .= '<p>
			<span>Email</span>
			<span>'.$profile_row["email"].'</span>
			</p>
			';
		}
		if (!empty($profile_row['address'])) {
			$output .= '<p>
			<span>Address</span>
			<span>'.$profile_row["address"].'</span>
			</p>
			';
		}
		
			$output .= '<p>
			<span>Total Posts</span>
			<span>'.$profile_row["total_posts"].'</span>
			</p>
			';
		
			
		
	$output .= '</div>';
	echo $output;
}
?>