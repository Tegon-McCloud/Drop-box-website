<?php 

	function openDB() {
		// username and password strictly should be read from config file outside webroot
		// but this works for now.
		$db = mysqli_connect("127.0.0.1", "root", "", "FileStorage");

		if(!$db) {
			echo "Failed to connect to mySQL database:".PHP_EOL;
			echo mysqli_connect_error().PHP_EOL;
			return false;
		}

		return $db;
	}

	function closeDB($db) {
		$status = mysqli_close($db);
		if(!$status)
			echo "Failed to close database connection.".PHP_EOL;
		return $status;
	}

?>