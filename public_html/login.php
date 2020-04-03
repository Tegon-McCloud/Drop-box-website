<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<title>File storage - Log in</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

	<?php
	include 'inc/header.php';
	?>

	<div class="login-container">
		<h1>Log in</h1>
		<p id="message"></p>
		<form id="login-form" onsubmit="asyncSendForm(); return false;" method="post">
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="submit" value="Log in">
		</form>
	</div>

	<script src="js/login.js"></script>

	 <?php
	 include 'inc/footer.php';
	 ?>
</body>
</html>