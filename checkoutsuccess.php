<?php
session_start();
?>
<html>
    <style>
        .div {
            height: 500;
            width: 200;
            z-index: 9;
            position: relative;
            top: 250;
            width: 600;
            background-color: white;
            border: 2px solid gray;
            border-radius: 25px;
            font-family: Comfortaa;
            font-size: 35px;
        }
        .option {
            font-family: 'Open sans';
            font-size: 15px;
            z-index: 9;
            position: absolute;
            top: 690px;
            right: 640px;
        }
    </style>
    <title>Checkout</title>
    <head>
    <link rel="stylesheet" href="./links.css">
<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
<?php include 'header.php'?>
</head>
<body style="background-color: rgb(239, 239, 239);">
<center><div class="div"><br>
    Your order has been placed
    <img src="./images/check.png" alt="check" style="height: 370px;">
</div>
<p class="option"><a href="accountinfo.php">Click here</a> to view your purchase</p></center><br><br><br>
</body><br><br><br><br><br><br><br><br><br><br><br><br><br>
</html>