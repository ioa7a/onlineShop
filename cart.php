<?php
include_once 'includes/dbh.inc.php';
if (session_status() != 2) {
    session_start();
}

if (isset($_GET['logout'])) {
    //session_destroy();
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
              <center><h2> Products currently in your cart: </h2>
            <p>
              <?php
                   $user = $_SESSION['username'];
                   $select = "SELECT produs.*, categorie_obiecte.Nume as Categorie
                             FROM categorie_obiecte, produs
                             INNER JOIN cumparaturi ON produs.idProdus = cumparaturi.idProdus
                            INNER JOIN login_info ON login_info.username = cumparaturi.username
                            WHERE login_info.username = '$user'
                            AND categorie_obiecte.idCategorie = produs.idCategorie";
                   $request = mysqli_query($conn, $select);
                   while ($row = mysqli_fetch_array($request)) {
                     $produs = $row['Nume'];
                     $cat = $row['Categorie'];
                     $desc = $row['Descriere'];
                     $price = $row['Pret'];
                     $del = $row['DetaliiLivrare'];

                     echo "<center><div class='desc'>
                           <b><h3> Product: $produs </b></h3>
                           <b><h4> Category: $cat </b></h4>
                           <b>Description: $desc </b> <br>
                           <b> Price: </b> $price  lei <br>
                           <b> Delivery Method:  </b> $del
                           </div>
                           <br>
                           <form method='POST' action='product.php'>
                           <input type='hidden' name='productName' value='$produs'>
                           <input type='submit' name='view_product' value='VIEW PRODUCT'>
                           </form>
                           <br>
                           <form method='POST'>
                           <input type='hidden' name='productName' value='$produs'>
                           <input type='submit' name='remove_product' value='REMOVE PRODUCT'>

                           </form>
                           <p>
                           </center><p>";
                   }

                   $totalPrice = "SELECT SUM(produs.Pret) as Total
                                  FROM cumparaturi
                                  INNER JOIN produs ON cumparaturi.idProdus = produs.idProdus
                                  WHERE cumparaturi.username = '$user'";
                    $requestPrice = mysqli_query($conn, $totalPrice);
                    while ($row = mysqli_fetch_array($requestPrice)) {
                      $total = $row['Total'];
                      echo "<h3><b>TOTAL: ".$total." lei</h3></b>";
                    }
                 ?>

                    <form method='POST' >
                 <input type="submit" value="BUY PRODUCTS">
                 <input type='hidden' name='productName' value='$produs'>
                 <input type='submit' name='remove_all' value='EMPTY CART'>
                 </form>
                   </center>
                   <?php
                   if(isset($_POST['remove_product'])){
                     $id = $_SESSION['idCart'] ;
                     $delete = "DELETE FROM cumparaturi
                                 WHERE username = '$user'
                                 AND idProdus = $id";
                    mysqli_query($conn, $delete);
                   }

                   if(isset($_POST['remove_all'])){
                     $delete = "DELETE FROM cumparaturi
                                 WHERE username = '$user'";

                    mysqli_query($conn, $delete);
                   }
                    ?>

    </div>
    <?php  include 'includes/footer.php'; ?>
    <?php
    ?>

</body>
</html>
