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

$UserID = $_POST['empid'];
$Email = $_POST['empmail'];
$Password = sha1($_POST['emppassword']);
$Fname = $_POST['empname'];
$Lname = $_POST['emplname'];

if( empty($_POST['AdminCheck'])){
  $Admin = '0';
} else{
  $Admin = '1';
}


$sql = "INSERT INTO user (userID, email, passhash, f_name, l_name, isActive, isAdmin, created_at) VALUES ('$UserID', '$Email', '$Password', '$Fname', '$Lname', '1', '$Admin', '2020-02-23 11:27:04')";


if (mysqli_query($conn, $sql)) {
    ?>
        <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
          <h1>PIMSHOE Admin</h1>
        </div>

        <div class="container text-center mt-5" style="margin-bottom:0">
          <h2>Employee created successfully</h2><br>
        </div>

        <div class="container text-center mt-5">
          <a href="AdminCreateEmployee.php" class="btn btn-primary">Back to Create Employee</a>
        </div>
    <?php
} else {
    ?>
    <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
      <h1>PIMSHOE Admin</h1>
    </div>
    <div class="container text-center mt-5" style="margin-bottom:0">
      <h2>Employee was not created, check with system administrator</h2><br>
    </div>
    <div class="container text-center mt-5">
      <a href="AdminCreateEmployee.php" class="btn btn-primary">Back to Create Employee</a>
    </div>
    <?php
}
?>
</body>
</html>
