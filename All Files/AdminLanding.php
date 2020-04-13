<?php
include_once 'dbconn.php';
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

    <form>
    <div class="container text-center mt-5" style="margin-bottom:0">
      <h2>Welcome
        <?php
        $userID= $_SESSION["username"];
        $query =mysqli_query($conn,"SELECT f_name from User where userID=$userID");
        while($row = mysqli_fetch_array($query)) {
          echo $row['f_name'];
        }
        ?>
      </h2>
    </div>
    </form>

    <div class = "container">
      <div class="row mt-5">
      <div class="col-sm-3"></div>
      <div class="col-sm-3">
        <a href="#" class="btn btn-primary btn-block btn-lg p-5">
          Check out
      </a>
      </div>
      <div class="col-sm-3">
             <a href="checkin.php" class="btn btn-primary btn-block btn-lg p-5">
          Check in
        </a>
        </div>
      </div>

      <div class="row mt-5">
      <div class="col-sm-4">
        <a href="AdminCreate.html" class="btn btn-primary btn-block btn-lg p-5">
          Create
      </a>
      </div>
      <div class="col-sm-4">
             <a href="AdminUpdate.html" class="btn btn-primary btn-block btn-lg p-5">
          Update
        </a>
        </div>
        <div class="col-sm-4">
            <a href="#" class="btn btn-primary btn-block btn-lg p-5">
          Discount Manager
          </a>
          </div>
      </div>
    </div>

  </div>
  <div class="container text-center mt-5">
    <a href="AdminUser.php" class="btn btn-primary">
      User Settings
    </a>
  </div>
  <div class="container text-center mt-5">
    <a href="login.php" class="btn btn-primary">
      Logout
    </a>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
