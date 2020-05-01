<?php
	require_once "../inc/db.php";
	require_once "../inc/verify_path.php";
	session_start();
	
	if(!isset($_SESSION["loggedin"])){
		header("Location: ../index.php");
		die();
	}
	
	$DB = openDB();
	$result = mysqli_query($DB, "CALL delete_account(".$_SESSION["accountid"].")");
	if(!$result) {
		echo("Failed to delete the account from database:<br>");
		echo mysqli_error($DB);
	}
	closeDB($DB);
	
	header("Location: ../php/logout.php");
	
	die();
?>