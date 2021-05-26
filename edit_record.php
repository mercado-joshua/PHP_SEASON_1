<?php
include("connect.php");

$user_id = $_POST["user_id"];

$new_name = $_POST["new_name"];
$new_address = $_POST["new_address"];
$new_email = $_POST["new_email"];

$sql = "UPDATE `mytbl` SET
    `name` = '$new_name',
    `address` = '$new_address',
    `email` = '$new_email'
    WHERE `id` = '$user_id'";
mysqli_query($connect, $sql);

echo "<script>alert('New Record has been inserted!')</script>";
echo "<script>window.location.href='index.php'</script>";
?>