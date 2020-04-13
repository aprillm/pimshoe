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
      <h2>Discount Product</h2>
    </div>


    <form class="form-horizontal" method="post" action="discount2_action.php">

      <div class = "form-group container text-center">
        <h3 class="text-center"><?php echo $_SESSION["discupc"];?></h3>
          <div class="row mt-5">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
          <h4>Base Price:
            <?php
            $upc = $_SESSION["discupc"];
            $sql = "SELECT productPrice FROM Product WHERE upc='$upc'";

            $query =mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)) {
              $_SESSION["price"] = $row['productPrice'];
              echo "$" . $_SESSION["price"];
            }
            ?>
          </h4>
          <h4>Current Discounted Price:<?php
            $upc = $_SESSION["discupc"];
            $sql = "SELECT discountPrice FROM Discount WHERE upc='$upc'";

            $query =mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)) {
              echo "$" . $row['discountPrice'];
            }
            ?>
          </h4>
          </div>
          </div>

          <div class="row mt-5">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <label for="inputDiscount">Select Discount off of Base Price</label>
            <select class="form-control" name="discount" id="inputDiscount" required>
                <option value = ".05">5%</option>
                <option value = ".10">10%</option>
                <option value = ".15">15%</option>
                <option value = ".20">20%</option>
                <option value = ".25">25%</option>
                <option value = ".30">30%</option>
                <option value = ".35">35%</option>
                <option value = ".40">40%</option>
                <option value = ".45">45%</option>
                <option value = ".5">50%</option>
           </select>
          </div>
        </div>

        <div class="custom-control custom-switch mt-3">
          <input type="checkbox" name="activeDiscount" class="custom-control-input" id="customSwitch1"
          <?php
          $upc = $_SESSION["discupc"];
          $sql = "SELECT discountIsActive FROM Discount WHERE upc='$upc'";

          $query =mysqli_query($conn,$sql);
          while($row = mysqli_fetch_array($query)) {
            $isActive = $row['discountIsActive'];
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
    <a href="AdminUpdateDiscounts.php" class="btn btn-primary">
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
