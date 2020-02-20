<?php
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
 
// Escape user inputs for security
$userID = mysqli_real_escape_string($link, $_REQUEST['userID']);
$f_name = mysqli_real_escape_string($link, $_REQUEST['f_name']);
$l_name = mysqli_real_escape_string($link, $_REQUEST['l_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$activate = mysqli_real_escape_string($link, $_REQUEST['customSwitch2']);
$admin = mysqli_real_escape_string($link, $_REQUEST['customSwitch3']);
 
// Attempt insert query execution
$sql = "INSERT INTO persons (userID, f_name, l_name, email, activate, admin) VALUES ('$first_name', '$last_name', '$email')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
