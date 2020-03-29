<?php 
	require_once "../inc/db.php";

	session_start();

	if(!isset($_POST["username"], $_POST["password"])){
		header("Location: login.php");
		die();
	}

	$db = openDB();
	if(!$db){
		die();
	}

	$username = mysqli_real_escape_string($db, $_POST["username"]);

	$result = mysqli_query($db, "CALL get_id_password('$username')");
	if(!$result || mysqli_num_rows($result) != 1){
		header("Location: login.php?invalid=true");
		die();
	}

	$row = mysqli_fetch_assoc($result);

	if(password_verify($_POST["password"], $row["password"])) {
		session_regenerate_id();

		$_SESSION["loggedin"] = TRUE;
		$_SESSION["accountid"] = $row["id"];
		$_SESSION["username"] = $_POST["username"];

		header("Location: Files.php");
	} else {
		header("Location: login.php?invalid=true");
	}

?>