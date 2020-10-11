<?php
	
	session_start();
	if (isset($_SESSION["username"])) 
	{
		echo '<h3>Login success, welcome - ' . $_SESSION["username"]. '</hr>';
	}


?>