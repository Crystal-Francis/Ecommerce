<html>
    <head>
        <link rel="stylesheet" href="./links.css">
        <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
            <?php include 'header.php' ?>
            <title>Linear Switches</title>
            <a href="cart.php"><img src="./images/shpcart.png" alt="cart" class="cartsymbol"></a>
            </div>
        </head>
        <body style="background-color: rgb(239, 239, 239);">
        <script language='JavaScript'>
        function sendToCart(prod_desc_id) {
          document.cart.id.value = prod_desc_id;
          document.cart.submit();
        };
</script>
<form name="cart" action="addtocart.php" method="post">
<b style="position:absolute;top: 170px; right: 425px;
        font-family: Comfortaa;font-size: 80px;">Linear Switches</b>
          <input type="hidden" name="url" value="linear.php">
    <input type="hidden" name = "id">
    <p style='position: absolute;top: 250px;'>
    <div style="z-index: 9; position: absolute; top: 500;color: gray;
right: 550px;font-family: Comfortaa;font-size: 30px;">
  <?php
  echo $_SESSION['cart_msg']; 
  $_SESSION['cart_msg'] = '';
  ?>
</div> <br>

<?php
 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$sql = "select prod_desc_id, color, description, price, other, image 
from product_description where type = 'linear'";
//Database Connection
$servername = "localhost";
$username = "crystal";
$pwd = "Crystal@123";
$database = "crystal";
 
// Create connection
$conn = mysqli_connect($servername, $username, $pwd, $database);
 
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$result = mysqli_query($conn, $sql);
 
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

 
$tloc =  350;
$rloc = 1100;
$i=0;
foreach($rows as $row){
    if($i == 3){
    $tloc = $tloc + 550;
    $rloc = 1100;
  }
?>
 
<div class="product1" style="right: <?=$rloc;?>px; top: <?=$tloc;?>px; width: 350px;">
            <center><br><br><img src="./images/<?=$row["image"]; ?>" style="height: 150px;"
                 alt="mechkeyboard1" class="productpics"></center>
            <center><div class="productname"><b class="productname">&emsp;&ensp;<center>
                <?=$row["description"]; ?>
                <br>Price: $<?= $row["price"];?></center></div>
            <a href="#" onClick="sendToCart('<?=$row["prod_desc_id"];?>')">
            <img src="./images/cartsymbol.png" alt="cartsymbol" class="cart"></a></center>
        </div>

<?php
$i++;  
$rloc = $rloc - 500;
}
?>
</p>
</form>
        </div>
        </body>
</html>