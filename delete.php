<?php
include("connect.php");

$user_id = $_POST["user_id"];

$sql = "DELETE FROM `mytbl` WHERE `id` = '$user_id'";
mysqli_query($connect, $sql);

echo "<script>alert('Record has been deleted!')</script>";
echo "<script>window.location.href='index.php'</script>";