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

$StoreID = $_SESSION["thestoreID"];
$Phone = $_POST['editphone'];
$Street = $_POST['editstreet'];
$City = $_POST['editcity'];
$State = $_POST['editstate'];
$Zip = $_POST['editzip'];
$Store = $_POST['editname'];

$sql = "UPDATE Store SET storeName='$Store', telephone='$Phone', streetAddress='$Street', city='$City', state='$State', zip='$Zip' WHERE storeID='$StoreID'";

if (mysqli_query($conn, $sql)) {
    ?>
        <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
          <h1>PIMSHOE Admin</h1>
        </div>

        <div class="container text-center mt-5" style="margin-bottom:0">
          <h2>Store updated successfully</h2><br>
        </div>

        <div class="container text-center mt-5">
          <a href="AdminUpdateStore.php" class="btn btn-primary">Back to update product</a>
        </div>
    <?php
} else {
    ?>
    <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
      <h1>PIMSHOE Admin</h1>
    </div>
    <div class="container text-center mt-5" style="margin-bottom:0">
      <h2>Store was not updated, check with system administrator</h2><br>
    </div>
    <div class="container text-center mt-5">
      <a href="AdminUpdateStore.php" class="btn btn-primary">Back to update store</a>
    </div>
    <?php
}
?>
</body>
</html>
