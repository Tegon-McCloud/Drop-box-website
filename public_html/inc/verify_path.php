<?php
function isPathInAccDir($path, $accId) {
   	$path = str_replace("\\", "/", $path);
	$uploadpath = realpath($_SERVER["DOCUMENT_ROOT"]."/uploads"); // path to uploads folder
	$regex = "#".str_replace("\\", "/", "$uploadpath/$accId/.*")."#"; // a regex that will only match a path inside user dir
	return preg_match($regex, realpath($path));
}
?>