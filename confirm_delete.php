<?php
$user_id = $_REQUEST["id"];

include("connect.php");

$sql = "SELECT * FROM `mytbl` WHERE `id` = '$user_id'";
$delete_query = mysqli_query($connect, $sql);

while($row_edit = mysqli_fetch_assoc($delete_query)) {
    $db_name = $row_edit["name"];
    $db_address = $row_edit["address"];
    $db_email = $row_edit["email"];
}

echo "Are you sure you want to delete {$db_name}?";
?>
<htmL>
<head>
</head>
<body>
    <form action="delete.php" method="POST">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

    <input type="submit" value="yes">
    <a href="index.php">no</a>
    </form>
</body>

</htmL>