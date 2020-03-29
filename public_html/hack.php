<?php
	session_start();

	$_SESSION["loggedin"] = TRUE;
	$_SESSION["accountid"] = 666;
	$_SESSION["username"] = "hack account";

	header("Location: index.php");
?>