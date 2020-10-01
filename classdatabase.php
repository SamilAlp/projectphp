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

//
 public function executeQuery($email, $password){

 	echo 'checkme'. $email . '' . $password . '' ;

 	$sql = "SELECT * FROM account WHERE email = ? AND password=?";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute([$email, $password]);
	$user = $stmt->fetch();

	try{
		$pdo->beginTransaction();
		$stmt = $this->$pdo->prepare("INSERT INTO account (name) VALUES (?)");
		foreach (['id'] as $name){
		$stmt->execute([$name]);
		}
		$stmt = $pdo->prepare("INSERT INTO persoon (name) VALUES (?)");
		$pdo->commit();

	}catch(Eception $e){
		$pdo->rollback();
    	throw $e;
	}
 }
} 
// vraaag aan emvrouw int / into not nullbeteknis

?>
