<?php
include 'connect.php';
include 'time-function.php';
$output = '';
$fetch_notification = $conn->query("SELECT * FROM newsletter ORDER BY id DESC");
if (mysqli_num_rows($fetch_notification) > 0) {
	while ($row = mysqli_fetch_assoc($fetch_notification)) {
		$notif_id = $row['id'];
		$output .= '<tr>
		<td class="text-sm font-weight-600">'.$row['email'].' signed up to your mailing list</td>
		<td class="text-nowrap">'.time_ago($row['date']).'</td>
		<td class=""><button class="btn btn-sm" onclick="return del_notif('.$notif_id.')"><span class="fa fa-trash"></span></button></td>
	</tr>';
}
}else{
$output = '<h2>There are no notifications at the moment</h2>';
}
echo $output;
?>