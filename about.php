<?php
include_once 'includes/dbh.inc.php';
if (session_status() != 2) {
    session_start();
}

if (isset($_GET['logout'])) {
  //  session_destroy();
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

      <div class="content">
  <center>
      <div class="about" style="width: 50%;  height: 100%; background-color: #242424;
        opacity: 70%;  padding: 20px; border-radius: 10px; text-align: justify; margin-top: 20px;
        margin-bottom: 20px;">
         <h1>  <b> <i>ABOUT US </b> </i></h1>
          <h3> <b> WELCOME</h3></b>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua.
      Arcu non odio euismod lacinia at quis risus sed.
       Magna fringilla urna porttitor rhoncus dolor purus.
        Id nibh tortor id aliquet.
       Vitae aliquet nec ullamcorper sit amet risus nullam eget felis.
        Quisque egestas diam in arcu cursus euismod quis viverra nibh.
        Vitae sapien pellentesque habitant morbi tristique senectus.
        Dignissim diam quis enim lobortis scelerisque fermentum dui faucibus.
         Risus pretium quam vulputate dignissim.
          Arcu dui vivamus arcu felis bibendum ut tristique et.
          Habitasse platea dictumst vestibulum rhoncus est pellentesque.
           Sodales ut eu sem integer vitae justo eget.
<p>
    <h3> <b> OUR WEBSITE </h3></b>
           Egestas diam in arcu cursus euismod quis viverra nibh cras.
           Tellus integer feugiat scelerisque varius morbi enim nunc.
 Habitant morbi tristique senectus et netus et malesuada fames.
  Nullam non nisi est sit. Euismod in pellentesque massa placerat duis.
  Nisl condimentum id venenatis a condimentum vitae sapien.
   Vulputate mi sit amet mauris commodo quis imperdiet massa tincidunt.
   Tellus in hac habitasse platea dictumst vestibulum rhoncus est.
   Purus semper eget duis at tellus at urna condimentum.
   Amet nisl suscipit adipiscing bibendum est ultricies integer quis auctor.
    Proin fermentum leo vel orci porta non pulvinar neque.
    In nisl nisi scelerisque eu ultrices vitae auctor eu.
    <h3> <b> MORE ABOUT US </h3></b>
     Sit amet est placerat in egestas erat imperdiet sed euismod.
     Nunc aliquet bibendum enim facilisis.
     Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque.
     Odio morbi quis commodo odio aenean. Sem nulla pharetra diam sit amet nisl.
      Sit amet massa vitae tortor.
    </div>
    </div>
    </div>
</center>
    <?php  include 'includes/footer.php'; ?>

</body>
</html>
