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
	 	$dsn = 'mysql:host='.$this->host.';dbname='.$this->database_name.';charset='.$this->charset;
	 	$this->pdo = new PDO($dsn,$this->user, $this->password);
	 	$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 	echo "Database connectected";
	 	echo "<hr>";


	 } catch (\PDOException $e) {
	      echo "Database connection failed <br>". $e->getMessage();
	  } 
 	} 

    public function InsertTabellen($email, $voornaam, $achternaam, $tussenvoegsel, $geboortedatum, $username, $password){
    	try{
    		$this->pdo->beginTransaction();

			$sql2 = "INSERT INTO account(id, usertype_id, username, email, password)
			                VALUES(NULL, 2, :username, :email, :password);";

			$passwordhash = password_hash($password, PASSWORD_DEFAULT);
			$passwordhash = md5($password);

    		$stmt = $this->pdo->prepare($sql2);
    		$stmt->execute(['username' => $username, 'email' => $email, 'password' => $passwordhash]);
            
            $id = $this->pdo->lastInsertId();
    		$sqlpersoon = "INSERT INTO persoon(id, voornaam, achternaam, tussenvoegsel, geboortedatum, account_id) VALUES (NULL, :voornaam, :achternaam, :tussenvoegsel, :geboortedatum, :account_id);";	

    		$stmt = $this->pdo->prepare($sqlpersoon);
			$stmt->execute(['voornaam' => $voornaam, 'achternaam' => $achternaam, 'tussenvoegsel' => $tussenvoegsel,     'geboortedatum' => $geboortedatum, 'account_id' => $id]);
			
			$this->pdo->commit();
			echo "Commit succesfull";

			echo "<hr>";

			echo "voornaam = $voornaam | tussenvoegsel = $tussenvoegsel | achternaam = $achternaam | email =  $email | geboortedatum =  $geboortedatum | username =  $username | password = $password | passwordhash = 
		           $passwordhash;";
		
			
    	}catch(PDOException $e){
			$this->pdo->rollback();
	    	echo "failed: ". $e->getMessage();
			}
	}

	public function login($username, $password){
		try{
			$this->pdo->beginTransaction();
            //echo "Inside Login#1<br>";
			echo "username: $username and password: $password<br>";
            echo "<hr>";
            echo "password_hash: ".md5($password)."<br>";
            echo "<hr>";

			if (!empty($username) || !empty($password)) {
			  $stmt = $this->pdo->prepare("SELECT * FROM account where username = ? AND password = ?");
			  $stmt->BindParam(1, $username);
			  $password_md5=md5($password);
              $stmt->BindParam(2, $password_md5);
			  $stmt->execute();
			  $rowCount= $stmt->fetch(PDO::FETCH_ASSOC);

			  if ($stmt->rowCount() == 1) {
			  	$_SESSION['username'] = $rowCount['username'];
			  	echo $rowCount['username'];
			  	header("location:login_success.php");
			  }
			  else{
			  	echo "Incorrect username or passoword!";
			  }

			}else{
				echo "Please enter username and password";
			 }

		}catch(PDOException $e){
			$this->pdo->rollback();
	    	echo "failed: ". $e->getMessage();
		}
	}

	public function loginadmin($username, $password){
		try{
			  $stmt = $this->pdo->prepare("SELECT * FROM admintable where username = ? AND password = ?");
			  $stmt->BindParam(1, $username);
              $stmt->BindParam(2, $password);
			  $stmt->execute();
			  $rowCount= $stmt->fetch(PDO::FETCH_ASSOC);

				if (!count($rowCount) < 0) {
			  	echo "Login succesfull";
			  	$_SESSION['username'] = $rowCount['username'];
			  	header("Location: adminmainpage.php");
			  }
			  else{
			  	echo "Incorrect username or passoword!";
			  	header("Location: adminlogin.php");
			  }

		}catch(PDOException $e){
			$this->pdo->rollback();
	    	echo "failed: ". $e->getMessage();
		}
	}
}	



			  // $stmt = $this->pdo->prepare("SELECT * FROM account where username = :username AND password = :password");
			  // $stmt->execute(array(
			  //  ":username" => $username, 
			  //  ":password" => $password


			//   $row = $stmt->fetchaAll(PDO::FETCH_ASSOC);
			//   $passwordhash = $result[0];
			//   print_r($passwordhash);
			//   $count = $stmt->rowCount();
			//   if (password_verify($password, $passwordhash)) {
			// 	   if ($count > 0){
			// 	   	$email = $S_SESSION['email'];
			// 	   }
			//   } else {
			// 	    echo 'Invalid password.';
			//   }
			// }

			// $count = $statement->rowCount();
			// 		 if ($count > 0 ) {
			// 		 	$S_SESSION["username"] = $_POST["username"];
			// 		 	header("location:login_succec.php");
			// 		 }
			// }
			//   if ($stmt->rowCount() == 1) {
			//   	echo "User verified, Accec granted";
			//   }
			//   else{
			//   	echo "Incorrect username or passoword!";
			//   }

			// }else{
			// 	echo "Please enter username and password";
			//  }
			 //  	}$count = $statement->rowCount();
				// if ($count > 0 ) {
			 // 	$S_SESSION["username"] = $_POST["username"];
			 // 	header("location:login_succec.php");
				// }
				// else
				// {
				// $message = '<label>Username OR Password is wrong</label>';
		  //    	}	
?>

<!-- 	public function login($username, $password){

		$host = "localhost";
		$username = "root";
		$password = ""
		$projectphp = "login"
		$message = ""

		try{
			$connection = new PDO("mysql:host=$host; dbname=$projectphp", $username, $password); 

		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if (isset($_POST["login"])) 
		{
			if(empty($_POST["usename"]) || empty($_POST["password"]))
			{
				$message = '<label>All fields required</label>';
			}
			else
			{
				$query = "SELECT * FROM user WHERE username =:username AND password =:password"
				$statement = $connect->prepare($query);
				$statement->execute(

					array(

						'username' => $_POST["password"],
						'password' => $_POST["password"] 
					);
					$count = $statement->rowCount();
					 if ($count > 0 ) {
					 	$S_SESSION["username"] = $_POST["username"];
					 	header("location:login_succec.php");
					 }
					 else
					 {
					 	$message = '<label>Username OR Password is wrong</label>';
					 }
				)
			}
		}

		}catch(PDOException $e)
		{
		  $message = $e->getMessage()
		}



		} -->