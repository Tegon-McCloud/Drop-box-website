<?php
	require_once "../../inc/db.php";
	session_start();

	if(!isset($_SESSION["loggedin"])){
		header("Location: ../index.php");
		die();
	}

	$db = openDB();
	if(!$db)
		die();

	$path = "../../uploads/".$_SESSION["accountid"]."/";

	if(!is_dir($path)){
		mkdir($path);
	}

	$allSuccess = TRUE;

	for($i = 0; $i < count($_FILES["files"]["name"]); $i++) {

		if($_FILES["files"]["error"][$i] != UPLOAD_ERR_OK){
			$allSuccess = FALSE;
			echo "Failed to upload: " . $_FILES["files"]["name"][$i] . "<br>";
			echo "Error code: " . $_FILES["files"]["error"][$i] . "<br>";
			continue;
		}
		
		// TODO validate file size
		
		$tmpName = $_FILES["files"]["tmp_name"][$i];
		$dstName = basename($_FILES["files"]["name"][$i]);

		$result = mysqli_query($db, "CALL file_stored(".$_SESSION["accountid"].", '$dstName');");
		if(!$result) {
			$allSuccess = FALSE;
			echo "Failed to store filepath in database: " . mysqli_error($db) . "<br>";
			continue;
		}

		move_uploaded_file($tmpName, $path.$dstName);
	}

	closeDB($db);

	if($allSuccess){
		header("Location: ../files.php");
	} else {
		die("Go back to your <a href=\"../files.php\">files page</a>.");
	}
?>