<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "pwdpwd";
$dbname = "pimshoe";


// Create connection
$mysqli = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($mysqli->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


  $_SESSION["emp"] = $_POST['editEmp'];

  header('Location: AdminUpdateEmployee2.php');


?>
