<?php
session_start();
$id = $_POST['id'];
$usr = $_SESSION['username'];
$url = $_POST['url'];

if($usr == ''){
    header("Location: signin.php");
    exit();
}


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$sql = "INSERT INTO shopping_cart(prod_desc_id, quantity, status, date, username) " .
"VALUES (" . $id . ", 1, 'NEW', now(), '" . $usr . "')";

 

//Database Connection
$servername = "localhost";
$username = "crystal";
$pwd = "Crystal@123";
$database = "crystal";
 
// Create connection
$conn = mysqli_connect($servername, $username, $pwd, $database);
$result = $conn->query($sql);
if($result == 1){
    $_SESSION['cart_msg'] = "Item has been added to cart.";

}else{
    $_SESSION['cart_msg'] = "Error occured while adding the item.";
}

header("Location: " . $url);
exit();

?>
