<?php
	session_start();
	$_SESSION['btnLogin_status']=false;

	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 

	header("location: login.php");
?>
