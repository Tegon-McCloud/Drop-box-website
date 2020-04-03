<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<title>File storage - Sign up</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<?php
	include '../inc/header.php';
	?>

	<div class="signup-container">
		<h1>Sign up</h1>
		<p id="message"></p>
		<form id="signup-form" onsubmit="asyncSendForm(); return false;" method="post">
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="password" name="passwordControl" placeholder="Password" required>
			<input type="submit" value="Sign up">
		</form>
	</div>

	<script src="js/signup.js"></script>

	 <?php
	 include '../inc/footer.php';
	 ?>
</body>
</html>
