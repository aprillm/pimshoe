<?php
	include 'config.php';
	
	$sql = "SELECT * FROM Product";
	$result = mysqli_query($conn, $sql) or die("You killed it.");
?>
<!doctype html>
<html lang="en">
  <head>
  	<title> Catalogue </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid jumbotron text-center bg-danger text-white" style="margin-bottom:0">
     <h1>PIMSHOE</h1>
		</div>
		<div class="mt-4 text-center"><p>Search availability on a specific UPC:</p>
			<div class = "container col-md-5">
			<form action="result.php" method="post" id="upcsearch">
				<input type="text" name="search" class="form-control" placeholder="Insert UPC here" maxlength="12" pattern="^[0-9]{12}">
				<br>
				<input type="submit" class ="btn btn-danger" form="upcsearch" value="Search">
			</form>
			</div>
			<p></p>
		</div>
		<table class = "table">
			<thead>
			<tr>
				<th scope="col">UPC</th>
				<th scope="col">Name</th>
				<th scope="col">Brand</th>
				<th scope="col">Size</th>
				<th scope="col">Department</th>
				<th scope="col">Color</th>
				<th scope="col">Price<th>
			</tr>
			</thead>
			<?php
				while($row = mysqli_fetch_assoc($result)){
					if($row['productIsActive'] == true){
						$shoe = '';
						if($row['productGender'] == 'M'){
							$shoe = 'Mens';
						} if($row['productGender'] == 'F'){
							$shoe = 'Womens';
						} if($row['productGender'] == 'K'){
							$shoe = 'Kids';
						}				
						$upc = $row['upc'];
						$dquery = mysqli_query($conn, "SELECT * FROM Discount WHERE upc='$upc'");
						$drow = mysqli_fetch_array($dquery);
						$dcount = mysqli_num_rows($dquery);
						$price = "";
						if($dcount == 1){
							if($drow['discountIsActive'] == true){
							$price = $drow['discountPrice'];
							}else{
								$price = $row['productPrice'];
							}
						}else{ $price = $row['productPrice'];}
						
						echo('<tr><td>'.$row['upc'].'</td>
						<td>'.$row['productName'].'</td>
						<td>'.$row['productBrand'].'</td>
						<td>'.$row['productSize'].'</td>
						<td>'.$shoe.'</td>
						<td>'.$row['productColor'].'</td>
						<td>'.$price.'</td></tr>
						');
					}
				}
			?>
		</table>
		<div class="container text-center mt-5">
			<a href="index.php" class="btn btn-danger">
				Home
			</a><p></p>
		</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
