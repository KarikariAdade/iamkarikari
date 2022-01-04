<?php
session_start();
include 'connect.php';
$output = '';
$admin_id = $_SESSION['admin_id'];
$fetch_profile_pics = $conn->query("SELECT * FROM admin_pictures WHERE admin_id = '$admin_id' ORDER BY id DESC");
if (mysqli_num_rows($fetch_profile_pics) > 0) {
	while ($pic_row = mysqli_fetch_assoc($fetch_profile_pics)){
		$profile_image = explode('/', $pic_row['profile_image']);
		$profile_image = $profile_image[5].'/'.$profile_image[6].'/'.$profile_image[7].'/'.$profile_image[8];
		$picture_id = $pic_row['id'];
		$output .= '
		<div class="col-lg-4 hover15">
		<div class="image-detail">
		<p><button class="btn del_picture_btn" onclick="return delete_picture_function('.$picture_id.')"><span class="fa fa-trash"></span></button>
		</p>
		<button class="btn make_profile_pic" onclick="return change_picture('.$picture_id.')">Make Profile Picture</button>

	</div>
	<div class="card shadow overflow-hidden">
		<a href="'.$profile_image.'"><img src="'.$profile_image.'" alt="" title="Beautiful Image" style="width: 100%; height: 40vh;" class="img-fluid">
		</a>
	</div>
</div>
';

}
}
echo $output;
?>