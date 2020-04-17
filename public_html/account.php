 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<title>File storage - Files</title>
</head>
<body>
	<?php
	include 'inc/header.php';
	if(!isset($_SESSION["loggedin"])) {
		header("Location: login.php");
	}
	?>

	<form action="php/delete_account.php" id="delete_acc" method="post">
 		<input type="submit" value="Delete account">
	</form>

</body>
</html>