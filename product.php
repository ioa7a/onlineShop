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
        <!-- product + photo -->

        <div class="left">
        <?php
        if(isset($_POST['view_product'])){
                $nume = $_POST['productName'];
               $_SESSION['productName'] = $nume;
        }
        $name =  $_SESSION['productName'];
        $select = "SELECT produs.*, categorie_obiecte.Nume as Categorie
                   FROM produs, categorie_obiecte
                  WHERE produs.idCategorie = categorie_obiecte.idCategorie
                  AND produs.Nume = '$name'";
       $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $userDB);
       $results = mysqli_query($conn, $select);
        while ($row = mysqli_fetch_array($results)) {

            $id = $row['idProdus'];
            $_SESSION['idProdus'] = $id;

            $cat = $row['Categorie'];

             $nume = $row['Nume'];
              $desc = $row['Descriere'];
              $price = $row['Pret'];
              $del = $row['DetaliiLivrare'];
              $imgName = $row['numeImagine'];
                 echo "<center><img src='uploads/$imgName'>";
              echo "<p><b>Product:</b> ".$nume."<br><b>Category: </b>".$cat."<br><b> Description: </b>".$desc.
                   "<br> <b>Price: </b>".$price." lei <br><b> Delivery Method: </b>".$del;



            }
            ?>
            <form method='POST'>
                  <?php  if(isset($_SESSION['username'])){ ?>
            <p><input type='submit' name="cart" value='ADD TO CART'> <p>
            <input type='submit' name="fave" value='ADD TO FAVORITES'>
            <?php } ?>
          </form>
            </center>
      </div>
      <?php
        if(isset($_POST['fave'])){
          $user = $_SESSION['username'];
             $id = $_SESSION['idProdus'];
          $faveID = "SELECT MAX(favorite.idFavorite) AS max
                      FROM favorite";

          $result = mysqli_query($conn, $faveID);
          $row = mysqli_fetch_array($result);
          $newID = $row['max']+1;
          $insert = " INSERT INTO favorite
                      VALUES($newID, $id, '$user')";
          mysqli_query($conn, $insert);
          header("location: favorites.php");
        }
      ?>
      <?php
        if(isset($_POST['cart'])){
          $user = $_SESSION['username'];
             $id = $_SESSION['idProdus'];
          $faveID = "SELECT MAX(cumparaturi.idCumparaturi) AS max
                      FROM cumparaturi";

          $result = mysqli_query($conn, $faveID);
          $row = mysqli_fetch_array($result);
          $newID = $row['max']+1;
          $insert = " INSERT INTO cumparaturi
                      VALUES($newID, '$user', $id)";
          mysqli_query($conn, $insert);
          header("location: cart.php");
        }
      ?>

      <!-- product review -->
      <div class="right">
        <?php
        if(isset($_SESSION['username'])){ ?>

        <h3> Tried this product? Add a review: </h3>
        <form method="post">
        <div class="input-group">
            <label> <b>Review: </b> </label>
            <input type="text" autocomplete="off" name="review_text" style="height:150px; width: 400px">
            <p>
            <button type="submit" name="review"> SUBMIT </button>
        </div>
      <?php }
      else {
        echo "<b><h3>Please log-in to add a review for this product or to
        add it to your favorites/cart.</h3></b>";
      }   ?>

        <?php
        if(isset($_POST['review'])){
             $rev = $_POST['review_text'];
             $user = $_SESSION['username'];
             $id = $_SESSION['idProdus'];
             $selectID = "SELECT MAX(review.idReview) AS max
                         FROM review";
             $result = mysqli_query($conn, $selectID);
             $row = mysqli_fetch_array($result);
             $revID = $row['max']+1;
             $insert_review = "INSERT INTO review
                               VALUES($revID, $id, '$user', '$rev')";
              if (mysqli_query($conn, $insert_review)) {
                echo "Review succesfully submitted.";
             }
             else {
               echo "There was a problem.";
               }
            }
         ?>

        <p>
        </h3>  See what other users thought of this product: </h3>
        <?php
        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $userDB);
        $name =  $_SESSION['productName'];
        $id = $_SESSION['idProdus'];

                $reviewselect = "SELECT review.review, produs.Nume, login_info.username
                         FROM review, produs, login_info
                         WHERE review.idProdus = produs.idProdus
                         AND produs.idProdus = '$id'
                         AND login_info.username = review.username";

         $result = mysqli_query($conn, $reviewselect);


         while ($row = mysqli_fetch_array($result)) {
                 $rev = $row['review'];
                 $usr = $row['username'];
                 echo "<div class='desc'><b>"
                       .$usr."<i></b> says:</i> ".$rev."</div><p>";
         }

         ?>
      </form>
      </div>
    </div>

    <?php  include 'includes/footer.php'; ?>

</body>
</html>
