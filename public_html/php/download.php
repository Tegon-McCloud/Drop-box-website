<?php

require_once "../inc/verify_path.php";

session_start();
ignore_user_abort(TRUE);
set_time_limit(0);

if(!isset($_SESSION["loggedin"])) {
	die("You are not logged in. <a href=\"../login.php\">Log in</a> or <a href=\"../signup.php\">sign up</a>.");
}

$path = "../uploads/".$_SESSION["accountid"]."/";

$fname = filter_var($_GET["download"], FILTER_SANITIZE_URL);
$fpath = realpath($path.$fname);

// verify path
if(!$fpath || !isPathInAccDir($fpath, $_SESSION["accountid"])){
	die("This file does not exist. Go back to your <a href=\"../files.php\">files page</a>.");
}

$file = fopen($fpath, "r") or die();
$fsize = filesize($fpath);
$finfo = pathinfo($fpath);

// prep browser for binary data
header("Content-type: application/octet-stream");
// tell browser that data is attachment and give filename to save it in
header("Content-Disposition: attachment; filename=\"".$finfo["basename"]."\"");
header("Content-length: $fsize");
// make sure browser doesn't put file in shared cache
header("Cache-control: private");

while(!feof($file)) {
	$buf = fread($file, 4096);
	echo $buf;
}
?>