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

$credu = $_SESSION["username"];
$credp = sha1($_POST['credpsw']);


$query = mysqli_query($mysqli,"SELECT userID FROM user WHERE userID = '$credu' AND passhash = '$credp' AND isActive");
$total = mysqli_num_rows($query);


if($total > 0)
{
  header('Location: changecreds.php');
}
else {
  header('Location: badcreds.php');
}

?>
