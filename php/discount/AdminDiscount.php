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
      <h2>Discount Creator</h2>
    </div>


    <form class="form-horizontal" method="post" action="firstdiscount_action.php">

      <div class = "form-group container text-center mt-5">

          <label for="updateUPC">Select the UPC of the product you wish to discount</label>
          <select class = "form-control" name ="editupc" id="updateUPC" required>
              <option value="">UPC</option>
                  <?php

                    $sql = "SELECT * FROM product";
                    $result = mysqli_query($conn, $sql);
                    $datas = array();

                    if (mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)){
                        $datas[] = $row;
                      }
                    }

                    $storeArray = array();
                    foreach ($datas as $data){
                      array_push($storeArray,$data['upc']);
                    }

                    foreach($storeArray as $item){
                    ?>
                    <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
                    <?php
                    }
                    ?>
            </select>
        </div>




      <div class="container text-center mt-5">
        <button id="btn-update" name="btn-update" type="submit" class="btn btn-primary">Continue</button>
      </div>
    </form>
  </div>
  <div class="container text-center mt-5">
    <a href="AdminManageDiscounts.html" class="btn btn-primary">
      Back to Discount Manager
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
