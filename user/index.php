<?php
session_start();

if(isset($_SESSION["id"])) {
    $user_id = $_SESSION["id"];
    include("../connect.php");

    $sql = "SELECT * FROM `mytbl` WHERE `id` = '$user_id'";
    $get_record = mysqli_query($connect, $sql);

    while($row_edit = mysqli_fetch_assoc($get_record)) {
        $db_name = $row_edit["name"];
        $db_address = $row_edit["address"];
        $db_email = $row_edit["email"];
    }

    echo "Welcome! " . $db_name . " <a href='../logout.php'>Logout!</a>";
} else {
    echo "* You must Login First <a href='../login.php'>Login Now!</a>";
}