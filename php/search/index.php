<?php
	include 'config.php';
	
	$output = ''
	if(isset($_POST['search'])){
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[0-9]#","",$searchq);
		
		$query = mysqli_query("SELECT * FROM product WHERE upc='$searchq'") or die("he's dead jim");
		$count = mysqli_num_rows($query);
		if($count == 1){
			$row = mysqli_fetch_array($query))
			$upc = $row['upc'];
			$pname = $row['productName'];
			$pbrand = $row['productBrand'];
			$psize = $row['productSize'];
			$pgender = $row['productGender'];
			$pcolor = $row['productColor'];
			$pprice = $row['productPrice'];
			$pactive = $row['productIsActive'];
			
			$output .= '<div> '.$upc.' '.$pname.' '.$pbrand.' '.$psize.' '.$pgender.' '.$pcolor.' '.$pprice.' </div>';
			if($pactive == 0){
				$output = 'There were no active search results';
			}
		} else{
			$output = 'There were no search results'
		}
	}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Search Home </title>
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
		
		<div class="container text-center mt-5 col-md-4">
			<form action="results.php" method="post" id="upcsearch">
				<input type="text" name="search" class="form-control" placeholder="Insert UPC here" maxlength="12" pattern="^[0-9]{12}">
				<br>
				<input type="submit" class ="btn btn-danger" form="upcsearch" value="Search">
			</form>
			<?php
				print("$output");
			?>
		</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
