<?php
session_start();

$fullname = $_POST['fullname'];
$postalcode = $_POST['postalcode'];
$phonenumber = $_POST['phonenumber'];
$unitno = $_POST['unit'];
$street = $_POST['street'];
$deliverytype = $_POST['deliverytype'];
$username = $_SESSION['username'];
$purchase_id = $_SESSION['purchase_id'];

//Database Connection
$servername = "localhost";
$user = "crystal";
$password = "Crystal@123";
$database = "crystal";

// Create connection
$conn = mysqli_connect($servername, $user, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully<br>";

#echo $sql . "<br>";

$sql = "UPDATE shopping_cart SET status='COMPLETE' WHERE purchase_id=" . $purchase_id;
$conn->query($sql); 

$sql2 = "INSERT INTO delivery_address (full_name, postal_code, phone_number, unit_no, street, address_type, username, purchase_id) " . 
        "VALUES ('" . $fullname . "','" . $postalcode . "','" . $phonenumber . 
        "','" . $unitno . "','" . $street . "','" . $deliverytype . "' , '" . $username . "'," . $purchase_id . ")";

$sql3 = "UPDATE purchase_detail SET ORDER_NUMBER=CONCAT('ORD'," . $purchase_id . ",'/',year(now())) WHERE purchase_id=" . $purchase_id;
$conn->query($sql3);
$result = $conn->query($sql2);         
$conn->close();

if ($result == 1) {
    header("Location: checkoutsuccess.php");
        exit();
    } else {
        header("Location: checkout.php");
        exit();
    }
    
    $conn->close(); 
?>