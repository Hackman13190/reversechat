<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>reversechat</title>
</head>
<body>
    <div class="box">
        <div class="form">
            <h2>Sign in</h2>
            <div class="inputBox">
                <input type="text" required="required">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" required="required">
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">Forget Password</a>
                <a href="register.php">Sign up</a>
            </div>
            <div class="remember">
                <input type="checkbox" id="remember-me" name="remember-me">
                <span>Remember me</span>
            </div>
            <input type="submit" value="Login" class="login-btn">
        </div>
    </div>
</body>
</html>