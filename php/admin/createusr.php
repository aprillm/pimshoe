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
	  <title> Create User </title>
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
      <h2>Create Employee</h2>
    </div>

	<div class="container text-center mt-5" style="margin-bottom:0">
		<form>
			<div class="container text-center col-sm-4">
				<label for="userID">Employee ID</label>
				<input type="text" class="form-control" maxlength="4" id="userID" pattern="^[0-9]{4}" placeholder="1234" required>
			</div>
			<br>
			<div class="container text-center form-row">
				<div class="col">
					<label for="f_Name">First Name</label>
					<input type="text" class="form-control" maxlength="32" id="f_Name" placeholder="John" required>
				</div>
				<div class="col">
					<label for="l_Name">Last Name</label>
					<input type="text" class="form-control" maxlength="32" id="l_Name" placeholder="Doe" required>
				</div>
				<div class="col">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" placeholder="jdoe@pimshoe.com" required>
				</div>
			</div>
			</br>
			<div class="text-center">

				<div class="custom-control custom-switch mb-2 mr-sm-2">
				
				<input type="checkbox" class="custom-control-input" id="isActive">
				<label class="custom-control-label" for="isActive">Activate</label>
				</div>
			</div>
			<div class="text-center">
				<div class="custom-control custom-switch mb-2 mr-sm-2">
				
				<input type="checkbox" class="custom-control-input" id="isAdmin">
				<label class="custom-control-label" for="isAdmin">Admin</label>
				</div>
			</div>
			  <input class="btn btn-primary" type="submit" value="Create">
			</div>
		</form>
	</div>	
	
  <div class="container text-center mt-5">
    <a href="create.php" class="btn btn-primary">
      Back to Create
    </a>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
