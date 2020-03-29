<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<title>Log in</title>
</head>
<body>

	<?php
	include '../inc/header.php';
	?>

	<script src="js/login.js"></script>
	<div class="login-container">
		<h1>Log in</h1>
		<p id="invalid">Invalid username or password.</p>
		<form action="php/authenticate.php"  method="post">
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="submit" value="Log in">
		</form>
	</div>

	 <?php
	 include '../inc/footer.php';
	 ?>
</body>
</html>