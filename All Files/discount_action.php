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


$upc = $_SESSION["upc"];
$origional = $_SESSION["price"];
$discount = $_POST['discount'];
$price = round($origional - ($origional*$discount),2);

if( empty($_POST['activeDiscount'])){
  $Active = '0';
} else{
  $Active = '1';
}

$sql = "INSERT INTO Discount (upc, discountIsActive, discountPrice) VALUES ('$upc', '$Active', '$price')";

  if (mysqli_query($conn, $sql)) {
      ?>
          <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
            <h1>PIMSHOE Admin</h1>
          </div>

          <div class="container text-center mt-5" style="margin-bottom:0">
            <h2>Product <?php echo $_SESSION["upc"];?> was discounted successfully</h2>
            <h2>New price is: $<?php echo "$price" ?></h2>
            <h2>This discount is <?php
            if($Active){
              echo "now currently active";
            }else{
              echo "not currently active";
            }
             ?>
            </h2>
          </div>

          <div class="container text-center mt-5">
            <a href="AdminDiscount.php" class="btn btn-primary">Back to discount manager</a>
          </div>
      <?php
  } else {
      ?>
      <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
        <h1>PIMSHOE Admin</h1>
      </div>
      <div class="container text-center mt-5" style="margin-bottom:0">
        <h2>A discount for this product currently exists, please visit the manage discount tab for more information.</h2><br>
      </div>
      <div class="container text-center mt-5">
        <a href="AdminDiscount.php" class="btn btn-primary">Back to discount manager</a>
      </div>
      <?php
  }
  ?>
  </body>
  </html>
