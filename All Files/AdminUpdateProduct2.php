<?php
include_once 'dbconn.php';
?>
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
      <h2>Update Product</h2>
    </div>


    <form class="form-horizontal" method="post" action="UpdateProduct_action.php">

      <div class = "form-group container text-center">
        <h3 class="text-center"><?php echo $_SESSION["upc"];?></h3>
        <div class="row mt-5">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
          <label for="inputBrand">Brand</label>
          <input type="text" name="editbrand" class="form-control" id="inputBrand" value=
          <?php
          $upc = $_SESSION["upc"];
          $sql = "SELECT productBrand FROM Product WHERE upc='$upc'";

          $query =mysqli_query($conn,$sql);
          while($row = mysqli_fetch_array($query)) {
            echo $row['productBrand'];
          }
          ?> required>
        </div>
        <div class="col-sm-2">
          <label for="inputSize">Size</label>
          <input type="number" name="editsize" class="form-control" id="inputSize" value=
          <?php
          $upc = $_SESSION["upc"];
          $sql = "SELECT productSize FROM Product WHERE upc='$upc'";

          $query =mysqli_query($conn,$sql);
          while($row = mysqli_fetch_array($query)) {
            echo $row['productSize'];
          }
          ?>
          required>
        </div>
        <div class="col-sm-1">
          <label for="inputGender">Gender</label>
          <select class="form-control" name="editgender" id="inputGender" required>
              <option>M</option>
              <option>F</option>
              <option>K</option>
              <option disabled="disabled">----</option>
              <option selected>
                <?php
                $upc = $_SESSION["upc"];
                $sql = "SELECT productGender FROM Product WHERE upc='$upc'";

                $query =mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($query)) {
                  echo $row['productGender'];
                }
                ?>
              </option>
         </select>
        </div>
        </div>

          <div class="row mt-3">
          <div class="col-sm-4">
            <label for="inputName">Name</label>
            <input type="text" name="editname" class="form-control" id="inputName" value=
            <?php
            $upc = $_SESSION["upc"];
            $sql = "SELECT productName FROM Product WHERE upc='$upc'";

            $query =mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)) {
              echo $row['productName'];
            }
            ?>
            required>
          </div>
          <div class="col-sm-4">
            <label for="inputColor">Color</label>
            <input type="text" name="editcolor" class="form-control" id="inputColor" value=
            <?php
            $upc = $_SESSION["upc"];
            $sql = "SELECT productColor FROM Product WHERE upc='$upc'";

            $query =mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)) {
              echo $row['productColor'];
            }
            ?>
             required>
          </div>
          <div class="col-sm-4">
            <label for="inputPrice">Price</label>
            <input type="text" name="editprice" class="form-control" id="inputPrice" value=
            <?php
            $upc = $_SESSION["upc"];
            $sql = "SELECT productPrice FROM Product WHERE upc='$upc'";

            $query =mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)) {
              echo $row['productPrice'];
            }
            ?>
             required>
          </div>

          </div>

            <div class="custom-control custom-switch mt-3">
            <input type="checkbox" name="active" class="custom-control-input" id="customSwitch1"
            <?php
            $upc = $_SESSION["upc"];
            $sql = "SELECT productIsActive FROM Product WHERE upc='$upc'";

            $query =mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)) {
              $isActive = $row['productIsActive'];
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
            <label class="custom-control-label" for="customSwitch1">Active</label>
          </div>
      </div>


      <div class="container text-center mt-5">
        <button id="btn-update" name="btn-update" type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
  <div class="container text-center mt-5">
    <a href="AdminUpdateProduct.php" class="btn btn-primary">
      Choose another UPC
    </a>
  </div>

  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
