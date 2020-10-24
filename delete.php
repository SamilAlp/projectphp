<<?php 

include "classdatabase";

$id = $_GET['id'];

    $pdo = new database("localhost", "projectphp", "root", "", "utf8mb4");
    //echo "Calling login<br>";
    $pdo->deleteuser($username, $password);
    echo '<hr>';
header('location:display.php');

?>