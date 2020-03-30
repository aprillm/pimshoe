<?php
session_start();
include 'config.php';

	if(isset($_SESSION['user'])!="" && isset($_SESSION['store'])!=""){
		header('Location: http://3.211.215.236/landing.php');
		exit();
	}
	
	$error = false;
	
	if($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['btn-login'])){
		
		$storeid = $_POST['Store'];//grabs store someone is logging in to
		
		$userid = trim($_POST['userID']); //grabs user ID, sql injection cleaning
		$userid = strip_tags($userid);
		$userid = htmlspecialchars($userid);
		
		$pass = trim($_POST['passhash']); //grabs the user password, sql injection cleaning
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		if(empty($storeid)){
			$error = true;
			$storeError = "Please select a store.";
		}
		
		if(empty($userid)){
			$error = true;
			$useridError = "Please enter your User ID.";
		}	else if (!filter_var($userid, FILTER_VALIDATE_INT)){
			$error = true;
			$useridError = "Please enter a valid User ID.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		//if no errors, continue
		if(!$error){
			$password = hash('sha256', $pass);
			$res=mysqli_query($conn,"SELECT userID, passhash FROM User WHERE userID='$userid'");
				$row = mysqli_fetch_array($res);
				$count = mysqli_num_rows($res); //if userID and password are correct 1 row should be returned.
			$sres=mysqli_query($conn,"SELECT storeID FROM Store WHERE storeID='$storeid'");
				$srow = mysqli_fetch_array($sres);
				
			if( $count == 1 && $row['password']==$password){
				$_SESSION['user'] = $row['userID'];
				$_SESSION['store'] = $srow['storeID'];
				$_SESSION["loggedin"] = true;
				header('Location: http://http://3.211.215.236//landing.php');
				exit();
			}	else{
				$errMSG = "The userID or Password you entered was incorrect. Please try again.";
			}
		}
	}
?>


<!doctype html>
<html lang="en">
  <head>
	<title>PIMSHOE Login</title>
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
	<?php if(isset($useridError) || isset($errMSG) ||isset($storeError) || isset($passError)) { ?>
              <div role="alert" class="alert  alert-danger  text-center">
            <?php 
              if(isset($useridError)) { echo $Error; }  
              if(isset($passError)) { echo $passError; }
              if(isset($errMSG)) { echo $errMSG; } 
			  if (isset($storeError)) { echo $storeError; }
            ?>
          </div>
      <?php } ?>
    <div class="row mt-5">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
    	<h2 class="text-center mb-4 mt-1">Sign in</h2>


    	<form id="loginform" class="form-horizontal" role="form" method="post" action="landing.php" accept-charset='UTF-8'>
          <div class="form-group">
            <label for="store"></label>
                  <?php
					echo('<select class="form-control" id="store">
					<option>Select Store</option>');
					$sqli = "SELECT StoreID FROM Store";
					$result = mysqli_query($conn, $sqli);
					while($row = mysqli_fetch_array($result)){
						echo('<option>'.$row['StoreID'].'</option>');
					}
					echo('</select>');
				  ?>
             </select>
          </div>
<hr>
    	    <div class="form-group">
                 <input type="text" name="user_name" class="form-control" maxlength="4" pattern="^[0-9]{4}" id="userID" placeholder="User ID">
          </div>
          <div class="form-group">
    	            <input type="password" name="user_pass" class="form-control" id="password" placeholder="*********">
	       </div>

    	    <div class="form-group">
          	<button id="btn-login" name="btn-login" type="submit" class="btn btn-primary btn-block bg-primary"> Login  </button>
    	    </div>
			</form>
          <!--<a href="" class="float-right btn btn-outline-primary">Sign up</a> Admins insert new users, maybe have it go to a form that sends a request email to an admin?-->
    	    <p class="underlineHover"><a href="#">Forgot password?</a></p>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
