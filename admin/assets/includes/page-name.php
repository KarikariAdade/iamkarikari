<div class="page-header mt-3 shadow p-3" style="margin-top: -49px;">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php">DASHBOARD</a></li>
		<li class="breadcrumb-item active" aria-current="page">
			<?php
			$page_name = chop(basename($_SERVER['PHP_SELF']), '.php');
			$page_name = strtoupper(str_replace('-', ' ', $page_name));
			echo $page_name;
			?>
		</li>
	</ol>
</div>