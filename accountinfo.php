<?php
$usr = $_SESSION['username'];
include 'header.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$sql = "SELECT fullname,phone FROM users WHERE username = '" . $usr . "'";

 

//Database Connection
$servername = "localhost";
$username = "crystal"; //crysgzxw_crystal
$pwd = "Crystal@123"; //iji$Q5Rxo@ERcraD
$database = "crystal";
 
// Create connection
$conn = mysqli_connect($servername, $username, $pwd, $database);
$result = $conn->query($sql);
$record = $result->fetch_array(MYSQLI_ASSOC);
//echo $record['fullname'];

$sql2 = "SELECT a.order_number,a.date,a.total,b.street,b.unit_no,b.postal_code FROM purchase_detail a, delivery_address b " . 
        "WHERE a.username='" . $usr . "' AND a.purchase_id = b.purchase_id and a.username=b.username";
$result2 = $conn->query($sql2);
$rows = $result2->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>
<html>
    <style>
    .signinbtn {
        border-radius: 20px;
        height: 40;
        width: 120;
        background-color: white;
        border: 2px solid rgb(172, 179, 175);
        color: rgb(172, 179, 175);
        font-size: 17.5px;
        font-family: Comfortaa;
        z-index: 9;
        position: absolute;
        top: 270px;
        right: 150px
}
    </style>
    <head>
        <link rel="stylesheet" href="links.css">
        <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
    <title>Account Information</title>
    <img src="./images/space.png" alt="space" style="
    position:absolute;top:200px;height:170px;width:1510px;left:0;">
    <div style="z-index: 9;color: white; position: absolute; top: 240px ;
    font-family: Comfortaa;font-size:40px;">
        &emsp;<?=ucwords($record['fullname'])?><br>
        &emsp;&nbsp;<font style="font-size: 25px;"><?=$record['phone']?></font>
        
    </div>
    <div style="z-index: 9;color: black; position: absolute; top: 400px ;
    font-family: Comfortaa;font-size:40px;"><b style="color: black;">ORDERS</b></div>

        <div style="z-index: 9;color: black; position: absolute; top: 500px ;
    font-family: Comfortaa;font-size:35px;font-weight: bold;">Order Number</div>
        <div style="z-index: 9;color: black; position: absolute; top: 500px ;
    font-family: Comfortaa;font-size: 35px;left: 400px;font-weight: bold;">Date</div>
        <div style="z-index: 9;color: black; position: absolute; top: 500px ;
    font-family: Comfortaa;font-size:35px; left: 700px;font-weight: bold;">Price</div>
        <div style="z-index: 9;color: black; position: absolute; top: 500px ;
    font-family: Comfortaa;font-size:35px; left: 900px;font-weight: bold;">Address</div>
        
<?php
 $top = 600;
 foreach ($rows as $row){

?>
        <div style="z-index: 9;color: black; position: absolute; top: <?=$top?>px ;
    font-family: Comfortaa;font-size:30px;"><?= $row['order_number']?></div>
        <div style="z-index: 9;color: black; position: absolute; top: <?=$top?>px ;
    font-family: Comfortaa;font-size:30px;left: 400px;"><?=$row['date']?></div>
        <div style="z-index: 9;color: black; position: absolute; top: <?=$top?>px ;
    font-family: Comfortaa;font-size:30px; left: 700px;">$<?=$row['total']?></div>
        <div style="z-index: 9;color: black; position: absolute; top: <?=$top?>px;
    font-family: Comfortaa;font-size:30px; left: 900px;"><?=$row['street']?>, <?=$row['unit_no']?>, <?=$row['postal_code']?></div>
         
            
<?php 
 $top = $top + 100;
} ?>

    </div>



<a href="signin.php"><input type="button" value="Log out" class="signinbtn"></a>
</head>
</html>