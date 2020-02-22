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
      <?php  include 'includes/sidebar.php'; ?>
      <center>
    <div class="content" >
      <div class="about" style="width: 50%;  height: 100%; background-color: #242424;
        opacity: 70%;  padding: 20px; border-radius: 10px; text-align: justify; margin-top: 20px;
        margin-bottom: 20px;">
      <h2><b> Frequently Asked Questions</b></h2>
      <ol>
        <li> General Questions </li>
        <ol type="i">
          <li><b>Hendrerit gravida rutrum quisque non tellus orci ac auctor?</b>
           <br>Aenean pharetra magna ac placerat vestibulum lectus mauris.
           Orci eu lobortis elementum nibh tellus molestie.
            Ullamcorper velit sed ullamcorper morbi tincidunt ornare.
            Pulvinar elementum integer enim neque. Eu turpis egestas pretium aenean.
          </li>
            <li><b>Vitae nunc sed velit dignissim? </b> <br>
               Pretium vulputate sapien nec sagittis aliquam malesuada.
               Leo duis ut diam quam nulla porttitor massa id. Viverra nam libero justo laoreet.
               Mi sit amet mauris commodo quis imperdiet massa. Sed augue lacus viverra vitae congue eu.
               Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt.</li>
        </ol>
        <li> Buying a product </li>
        <ol type="i">
              <li> <b>How can I find a certain product?</b>
              <br> Upon clicking on the "BUY" button on the navigation bar,
                you will be presented wih a list of product categories. <br>
                Click on these buttons to filter the products you would like to see.
              </li>
              <li> <b> How do I buy a product?</b> <br>
                Mattis molestie a iaculis at. Vel facilisis volutpat est velit egestas dui id ornare. Orci porta non pulvinar neque.
                Quis viverra nibh cras pulvinar. Varius quam quisque id diam vel quam. Adipiscing elit duis tristique sollicitudin
              <p>
              </li>
          </ol>
          </li>
        <li> Selling a product </li>
        <ol type="i">
              <li> <b>How can I sell a product?</b><br>
                Donec ultrices tincidunt arcu non sodales neque sodales.
                 Ullamcorper morbi tincidunt ornare massa eget.
              <p>
              </li>
              <li> <b> What methods of payment are available?</b><br>
                Tristique senectus et netus et malesuada fames ac.
                Vestibulum morbi blandit cursus risus at. Urna nunc id cursus metus.
              <p>
              </li>
          </ol>
        <li> Payment
          <ol type="i">
                <li> <b> What methods of payment are available?</b><br>
                  Quis hendrerit dolor magna eget est lorem ipsum.
                   Convallis convallis tellus id interdum velit laoreet id.
                    Nunc faucibus a pellentesque sit amet porttitor eget.
                <p>
                </li>
            </ol>
            </li>
        <li> Delivery
          <ol type="i">
                <li> <b>What methods of delivery are available?</b><br>
                   Sit amet consectetur adipiscing elit ut aliquam purus sit amet.
                    Facilisi cras fermentum odio eu feugiat. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie.
                <p>
                </li>
                <li> <b>What are the delivery fees?</b><br>
                  Arcu bibendum at varius vel. Nibh cras pulvinar mattis nunc sed blandit libero volutpat sed.
                <p>
                </li>
            </ol>
            </li>
        <li> Contact
        <ol type="i">
            <li> <b> How can I contact a sales assistant?</b>
            <br> You can find our contact information <a href="contact.php"> here. </a>
            </li>
        </ol>
        </li>

      </ol>
    </center>
  </div>
    </div>

    <?php  include 'includes/footer.php'; ?>

</body>
</html>
