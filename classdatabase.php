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
	 	$dsn = "mysql:host=".$this->host.";database_name=".$this->database_name.";charset=".$this->charset;
	 	echo "Database connectected";

	    $this->pdo = new PDO($dsn,$this->user, $this->password);
	 } catch (PDOException $e) {
	      echo $e->getMessage();
	      exit("error");
	    }
 	} 


    public function InsertTabellen($email, $voornaam, $achternaam, $tussenvoegsel, $username, $password){
    	try{
    		$this->pdo->beginTransaction();
    		
    		$sqlaccount = "INSERT INTO account(ID, email, password)        
    		VALUES                            (NULL, '$email', $password);";

    		$stmt = $this->pdo->prepare($sqlaccount);

    		$stmt->execute();
	
    		$sqlpersoon = "INSERT INTO persoon 
    			   (voornaam, achternaam, tussenvoegsel, username, password) 
    		VALUES ($voornaam, $achternaam, $tussenvoegsel ,$username, $password)";

    		$stmt = $this->pdo->prepare($sqlpersoon);

			$stmt->execute();
	
			$this->pdo->commit();
			echo "New row succecfully added";
			
    	}catch(Exception $e){
			$this->pdo->rollback();
	    	throw $e;
	    	echo "failed: ". $e->getMessage();
			}
	}
}	
?>
