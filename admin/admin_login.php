<?php  
include '_connectdb.php';  
// session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
     <!-- Bootstrap css CDN -->
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center mb-5 mt-3 ">Admin Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="" alt="adminRegistration">
            </div>
            <div class="col-lg-6 ">
               <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Admin Name</label>
                    <input type="text" class="form-control w-50" name="admin_name" placeholder="Enter your name" required="required" id="">
                </div>
                <div class="form-outline mb-4">
                    <label for="adminpassword" class="form-label">Admin Password</label>
                    <input type="password" class="form-control w-50" name="admin_password" placeholder="Enter your password" required="required" id="">
                </div>
                <div class="form-outline mb-4">
                   <input type="submit" value="Admin Login" name="admin-login" class="p-3 border-0 bg-info text-light">
                   <p class="small fw-bold mt-2 pt-1">Don`t you have an account? <a href="admin_registration.php">Register</a></p>
                </div>
               </form>
            </div>
        </div>
        
    </div>
</body>
</html>


<?php
if(isset($_POST['admin-login'])){
    $user_name = $_POST['admin_name'];
    $user_password = $_POST['admin_password'];

    $select_query = "SELECT * FROM `admin_table` WHERE admin_name = '$user_name'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);


    if($row_count>0){
        $_SESSION['admin_name'] = $user_name;
        if(password_verify($user_password, $row_data['admin_password'])){
            echo "<script>alert('Admin login successful')</script>";
            echo "<script>window.open('admin_index.php','_self')</script>";
        }else{
            echo "<script>alert('Invalid password')</script>";
        }
    }else{
        echo "<script>alert('Invalid credentials')</script>";
    }
}


?>