<!doctype html>
<html lang="en">

<head>
	<title>Antrian</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="<?php echo base_url('assets_style/assets/css/tailwind.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_style/assets/css/daisyui.full.css'); ?>">

</head>

<body>
	<div id="antrian"></div>

	<script>
		$(document).ready(function() {
			let timerId = setInterval(() => $("#antrian").load("<?= base_url('antrian/count'); ?>"), 2000);
		});
	</script>
	<!-- Optional JavaScript -->
</body>

</html>