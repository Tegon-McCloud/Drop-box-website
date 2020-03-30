 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="/css/style.css" type="text/css" rel="stylesheet">
	<title>File storage</title>
</head>
<body>
	<?php
	include '../inc/header.php';
	?>

 	<table class="view-text-table">
	
	<tbody>
	
	<?php

	$fname = "../uploads/".$_SESSION["accountid"]."/".$_GET["view"];
	$file = fopen($fname, "r") or die("Unable to open file!");
	
	while (($line = fgets($file)) !== false) {
		echo "<tr>";
		echo "<td>$line</td>";
		echo "</tr>";
	}
	
	fclose($file);
	?>
	
	</tbody>
	
	</table>

	 <?php
	 include '../inc/footer.php';
	 ?>
</body>
</html>