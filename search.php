<?php

$search = $searchErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["search"])) {
        $searchErr = "* required!";
    } else {
        $search = $_POST["search"];
    }

    if($search) {
        echo "<script>window.location.href='results.php?search=$search'</script>";
    }
}
?>
<html>
  <head>
    <style>
      .error {
        color: red;
        font-style: italic;
      }
    </style>
  </head>

  <body>
    <form action="<?php htmlspecialchars('PHP_SELF'); ?>" method="POST">
    <span class="error"><?php echo $searchErr; ?></span><br>
    <input type="text" name="search" value="<?php echo $search; ?>">
    <input type="submit" value="search">
    </form>
  </body>
</html>