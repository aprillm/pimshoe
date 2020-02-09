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
		
		$pass = trim($_POST['password']); //grabs the user password, sql injection cleaning
		$pass = strip_tags($pass);
		$pass = $htmlspecialchars($pass);
		
		if(empty($userid)){
			$error = true;
			$useridError = "Please enter your User ID.";
		}	else if (!fliter_var($userid, FILTER_VALIDATE_INT)){
			$error = true;
			$useridError = "Please enter a valid User ID.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		//if no errors, continue
		if(!$error){
			$password = hash('sha256', $pass);
			$res=mysqli_query($conn,"SELECT userid, password FROM users WHERE userid='$userID'");
				$row = mysqli_fetch_array($res);
				$count = mysqli_num_rows($res); //if userID and password are correct 1 row should be returned.
				
			if( $count == 1 && $row['password']==$password){
				$_SESSION['user'] = $row['userid'];
				$_SESSION["loggedin"] = true;
				header("Location: index.php");
			}	else{
				$errMSG = "The userID or Password you entered was incorrect. Please try again.";
			}
		}
	}
?>
