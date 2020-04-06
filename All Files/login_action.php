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

$username = $_POST['uname'];
$password = sha1($_POST['psw']);


$query = mysqli_query($mysqli,"SELECT userID FROM user WHERE userID = '$username' AND passhash = '$password' AND isAdmin");
$total = mysqli_num_rows($query);


if($total > 0)
{
  $_SESSION["username"] = $_POST['uname'];
  header('Location: AdminLanding.php');
}
else {
  header('Location: badlogin.php');
}

?>
