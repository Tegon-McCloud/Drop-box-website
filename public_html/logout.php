<?php
	session_start();
	
	$_SESSION["loggedin"] = NULL;
	$_SESSION["userid"] = NULL; 
	$_SESSION["username"] = NULL;

	header("Location: index.php");
?>