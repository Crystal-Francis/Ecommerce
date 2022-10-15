<?php
session_start();
$rows = $_POST['totalrows'];
$totalprice = $_POST['totalprice'];
$usr = $_SESSION['username'];

if($usr == ''){
    header("Location: signin.php");
    exit();
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//Database Connection
$servername = "localhost";
$username = "crystal";
$pwd = "Crystal@123";
$database = "crystal";
 
// Create connection
$conn = mysqli_connect($servername, $username, $pwd, $database);
$sql2 = "INSERT INTO purchase_detail(username,
total_price, shipping_fee, gst, total, date) VALUES('" . $usr . "'," . 
$totalprice . ",2,(" . $totalprice/100*7 . "), " . $totalprice+2+($totalprice/100*7) . ", now())";
$sql3 = "SELECT MAX(purchase_id) purchase_id FROM purchase_detail WHERE username = '" . $usr . "'";

$conn->query($sql2);
$result = $conn->query($sql3);
$row = $result->fetch_array(MYSQLI_ASSOC);
$purchase_id = $row['purchase_id'];
$_SESSION['purchase_id'] = $purchase_id;





for($i=0; $i<$rows; $i++){

$qty = $_POST['quantity' . $i];
$price = $_POST['price' . $i];
$id = $_POST['cartid' . $i];    
$sql4 = "UPDATE shopping_cart SET quantity = " . $qty . ",price =" . $price . ",purchase_id=" . $purchase_id . " WHERE " .
       "cart_id = " . $id . " AND username ='" . $usr . "'";

$conn->query($sql4);

}

header("Location: checkout.php");
exit();
?> 