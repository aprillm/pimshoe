<?php
	/*DB credentials should be inserted here. */
	$servername = "database Server";
	$username   = "root";
	$password   = "password";
	$dbname     = "database name";<br> 
	$conn = mysqli_connect($servername, $username, $password);
	
	$dbcon = mysqli_select_db($conn,$dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
 
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}
