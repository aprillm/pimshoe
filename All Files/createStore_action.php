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

$Id = $_POST['id'];
$Phone = $_POST['phone'];
$Address = $_POST['street'];
$City = $_POST['city'];
$State = $_POST['state'];
$Zip = $_POST['zip'];

$sql = "INSERT INTO store (storeID, storeName, telephone, streetAddress, city, state, zip) VALUES ('$Id', '$City', '$Phone', '$Address', '$City', '$State', '$Zip')";


if (mysqli_query($conn, $sql)) {
    ?>
        <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
          <h1>PIMSHOE Admin</h1>
        </div>

        <div class="container text-center mt-5" style="margin-bottom:0">
          <h2>Store created successfully</h2><br>
        </div>

        <div class="container text-center mt-5">
          <a href="AdminCreateStore.php" class="btn btn-primary">Back to Create Store</a>
        </div>
    <?php
} else {
    ?>
    <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
      <h1>PIMSHOE Admin</h1>
    </div>
    <div class="container text-center mt-5" style="margin-bottom:0">
      <h2>Store was not created, check with system administrator</h2><br>
    </div>
    <div class="container text-center mt-5">
      <a href="AdminCreateStore.php" class="btn btn-primary">Back to Create Store</a>
    </div>
    <?php
}
?>
</body>
</html>
