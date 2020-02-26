<?php
        /*DB credentials should be inserted here. */
        $servername = "cpsc445-capstone.cah4eqmlcf2h.us-east-1.rds.amazonaws.com";
        $username   = "administrator";
        $password   = "youdiedpimshoe";
        $dbname     = "PIMSHOE";
        $conn = mysqli_connect($servername, $username, $password);

        $dbcon = mysqli_select_db($conn,$dbname);
        // Check connection
        if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
        }

        if ( !$dbcon ) {
                die("Database Connection failed : " . mysqli_error());
        }
?>
