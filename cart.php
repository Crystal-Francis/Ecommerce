<?php session_start(); ?>
<html>
    <head>
        <link rel="stylesheet" href="./links.css" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
        <title>Cart</title> 
        <style>

  .checkout {
    z-index: 9;
    position: absolute;
    top: 880px;
    right: 0px;
    background-color: white;
    width: 1510px;
    height: 150px;
  }
  .total {
    font-family: Comfortaa;
    font-size: 45px;
    z-index: 9;
    position: absolute;
    left: 150px;
  }
  .btn {
    height:90px;
    font-size: 30px;
    font-family: Comfortaa;
    border-radius: 20px;
    right: 50px;
    position: absolute;
    width: 250px;
    top: 25px;
    color: white;
    background-color: rgb(172, 179, 175);
    border: 2px solid rgb(144, 144, 144);
  }
  .btn:hover {
    background-color: rgb(129, 138, 130);
    border: 4px solid rgb(144, 144, 144);
  }
        </style>
    <script language="JavaScript">
    function removeItem(itemId){

      document.cartform.id.value=itemId;
      document.cartform.submit();
    };
      function add(i, price) {
        var quantity = document.getElementById("quantity" + i).value;
        quantity++;
        var total = quantity * price;
        document.getElementById("quantity" + i).value = quantity;
        document.getElementById("price" + i).value = total;
        document.getElementById("actualprice" + i).innerText = "$" + total;
        calculatePrice();
       };
       function minus(i, price) { 
        var quantity = document.getElementById("quantity" + i).value;
        if (quantity > 1) {
        quantity--;
        };
        var total = quantity * price;
        document.getElementById("quantity" + i).value = quantity;
        document.getElementById("price" + i).value = total;
        document.getElementById("actualprice" + i).innerText = "$" + total;
        calculatePrice();
       };

       function checkout(){
          document.cartform.action="savecart.php";
          document.cartform.submit();
       }

       function calculatePrice(){
          var totalprice = 0;
          var totalrows = document.getElementById('totalrows').value;
          //alert('totalrows:' + totalrows);
          for(i=0; i<totalrows; i++){
             var price = document.getElementById("actualprice" + i).innerText;
             price = price.substring(1,price.length);
             totalprice = totalprice + parseInt(price);
              
             //alert('price:'+price + ' totalprice:'+totalprice);
          }
          document.getElementById('totalprice').innerText = totalprice;
          document.getElementById('totalpriceval').value = totalprice;
       }


    </script>
    </head>
    <body style="background-color: rgb(219, 219, 219);" >
    <form name="cartform" action="removeitem.php" method="post">
    <input type="hidden" name="id">
    <?php include 'header.php'?> 
    <p style='position: absolute;top: 250px;'>
     

<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$username = $_SESSION['username'];
$sql = "SELECT B.CART_ID,A.DESCRIPTION,B.QUANTITY,A.PRICE FROM product_description A, shopping_cart B WHERE A.prod_desc_id = B.prod_desc_id and B.username='" . $username . "' AND B.status='NEW'";

//echo $sql;

//Database Connection
$servername = "localhost";
$username = "crystal";
$pwd = "Crystal@123";
$database = "crystal";
 
// Create connection
$conn = mysqli_connect($servername, $username, $pwd, $database);
 
$result = $conn->query($sql);
 
$rows = $result->fetch_all(MYSQLI_ASSOC);
 
$rowcount=mysqli_num_rows($result);
//echo $rowcount;
$conn->close();

$top=130;
$topbtn = 120;
$topbtn2 = 50;

?>
<center><div class="signupbox" style="width: 1200px; left: 150px;
overflow: scroll;overflow-x: hidden;">
<h2 style = 
"font-family:Comfortaa;position: absolute; left: 30px;top: 15px; font-size: 28px;"
>Name :</h2>
<h1 style = 
"font-family:Comfortaa;position: absolute; left: 680px;top: 15px;font-size: 28px;"
>Quantity :</h1>
<h1 style = 
"font-family:Comfortaa;position: absolute; right: 190px;top: 15px;font-size: 28px;"
>Price :</h1>
<h1 style = 
"font-family:Comfortaa;position: absolute; right: 17px;top: 15px;font-size: 28px;"
>Action :</h1><br><br><br><br><hr style="border-top: solid 3px;">
<input type="hidden" name = 'totalrows' id='totalrows' value = '<?=$rowcount?>'>
<?php
$i = 0;
$totalprice = 0;
foreach ($rows as $row) {
?><br>
    <font style="font-family: Comfortaa; font-size: 20px; 
    position: absolute; left: 20px; width: 600px; top: <?= $top + 30?>;"
    ><?=$row['DESCRIPTION'];?></font>  

    <div style="font-family: Comfortaa; font-size: 20px; 
    position: absolute; left: 400px; width: 600px;z-index:9;top: <?= $top+26?>;">
      &emsp; <input type="button"  value="-" onclick = "minus('<?=$i?>', '<?=$row['PRICE'];?>')">

       <input type="text" readonly id="quantity<?=$i?>" name="quantity<?=$i?>"
       style="font-size: 17px; width: 50; height: 30px;position:absolute;"
        value='<?=$row['QUANTITY'];?>' >
        &nbsp;</div>   
        <a style="font-family: Comfortaa; font-size: 20px; 
    position: relative; left: 200px; width: 600px;top: <?= $topbtn2?>; z-index: 9;" href="#" 

    onClick = "add('<?=$i?>', '<?=$row['PRICE'];?>')"><input 
        type="button" value="+"></a>

      <font  style="font-family: Comfortaa; font-size: 20px; 
    position: absolute; right: -50px; width: 600px;top: <?= $top+10?>;">
      &emsp; 
      <input type="hidden" name = "price<?=$i?>" id = "price<?=$i?>" value="<?=$row['PRICE']?>">
      <div id="actualprice<?=$i?>"> $<?=$row['PRICE'];?>
    </div></font>

      <font style="font-family: Comfortaa; font-size: 20px; 
    position: absolute; left: 800px; width: 600px;top: <?= $topbtn+30?>;">
      &emsp; <a href="#" onclick="removeItem('<?=$row['CART_ID'];?>')">
      <img src="images/removeicon.jpg" alt="remove" 
      width="50" height="50"></a><br></font>

      <input type="hidden" name="cartid<?=$i?>" value="<?=$row['CART_ID']?>">
<?php
$top = $top + 100;
$topbtn = $topbtn + 100;
$topbtn2 = $topbtn2 + 77;
$i++;
$totalprice = $totalprice + $row['PRICE'];
}
?>

</div></center>
<div class="checkout">
<?php
if($rowcount > 0){ ?>
<p class="total">Subtotal : $<font id="totalprice"><?=$totalprice?></font></p>
<input type="hidden" name="totalprice" id="totalpriceval" value="<?=$totalprice?>">
<input type="button" value="Checkout" onclick="checkout()" class="btn">
<?php } ?>
</div>
<?php 
if($rowcount == 0){ ?>
<div class="cartbox" style="top: 190px;height: 690;z-index:9;">
        <div class="cartbox2" style = "z-index:9;">
          <img src="./images/shoppingbag.png" alt="shpbag" class="shpbag"><br><br>
          Your Cart is empty
        </div>
      </div>
<?php } ?>
</form>
    </body>
</html>