<?php
  $connect = mysqli_connect("localhost", "root", "", "myDB");
    if(mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysql_connect_error();
    }
    // else {
    //     echo "Connected";
    // }
?>