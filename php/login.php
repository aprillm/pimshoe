<?php
session_start();
include 'config.php';

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("Location: index.php");
		exit;
	}
	
	require_once 'config.php';
	$error = false;
	
	if($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['btn-login'])){
		$userid = trim($_POST['userid']); //grabs user ID, sql injection cleaning
		$userid = strip_tags($userid);
		$userid = htmlspecialchars($userid);
		
		$password = trim($_POST['password']); //grabs the user password, sql injection cleaning
		$password = strip_tags($password);
		$password = $htmlspecialchars($password);
		
		if(empty($userid)){
			$error = true;
			$useridError = "Please enter your User ID.";
		}	else if (!fliter_var($userid, FILTER_VALIDATE_INT)){
			$error = true;
			$useridError = "Please enter a valid User ID.";
		}
		
		}
