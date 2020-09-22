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

	 	$options = [
		     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		     PDO::ATTR_EMULATE_PREPARES   => false,
	 	];

	    $this->pdo = new PDO($dsn,$this->user, $this->password, $options);
	 } catch (\PDOException $e) {
	      throw new \PDOException($e->getMessage(), (int)$e->getCode());
	}
  
 }

 public function executeQuery(){
 	$sql = "SELECT * FROM account WHERE email=$email AND status=$status";
 	$statement = $this->pdo->prepare($query);
 	$statement
 	$statement
 	
 }
} 
?>
