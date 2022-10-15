<html>
    <head>
        <link rel="stylesheet" href="./links.css">
        <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <title>Registration</title>
        <img src="./images/companylogo.png" alt="companylogo" class="companylogo"
         style="left: 0px;z-index: 9;">
        <img src="./images/space.png" alt="space" class="space" style="right: 0px;
        width: 1005;">
        <a href="./homepage.php" class="text" style="right: 725px;">Home</a>
        <a href="" class="text" style="right: 575px;">Products</a>
        <a href="./homepage.php#contact" class="text" style="right: 420px; ">Contact</a>
        <a href="./homepage.php#reviews" class="text" style="right: 290px;">Reviews</a>
        <div class="menu">
            <label for="toggle-responsive" class="toggle-menu text" style="right: 575px;"
            >Products</label>
            <input type="checkbox" id="toggle-responsive"/>
            <ul class="nav level-one">
              <li class="parent" style="font-family: Comfortaa;
              font-size: 25px;"><a href="#">Keyboards</a>
                <label for="toggle-level-2-01" class="toggle"></label>
                <input type="checkbox" id="toggle-level-2-01"/>
                <ul class="level-two">
                    <li style="font-family: Comfortaa;font-size: 22px;">
                        <a href="./hotswp.php">&emsp;Hotswappable</a></li>
                  <li style="font-family: Comfortaa;font-size: 22px;">
                    <a href="./mechkeyboards.php">&emsp;Mechanical</a></li>
                  <li style="font-family: Comfortaa;font-size: 22px;">
                    <a href="./wired.php">&emsp;Wired</a></li>
                  <li class="parent" style="font-family: Comfortaa;">
                    <a href="./wireless.php" style="font-size: 22px;">&emsp;Wireless</a>
                    <li class="parent" style="font-family: Comfortaa;">
                        <a href="./membrane.php" style="font-size: 22px;">&emsp;Membrane</a>
                      </li>
                  </li>
                </ul>
              </li>
              <li class="parent" style="font-family: Comfortaa;
              font-size: 25px;"><a href="#">Switches</a>
                <label for="toggle-level-2-02" class="toggle"></label>
                <input type="checkbox" id="toggle-level-2-02"/>
                <ul class="level-two">
                  <li style="font-family: Comfortaa;font-size: 22px;
                  "><a href="./clicky.php">&emsp;Clicky</a></li>
                  <li style="font-family: Comfortaa;font-size: 22px;
                  "><a href="./linear.php">&emsp;Linear</a></li>
                  <li class="parent" style="font-family: Comfortaa;">
                    <a href="./tactile.php" style="font-size: 22px;">&emsp;Tactile</a>
                      </li>
                  </li>
                </ul>
              </li>
              <li class="parent" style="font-family: Comfortaa;
              font-size: 25px;"><a href="./keycaps.php">Keycaps</a>
              </li>
            </ul>
          </div>
    </head>
<?php
$user = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
// Database Connection
$servername = "localhost";
$username = "crystal";
$pwd = "Crystal@123";
$database = "crystal";
// Create connection
$conn = mysqli_connect($servername, $username, $pwd, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  //echo "Connected successfully<br>";
  
  $sql = "INSERT INTO users (username, password, fullname, email, phone) " . 
          "VALUES ('" . $user . "','" . $password . "','" . $fullname . "','" . $email . "','" . $phone . "')";
  #echo $sql . "<br>";
  
  if ($conn->query($sql) == 1) {
?>
<body style="background-color: rgb(223, 224, 226);">
        <br><br><br>
        <div class="signupbox"><br>
        <center class="rform"><b>Registered!</b></center><br><br><br><br>
        <center><img src="./images/check.png" alt="check" style="height: 400px;"></center>
        <center class="question"><a href="signin.php">Log in</a> to your account</center>
        <br><br><br>       
        </div>
    </body>
<?php
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      } 
      $conn->close();        
?>
</html>