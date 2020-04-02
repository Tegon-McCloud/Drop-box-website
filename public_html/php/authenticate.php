<?php 
	require_once "../../inc/db.php";

	session_start();

	define("SUCCESS", 0);
	define("INVALID", 1);
	define("ERROR", 2);
	
	if(!isset($_POST["username"], $_POST["password"])){
		echo INVALID;
		die();
	}

	$db = openDB();
	if(!$db){
		echo ERROR;
		die();
	}

	$username = mysqli_real_escape_string($db, $_POST["username"]);

	$result = mysqli_query($db, "CALL get_id_password('$username')");
	if(!$result || mysqli_num_rows($result) != 1){
		echo INVALID;
		die();
	}

	$row = mysqli_fetch_assoc($result);
	
	closeDB($db);
	
	if(password_verify($_POST["password"], $row["password"])) {
		session_regenerate_id();

		$_SESSION["loggedin"] = TRUE;
		$_SESSION["accountid"] = $row["id"];
		$_SESSION["username"] = $_POST["username"];
		echo(SUCCESS);
	} else {
		echo INVALID;
	}

?>