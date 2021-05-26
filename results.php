<?php
include("connect.php");

if(empty($_GET["search"])) {
    echo "walang laman si get";
} else {
    $check = $_GET["search"];

    $terms = explode(" ", $check);
    $query = "SELECT * FROM `mytbl` WHERE ";

    $i = 0;
    foreach($terms as $each) {
        $i++;

        if($i == 1) {
            $query .= "`name` LIKE '$each' ";
        } else {
            $query .= "OR `name` LIKE '$each' ";
        }
    }

    $query = mysqli_query($connect, $query);
    $count_query = mysqli_num_rows($query);

    if($count_query > 0 && $check != "") {
        while($row = mysqli_fetch_assoc($query)) {
            echo $name = "{$row['name']}<br>";
        }
    } else {
        echo "No Result";
    }
}
?>