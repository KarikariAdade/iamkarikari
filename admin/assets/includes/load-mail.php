<?php
include 'connect.php';
$output = '';
$fetch_mail = $conn->query("SELECT * FROM newsletter ORDER BY id DESC");
if (mysqli_num_rows($fetch_mail) > 0) {
	while ($row = mysqli_fetch_assoc($fetch_mail)) {
		$mail_id = $row['id'];
		$output .= '<tr>
		<td>'.$row["email"].'</td>
		<td>'.date("l F d, Y", strtotime($row["date"])).'</td>
		<td id="table_btn"><button class="btn btn-danger btn-sm" onclick="return mail('.$mail_id.');"><span class="fa fa-trash"></span></button></td>
	</tr>';
}
}
echo $output;
?>