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
      <h2>Create Employee</h2>
    </div>

    <div class = "container text-center">
      <form class="form-horizontal" method="post" action="createEmployee_action.php">

      <div class="row">
        <div class="col-sm-2"></div>
        <div class="form-group col-sm-4">
          <label for="inputEmpID">Employee ID</label>
          <input type="text" name="empid" class="form-control" id="inputEmpID">
        </div>
        <div class="form-group col-sm-4">
          <label for="inputEmpPass">Employee Password</label>
          <input type="text" name="emppassword" class="form-control" id="inputEmpPass">
        </div>
      </div>
      <div class="row mt-5">
      <div class="col-sm-4">
        <label for="inputEmpName">First Name</label>
        <input type="text" name="empname" class="form-control" id="inputEmpName">
      </div>
      <div class="col-sm-4">
        <label for="inputEmpLName">Last Name</label>
        <input type="text" name="emplname" class="form-control" id="inputEmpLName">
      </div>
      <div class="col-sm-4">
        <label for="inputEmpEmail">Email</label>
        <input type="text" name="empmail" class="form-control" id="inputEmpEmail">
      </div>
      </div>

      <div class="row mt-3">
      <div class="col-sm-4"></div>
      <div class="col-sm-2 custom-control custom-switch">
           <input type="checkbox" class="custom-control-input" id="customSwitch2" unchecked>
           <label class="custom-control-label" for="customSwitch2">Activate</label>
      </div>

      <div class="col-sm-2 custom-control custom-switch">
           <input type="checkbox" class="custom-control-input" name="AdminCheck" id="customSwitch3" unchecked>
           <label class="custom-control-label" for="customSwitch3">Admin</label>
      </div>
      </div>

      <div class="container text-center mt-5">
        <button id="btn-create" name="btn-create" type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>

  <div class="container text-center mt-5">
    <a href="AdminCreate.html" class="btn btn-primary">
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
