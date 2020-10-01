<?php 

include 'classdatabase.php';

    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['firstname'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $email = $_POST['email'];
    $geboortedatum =$_POST['geboortedatum'];
    $username = $_POST['username'];
    $password = $_POST['password'];


// instance van je database class
$pdo = new database("localhost", "projectphp", "root", "", "utf8");
echo $email . '' . $password;
$pdo->executeQuery($email, $password);
?>

<html>
 <head>
	 <title></title>
 </head>
   <body>
	    <form action="signup.php" method="post">
  		  <label for="fname">Voor naam: </label> 
  	     <input type="text" id="fname" name="voornaam"> <span class="col-xs-3">(Verplicht invullen)<span>
        <br><br> 

  	 	  <label for="lname">Achter naam:</label>
  		   <input type="text" id="lname" name="achternaam"> <span class="col-xs-3">(Verplicht invullen)<span>
        <br><br>

  	    <label for="fname"> Tussen voegsel:</label>
  		   <input type="text" id="fname" name="tussenvoegsel" placeholder="Optioneel" > <span class="col-xs-3">
        <br><br>

  		  <label for="fname">E-mail:</label>
  		   <input type="email" id="fname" name="email"> <span class="col-xs-3">(Verplicht invullen)<span>
        <br><br>

        <!-- <label for="fname">Geboortedatum:</label>
         <input type="text" id="fname" name="fname" placeholder="00/00/0000" > <span class="col-xs-3">(Verplicht invullen) <span>
        <br><br> -->

  		  <label for="fname">Gebruiksnaam:</label>
  		   <input type="text" id="fname" name="username"> <span class="col-xs-3">(Verplicht invullen)<span>
        <br><br>

  		  <label for="fname">Wachtwoord:</label>
  	     <input type="password" id="fname" name="password"> <span class="col-xs-3">(Verplicht invullen)<span>
        <br><br>

  		  <label for="fname">Herhaal wachtwoord:</label> 
  		   <input type="password" id="fname" name="fname"> <span class="col-xs-3">(Verplicht invullen)<span>
        <br><br>  	 

        <input type="submit" value="Word gebruiker"> 
        <input type="submit" value="Ik heb al een account Login!">  
  	  </form>
    </body>
</html>
