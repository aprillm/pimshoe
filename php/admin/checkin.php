<?php session_start();

//is user logged in?
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location: login.php");
	exit;
}
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
	<form>
	<div class="container text-center mt-5 col-sm-2" style="margin-bottom:0">
		<div class="form-group">
			<label for="enterupc">Enter the Product UPC</label>
			<input type="text" class="form-control" maxlength="12" id="enterupc" pattern="^[0-9]{12}" placeholder="123456789012">
		</div>
	</div>
	</form>
	<div class="container text-center mt-5" style="margin-bottom:0">
		<form>
		<table class="table">
			<tr>
				<th>UPC</th>
				<th>Style</th>
				<th>Color</th>
				<th>Size</th>
				<th>Quanitiy</th>
			</tr>
			<tr>
				<td>123456789012</td>
				<td>Captain</td>
				<td>Blue</td>
				<td>39</td>
				<td>
					<label for="quantity"></label>
					<input type="number" id="quantity" name="quantity" min="0" max="99" value="1">
				</td>
			</tr>
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