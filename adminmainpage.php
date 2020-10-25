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
    $pdo->adminlogin($username, $password);
    echo '<hr>';
   }
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
	 Welkom	
	<?php 
	if (isset($_SESSION)) {
	$username = $_SESSION['username'];
	echo $username;
	}
	?> the admin page u can see private things 
	<div class="container">
	    <div class="col-lg-12">
	    	<br><br>
			<h1 class="text-warning text-center" > Display Table Data </h1>
			<br>
			<table class=" table table-striped table-hover table-bordered">
				<tr class="bg-dark text-white text-center">
					<th> Id </th>
					<th> Username </th>
					<th> Password </th>
					<th> Delete user </th>
					<th> Eddit user </th>
				</tr>
				<?php  
				include "classdatabase.php";

				    $pdo = new database("localhost", "projectphp", "root", "", "utf8mb4");
				    $pdo->selectcrudtable($username, $password);
				    echo '<hr>';

				    while ($res = fetch_array($pdo)) {
				?>
				<tr class="text-center">
					<td> <!-- Id --> <?php echo $res['id'];?> </td>
					<td> <!-- Username --> <?php echo $res['username'];?> </td>
					<td> <!-- Password --> <?php echo $res['passowrd'];?> </td>
					<td> <!-- Delete user --> <button class="btn-danger"> <a href="delete.php?id=<?php echo $res['id']; ?>" class ="text-white">  Delete </a> </button> </td>
					<td> <!-- Eddit user -->  <button class="btn-danger"> <a href="update.php?id=<?php echo $res['id']; ?>" calss="text-primary"> Update </a> </button> </td>
				</tr>
				<?php
					} 
				?>
			</table> 	
		</div>
	</div>
</body>
</html>