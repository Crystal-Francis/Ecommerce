<?php
session_start();
$id = $_POST['id'];
$usr = $_SESSION['username']; 

if($usr == ''){
    header("Location: signin.php");
    exit();
}


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$sql = "DELETE FROM shopping_cart WHERE CART_ID=" . $id ." AND USERNAME= '" . $usr . "'";

 

//Database Connection
$servername = "localhost";
$username = "crystal";
$pwd = "Crystal@123";
$database = "crystal";
 
// Create connection
$conn = mysqli_connect($servername, $username, $pwd, $database);
$conn->query($sql);
 

header("Location: cart.php");
exit();

?>
