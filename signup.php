<?php 

include 'classdatabase.php';

if(isset($_POST['submit'])){
// instance van je database class

$fieldnames = array("voornaam", "achternaam","email", "geboortedatum", "username", "password");

$error = false;

  foreach ($fieldnames as $fieldname) {
    if (empty($_POST[$fieldname])) {
       $error = true;
    }

  //   if(!empty($_POST[$fieldnames])){
  //   echo "<br> Plz fill the required fields in!";
  // }
    
  }
   if (!$error) {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $email = $_POST['email'];
    $geboortedatum =$_POST['geboortedatum'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = new database("localhost", "projectphp", "root", "", "utf8");
    $pdo->InsertTabellen($email, $voornaam, $achternaam, $tussenvoegsel, $geboortedatum, $username, $password);
    echo '<hr>';
    echo "voornaam = $voornaam | tussenvoegsel = $tussenvoegsel | achternaam = $achternaam | email =  $email | geboortedatum =  $geboortedatum | username =  $username | password = $password";
    echo '<hr>';
   }
 }

?>

<html>
 <head>
	 <title></title>
 </head>
   <body>
	    <form method="post">
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

        <label for="fname">Geboortedatum:</label>
         <input type="text" id="fname" name="geboortedatum" placeholder="00/00/0000" > <span class="col-xs-3">(Verplicht invullen) <span>
        <br><br>

  		  <label for="fname">Gebruiksnaam:</label>
  		   <input type="text" id="fname" name="username"> <span class="col-xs-3">(Verplicht invullen)<span>
        <br><br>

  		  <label for="fname">Wachtwoord:</label>
  	     <input type="password" id="fname" name="password"> <span class="col-xs-3">(Verplicht invullen)<span>
        <br><br>

  		  <label for="fname">Herhaal wachtwoord:</label> 
  		   <input type="password" id="fname" name="repeatpassword"> <span class="col-xs-3">(Verplicht invullen)<span>
        <br><br>  	 
        <input type="submit" name ='submit'value="Word gebruiker"> 
  	  </form>
       <a href="./index.php"> <input type="submit" value="Ik heb al een account Login!">
    </body>
</html>
