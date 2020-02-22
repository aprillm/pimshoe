<?php
session_start();
include 'config.php';

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("Location: landing.php");
		exit;
	}
	
	require_once 'config.php';
	$error = false;
	
	if($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['btn-login'])){
		$userid = trim($_POST['userid']); //grabs user ID, sql injection cleaning
		$userid = strip_tags($userid);
		$userid = htmlspecialchars($userid);
		
		$pass = trim($_POST['password']); //grabs the user password, sql injection cleaning
		$pass = strip_tags($pass);
		$pass = $htmlspecialchars($pass);
		
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
			$res=mysqli_query($conn,"SELECT userid, password FROM users WHERE userid='$userID'");
				$row = mysqli_fetch_array($res);
				$count = mysqli_num_rows($res); //if userID and password are correct 1 row should be returned.
				
			if( $count == 1 && $row['password']==$password){
				$_SESSION['user'] = $row['userid'];
				$_SESSION["loggedin"] = true;
				header("Location: landing.php");
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
	<?php if(isset($useridError) || isset($errMSG) || isset($passError)) { ?>
              <div role="alert" class="alert  alert-danger  text-center">
            <?php 
              if(isset($useridError)) { echo $Error; }  
              if(isset($passError)) { echo $passError; }
              if(isset($errMSG)) { echo $errMSG; } 
            ?>
          </div>
      <?php } ?>
    <div class="row mt-5">
    <aside class="col-sm-4">
    </aside>
    <aside class="col-sm-4">
    	<h2 class="text-center mb-4 mt-1">Sign in</h2>


    	<form id="loginform" class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <div class="form-group">
            <label for="store"></label>
              <select class="form-control" id="store">
                  <option value="">Select Store</option>
                  <?php
				  $select="cpsc445-capstone.cah4eqmlcf2h.us-east-1.rds.amazonaws.com";
				  if(isset($select)&&select!=""){
					$select=$_POST['NEW'];
					}
					?>
					<?php
						$list=mysql_query("select * from store order by storeID asc");
						while($row_list=mysql_fetch_assoc($list){
						?>
						<option value="<?php echo $row_list['storeID'];?>
						<?php if($row_list['storeID']==$select){echo "selected";}?>
						<?php echo $row_list['storeID']; ?>
						</option>
						<?php
						}
						?>
             </select>
          </div>
<hr>
    	    <div class="form-group">
                 <input type="text" name="user_name" class="form-control" maxlength="4" pattern="^[0-9]{4}" id="logname" placeholder="User ID">
          </div>
          <div class="form-group">
    	            <input type="password" name="user_pass" class="form-control" id="logname" placeholder="*********">
	       </div>

    	    <div class="form-group">
          	<button type="submit" class="btn btn-primary btn-block bg-primary"> Login  </button>
    	    </div>
			</form>
          <!--<a href="" class="float-right btn btn-outline-primary">Sign up</a> Admins insert new users, maybe have it go to a form that sends a request email to an admin?-->
    	    <p class="underlineHover"><a href="#">Forgot password?</a></p>
      </div>
    </aside>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
