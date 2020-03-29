<?php
	session_start();
	
	function logout($redirect = NULL){
		$_SESSION["loggedin"] = NULL;
		$_SESSION["userid"] = NULL; 
		$_SESSION["username"] = NULL;

		if(isset($redirect)){
			header("Location: $redirect");
		}
	}

?>