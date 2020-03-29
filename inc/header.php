
<?php
session_start();
?>

<nav class="nav-bar">
	<h1>File Storage</h1>
	<?php
		if(isset($_SESSION["loggedin"])){
			echo '<a href="account.php">'.$_SESSION["username"].'</a>';
		} else {
			echo 
			'<a href="signup.php">Sign up</a>
			<a href="login.php">Log in</a>';
		}
	?>


	<a href="files.php">Files</a>
</nav>