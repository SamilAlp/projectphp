<?php 

include 'classdatabase.php';

if(isset($_POST['submit'])){
  
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = new database("localhost", "projectphp", "root", "", "utf8mb4");
    //echo "Calling login<br>";
    $pdo->login($username, $password);
    echo '<hr>';
}

?>




<!DOCTYPE html>
<html>
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="main.css">
   </head>
    <body>
        <form action="" method="post" class="form-inline">
          <div class="form-group mb-2">
            <label for="staticEmail2" class="sr-only">username</label>
            <input type="text" name="username" class="form-control"  placeholder="Username" required>
          </div>
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <input type="submit" class="btn btn-primary mb-2" value="Login" name="submit">
        
        </form>
        <div class="link-box">
          <a href="./lostpw.php" class="btn btn-primary">Wachtwoord vergeten?</a>
          <a href="./signup.php" class="btn btn-primary">Registreer hier</a>
          <a href="./adminlogin.php" class="btn btn-primary">Admin login</a>
        </div>
    </body>
</html>




