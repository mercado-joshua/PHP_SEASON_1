<?php
include("connect.php");

$name = $address = $email = $password = $cpassword = "";
$nameErr = $addressErr = $emailErr = $passwordErr = $cpasswordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])) {
        $nameErr = "* Name is required!";
    } else {
        $name = $_POST["name"];
    }

    if(empty($_POST["address"])) {
        $addressErr = "* Address is required!";
    } else {
        $address = $_POST["address"];
    }

    if(empty($_POST["email"])) {
        $emailErr = "* Email is required!";
    } else {
        $email = $_POST["email"];
    }

    if(empty($_POST["password"])) {
      $passwordErr = "* Password is required!";
    } else {
      $password = $_POST["password"];
    }

    if(empty($_POST["cpassword"])) {
      $cpasswordErr = "* Confirm Password is required!";
    } else {
      $cpassword = $_POST["cpassword"];
    }

    # if all variables have values. show them
    if($name && $address && $email && $password && $cpassword) {

      // check if the email is already exists in the database
      $check_email = mysqli_query($connect, "SELECT * FROM `mytbl` WHERE `email` = '$email'");
      $check_email_row = mysqli_num_rows($check_email);

      if($check_email_row > 0) {
        $emailErr = "* Email is already registered!";
      } else {
        $sql = "INSERT INTO `mytbl` (`name`,`address`, `email`, `password`, `account_type`) VALUES ('$name', '$address', '$email', '$cpassword', '2')";
        $insert_query = mysqli_query($connect, $sql);

        echo "<script>alert('New Record has been inserted!')</script>";
        echo "<script>window.location.href='index.php'</script>";
      }

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
  <a href="index.php"><button>Home</button></a>
  <a href="login.php"><button>Login</button></a>
  <a href="search.php"><button>Search</button></a><br><br>
    <form action="<?php htmlspecialchars('PHP_SELF'); ?>" method="POST">
    <fieldset>
    <legend>Add User Information</legend>
    <span class="error"><?php echo $nameErr; ?></span><br>
    <input type="text" name="name" placeholder="name" value="<?php echo $name; ?>"><br>
    <span class="error"><?php echo $addressErr; ?></span><br>
    <input type="text" name="address" placeholder="address" value="<?php echo $address; ?>"><br>
    <span class="error"><?php echo $emailErr; ?></span><br>
    <input type="text" name="email" placeholder="email" value="<?php echo $email; ?>"><br><br>

    <span class="error"><?php echo $passwordErr; ?></span><br>
    <input type="password" name="password" placeholder="password" value="<?php echo $password; ?>"><br>
    <span class="error"><?php echo $cpasswordErr; ?></span><br>
    <input type="password" name="cpassword" placeholder="confirm password" value="<?php echo $cpassword; ?>"><br><br>

    <input type="submit" value="submit">
    </fieldset>
    </form>

    <hr>
    <?php
      $sql = "SELECT * FROM `mytbl`";
      $view_query = mysqli_query($connect, $sql);

      echo "<table border='1'>";
      echo "<tr>
          <td>Name</td>
          <td>Email</td>
          <td>Address</td>
          <td colspan='2'>Action</td>
        </tr>";

      while($row = mysqli_fetch_assoc($view_query)) {

        $user_id = $row['id'];
        $db_name = $row["name"];
        $db_address = $row["address"];
        $db_email = $row["email"];

        echo "<tr>
          <td>$db_name</td>
          <td>$db_email</td>
          <td>$db_address</td>
          <td><a href='edit.php?id=$user_id'><button>Update</button></a></td>
          <td><a href='confirm_delete.php?id=$user_id'><button>Delete</button></a></td>
        </tr>";
      }
      echo "</table><br><br>";
    ?>
  </body>
</html>

<?php
$names = array("Joshua", "Maj", "Frienchie");

foreach($names as $display_name) {
    echo "{$display_name}<br>";
}
?>