<?php
$username = $_POST["username"];
$password = $_POST["password"];
//Database Connection
$servername = "localhost";
$username1 = "crystal";
$pwd1 = "Crystal@123";
$database = "crystal";
// Create connection
$conn = mysqli_connect($servername, $username1, $pwd1, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT username, password FROM user_details where username = '" . $username . "' " .
        "and password = '" . $password . "'";
  $result = $conn->query($sql);
  //echo $sql;
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $usr =  $row["username"];
      $pwd =  $row["password"];
      echo "usr=" . $usr . "=" . $username . "<br>";
      echo "password=" . $pwd . "=" . $password;
      if($usr == $username && $pwd == $password){
        session_start();
        $_SESSION['id'] = session_id();
        $_SESSION['username'] = $username;
        echo $_SESSION['username'];
        header("Location: homepage.php");
        exit();

        echo "session_id : " . session_id() . "<BR>";
        echo "$_SESSION_ID" . $_SESSION['id'];


     }else{
      $_GET["err_msg"] = "Invalid Username or Password";
      header("Location: loginerror.html");
      exit();
    }             
     }
}else{
     $_GET["err_msg"] = "Invalid Username or Password";
     header("Location: loginerror.html");
     exit();

}            
 
$conn->close();
?>