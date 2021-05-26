<?php

$user_id = $_REQUEST["id"];

include("connect.php");

$sql = "SELECT * FROM `mytbl` WHERE `id` = '$user_id'";
$get_record = mysqli_query($connect, $sql);

while($row_edit = mysqli_fetch_assoc($get_record)) {
    $db_name = $row_edit["name"];
    $db_address = $row_edit["address"];
    $db_email = $row_edit["email"];
}
?>

<html>
  <head></head>
  <body>
    <form action="edit_record.php" method="POST">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="text" name="new_name" value="<?php echo $db_name; ?>"><br>
    <input type="text" name="new_address" value="<?php echo $db_address; ?>"><br>
    <input type="text" name="new_email" value="<?php echo $db_email; ?>"><br>
    <input type="submit" value="Update">
    </form>
  </body>
</html>