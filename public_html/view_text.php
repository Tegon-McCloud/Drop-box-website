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
	
	<thead>
		<tr>
			<th colspan="2"><?php echo $_GET["view"];?></th>
		</tr>
	</thead>

	<tbody>
	
		<?php

		$fname = "../uploads/".$_SESSION["accountid"]."/".$_GET["view"];
		$file = fopen($fname, "r") or die("Unable to open file!");
 		$linenum = 1;
		while (($line = fgets($file)) !== false) {
			echo "<tr>";
			echo "<td>$linenum</td>";
			echo "<td>$line</td>";
			echo "</tr>";
			$linenum++;
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