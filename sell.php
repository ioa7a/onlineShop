<?php
include_once 'includes/dbh.inc.php';
if (session_status() != 2) {
    session_start();
}

if (isset($_GET['logout'])) {
//    session_destroy();
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
      <div class ="content">
        <div class="left">
            <h2>SELL</h2>
    <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
  <form method='POST'  enctype="multipart/form-data">
    Product image: <br>

    <!-- <input type="submit" value="Upload Image" name="submit">
    </form> -->
    <!-- <form method='POST'> -->
      <div class="input-group">
          <label> Name of product: </label>
          <input type="text" autocomplete="off" name="Nume" >
      </div>
      <div class ="input-group">
          <label> Description: </label>
          <input type="text" name="Descriere">
      </div>
      <div class ="input-group">
          <label> Price: </label>
          <input type="number" name="Pret">
      </div>
      <div class ="input-group">
          <label> Delivery options: </label>
          <input type="text" name="DetaliiLivrare">
      </div>
        <div clas = "input-group">
            <label> Category: </label><br>
            <?php
            $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $userDB);
            $query = "SELECT categorie_obiecte.Nume FROM categorie_obiecte;";
          	$results = mysqli_query($conn, $query);
            $i = 1;
            while ($row = mysqli_fetch_array($results)) {
                $cat = $row['Nume'];
            echo "<input type='radio' id='Categorie' name='Categorie' value='$i'> $cat <br>";
            $i = $i + 1;
         }
          ?>
            <input type="file" name="fileToUpload"> <br>
        </div>
        <div class ="input-group">
        <input type="submit" name="upload_product" value="SELL">
        </div>

    </form>
    </div>


    <div class="right">
    <?php
//
//     $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
    if(isset($_POST['upload_product'])){
      $target_dir = "uploads\\";
      $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
      $path=$_FILES['fileToUpload']['name'];
      $pathto="uploads\\".$path;
      move_uploaded_file( $_FILES['fileToUpload']['tmp_name'],$pathto) or die( "Could not copy file!");
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
              header("location: sell.php");
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }

      $count_mod = "SELECT MAX(produs.idProdus) as MAX FROM produs;";
      $results = mysqli_query($conn, $count_mod);
      $row = mysqli_fetch_assoc($results);
      $nr = $row['MAX'];
      $id = $nr + 1;
      $name = $_POST['Nume'];
      $desc = $_POST['Descriere'];
      $price = $_POST['Pret'];
      $del = $_POST['DetaliiLivrare'];
      $cat = $_POST['Categorie'];
      $image =$path? $path : 'noImage.jpg';
      $select = "INSERT INTO produs
                VALUES('$id', $cat, '$name', '$desc', '$price', '$del', '$image')";
      if (mysqli_query($conn, $select)) {
              echo "<h2>
                  The product has been succesfully entered into our database.
                  This is the product you are selling: </h2>
                    <div class='desc'>
                    <b>  <h3> Product: $name   </b></h3>
                      <b><h4> Description: $desc   </b></h4>
                    <b> Price: </b> $price  lei <br>
                    <b>  Delivery Method:  </b> $del <br>
                    <img src='uploads/$image'>
                    </div>";
                } else {
                  echo "The product couldn't be entered within our
                  database. Please check that you have completed all of
                  the necessary fields.";
                }
  }
    ?>
    </div>
  </div>
        <?php  include 'includes/footer.php'; ?>

</body>
</html>
