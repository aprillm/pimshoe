<?php
session_start();
$servername = "cpsc445-capstone.cah4eqmlcf2h.us-east-1.rds.amazonaws.com";
$username = "administrator";
$password = "youdiedpimshoe";
$dbname = "PIMSHOE";


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
  header('Location: AdminLanding.html');
}
else {
  echo "$query";
  //header('Location: badlogin.html');
}

?>
