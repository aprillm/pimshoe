<?php
	include 'config.php';
	
	if(isset($_POST['search'])){
		$searchq = $_POST['search'];
		
		$query = mysqli_query($conn, "SELECT * FROM Product WHERE upc='$searchq'") or die("error:" . mysqli_connect_error());
		$count = mysqli_num_rows($query);
		if($count == 1){
			$row = mysqli_fetch_array($query);
			$upc = $row['upc'];
			$productName = $row['productName'];
			$productBrand = $row['productBrand'];
			$productSize= $row['productSize'];
			$productGender = $row['productGender'];
			$productColor = $row['productColor'];
			$productPrice = $row['productPrice'];
			$productIsActive = $row['productIsActive'];
		}
	}
?>
<!doctype html>
<html lang="en">
  <head>
  <title> Keyword Search </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>

  <body>

    <div class="container-fluid jumbotron text-center bg-danger text-white" style="margin-bottom:0">
      <h1>PIMSHOE Search</h1>
    </div>
<!--if product is not active, show "product <upc> not available," otherwise-->
    <div class="container text-center mt-5">
      <form>
          <h1><?php echo $productName ?></h1>
          <h2 class="mt-5"><?php echo $upc ?></h2>
          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
              <p><?php echo $productPrice ?></p>
            </div>
            <div class="col-sm-2"><!--if discount exists, mark out price, show discount-->
              <p><b>is_Discounted</b></p>
            </div>
          </div>
		  <?php
			$shoe = '';
			if($productGender == 'M'){
				$shoe = 'mens';
			} if($productGender == 'F'){
				$shoe = 'womens';
			} if($productGender == 'K'){
				$shoe = 'kids';
			}
		  ?>
				<p>This <?php echo $productBrand?> <?php echo $productName ?> is a <?php echo $shoe ?> shoe size <?php echo $productSize ?> in <?php echo $productColor ?>. <br>If for some reason your shoe is not right we will accept returns or exchanges for 14 days after initial purchase.</p>
            <div class="row mt-5">
              <div class="col-sm-4"></div>
              <div class="col-sm-2">
                <p>Store1_city</p>
              </div>
              <div class="col-sm-2">
                <p>is_inStock</p>
              </div>
            </div>
              <p>Store_Phone_Number</p>

              <div class="row mt-5">
                <div class="col-sm-4"></div>
                <div class="col-sm-2">
                  <p>Store2_city</p>
                </div>
                <div class="col-sm-2">
                  <p>is_inStock</p>
                </div>
              </div>
                <p>Store_Phone_Number</p>
      </form>
    </div>

		<div class="container text-center mt-5">
			<a href="search.php" class="btn btn-danger">
				Back
			</a>
		</div>
    <!--<div class="container text-center mt-2">
      <a href="SearchHome.html" class="btn btn-danger">
        Home
      </a>
    </div> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
