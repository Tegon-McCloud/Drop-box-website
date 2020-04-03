 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="/css/style.css" type="text/css" rel="stylesheet">
	<title>File storage - View file</title>
</head>
<body>
	<?php
	include 'inc/header.php';
	?>

	<table id="view-text-table">
	
	<thead>
		<tr>
			<th colspan="2"><?php echo $_GET["view"];?></th>
		</tr>
	</thead>

	<tbody>
	
		<?php
			require "inc/verify_path.php";

			$fname = "uploads/".$_SESSION["accountid"]."/".$_GET["view"];
			if(!isPathInAccDir($fname, $_SESSION["accountid"])){ // secure against file traversal
				die();
			}

			$file = fopen($fname, "r") or die("Unable to open file!");
			$linenum = 1;
			while (($line = fgets($file)) !== false) {
				echo "<tr>";
				echo "<td>$linenum</td>";
				echo "<td><pre>".htmlspecialchars($line)."</pre></td>";
				echo "</tr>";
				$linenum++;
			}
			
			fclose($file);
		?>
	</tbody>
	</table>

	 <?php
	 include 'inc/footer.php';
	 ?>
</body>
</html>