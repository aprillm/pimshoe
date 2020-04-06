<?php session_start();

//is user logged in?
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location: login.php");
	exit;
}
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
      <h2>Check In</h2>
    </div>
	<form action="checkin.php" method="post">
	<div class="container text-center mt-5 col-sm-2" style="margin-bottom:0" >
			<label for="enterupc">Enter the Product UPC</label>
			<input type="text" class="form-control" maxlength="12" id="enterupc" pattern="^[0-9]{12}" placeholder="123456789012" />
			<input type="submit" class="btn btn-primary" value=">" form="in" value="CheckIn" />
	</div>
	</form>
	<?php

	if(isset($_POST['CheckIn'])){
		$upc = $_POST['upc'];
		$storeID = $_SESSION['store'];
		$qty = 1;
		if($upc != ''||$storeID !=''){
			$query = mysqli_query($conn, "INSERT INTO Cart_in(storeID, UPC, qty) VALUES ('$upc', '$storeID', '$qty')");
		}
	}
	?>
	<div class="container text-center mt-5" style="margin-bottom:0">
		<form action="submittedin.php" method="post">
		<table class="table">
		<thead>
			<tr>
				<th>UPC</th>
				<th>Style</th>
				<th>Color</th>
				<th>Size</th>
				<th>Quanitiy</th>
			</tr>
			</thead>
			<?php
				$sql = "SELECT Cart_in.UPC, Cart_in.qty, Product.productName, Product.productColor, Product.productSize
					FROM Cart_in
					INNER JOIN Product ON Product.upc = Cart_in.UPC
					WHERE Cart_in.StoreID = '$storeID'";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_array($result)){
					echo('
						<tr><td>'.$row['UPC'].'</td>
						<td>'.$row['productName'].'</td>
						<td>'.$row['productColor'].'</td>
						<td>'.$row['productSize'].'</td>
						<td>
						<label for="quantity"></label>
						<input type="number" id="quantity" name="quantity" min="0" max="99" value="1">
						</td>
						</tr>
					');
				}
			?>
		</table>
		<input type="submit" class="btn btn-primary" value="submit">
		</form>
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
