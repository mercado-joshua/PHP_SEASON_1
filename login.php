<?php
session_start();
include("connect.php");

$email = $password = "";
$emailErr = $passwordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

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

    # if all variables have values. show them
    if($email && $password) {

      // check if the email is already exists in the database
      $check_email = mysqli_query($connect, "SELECT * FROM `mytbl` WHERE `email` = '$email'");
      $check_email_row = mysqli_num_rows($check_email);

      if($check_email_row > 0) {
        while($row = mysqli_fetch_assoc($check_email)) {
            $user_id = $row["id"];
            $db_password = $row["password"];
            $db_account_type = $row["account_type"];

            if($password == $db_password) {
                $_SESSION["id"] = $user_id;

                if($db_account_type == '1') {
                    echo "<script>window.location.href='admin/'</script>";
                } else {
                    echo "<script>window.location.href='user/'</script>";
                }
            } else {
                $passwordErr = "* Password is incorrect!";
            }
        }
      } else {
        $emailErr = "* Email is not registered!";
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
    <legend>Login</legend>
    <span class="error"><?php echo $emailErr; ?></span><br>
    <input type="text" name="email" placeholder="email" value="<?php echo $email; ?>"><br><br>

    <span class="error"><?php echo $passwordErr; ?></span><br>
    <input type="password" name="password" placeholder="password" value="<?php echo $password; ?>"><br>
    <input type="submit" value="Login">
    </fieldset>
    </form>
  </body>
</html>