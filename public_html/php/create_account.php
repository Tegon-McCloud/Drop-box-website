<?php
	include '../../inc/db.php';
	
	if(!isset($_POST["username"], $_POST["password"])){
		header("Location: ../signup.php");
		die();
	}

	$db = openDB();
	if(!$db)
		die();

	$username = mysqli_real_escape_string($db, $_POST["username"]);

	// TODO convert to stored procedure call
	$result = mysqli_query($db, "SELECT 1 FROM accounts WHERE username = '$username';");
	if(mysqli_num_rows($result) != 0){
		header("Location: ../signup.php?taken=true");
		die();
	}

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

	$result = mysqli_query($db, "CALL create_account('$username', '$password')");
	if(!$result){
		die("Unknown error occured while trying to sign you up.<br>
		 Please return to the <a href=\"signup.php\">sign up page</a> and try again.");
	}

	// log user in
	$result = mysqli_query($db, "CALL get_id_password('$username')");
	$row = mysqli_fetch_assoc($result);

	session_start();
	session_regenerate_id();

	$_SESSION["loggedin"] = TRUE;
	$_SESSION["accountid"] = $row["id"];
	$_SESSION["username"] = $_POST["username"];

	header("Location: ../index.php");
?>