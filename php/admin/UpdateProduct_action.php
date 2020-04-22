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

$UPC = $_SESSION["upc"];
$Brand = $_POST['editbrand'];
$Size = $_POST['editsize'];
$Gender = $_POST['editgender'];
$Name = $_POST['editname'];
$Color = $_POST['editcolor'];
$Price = $_POST['editprice'];
    
if( empty($_POST['active'])){
  $Active = '0';
} else{
  $Active = '1';
}
    
$sql = "UPDATE Product SET productName='$Name', productBrand='$Brand', productSize='$Size', productGender='$Gender', productColor='$Color', productPrice='$Price', productisActive='$Active' WHERE upc ='$UPC'";

if (mysqli_query($conn, $sql)) {
    ?>
        <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
          <h1>PIMSHOE Admin</h1>
        </div>

        <div class="container text-center mt-5" style="margin-bottom:0">
          <h2>Product updated successfully</h2><br>
        </div>

        <div class="container text-center mt-5">
          <a href="AdminUpdateProduct.php" class="btn btn-primary">Back to update product</a>
        </div>
    <?php
} else {
    ?>
    <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
      <h1>PIMSHOE Admin</h1>
    </div>
    <div class="container text-center mt-5" style="margin-bottom:0">
      <h2>A product with that UPC already exits. Enter new UPC or check with your system administrator</h2><br>
    </div>
    <div class="container text-center mt-5">
      <a href="AdminUpdateProduct.php" class="btn btn-primary">Back to update product</a>
    </div>
    <?php
}
?>
</body>
</html>
