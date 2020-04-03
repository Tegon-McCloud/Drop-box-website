<?php
	include '../inc/db.php';
	
	define("SUCCESS", 0);
	define("USERNAME_TAKEN", 1);
	define("ERROR", 2);

	if(!isset($_POST["username"], $_POST["password"])){
		echo ERROR;
		die();
	}

	$db = openDB();
	if(!$db){
		echo ERROR;
		die();
	}
		
	$username = mysqli_real_escape_string($db, $_POST["username"]);

	// TODO convert to stored procedure call
	$result = mysqli_query($db, "SELECT 1 FROM accounts WHERE username = '$username';");
	if(mysqli_num_rows($result) != 0){
		closeDB($db);
		echo USERNAME_TAKEN;
		die();
	}

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

	$result = mysqli_query($db, "CALL create_account('$username', '$password')");
	if(!$result){
		closeDB($db);
		echo ERROR;
		die();
	}

	// log user in
	$result = mysqli_query($db, "CALL get_id_password('$username')");
	$row = mysqli_fetch_assoc($result);

	session_start();
	session_regenerate_id();

	$_SESSION["loggedin"] = TRUE;
	$_SESSION["accountid"] = $row["id"];
	$_SESSION["username"] = $_POST["username"];

	closeDB($db);
	echo SUCCESS;
?>