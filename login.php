<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Lexend Deca' rel='stylesheet'>
        <script language="javascript">
            function register(){
                document.login.submit();
            }
        </script>
    </head>
    <body>
        <img src="images/logo.png" alt="logo" class="logo">
        <br><br><br><br><br><br>
        <h1 class="login-title">Login</h1>
        <form action="loginconn.php" name="login" method="post">
        <input type="text" class="input" placeholder="&nbsp;Username" maxlength="15"
        name="username">
        <input type="password" class="input" placeholder="&nbsp;Password" maxlength="15"
        style="top: 520px;" name="password">
    </form>
        <input type="button" class="login-button" value="Login"
        onclick="register()">
        <p class="option">Don't have an account? <a href="signup.php">Sign up!</a> it's free</p>
    </body>
</html>