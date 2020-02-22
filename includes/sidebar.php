<div class="sidebar">
            <a href="index_admin.php"> HOME </a>
            <a href="buy.php"> BUY  </a>
            <a href="sell.php"> SELL </a>
           <?php if (!isset($_SESSION['username'])) {
                $_SESSION['msg'] = "Browse as a Guest";  ?>
                 <a href="login.php" style="float: right;"> LOG IN </a>
                 <a href="register.php" style="float: right;"> REGISTER </a>
          <?php }
            else {?>
              <a href="index_admin.php?logout='1'" style="float: right;"> LOG OUT <img src="img/logout.png" width="20px" height="20px"></a>
                <a href="profile.php"  style="float: right;"> <img src="img/profile_icon.png" width="21px" height="20px">PROFILE </a>

            <?php } ?>
</div>

<div class="secondsidebar">
  <?php if (isset($_SESSION['username'])) {?>
    <a href="favorites.php"  style="float: right;"> <img src="img/favorite_icon.png" width="20px" height="20px">FAVORITES </a>
    <a href="cart.php"> <img src="img/cart_icon.png" width="22px" height="20px">YOUR CART </a>
  <?php } ?>

        <div class = "greeting">
         <?php if (isset($_SESSION['username'])) {?>
              Welcome, <strong><?php echo $_SESSION['username']; ?>!</strong>
          <?php }else { ?>
              Welcome, <strong>Guest!</strong>
      <?php    } ?>

      </div>
</div>
