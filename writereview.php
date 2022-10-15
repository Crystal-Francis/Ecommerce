<?php
include 'header.php';
if ($usr == ''){
    header("Location: signin.php");
    exit();
}
?>
<html>
    <head>
        <style>
            .rate {
                height: 100px;
                padding: 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    position: relative;
    right: 180px;
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:100px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #ffc700;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #ffc700;
}
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
                height: 670px;
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
            top: 600px;
        }
        .submitbtn:hover {
            background-color: rgb(97, 101, 106);
        }
            .feedback-header{
                font-size: 30px;
                font-family: 'Open sans';
                position: absolute;
                top:265px;
                left: 150px;
            }
        </style>
        <script>
            function writereview() {
                var comment = document.feedback.comment.value;
                var rate = document.feedback.rate.value;
                if (rate == "") {
                    alert ("Please select your rating.");
                    return false;
                }
                if (comment == "" || comment.length == 0) {
                    alert ("Please enter your feedback.");
                    return false;
                }
                document.feedback.submit();
            };
        </script>
        <title>Reviews</title>
        <link rel="stylesheet" href="links.css">
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    </head>
    <form action="reviewconn.php" method="post" name="feedback">
    <body style="background-color: rgb(239, 239, 239);">
        <div class="review"><br>
        WE APPRECIATE YOUR REVIEW!
        <p style="font-size: 20px;font-family: 'Open sans';"
        >Your feedback helps us improve our customer services and quality of products</p>
        <div class="rate">
    <input type="radio" id="star5" name="rate" value="★★★★★"/>
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="★★★★"/>
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="★★★"/>
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="★★"/>
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="★"/>
    <label for="star1" title="text">1 star</label>
  </div><br><br>
  <p class="feedback-header">Write your feedback:</p>
  <textarea name="comment" id="comment" cols="70" rows="12" maxlength="100"></textarea>
  <input type="button" value="Submit" class="submitbtn" onclick="writereview()">
        </div>
    </body>
    </form>
</html>