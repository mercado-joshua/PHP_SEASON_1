<?php
session_start();

unset($_SESSION["id"]);
session_unset();
session_destroy();
echo "Logging out... please wait...";
header("Refresh: 3;url=index.php");
exit();