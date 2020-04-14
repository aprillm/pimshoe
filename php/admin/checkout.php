<?php
session_start();

//is user logged in?
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location: http://3.211.215.236/index.php");
	exit;
include 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>

  <body>
    <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
      <h1>PIMSHOE Admin</h1>
    </div>

    <div class="container text-center mt-5" style="margin-bottom:0">
      <h2>Check Out</h2>
    </div>
	<form action="checkout.php" method="post">
	<div class="container text-center mt-5 col-sm-2" style="margin-bottom:0" >
			<label for="enterupc">Enter the Product UPC</label>
			<input type="text" class="form-control" maxlength="12" id="enterupc" pattern="^[0-9]{12}" placeholder="123456789012" />
			<input type="submit" class="btn btn-primary" value=">" form="in" value="CheckOut" />
	</div>
	</form>
	<div class="container text-center mt-5" style="margin-bottom:0">
	<?php

	if(isset($_POST['CheckOut'])){
		$upc = $_POST['upc'];
		$storeID = $_SESSION['store'];
		$prod = mysqli_query($conn, "Select * FROM Product WHERE upc = $upc");
		$qtyCheck = mysqli_query($conn, "Select qty from quantityAvailable where storeID=$storeID and upc=$upc");
		if($qty >0){
		if($upc != ''||$storeID !=''){
			$query = mysqli_query($conn, "UPDATE quantityAvailable SET qty = qty - 1 WHERE upc = $upc AND storeID = $storeID");
			echo('One '.$prod[productName].'has been added to the database. Details below. <br>
				UPC:'.$upc.'<br>
				Name:'.$prod[productName].'<br>
				Brand:'.$prod[productBrand].'<br>
				Size:'.$prod[productSize].'<br>
				Gender:'.$prod[productGender].'<br>
				Color:'.$prod[productColor].'<br>
			');
		}else{
			echo("An error has occurred. Please ensure the UPC is correct and you are logged in to the correct store. If this is  a new item, please first create the item and use check in should you receive any more items. If this persists, please contact your system administrator."); //An ErRoR hAs OcCuRrEd
		}}
		else{
			echo("There aren't enough items in stock to check that out!");
		}
	}
	?>
	</div>
	
  <div class="container text-center mt-5">
    <a href="landing.php" class="btn btn-primary">
      Back to home
    </a>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
