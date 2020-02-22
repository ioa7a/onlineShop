<?php
include_once 'includes/dbh.inc.php';
if (isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You are already logged in";

         header('location: index_admin.php');
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/indexCSS.css?version=51">
    </head>
    <body>
        <?php  include 'includes/sidebar.php'; ?>

      <div class="login_content">
        <form method="post" action="login.php" >
            <div class="input-group">
                <label> Username: </label>
                <input type="text" autocomplete="off" name="username" >
            </div>
            <div class ="input-group">
                <label> Password: </label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <center>
                <button type="submit" name="login_user"> LOGIN </button>
                <p> Don't have an account?
                <p> <a href="register.php">REGISTER</a>
                </center>
            </div>
        </form>
      </div>
        <?php  include 'includes/footer.php'; ?>


<?php //afisare erori
if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<?php echo $error ?>
		<?php endforeach ?>
	</div>
<?php  endif ?>

    </body>
</html>
