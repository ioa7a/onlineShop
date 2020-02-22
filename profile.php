<?php
include_once 'includes/dbh.inc.php';
if (session_status() != 2) {
    session_start();
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index_admin.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/indexCSS.css?version=51" >
    </head>
    <body>
      <?php  include 'includes/sidebar.php'; ?>
      <center>
      <div class="content" style="margin-top: 10%; width: 50%; float: center; background-color: #242424;
        opacity: 70%;   overflow: hidden; ">

        <h2> <b> USERNAME: </b> <?php echo $_SESSION['username'];  ?> </h2>
        <p>
          <a href="favorites.php"> FAVORITE PRODUCTS </a> <p> <p>
            <a href="cart.php"> SHOPPING CART </a> <p> <p>
              <form method="POST">
        <input type="submit" name="delete" value="DELETE ACCOUNT">
      </form>
      <?php
        if(isset($_POST['delete'])){
          echo "Are you sure you want to delete your account? <p>
          Please enter your username and password to confirm.";
          ?>
          <form method="POST">
            <label> USERNAME: </label>
          <input type="text" name="username" autocomplete="off">
          <p>
            <label> PASSWORD: </label>
          <input type="password" name="password">
        <p>
        <input type="submit" name="delete_perm" value="DELETE">
        </form>

          <?php
        }
       ?>
       <?php
       if(isset($_POST['delete_perm'])){
         $user = $_POST['username'];
         $pass = $_POST['password'];
         $passwrd = md5($pass);
         $delete = "DELETE FROM login_info
                    WHERE username = '$user' AND password = '$passwrd'";
          mysqli_query($conn, $delete);
          unset($_SESSION['username']);
          header("location: index_admin.php");
       }
        ?>
      </div>
  </center>



    </div>

    <?php  include 'includes/footer.php'; ?>

</body>
</html>
