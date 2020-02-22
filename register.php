<?php include('includes/dbh.inc.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
        <link rel="stylesheet" type="text/css" href="css/indexCSS.css">
</head>
<body>

	  <?php  include 'includes/sidebar.php'; ?>

	<div class="login_content">
	<form method="post" action="register.php">
		<div class="input-group">
			<label>Username:</label>
      <input type="text" name="username" value="" autocomplete="off">
		</div>
		<div class="input-group">
			<label>Password:</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password:</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
				 <center>
			<button type="submit" class="btn" name="reg_user">LOGIN</button>
			<p>	Already a member? 	<p>
		<a href="login.php">SIGN IN</a>
	</center>
		</div>
	</form>
</div>
	  <?php  include 'includes/footer.php'; ?>
    <?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<?php echo $error ?>
		<?php endforeach ?>
	</div>
<?php  endif ?>
</body>
</html>
