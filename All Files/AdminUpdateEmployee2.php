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

    <div class="container text-center mt-5" style="margin-bottom:0">
      <h2>Update Employee</h2>
    </div>

    <div class = "container text-center">
      <form class="form-horizontal" method="post" action="UpdateEmployee_action.php">
        <h3 class="text-center"><?php echo $_SESSION["emp"];?></h3>
      <div class="row mt-5">

        <div class="col-sm-4"></div>
        <div class="form-group col-sm-4">
          <label for="inputEmpPass">Employee Password</label>
          <input type="password" name="updateemppass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninvalid="setCustomValidity('Must contain at least one number | one uppercase and lowercase letter | be at least 8 or more characters')" onchange="try{setCustomValidity('')}catch(e){}" class="form-control" id="inputEmpPass" placeholder="Please input a new password" required>
        </div>
      </div>

      <div class="row mt-5">
      <div class="col-sm-4">
        <label for="inputEmpName">First Name</label>
        <input type="text" name="updateempfname" class="form-control" id="inputEmpName" value =
        <?php
        $emp = $_SESSION["emp"];
        $sql = "SELECT f_name FROM user WHERE userID='$emp'";

        $query =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) {
          echo $row['f_name'];
        }
        ?>
        required>
      </div>
      <div class="col-sm-4">
        <label for="inputEmpLName">Last Name</label>
        <input type="text" name="updateemplname" class="form-control" id="inputEmpLName" value=
        <?php
        $emp = $_SESSION["emp"];
        $sql = "SELECT l_name FROM user WHERE userID='$emp'";

        $query =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) {
          echo $row['l_name'];
        }
        ?>
        required>
      </div>
      <div class="col-sm-4">
        <label for="inputEmpEmail">Email</label>
        <input type="email" name="updateempemail" class="form-control" id="inputEmpEmail" value =
        <?php
        $emp = $_SESSION["emp"];
        $sql = "SELECT email FROM user WHERE userID='$emp'";

        $query =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) {
          echo $row['email'];
        }
        ?>
        required>
      </div>
      </div>
      <div class="row mt-3">
      <div class="col-sm-4"></div>
      <div class="col-sm-2 custom-control custom-switch">
           <input type="checkbox" class="custom-control-input" name="updateempisactive" id="customSwitch2"
           <?php
           $emp = $_SESSION["emp"];
           $sql = "SELECT isActive FROM user WHERE userID='$emp'";

           $query =mysqli_query($conn,$sql);
           while($row = mysqli_fetch_array($query)) {
             $isActive = $row['isActive'];
           }
           if($isActive){
             ?>
             checked
          <?php
           }
           else{
            ?>
            unchecked
            <?php
           }
           ?>
           >
           <label class="custom-control-label" for="customSwitch2">Active</label>
      </div>


      <div class="col-sm-2 custom-control custom-switch">
           <input type="checkbox" class="custom-control-input" name="updateisadmin" id="customSwitch3"
           <?php
           $emp = $_SESSION["emp"];
           $sql = "SELECT isAdmin FROM user WHERE userID='$emp'";

           $query =mysqli_query($conn,$sql);
           while($row = mysqli_fetch_array($query)) {
             $isAdmin = $row['isAdmin'];
           }
           if($isAdmin){
             ?>
             checked
          <?php
           }
           else{
            ?>
            unchecked
            <?php
           }
           ?>
           >
           <label class="custom-control-label" for="customSwitch3">Admin</label>
      </div>


      <div class="container text-center mt-5">
        <button id="btn-create" name="btn-create" type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>

  <div class="container text-center mt-5">
    <a href="AdminUpdateEmployee.php" class="btn btn-primary">
      Choose another Employee
    </a>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
