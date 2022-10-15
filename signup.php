<html style="overflow-y: hidden;overflow-x: hidden;">
    <head>
        <title>Sign up</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Lexend Deca' rel='stylesheet'>
        <script language="javascript">
            function register(){
                document.signup.submit();
            }
        </script>
    </head>
    <body>
        <img src="images/logo.png" alt="logo" class="logo">
        <h1 class="login-title" style="top: 50px;right: 280px;">Sign up</h1>
        <form action="signupconn.php" method="post" name="signup">
        <input type="text" class="input" placeholder="&nbsp;Username" maxlength="15"
        style="top: 210px;" name="username">
        <input type="password" class="input" placeholder="&nbsp;Password" maxlength="15"
        style="top: 290px;"  name="password">
        <p style="top: 350px;color: black; position: relative;
        left: 890px;font-family: Lexend deca;font-size: 25px;"
        name="birthdate">Birthdate:</p>
        <input type="date" class="input" style="top: 390px;" name="birthdate">
        <input type="text" class="input" placeholder="&nbsp;Phone Number" maxlength="15"
        style="top: 480px;" name="phone">
        <input type="text" class="input" placeholder="&nbsp;Email"
        style="top: 570px;" name="email">
        <input type="button" class="login-button" value="Sign up"
        onclick="register()" style="top: 660px;">
        </form>
        <p class="option" style="right: 290px;"
        >Have an account? <a href="login.php">Login!</a></p>
    </body>
</html>