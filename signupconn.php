<?php
        $user = $_POST['username'];
        $password = $_POST['password'];
        $birthdate = $_POST['birthdate'];
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
          
          $sql = "INSERT INTO user_details (username, password, birthdate, email, phone) " . 
                  "VALUES ('" . $user . "','" . $password . "','" . $birthdate . "','" . $email . "','" . $phone . "')";
          #echo $sql . "<br>";
          
          if ($conn->query($sql) == 1) {
            header('Location: sign_up_sucess.html');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            } 
            $conn->close(); 
        ?>