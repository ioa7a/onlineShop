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

<!-- categorie produse -->
      <div class="left">
        <h2>BUY</h2>
        <h3> Categories: </h3>
        <form method='POST'>
        <?php

          $query = "SELECT categorie_obiecte.Nume FROM categorie_obiecte;";
        	$results = mysqli_query($conn, $query);
            $i =1;
          while ($row = mysqli_fetch_array($results)) {
              $cat = $row['Nume'];
              echo "<input type='radio' id='Categorie' name='Categorie' value='$i'> $cat <br>";
              $i = $i + 1;
            }
           ?>

         <div class ="input-group">
          <input type="submit" name="select_category" value="FILTER">
         </div>
      </form>

      </div>

      <div class="right">
        <?php
        //alegere categorie produs
           if(isset($_POST['select_category'])){
                $idCat = @$_POST['Categorie'];

                    $select_1 = "SELECT produs.*, categorie_obiecte.Nume as Categorie
                              FROM produs, categorie_obiecte
                              WHERE produs.idCategorie = categorie_obiecte.idCategorie
                              AND produs.idCategorie = $idCat";
                    $results = mysqli_query($conn, $select_1);
                      while ($row = @mysqli_fetch_array($results)) {
                      echo "
                      <div class='desc'>" ;
                       $id = $row['idProdus'];
                       $name = $row['Nume'];
                       $desc = $row['Descriere'];
                       $price = $row['Pret'];
                       $del = $row['DetaliiLivrare'];
                       echo "<b>Product:</b> ".$name."<br><b> Description: </b>".$desc.
                            "<br> <b>Price: </b>".$price." lei <br><b> Delivery Method: </b>".$del."</div>
                            <form method='POST' action='product.php'>
                            <input type='hidden' name='productName' value='$name'>
                            <input type='submit' name='view_product' value='VIEW PRODUCT'>
                            </form>
                            <br>"

                          ;
                        } ?>



                       </div>
          </div>

                     <?php
                       }
       ?>
    </div>
  </div>


    <?php  include 'includes/footer.php'; ?>

</body>
</html>
