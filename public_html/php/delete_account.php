<?php
	require_once "../inc/db.php";
	require_once "../inc/verify_path.php";
	session_start();
	
	if(!isset($_SESSION["loggedin"])){
		header("Location: ../index.php");
		die();
	}
	
	$DB = openDB();
	$result = mysqli_query($DB, "CALL get_file_paths(".$_SESSION["accountid"].", 1000)");
	if(!$result) {
		echo("Failed to delete the files from database:<br>");
		echo mysqli_error($DB);
	}

	while($row = mysqli_fetch_array($result)) {
		$path = "../uploads/".$_SESSION["accountid"]."/";
		$fpath = realpath($path.$row[0]);
		if (!unlink($fpath)) {
			echo ("$fpath cannot be deleted due to an error");
		}
		else {
			echo ("$fpath has been deleted");
		}
	}
	closeDB($DB);

	$DB2 = openDB();
	$result2 = mysqli_query($DB2, "CALL delete_account(".$_SESSION["accountid"].")");
	if(!$result2) {
		echo("Failed to delete the account from database:<br>");
		echo mysqli_error($DB2);
	}
	closeDB($DB2);
	
	//header("Location: ../php/logout.php");
	
	die();
?>