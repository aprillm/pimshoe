<?php
	/*DB credentials should be inserted here. */
	$servername = "52.204.100.89";
	$username   = "administrator";
	$password   = "youdiedpimshoe";
	$dbname     = "cpsc445-capstone.cah4eqmlcf2h.us-east-1.rds.amazonaws.com";<br> 
	$conn = mysqli_connect($servername, $username, $password);
	
	$dbcon = mysqli_select_db($conn,$dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
 
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}
?>
