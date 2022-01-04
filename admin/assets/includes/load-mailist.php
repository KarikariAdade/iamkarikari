<?php
include 'connect.php';
include 'slug-function.php';
$output = '';
$fetch_inbox = $conn->query("SELECT * FROM messages WHERE trashed = 0 AND full_name IS NOT NULL ORDER BY id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($fetch_inbox)) {
	while ($row = mysqli_fetch_assoc($fetch_inbox)) {
		$mail_id = $row['id'];
		$message = wordwrap($row['message'],130);
		$message =explode("\n", $message);
		$message = $message[0]."...";
		$slug_subject = slug($row['subject']);
		$date = date('M d, Y', strtotime($row['received_date']));
		$time = date('H:i', strtotime($row['received_date']));
		$output .= '<li class="list-group-item">
		<div class="media">
		<div class="pull-left" style="margin-right: 20px;">
		<div class="controls">
		<button class="btn btn-danger btn-sm" onclick="return del_mail('.$mail_id.')"><span class="fa fa-trash fa-sm"></span></button>
		</div>
		</div>
		<div class="media-body">
		<div class="media-heading">
		<a href="mail-detail.php?mail='.urlencode($row["id"]).'&subject='.urlencode($slug_subject).'" class="mr-2">'.$row["subject"].'</a>'. (($row["status"] == 0)?'<span class="badge bg-gradient-dark text-white">Unread</span>':'<span class="badge bg-success text-white">Read</span>').'

		<small class="float-right text-muted"><time class="hidden-sm-down"></time><i class="zmdi zmdi-attachment-alt ml-2"></i>'.$date.' at '.$time.'</small>
		</div>
		<p class="msg">'.$message.'</p>
		</div>
		</div>
		</li>';
	}
}
echo $output;
?>