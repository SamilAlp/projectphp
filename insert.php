<?php  

include "classdatabase.php";

if(isset($_POST['submit'])){

	$username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = new database("localhost", "projectphp", "root", "", "utf8mb4");
    //echo "Calling login<br>";
    $pdo->overviewadmin($username, $password);
    echo '<hr>';
}	

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="col-lg-6 m-auto">
		<form method="POST">
			<br><br><div class="card" style="color: #FFF;">
				<div class="card-header bg-dark">
					<h1 class="text-white">Insert Operation</h1>
				</div>
				<label> Username: </label>
				<input type="text" name="username" class="form-control" placeholder="Username"> <br>

				<label> Password: </label>
				<input type="text" name="password" class="form-control" placeholder="Password"> <br>

				<button class="btn btn-success" type="sumbit" name="sumbit"> sumbit </button>
			</div>
		</form>
	</div>
</body>
</html>