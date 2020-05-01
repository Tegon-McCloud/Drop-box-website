<?php
session_start();
?>

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
	<div id="acc-info">
		<h1>Account info:</h1>
		<p>
			Username: <?php echo $_SESSION["username"];?> <br>
			Account id: <?php echo $_SESSION["accountid"];?> <br>
			# Files: <?php
				include 'inc/db.php';

				$db = openDB();
				if($db) {
					$result = mysqli_query($db, "CALL get_file_paths('".$_SESSION["accountid"]."', 1000);");
					echo mysqli_num_rows($result);
				}

				closeDB($db); 
			?> <br>
			
		</p>
	</div>

	<form action="php/delete_account.php" id="delete-acc" method="post">
 		<input type="submit" id="delete-account" value="Delete account">
	</form>

</body>
</html>