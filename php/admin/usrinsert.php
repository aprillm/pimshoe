<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
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
