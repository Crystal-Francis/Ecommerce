<?php
session_start();
$usr = $_SESSION['username'];
$star = $_POST['rate'];
$comment = $_POST['comment'];


//Database Connection
$servername = "localhost";
$username = "crystal";
$password = "Crystal@123";
$database = "crystal";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully<br>";

$sql = "INSERT INTO review (username, rating, comment, date, stars) " . 
        "VALUES ('" . $usr . "','" . $star . "','" . $comment . "', now(), char_length('" . $star . "'))";
        if ($conn->query($sql) == 1) {
        header ('Location: addreviewsuccess.php');
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();        
        ?>