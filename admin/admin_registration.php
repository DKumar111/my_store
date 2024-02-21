<?php
include '_connectdb.php' ; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registraion</title>
     <!-- Bootstrap css CDN -->
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center mb-5 mt-3 ">Admin Registration</h2>
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
                    <label for="adminemail" class="form-label">Admin Email</label>
                    <input type="email" class="form-control w-50" name="admin_email" placeholder="Enter your email" required="required" id="">
                </div>
                <div class="form-outline mb-4">
                    <label for="adminpassword" class="form-label">Admin Password</label>
                    <input type="password" class="form-control w-50" name="admin_password" placeholder="Enter your password" required="required" id="">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirmpassword" class="form-label">Admin Confirm Password</label>
                    <input type="password" class="form-control w-50" name="confirm_password" placeholder="Enter confirm password" required="required" id="">
                </div>
                <div class="form-outline mb-4">
                   <input type="submit" value="Admin Register" name="admin-registration" class="p-3 border-0 bg-info text-light">
                   <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="admin_login.php">Login</a></p>
                </div>
               </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['admin-registration'])){
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];


    //check for existing user in admin table
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name' OR admin_email = '$admin_email'";
    $result = mysqli_query($conn, $select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Admin User or email already exist')</script>";
    }elseif ($admin_password != $confirm_password) {
        echo "<script>alert('Password do not matched')</script>";
    }
    else{
                    //insert query
            $insert_query = "INSERT INTO `admin_table`(`admin_name`, `admin_email`, `admin_password`) 
            VALUES ('$admin_name','$admin_email','$hash_password')";

            $sql_execute = mysqli_query($conn, $insert_query);
            if($sql_execute){
                echo "<script>alert('Admin registration successfully')</script>";
                echo "<script>window.open('admin_login.php', '_self')</script>";
            }else{
                die("Connection failed: " . mysqli_connect_error());
            }
        }
}
    ?>