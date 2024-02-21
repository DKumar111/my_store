<?php  include '_connectdb.php';  
include './functions/common_function.php';
session_start();
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

<?php
if(isset($_POST['user_login'])){
    $user_name = $_POST['username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_name'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    // $ip = getIPAddress();

    //cart item
    // $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
    // $select_query = mysqli_query($conn, $select_query_cart);
    // $row_count_cart = mysqli_num_rows($select_query);

    if($row_count>0){
        $_SESSION['username'] = $user_name;
        if($row_count==1 && password_verify($user_password, $row_data['user_password'])){
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            // if($row_count==1 && $row_count_cart==0){
            //     $_SESSION['username'] = $user_name;
            //     echo "<script>alert('Login successful')</script>";
            //     echo "<script>window.open('index.php','_self')</script>";
            // }else{
            //     $_SESSION['username'] = $user_name;
            //     echo "<script>alert('Login successful')</script>";
            //     // echo "<script>window.open('payment.php','_self')</script>";
            // }
        }else{
            echo "<script>alert('Invalid password')</script>";
        }
    }else{
        echo "<script>alert('Invalid credentials')</script>";
    }
}


?>