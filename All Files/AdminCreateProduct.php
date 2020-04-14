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
      <h2>Create Product</h2><br>
    </div>

<form class="form-horizontal" method="post" action="createProduct_action.php">

    <div class = "form-group container text-center">
      <div class="row mt-5">

      <div class="form-group col-sm-4">
        <label for="inputUPC">UPC</label>
          <input type="text" maxlength="12" minlength="12" pattern="^[0-9]{12}" oninvalid="setCustomValidity('UPC must be only numbers and 12 digits')" onchange="try{setCustomValidity('')}catch(e){}" name="upc" class="form-control" id="inputUPC" required>
      </div>

       <div class="col-sm-4">
        <label for="inputBrand">Brand</label>
        <input type="text" name="brand" class="form-control" id="inputBrand" required>
      </div>
      <div class="col-sm-2">
        <label for="inputSize">Size</label>
        <input type="number" step=".01" name="size" class="form-control" id="inputSize" required>
      </div>
      <div class="col-sm-2">
        <label for="inputGender">Gender</label>
        <select class="form-control" name="gender" id="inputGender" required>
            <option value ="M">Male</option>
            <option value ="F">Female</option>
            <option value ="K">Kids</option>
       </select>
      </div>
      </div>

        <div class="row mt-3">
        <div class="col-sm-4">
          <label for="inputName">Name</label>
          <input type="text" name="name" class="form-control" id="inputName" required>
        </div>
        <div class="col-sm-4">
          <label for="inputColor">Color</label>
          <input type="text" name="color" class="form-control" id="inputColor" required>
        </div>
        <div class="col-sm-4">
          <label for="inputPrice">Price</label>
          <input type="number" min="0" name="price" class="form-control" id="inputPrice" required>
        </div>
        </div>

        <div class="custom-control custom-switch mt-3">
             <input type="checkbox" class="custom-control-input" id="customSwitch1" unchecked>
             <label class="custom-control-label" name="ActiveCheck" for="customSwitch1">Make Active</label>
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
