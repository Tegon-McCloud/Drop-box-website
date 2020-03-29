<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	<?php
	include '../inc/header.php';
	?>

	<script src="js/signup.js"></script>

	<div class="signup-container">
		<h1>Sign up</h1>
		<p id="no-match">Please make sure that password fields match.</p>
		<p id="taken">This username has already been taken.</p>
		<form action="php/create_account.php" onsubmit="return validate(this);" method="post">
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="password" name="passwordControl" placeholder="Password" required>
			<input type="submit" value="Sign up">
		</form>
	</div>


	 <?php
	 include '../inc/footer.php';
	 ?>
</body>
</html>
