<?php
include 'header.php'
?>
<html>
    <head>
    <link rel="stylesheet" href="links.css">
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <title>Reviews</title>
        <style>
                        .review {
                border: 2px solid gray;
                background-color: white;
                color: black;
                z-index: 9;
                font-family: Comfortaa;
                text-align: center;
                font-size: 40px;
                position: absolute;
                top: 160px;
                width: 900px;
                right: 300px;
                height: 680px;
            }
        </style>
    </head>
    <body style="background-color: rgb(239, 239, 239);">
        <div class="review"><br>
            YOUR REVIEW HAS BEEN ADDED!
        <br><br>
            <img src="./images/check.png" alt="check" style="height: 500px;">
            <p style="font-family: 'Open sans';font-size: 15px;"
            ><a href="reviews.php">Click here</a> to view your review</p>
        </div>
    </body>
</html>