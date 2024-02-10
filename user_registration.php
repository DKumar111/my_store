<?php   
include '_connectdb.php' ; 
include 'functions/common_function.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <div class="register">
        <h1>Register</h1>
        <div class="form">
            <form action="" method="post">
                <label for="username">Username: </label>
                <input type="text" name="username" id="u_name" placeholder="Enter your name" autocomplete="off"
                    requitred="required" /><br /><br />

                <label for="username">Email: </label>
                <input type="text" name="user_email" id="u_name" placeholder="Enter your email" autocomplete="off"
                    requitred="required" /><br /><br />

                <label for="username">Password: </label>
                <input type="text" name="user_password" id="u_name" placeholder="Enter your password" autocomplete="off"
                    requitred="required" /><br /><br />

                <label for="username">Confirm Password: </label>
                <input type="text" name="confirm_user_password" id="u_name" placeholder="Confirm password"
                    autocomplete="off" requitred="required" /><br /><br />

                <label for="username">Address: </label>
                <input type="text" name="user_address" id="u_name" placeholder="Enter your address" autocomplete="off"
                    requitred="required" /><br /><br />

                <label for="username">Mobile: </label>
                <input type="text" name="user_mobile" id="u_name" placeholder="Enter your mobile number"
                    autocomplete="off" requitred="required" /><br /><br />

                <input type="submit" value="Register" name="user_register">

                <p>Already have an account? <a href="user_login.php">Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>

<!-- php code  -->

<?php

if(isset($_POST['user_register'])){
    $user_name = $_POST['username'];
    $user_Email = $_POST['user_email'];
    $user_Password = $_POST['user_password'];
    $hash_password = password_hash($user_Password, PASSWORD_DEFAULT);
    $user_confirm_password = $_POST['confirm_user_password'];
    $user_Address = $_POST['user_address'];
    $user_Mobile = $_POST['user_mobile'];
    $ip = getIPAddress();


    //check for existing user in user table
    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_name' OR user_email = '$user_Email'";
    $result = mysqli_query($conn, $select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('User or email already exist')</script>";
    }elseif ($user_Password != $user_confirm_password) {
        echo "<script>alert('Password do not matched')</script>";
    }
    else{
                    //insert query
            $insert_query = "INSERT INTO `user_table`(`username`, `user_email`, `user_password`, `user_addr`, `user_mobile`, `user_ip_addr`) 
            VALUES ('$user_name','$user_Email','$hash_password','$user_Address','$user_Mobile','$ip')";

            $sql_execute = mysqli_query($conn, $insert_query);
            if($sql_execute){
                echo "<script>alert('Data inserted successfully')</script>";
            }else{
                die("Connection failed: " . mysqli_connect_error());
            }
        }
}

?>