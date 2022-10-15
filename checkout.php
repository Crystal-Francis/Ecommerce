<?php
session_start();
?>
<html>
    <head>
    <title>Checkout</title>
    <style>
    .dinfo {
        position: absolute;
        border: 2px solid rgb(172, 168, 168);
        height: 500px;
        background-color: white;
        width: 800px;
        left: 150px;
}
        .submitbtn{
            position: absolute;
            right: 50px;
            font-size:22px;
            font-family:Comfortaa;
            color:white;
            background-color: rgb(167, 172, 180);
            height:60px;
            width: 170px;
            border: 1px solid rgb(45, 45, 42);
            top: 400px;
        }
        .submitbtn:hover {
            background-color: rgb(97, 101, 106);
        }
        .cardtype {
            height: 40px;
            font-size: 22px;
            font-family: Comfortaa;
        }
        .radiotype {
            font-family: Comfortaa;
            position: absolute;
            top: 370px;
            font-size: 20px;
            right: 300px;
        }
        .ordersummary {
            position: absolute;
            right: 70px;
            z-index: 9;
            width: 482px;
            background-color: whitesmoke;
            color: black;
            font-family: Comfortaa;
            height: 946.5px;
            border: 2px solid gray;
            font-size: 25px;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
        }
        .products {
            overflow: scroll;
            width: 460;
            background-color: white;
            border: 2px solid gray;
            overflow-x: hidden;
            height: 570px;
        }
    </style>
    <link rel="stylesheet" href="./links.css">
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
    <script>
        function placeorder() {
            var fullName = document.checkoutdetails.fullname.value;
            if (fullName == "") {
                    alert("Please enter your Name");
                    return false;
                }
            var postalCode = document.checkoutdetails.postalcode.value;
            if (postalCode == "" || postalCode.length > 10) {
                    alert("Please enter a valid Postal Code");
                    return false;
                }
            var phoneNumber = document.checkoutdetails.phonenumber.value;
            if (phoneNumber == "") {
                    alert("Please enter a valid Phone Number");
                    return false;
                }
            var unitNo = document.checkoutdetails.unit.value;
            if (unitNo == "" || unitNo.length > 10) {
                    alert("Please enter a valid Unit Number");
                    return false;
                }
            var street = document.checkoutdetails.street.value;
            if (street == "") {
                    alert("Please enter a valid Street");
                    return false;
                }
            var name = document.checkoutdetails.name.value;
            if (name == "") {
                alert ("Please enter the name on your card")
                return false;
            }
            var cardnumber = document.checkoutdetails.cardnumber.value;
            if (cardnumber == "") {
                alert ("Please your card number")
                return false;
            }
            var expirydate = document.checkoutdetails.expirydate.value;
            if (expirydate == "") {
                alert ("Please enter the expiration date of your card")
                return false;
            }
            var cvv = document.checkoutdetails.cvv.value;
            if (cvv == "") {
                alert ("Please enter the cvv of your card")
                return false;
            }
            document.checkoutdetails.submit();
        };

        function formatString(e) {
            var inputChar = String.fromCharCode(event.keyCode);
            var code = event.keyCode;
            var allowedKeys = [8];
            if (allowedKeys.indexOf(code) !== -1) {
                return;
            }
        
            event.target.value = event.target.value.replace(
                /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
            ).replace(
                /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
            ).replace(
                /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
            ).replace(
                /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
            ).replace(
                /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
            ).replace(
                /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
            ).replace(
                /\/\//g, '/' // Prevent entering more than 1 `/`
            );
            }
    </script>
    <?php include 'header.php'?>
    </head>
    <body style="background-color: rgb(239, 239, 239);">
    <form name="checkoutdetails" action="checkout2.php" method="post">
    <br><br><br><br><br><br><br><br>
    <?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $username = $_SESSION['username'];
    $purchase_id = $_SESSION['purchase_id'];
    $sql = "SELECT B.TOTAL_PRICE,C.DESCRIPTION,A.QUANTITY,A.PRICE " . 
    " FROM shopping_cart A, " . 
    "purchase_detail B, product_description C WHERE A.purchase_id = " .
     "B.purchase_id and C.prod_desc_id = A.prod_desc_id and B.username='" . 
    $username . "' AND B.purchase_id=" . $purchase_id;
    
    //echo $sql;
    
    //Database Connection
    $servername = "localhost";
    $user = "crystal";
    $pwd = "Crystal@123";
    $database = "crystal";
     
    // Create connection
    $conn = mysqli_connect($servername, $user, $pwd, $database);
     
    $result = $conn->query($sql);
      
    $rows = $result->fetch_all(MYSQLI_ASSOC);
     
    $rowcount=mysqli_num_rows($result);
    //$conn->close();
    ?>
    <div class="ordersummary">
            <br><b style="font-size: 40px;">
            &emsp;&emsp;Order Summary</b><br><br>   
            <center><div class="products">
    <?php 
        foreach($rows as $row){
    ?><br>
        <div style="font-size: 20px;"><hr><?= $row['DESCRIPTION']?>
        <br>Quantity : <?= $row['QUANTITY']?> &ensp;Price : $<?= $row['PRICE']?><br></div>
    

    <?php }; ?>
            </div></center><br>

    <?php
    $sql = "SELECT TOTAL_PRICE, SHIPPING_FEE, GST, TOTAL FROM purchase_detail WHERE username = '" . $username . 
    "' AND purchase_id = " . $purchase_id;
    $result = $conn->query($sql);
     
    $row = $result->fetch_array(MYSQLI_ASSOC);
    ?>
            <b style="font-size: 30px;">
            &nbsp;Subtotal : $<?= $row['TOTAL_PRICE']?></b><br><br>
            <b style="font-size: 30px;">
            &nbsp;Shipping Fee : $<?= $row['SHIPPING_FEE']?></b><br><br>
            <b style="font-size: 30px;">
            &nbsp;GST : $<?= $row['GST']?></b><br>
            <b style="font-size: 30px;"><hr style="height:2px;background: black;">
            &nbsp;Total : $<?= $row['TOTAL']?></b><br><br>
    </div>
    <?php
            $conn->close();
            ?>



        <div class="dinfo" style="border-top-left-radius: 25px;">
            <h1 style="font-family: Comfortaa;">&emsp;Delivery Information</h1><br>

            <b style="font-family: Comfortaa;font-size: 20px;">&emsp;&ensp;
            Full name:</b>

            <b style=
            "font-family: Comfortaa;font-size: 20px;position:absolute;right:247px;">&emsp;&ensp;
            Postal Code:</b>

            <br><br>&emsp;&emsp;<input name="fullname" type="text"
            style="height: 40px;font-size: 25px;font-family: Comfortaa;">

            &emsp;&emsp;&nbsp;<input name="postalcode" type="text"
            style="height: 40px;font-size: 25px;font-family: Comfortaa;">
            
            <br><br><br>&emsp;&nbsp;
            <b style="font-family: Comfortaa;font-size: 20px;">
            Phone Number:</b>

            <b style="font-family: Comfortaa;font-size: 20px;position:absolute;right:290px;">
            Unit No:</b><br><br>

            &emsp;&ensp;<input name="phonenumber" type="text"
            style="height: 40px;font-size: 25px;font-family: Comfortaa;">

            &emsp;&emsp;&emsp;<input name="unit" type="text"
            style="height: 40px;font-size: 25px;font-family: Comfortaa;">
            
            <b style="font-family: Comfortaa;font-size: 20px;"><br><br>
            &emsp;&ensp;Street:</b>

            <br><br>&emsp;&ensp;<input name="street" type="text"
            style="height: 40px;font-size: 25px;font-family: Comfortaa;"><br><br>

            <input name="deliverytype" type="radio" value="Home" class="radiotype" style="right:23pc;">
            <label for="home" class="radiotype" >Home</label>

            <input name="deliverytype" type="radio" style="right: 200px;" value="Office" class="radiotype">
            <label for="Office"class="radiotype" style="right: 130px;">Office</label>
        </div>

        <div class="dinfo" style="top:600px;border-bottom-left-radius: 25px;">
            <h1 style="font-family: Comfortaa;">&emsp;Payment</h1><br>

            <b style="font-family: Comfortaa;font-size: 20px;">&emsp;&ensp;
            Name on card:</b>

            <b style=
            "font-family: Comfortaa;font-size: 20px;position:absolute;right:230px;">&emsp;&ensp;
            Card Number:</b>

            <br><br>&emsp;&emsp;<input name="name" type="text"
            style="height: 40px;font-size: 25px;font-family: Comfortaa;">

            &emsp;&emsp;&nbsp;<input name="cardnumber" type="text"
            style="height: 40px;font-size: 25px;font-family: Comfortaa;">
            
            <br><br><br>&emsp;&nbsp;
            <b style="font-family: Comfortaa;font-size: 20px;">
            Card Type:</b>

            <b style="font-family: Comfortaa;font-size: 20px;position:absolute;right:210px;">
            Expiration Date:</b><br><br>

            &emsp;&ensp;
            <select name="cardtype" id="cardtype" class="cardtype">
                <option value="visa">Visa</option>
                <option value="mastercard">MasterCard</option>
                <option value="discover">Discover</option>

            &emsp;&emsp;&emsp;<input name="expirydate" 
            onkeyup="formatString(event);" max="4" maxlength="5" type="text" 
            style="height: 40px;font-size: 25px;font-family: Comfortaa;
            position:absolute;right: 28px;">
            
            <b style="font-family: Comfortaa;font-size: 20px;"><br><br>
            &emsp;&ensp;CVV:</b>

            <br><br>&emsp;&ensp;<input name="cvv" type="text"
            style="height: 40px;font-size: 25px;font-family: Comfortaa;"><br><br>

            <input type="button" value="Place Order"class="submitbtn"
             onclick="placeorder()" id="submitbtn">
        </div>
        </form>
        <div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br>
</div>
    </body>
</html>