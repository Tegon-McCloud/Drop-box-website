<?php
	require_once "../inc/db.php";
	require_once "../inc/verify_path.php";
	session_start();
	
	if(!isset($_SESSION["loggedin"])){
		header("Location: ../index.php");
		die();
	}
	
	$path = "../uploads/".$_SESSION["accountid"]."/";
	
	$fname = filter_var($_GET["delete"], FILTER_SANITIZE_URL);
	$fpath = realpath($path.$fname);

	// verify path
	if(!$fpath || !isPathInAccDir($fpath, $_SESSION["accountid"])){
		die("This file does not exist. Go back to your <a href=\"../files.php\">files page</a>.");
	}
	
	if(!unlink($fpath)) {
		echo("Failed to delete file");
	}
	
	$DB = openDB();
	$result = mysqli_query($DB, "CALL file_deleted(".$_SESSION["accountid"].")");
	if(!$result) {
		echo("Failed to delete file from database");
	}
	closeDB($DB);
	
	header("Location: ../files.php");
	
	die();
?>