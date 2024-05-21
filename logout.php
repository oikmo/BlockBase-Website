<?php
	
	session_start();
	
	unset($_SESSION['authenticated']);
	unset($_SESSION['auth_user']);
	$_SESSION['status'] = "Logged out successfully!";
	header("Location: login.php");

?>