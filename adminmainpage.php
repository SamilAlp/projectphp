<!DOCTYPE html>
<html>
	<head>
		<title>
		</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
<body>
	Welkom 
	<?php 
	session_start();
	include "classdatabase.php";
	if (isset($_SESSION['username'])) {
		echo $_SESSION['username'];
	}
	?> on the admin page u can see private shit here..

</body>
</html>