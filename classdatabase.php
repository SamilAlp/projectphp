<?php
	
class database{
		//properties = variabelen in een class
	 private $host;
	 private $database_name;
	 private $user;
	 private $password;
	 private $charset; 
	 private $pdo;  	 
 
 	// constructor
    public function __construct($host, $database_name, $user, $password, $charset) {
  	 $this->host = $host;//127.0.0.1";
  	 $this->database_name = $database_name;//"test";
  	 $this->user =$user;//"root";
  	 $this->password = $password;//"";
  	 $this->charset = $charset;//"utf8mb4";

	 try {
	 	$dsn = "mysql:host=$this->host;database_name=$this->database_name;charset=$this->charset";
	 	echo "Database connectected";

	    $this->pdo = new PDO($dsn,$this->user, $this->password);
	 } catch (PDOException $e) {
	      echo $e->getMessage();
	      exit("error");
	  } 
 	} 

    public function InsertTabellen($email, $voornaam, $achternaam, $tussenvoegsel, $geboortedatum, $username, $password){
    	try{
    		$this->pdo->beginTransaction();

    		$sqlusertype = "select id from usertype WHERE type 'admin'";

			$sql2 = "INSERT INTO account(id, usertype_id, username, email, password)
			                VALUES(NULL, 2, :username, :email, :password);";

    		$stmt = $this->pdo->prepare($sql2);
    		$stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);
            
            $id = $this->pdo->lastInsertId();
    		$sqlpersoon = "INSERT INTO persoon(id, voornaam, achternaam, tussenvoegsel, geboortedatum, account_id) VALUES (NULL, :voornaam, :achternaam, :tussenvoegsel, :geboortedatum, :account_id);";	

    		$stmt = $this->pdo->prepare($sqlpersoon);
			$stmt->execute(['voornaam' => $voornaam, 'achternaam' => $achternaam, 'tussenvoegsel' => $tussenvoegsel,     'geboortedatum' => $geboortedatum, 'account_id' => $id]);
			
			$this->pdo->commit();
			echo " <br> Commit succesfull";
			
    	}catch(PDOException $e){
			$this->pdo->rollback();
	    	echo "failed: ". $e->getMessage();
			}
	}
}	
?>

