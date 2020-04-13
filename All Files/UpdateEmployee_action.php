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
$servername = "localhost";
$username = "root";
$password = "pwdpwd";
$dbname = "pimshoe";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$ID = $_SESSION["emp"];
$Password = sha1($_POST["updateemppass"]);
$First = $_POST["updateempfname"];
$Last = $_POST["updateemplname"];
$Email = $_POST["updateempemail"];
$datetime = date('Y-m-d H:i:s');

if( empty($_POST["updateisadmin"])){
  $Admin = '0';
} else{
  $Admin = '1';
}

if( empty($_POST["updateempisactive"])){
  $Active = '0';
} else{
  $Active = '1';
}

$sql = "UPDATE user SET email='$Email', passhash='$Password', f_name='$First', l_name='$Last', isActive='$Active', isAdmin='$Admin', created_at= '$datetime' WHERE userID ='$ID'";

if (mysqli_query($conn, $sql)) {
    ?>
        <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
          <h1>PIMSHOE Admin</h1>
        </div>

        <div class="container text-center mt-5" style="margin-bottom:0">
          <h2>Employee updated successfully</h2><br>
        </div>

        <div class="container text-center mt-5">
          <a href="AdminUpdateEmployee.php" class="btn btn-primary">Back to update employee</a>
        </div>
    <?php
} else {
    ?>
    <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
      <h1>PIMSHOE Admin</h1>
    </div>
    <div class="container text-center mt-5" style="margin-bottom:0">
      <h2>Employee was not updated, check with system administrator</h2><br>
    </div>
    <div class="container text-center mt-5">
      <a href="AdminUpdateEmployee.php" class="btn btn-primary">Back to update employee</a>
    </div>
    <?php
}
?>
</body>
</html>
