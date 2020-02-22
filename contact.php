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
        <!--bara de navigatie-->
        <?php  include 'includes/sidebar.php'; ?>
        <center>
        <div class="content">

          <div class="about" style="width: 50%;  height: 100%; background-color: #242424;
            opacity: 70%;  padding: 20px; border-radius: 10px; text-align: justify; margin-top: 20px;
            margin-bottom: 20px;">
          <h2><b><i> CONTACT </i></b></h2>
        <b>  PHONE: </b>+40 XXX XXX XXX <p>
          <b>  E-MAIL:   </b><i>a_generic_email_adress@domain.com </i><p>
            <b>HEADQUARTERS: STR. Nume Strada nr. XX, SECTOR X, Bucuresti </b> <p>
            <b>SCHEDULE: </b> <br>
            <table>
          <tr> <th>  <i> USUAL SCHEDULE </i></th> <th>   <i> HOLIDAY SCHEDULE </i></th></tr>
          <tr> <td> MONDAY-FRIDAY: 10:00-20:00 </td>   <td> 25 - 26 DECEMBER: CLOSED </td> </tr>
            <tr> <td> SATURDAY: 11:00-16:00 </td> <td> 27 - 30 DECEMBER: NORMAL SCHEDULE </td> </tr>
            <tr> <td> SUNDAY: CLOSED </td> <td>     31 DECEMBER 2019 - 12 JANUARY 2020: CLOSED </td> </tr>
             </tr>
            </table>
          </center>
        </div>
      </div>
    <?php  include 'includes/footer.php'; ?>
    <?php
    ?>

</body>
</html>
