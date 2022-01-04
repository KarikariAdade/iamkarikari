<?php
$fetch_inbox = $conn->query("SELECT * FROM messages WHERE trashed = 0 AND full_name IS NOT NULL ORDER BY id DESC") or die(mysqli_error($conn));
$inbox_count = mysqli_num_rows($fetch_inbox);

$fetch_sent = $conn->query("SELECT * FROM messages WHERE trashed = 0 AND reply_subject IS NOT NULL ORDER BY id DESC") or die(mysqli_error($conn));
$sent_count = mysqli_num_rows($fetch_sent);

$trash = $conn->query("SELECT * FROM messages WHERE trashed = 1 ORDER BY id DESC") or die(mysqli_error($conn));
$trash_count = mysqli_num_rows($trash);
?>
<nav class="p-0">
	<div class="card-body">
		<a href="compose-mail.php" class="btn bg-gradient-dark btn-block  btn-sm mt-1 mb-1">Compose Email</a>
	</div>
	<ul class="nav mail-sidebar">
		<li class="nav-item">
			<a class="nav-link mr-0 border-top" href="mailbox.php"><i class="fa fa-inbox"></i> Inbox <span class="badge badge-primary"><?= $inbox_count; ?></span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link mr-0" href="outbox.php"><i class="fas fa-rocket"></i> Sent <span class="badge badge-warning"><?= $sent_count; ?></span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link mr-0" href="trash.php"><i class="fas fa-trash"></i> Trash <span class="badge badge-danger"><?= $trash_count; ?></span></a>
		</li>
	</ul>
</nav>