<?php
include 'header.php'
?>
<html>
    <head>
        <link rel="stylesheet" href="links.css">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
        <title>Reviews</title>
    </head>
    <body>
        <style>
    * {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  margin: 0 auto;
  max-width: 800px;
  padding: 20px;
}

.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color:rgb(255, 204, 0);
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: rgb(255, 204, 0);}
.bar-4 {width: 30%; height: 18px; background-color: rgb(255, 204, 0);}
.bar-3 {width: 10%; height: 18px; background-color: rgb(255, 204, 0);}
.bar-2 {width: 4%; height: 18px; background-color: rgb(255, 204, 0);}
.bar-1 {width: 15%; height: 18px; background-color: rgb(255, 204, 0,);}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
.btn {
    position: absolute;
    top: 500px;
    right: 520px;
    height: 50px;
    width: 500px;
    font-family: 'Open sans';
    font-size: 25px;
}
</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "crysgzxw_crystal";
$pwd = 'iji$Q5Rxo@ERcraD';
$database = "crysgzxw_crystal";
 
// Create connection
$conn = mysqli_connect($servername, $username, $pwd, $database);
$sql2 = "SELECT stars FROM review";
$sql3 = "SELECT stars from review WHERE review_id = (SELECT max(review_id) FROM review)";
$result2 = $conn->query($sql2);
$records2 = $result2->fetch_all(MYSQLI_ASSOC); 
$result3 = $conn->query($sql3);
$records3 = $result3->fetch_array(MYSQLI_ASSOC); 
$last_record = $records3['stars'];
$five = 0;
$four = 0;
$three = 0;
$two = 0;
$one = 0;
$total_stars = 0;
foreach ($records2 as $record) {
  if ($record['stars'] == 5) {
    $total_stars = $total_stars + 5;
    $five++;
  };
  if ($record['stars'] == 4) {
    $total_stars = $total_stars + 4;
    $four++;
  };
  if ($record['stars'] == 3) {
    $total_stars = $total_stars + 3;
    $three++;
  };
  if ($record['stars'] == 2) {
    $total_stars = $total_stars + 2;
    $two++;
  };
  if ($record['stars'] == 1) {
    $total_stars = $total_stars + 1;
    $one++;
  };
};
$total_reviews = $five + $four + $three + $two + $one;
$total_stars = $total_stars + $record['stars'] - ($last_record);
$average = 0;
if($total_stars > 0 && $total_reviews > 0){
  $average = $total_stars / $total_reviews;
}
?>
<br><br><br><br><br><br><br><br><br>
<span class="heading">User Rating</span>
<?php if ($average == 5) {?>
<span style="font-size:25px;color:rgb(255, 204, 0);">★★★★★</span>
<?php }; ?>
<?php if ($average == 4) {?>
<span style="font-size:25px;color:rgb(255, 204, 0);">★★★★</span><span style="font-size:25px;">★</span>
<?php }; ?>
<?php if ($average == 3) {?>
<span style="font-size:25px;color:rgb(255, 204, 0);">★★★</span><span style="font-size:25px;">★★</span>
<?php }; ?>
<?php if ($average == 2) {?>
<span style="font-size:25px;color:rgb(255, 204, 0);">★★</span><span style="font-size:25px;">★★★</span>
<?php }; ?>
<?php if ($average == 1) {?>
<span style="font-size:25px;color:rgb(255, 204, 0);">★</span><span style="font-size:25px;">★★★★</span>
<?php }; ?>
<?php if ($average == 0) {?>
</span><span style="font-size:25px;">★★★★★</span>
<?php }; ?>
<p>≈ <?=round($average)?> average based on <?=$total_reviews?> review(s)</p>
<hr style="border:3px solid #f1f1f1">

<div class="row">
  <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
    <?php if ($five == 0) {?>
      <div class="bar-5" style="width:0%;"></div>
      <?php }; ?>
    <?php if ($five == 1) {?>
      <div class="bar-5" style="width:10%;"></div>
      <?php }; ?>
    
    <?php if ($five == 2) {?>
      <div class="bar-5" style=" width:20%;"></div>
      <?php }; ?>

      <?php if ($five == 3) {?>
      <div class="bar-5" style=" width:30%;"></div>
      <?php }; ?>

      <?php if ($five == 4) {?>
      <div class="bar-5" style=" width:40%;"></div>
      <?php }; ?>

      <?php if ($five == 5) {?>
      <div class="bar-5" style=" width:50%;"></div>
      <?php }; ?>
      <?php if ($five == 6) {?>
      <div class="bar-5" style=" width:60%;"></div>
      <?php }; ?>
      <?php if ($five == 7) {?>
      <div class="bar-5" style=" width:70%;"></div>
      <?php }; ?>
      <?php if ($five == 8) {?>
      <div class="bar-5" style=" width:80%;"></div>
      <?php }; ?>
      <?php if ($five == 9) {?>
      <div class="bar-5" style=" width:90%;"></div>
      <?php }; ?>
      <?php if ($five == 10) {?>
      <div class="bar-5" style=" width:100%;"></div>
      <?php }; ?>
    </div>
  </div>
  <div class="side right">
    <div><?=$five?></div>
  </div>


  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
    <?php if ($four == 0) {?>
      <div class="bar-4" style="width:0%;"></div>
      <?php }; ?>
    <?php if ($four == 1) {?>
      <div class="bar-4" style="width:10%;"></div>
      <?php }; ?>
    
    <?php if ($four == 2) {?>
      <div class="bar-4" style=" width:20%;"></div>
      <?php }; ?>

      <?php if ($four == 3) {?>
      <div class="bar-4" style=" width:30%;"></div>
      <?php }; ?>

      <?php if ($four == 4) {?>
      <div class="bar-4" style=" width:40%;"></div>
      <?php }; ?>

      <?php if ($four == 5) {?>
      <div class="bar-4" style=" width:50%;"></div>
      <?php }; ?>
      <?php if ($four == 6) {?>
      <div class="bar-4" style=" width:60%;"></div>
      <?php }; ?>
      <?php if ($four == 7) {?>
      <div class="bar-4" style=" width:70%;"></div>
      <?php }; ?>
      <?php if ($four == 8) {?>
      <div class="bar-4" style=" width:80%;"></div>
      <?php }; ?>
      <?php if ($four == 9) {?>
      <div class="bar-4" style=" width:90%;"></div>
      <?php }; ?>
      <?php if ($four == 10) {?>
      <div class="bar-4" style=" width:100%;"></div>
      <?php }; ?>
    </div>
  </div>
  <div class="side right">
    <div><?=$four?></div>
  </div>


  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
    <?php if ($three == 0) {?>
      <div class="bar-3" style="width:0%;"></div>
      <?php }; ?>
    <?php if ($three == 1) {?>
      <div class="bar-3" style="width:10%;"></div>
      <?php }; ?>
    
    <?php if ($three == 2) {?>
      <div class="bar-3" style=" width:20%;"></div>
      <?php }; ?>

      <?php if ($three == 3) {?>
      <div class="bar-3" style=" width:30%;"></div>
      <?php }; ?>

      <?php if ($three == 4) {?>
      <div class="bar-3" style=" width:40%;"></div>
      <?php }; ?>

      <?php if ($three == 5) {?>
      <div class="bar-3" style=" width:50%;"></div>
      <?php }; ?>
      <?php if ($three == 6) {?>
      <div class="bar-3" style=" width:60%;"></div>
      <?php }; ?>
      <?php if ($three == 7) {?>
      <div class="bar-3" style=" width:70%;"></div>
      <?php }; ?>
      <?php if ($three == 8) {?>
      <div class="bar-3" style=" width:80%;"></div>
      <?php }; ?>
      <?php if ($three == 9) {?>
      <div class="bar-3" style=" width:90%;"></div>
      <?php }; ?>
      <?php if ($three == 10) {?>
      <div class="bar-3" style=" width:100%;"></div>
      <?php }; ?>
    </div>
  </div>
  <div class="side right">
    <div><?=$three?></div>
  </div>


  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
    <?php if ($two == 0) {?>
      <div class="bar-2" style=" width:0%;"></div>
      <?php }; ?>

    <?php if ($two == 1) {?>
      <div class="bar-2" style="width:10%;"></div>
      <?php }; ?>
    
    <?php if ($two == 2) {?>
      <div class="bar-2" style=" width:20%;"></div>
      <?php }; ?>

      <?php if ($two == 3) {?>
      <div class="bar-2" style=" width:30%;"></div>
      <?php }; ?>

      <?php if ($two == 4) {?>
      <div class="bar-2" style=" width:40%;"></div>
      <?php }; ?>

      <?php if ($two == 5) {?>
      <div class="bar-2" style=" width:50%;"></div>
      <?php }; ?>
      <?php if ($two == 6) {?>
      <div class="bar-2" style=" width:60%;"></div>
      <?php }; ?>
      <?php if ($two == 7) {?>
      <div class="bar-2" style=" width:70%;"></div>
      <?php }; ?>
      <?php if ($two == 8) {?>
      <div class="bar-2" style=" width:80%;"></div>
      <?php }; ?>
      <?php if ($two == 9) {?>
      <div class="bar-2" style=" width:90%;"></div>
      <?php }; ?>
      <?php if ($two == 10) {?>
      <div class="bar-2" style=" width:100%;"></div>
      <?php }; ?>
    </div>
  </div>
  <div class="side right">
    <div><?=$two?></div>
  </div>


  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
    
    <?php if ($one == 0) {?>
      <div class="bar-1" style=" width:0%;"></div>
      <?php }; ?>

    <?php if ($one == 1) {?>
      <div class="bar-1" style="width:10%;"></div>
      <?php }; ?>
    
    <?php if ($one == 2) {?>
      <div class="bar-1" style=" width:20%;"></div>
      <?php }; ?>

      <?php if ($one == 3) {?>
      <div class="bar-1" style=" width:30%;"></div>
      <?php }; ?>

      <?php if ($one == 4) {?>
      <div class="bar-1" style=" width:40%;"></div>
      <?php }; ?>

      <?php if ($one == 5) {?>
      <div class="bar-1" style=" width:50%;"></div>
      <?php }; ?>
      <?php if ($one == 6) {?>
      <div class="bar-1" style=" width:60%;"></div>
      <?php }; ?>
      <?php if ($one == 7) {?>
      <div class="bar-1" style=" width:70%;"></div>
      <?php }; ?>
      <?php if ($one == 8) {?>
      <div class="bar-1" style=" width:80%;"></div>
      <?php }; ?>
      <?php if ($one == 9) {?>
      <div class="bar-1" style=" width:90%;"></div>
      <?php }; ?>
      <?php if ($one == 10) {?>
      <div class="bar-1" style=" width:100%;"></div>
      <?php }; ?>
    </div>
  </div>
  <div class="side right">
    <div><?=$one?></div>
  </div>
</div>
</body>






<a href="writereview.php"><input type="button" value="Write A Review"
class="btn"></a>
<form action="removereview.php">
<?php
$usr = $_SESSION['username'];
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$sql = "SELECT review_id,username,rating,comment,date FROM review"; //WHERE username = '" . $usr . "'";

//Database Connection
$result = $conn->query($sql);
$records = $result->fetch_all(MYSQLI_ASSOC);
//echo $record['fullname'];
$conn->close();
$top = 602;
$topcomment = 650;
$topdate = 680;

foreach($records as $record){
?>
<b style="font-family:'Open sans'; font-size: 20px;
position:absolute;top:<?=$top?>;left:100px;"><?=$record['username']?></b>
<font style="color:rgb(255, 204, 0);font-family:'Open sans'; font-size: 20px;
position:absolute;top:<?=$top?>;left:230px;">&emsp;<?=$record['rating']?></font>
<font style="position:absolute;top:<?=$topcomment?>;left:85px;">&emsp;<?=$record['comment']?></font>
<font style="position:absolute;top:<?=$topdate?>;left:85px;color: gray;">&emsp;<?=$record['date']?>
</form>
<!--<HR style = "width: 1000;">--></font>
<?php 
$top = $top + 100;
$topcomment = $topcomment + 100;
$topdate = $topdate + 100;
} 
if ($three == 0) {
  
};
?>

</html>