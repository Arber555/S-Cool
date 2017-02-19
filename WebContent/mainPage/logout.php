<?php
	session_start();
	$_SESSION['btnLogin_status']=false;

        spl_autoload_register(function ($class_name) {
            include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
        });
        
        if($_SESSION['isStudent'] === true)
            Notification::deleteN($_SESSION['ID']);
        
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 

	header("location: login.php");
?>
