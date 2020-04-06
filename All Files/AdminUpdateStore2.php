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
      <h2>Update Store</h2>
    </div>


    <form class="form-horizontal" method="post" action="UpdateStore_action.php">
    <div class = "form-group container text-center mt-5">
      <h3 class="text-center">Store ID for <?php echo ucwords($_SESSION["storeName"]);?> <br>
        <?php
        $storeName=ucwords($_SESSION["storeName"]);
        $query =mysqli_query($conn,"SELECT storeID from store where storeName= '$storeName'");
        while($row = mysqli_fetch_array($query)) {
          $storeID = $row['storeID'];
          $_SESSION["thestoreID"] =$row['storeID'];
          echo $row['storeID'];
        }
        ?></h3>
      <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-4">
        <label for="inputId">Store Name</label>
        <input type="text" name="editname" class="form-control" id="inputId" value ="<?php
        $sql = "SELECT storeName FROM store WHERE storeID='$storeID'";

        $query =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) {
          echo $row['storeName'];
        }
        ?>" required>
      </div>
      <div class="form-group col-sm-4">
        <label for="inputPhone">Phone</label>
        <input type="tel" name="editphone" class="form-control" id="inputPhone" value="<?php
        $sql = "SELECT telephone FROM store WHERE storeID='$storeID'";

        $query =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) {
          echo $row['telephone'];
        }
        ?>"
        required>
      </div>
      </div>

      <div class="row mt-5">
      <div class="col-sm-4">
        <label for="inputStreet">Street</label>
        <input type="text" name="editstreet" class="form-control" id="inputStreet" value = "<?php
        $sql = "SELECT streetAddress FROM store WHERE storeID='$storeID'";

        $query =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) {
          echo $row['streetAddress'];
        }
        ?>
        " required>
      </div>
      <div class="col-sm-4">
        <label for="inputCity">City</label>
        <input type="text" name="editcity" class="form-control" id="inputCity" value="<?php
        $sql = "SELECT city FROM store WHERE storeID='$storeID'";

        $query =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) {
          echo $row['city'];
        }
        ?>"required>
      </div>
      <div class="col-sm-2">
        <label for="inputState">State</label>
        <select class="form-control" name="editstate" id="inputState" required>
          <option value="currentState">Select a State</option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
            <option disabled="disabled">----</option>
            <option selected>
              <?php
              $upc = $_SESSION["upc"];
              $sql = "SELECT state FROM store WHERE storeID='$storeID'";

              $query =mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($query)) {
                echo $row['state'];
              }
              ?>
            </option>
          </select>
      </div>
      <div class="col-sm-2">
        <label for="inputZip">Zipcode</label>
        <input type="text" name="editzip" class="form-control" id="inputZip" value="<?php
        $sql = "SELECT zip FROM store WHERE storeID='$storeID'";

        $query =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) {
          echo $row['zip'];
        }
        ?>"required>
      </div>
      </div>
      </div>

      <div class="container text-center mt-5">
        <button id="btn-update" name="btn-update" type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
  <div class="container text-center mt-5">
    <a href="AdminUpdate.html" class="btn btn-primary">
      Back to update
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
