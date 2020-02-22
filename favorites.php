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
        <div class="content">
          <h2> <center>Your favorite products: </h2>
         <?php
              $user = $_SESSION['username'];
              $select = "SELECT produs.*, categorie_obiecte.Nume as Categorie
                        FROM categorie_obiecte, produs
                        INNER JOIN favorite ON produs.idProdus = favorite.idProdus
			                 INNER JOIN login_info ON login_info.username = favorite.username
                       WHERE login_info.username = '$user'
                       AND categorie_obiecte.idCategorie = produs.idCategorie";
              $request = mysqli_query($conn, $select);
              while ($row = mysqli_fetch_array($request)) {
                $_SESSION['idFave'] = $row['idProdus'];
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
                      </div> <br>
                      <form method='POST' action='product.php'>
                      <input type='hidden' name='productName' value='$produs'>
                      <input type='submit' name='view_product' value='VIEW PRODUCT'>
                      </form> <br>
                      <form method='POST'>
                      <input type='hidden' name='productName' value='$produs'>
                      <input type='submit' name='remove_product' value='REMOVE PRODUCT'>

                      </form>
                      </center>
                      <p>";
              }

              echo "<center><form method='POST'>
              <input type='submit' name='remove_all' value='REMOVE ALL'>
              </form>
                </center>";
            if(isset($_POST['remove_product'])){
              $id = $_SESSION['idFave'] ;
              $delete = "DELETE FROM favorite
                          WHERE username = '$user'
                          AND idProdus = $id";
             mysqli_query($conn, $delete);
            }

            if(isset($_POST['remove_all'])){
              $delete = "DELETE FROM favorite
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
