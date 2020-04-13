<?php
session_start();
$servername = "cpsc445-capstone.cah4eqmlcf2h.us-east-1.rds.amazonaws.com";
$username = "administrator";
$password = "youdiedpimshoe";
$dbname = "PIMSHOE";


// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
die("Connection failed: " . $mysqli_connect_error());
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
    echo "Please log in first to see this page.";
    die();
}
?>
