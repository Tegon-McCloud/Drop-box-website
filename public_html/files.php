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

 	<table class="files-table">
		<thead>
			<tr>
				<th colspan="4">Files</th>
			</tr>
		</thead>
		<tbody>
			<?php
			require_once "../inc/db.php";
			if(!isset($_SESSION["loggedin"])) {
				header("Location: login.php");
			}
			$db = openDB();
			if(!$db) {
				die("Couldn't connect");
			}
			$result = mysqli_query($db, "CALL get_file_paths('".$_SESSION["accountid"]."', 50);");
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row["file_path"]."</td>";
				echo "<td><a href=\"view_text.php?view=".$row["file_path"]."\">text view</a></td>";
				echo "<td><a href=\"view_hex.php?view=".$row["file_path"]."\">hex view</a></td>";
				echo "<td><a href=\"#\">download</a></td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>

	 <?php
	 include '../inc/footer.php';
	 ?>
</body>
</html>