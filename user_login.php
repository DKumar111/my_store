<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <div class="register">
        <h1>Login</h1>
        <div class="form">
            <form action="" method="post" >
                <label for="username">Username: </label>
                <input type="text" name="username" id="u_name" placeholder= "Enter your name" autocomplete="off" requitred="required"/><br/><br/>

                <label for="username">Password: </label>
                <input type="text" name="user_password" id="u_name" placeholder= "Enter your password" autocomplete="off" requitred="required"/><br/><br/>

                <input type="submit" value="Login" name="user_login">

                <p>Don't have an account? <a href="user_registration.php">Register</a></p>
            </form>
        </div>
    </div>
</body>
</html>