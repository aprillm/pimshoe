<?php
    include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>PIMSHOE Login</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

  <div class="container-fluid jumbotron text-center bg-primary text-white" style="margin-bottom:0">
    <h1>PIMSHOE Admin</h1>
  </div>

  <div class="row mt-5">

  <aside class="col-sm-4">
  </aside>

  <aside class="col-sm-4">
    <h2 class="text-center mb-4 mt-1">Sign in</h2>
    <p class="text-danger text-center font-weight-bold">Credentials are Incorrect</p>
    <small id="emailHelp" class="form-text text-muted">This login only works for Admins</small>

  <form class="form-horizontal" method="post" action="login_action.php">
      <select class = "form-control" name ="store" required>
          <option value="">Select Store</option>
            <?php

              $sql = "SELECT * FROM store";
              $result = mysqli_query($conn, $sql);
              $datas = array();

              if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                  $datas[] = $row;
                }
              }

              $storeArray = array();
              foreach ($datas as $data){
                array_push($storeArray,$data['storeName']);
              }

              foreach($storeArray as $item){
              ?>
              <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
              <?php
              }
              ?>
      </select>
      <br>

     <div class="form-group">
     <label for="inputEmail" class="font-weight-bold">Username</label>
     <input type="text" name="uname" class="form-control" id="inputEmail" placeholder="Enter username" required>
     </div>

     <div class="form-group">
     <label for="inputPass" class="font-weight-bold">Password</label>
     <input type="text" name="psw" class="form-control" id="inputPass" placeholder="Enter password" required>
     </div>

     <button id="btn-login" name="btn-login" type="submit" class="btn btn-primary btn-block bg-primary">Login</button>

     </form>
     <!--<a href="" class="float-right btn btn-outline-primary">Sign up</a> Admins insert new users, maybe have it go to a form that sends a request email to an admin?-->
     <p class="underlineHover"><a href="#">Forgot password?</a></p>
     </div>

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
