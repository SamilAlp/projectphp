<?php
include "classdatabase.php";

session_start();

if(isset($_POST['submit'])){
// instance van je database class

$fieldnames = array("username", "password");

$error = false;

  foreach ($fieldnames as $fieldname) {
    if (isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
       $error = true;
    }
  //   if(!empty($_POST[$fieldnames])){
  //   echo "<br> Plz fill the required fields in!";
  // }
  }
   if (!$error) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = new database("localhost", "projectphp", "root", "", "utf8mb4");
    $pdo->InsertTabellen($username, $password);
    echo '<hr>';
   }
 }
?>

<!DOCTYPE html>
<html>
	 <head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
 <body background="images/xy1.jpg" style="  background-repeat: no-repeat;background-attachment: fixed;background-size: cover; overflow-x: hidden;">
	<div class="row">
	  <div class="col-sm-3">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title">Welkom 
	        <?php 
	        if (isset($_SESSION)) {
	        	$username = $_SESSION['username'];
	        	echo $username;
	        }
	        ?> 
	        </h5>
	        <p class="card-text">Welkom on the site , i like ya cut g</p>
	        <a href="#" class="btn btn-primary">Coming soon..</a>
	      </div>
	    </div>
	  </div>


	  <div class="col-sm-2">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title">Logout</h5>
	        <p class="card-text">And you let her go...</p>
	        <a href="index.php" class="btn btn-primary">Logout</a>
	      </div>
	    </div>
	  </div>
	</div>
 </body>
</html>