<?php
session_start();
include 'config.php';

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("Location: index.php");
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
		}	else if (!fliter_var($userid, FILTER_VALIDATE_INT)){
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
				header("Location: index.php");
			}	else{
				$errMSG = "The userID or Password you entered was incorrect. Please try again.";
			}
		}
	}
?>
//following code is copy pasted from a tutorial, we will need to change this to fit in with our site.
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    
</head>
<body>
        <div id="loginbox" style="margin-top:40px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <?php if(isset($emailError) || isset($errMSG) || isset($passError)) { ?>
              <div role="alert" class="alert  alert-danger  text-center">
            <?php 
              if(isset($emailError)) { echo $emailError; }  
              if(isset($passError)) { echo $passError; }
              if(isset($errMSG)) { echo $errMSG; } 
            ?>
          </div>
      <?php } ?>
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Log In</div>
                        
                    </div>     
                    <div style="padding-top:30px" class="panel-body" >
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="email">                                        
                              </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="pass" placeholder="password">
                                    </div>
                                    
                                
                            <div class="input-group">
                <div class="checkbox">
                <label>
                  <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                </label>
                </div>
              </div>
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                      <button id="btn-login" class="btn btn-success " type="submit" name="btn-login">Log In </button>  or <a href="register.php">Create an account</a>
              
                    
                                    </div>
                                </div>
                                
                            </form>     
                        </div>                     
                    </div>  
        </div>
       
    </div>
    
</body>
</html>
