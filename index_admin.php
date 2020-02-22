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
      <center>
      <div class="content">
      <h1 style="font-size:60px">  <b> <i> altshop.com </b> </i></h1>
      <h1>  <i> ALTERNATIVE MUSIC, CLOTHES, & MORE </i></h1>
      <h2> LATEST PRODUCTS </h2>
        <div class = "right" style="width: 100%">
      <?php

        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $userDB);
        $query = "SELECT produs.*, categorie_obiecte.Nume as Categorie
                  FROM produs, categorie_obiecte
                  WHERE produs.idCategorie = categorie_obiecte.idCategorie
                  ORDER BY idProdus DESC
                  LIMIT 4";

        $results = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($results)) {

          echo " <div class='desc' style='width: 30%'>" ;
          $cat = $row['Categorie'];
            $id = $row['idProdus'];
             $name = $row['Nume'];
              $desc = $row['Descriere'];
              $price = $row['Pret'];
              $del = $row['DetaliiLivrare'];
                echo "<b>Product:</b> ".$name."<br><b>Category: </b>".$cat."<br><b> Description: </b>".$desc.
                  "<br> <b>Price: </b>".$price." lei <br><b> Delivery Method: </b>".$del;

                echo "</div>
                <form method='POST' action='product.php'>
                <input type='hidden' name='productName' value='$name'>
                <input type='submit' name='view_product' value='VIEW PRODUCT'>
                </form><p>";
      }
      ?>
    </div> </center>
    </div>

    <?php  include 'includes/footer.php'; ?>

</body>
</html>
