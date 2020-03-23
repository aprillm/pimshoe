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


$query = mysqli_query($mysqli,"SELECT email FROM user WHERE email = '$username' AND passhash = '$password'");
$total = mysqli_num_rows($query);

if($total > 0)
{
  header('Location: AdminLanding.html');
}
else {
  echo "Unsuccessful Login";
}

?>
