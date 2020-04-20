<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
<?php
session_start();
$servername = "cpsc445-capstone.cah4eqmlcf2h.us-east-1.rds.amazonaws.com";
$username = "administrator";
$password = "youdiedpimshoe";
$dbname = "PIMSHOE";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$creduser = $_SESSION["username"];
$newpass = $_POST['newpass'];
$newmail = $_POST['newmail'];

if(empty($newpass)){
$sql = "UPDATE User SET email='$newmail' WHERE userID='$creduser'";
}
else{
  $newpass = sha1($_POST['newpass']);
  $sql = "UPDATE User SET email='$newmail', passhash = '$newpass' WHERE userID='$creduser'";
}

if (mysqli_query($conn, $sql)) {
    ?>
        <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
          <h1>PIMSHOE Admin</h1>
        </div>

        <div class="container text-center mt-5" style="margin-bottom:0">
          <h2>Credentials updated successfully</h2><br>
        </div>

        <div class="container text-center mt-5">
          <a href="AdminLanding.php" class="btn btn-primary">Home</a>
        </div>
    <?php
} else {
    ?>
    <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
      <h1>PIMSHOE Admin</h1>
    </div>
    <div class="container text-center mt-5" style="margin-bottom:0">
      <h2>Credentials were not updated, check with system administrator</h2><br>
    </div>
    <div class="container text-center mt-5">
      <a href="AdminLanding.php" class="btn btn-primary">Home</a>
    </div>
    <?php
}
?>
</body>
</html>
