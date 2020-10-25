<?php 
session_start();
include 'classdatabase.php';

if(isset($_POST['submit'])){

    
$fieldnames = array("username", "password");

$error = false;
  foreach ($fieldnames as $fieldname) {
    if (!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
       $error = true;
    }
  }  
	if (!$error) {
	    $username = $_POST['username'];
	    $password = $_POST['password'];
	    echo '<hr>';
	}
	$pdo = new database("localhost", "projectphp", "root", "", "utf8mb4");
	$pdo->loginadmin($username, $password);
}

?>

<!DOCTYPE html>
<html>
  <head>
	<title></title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="styleadmin.css">
	<link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
<body> 
   <header>
   	 <div class="container center-div shadow">
   	 	<div style="font-size: 25px;" class="heading text-center mb-5 text-white"> ADMIN LOGIN PAGE </div>
   
   	 	<div class="container row d-flex flex-row justify-content-center mb-5">
   	 		<div>
   	 			<div class="admin-form shadow p-2">
   	 	   			<form style="width: 410px" action="" method="POST">
   	 	   				<div class="form-group">
   	 	   					<label>Email ID</label>
   	 	   					<input type="text" name="username" value="" class="form-control" autocomplete="off">
   	 	   				</div>
   	 	   				<div class="form-group">
   	 	   					<label>Password</label>
   	 	   					<input type="password" name="password" value="" class="form-control" autocomplete="off">
   	 	   				</div>
   	 	   				<input type="submit" class="btn btn-success"  value="submit" name="submit">
   	 	   			</form>
   	 	   		</div>	
   	 		</div>
   	 	</div>
   	 </div>
   </header>
</body>
</html>
