<?php
if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_session_name'";
    $result_query = mysqli_query($conn, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_addr = $row_fetch['user_addr'];
    $user_mobile = $row_fetch['user_mobile'];
}

    if(isset($_POST['user_submit'])){
        $update_id = $user_id;
        $update_name= $_POST['user_name'];
        $update_email= $_POST['user_email'];
        $update_addr= $_POST['user_address'];
        $update_mob= $_POST['user_mobile'];

        $update = "UPDATE `user_table` set username = '$update_name', user_email = '$update_email', 
        user_addr = '$update_addr', user_mobile = '$update_mob' WHERE user_id = $update_id";
        $result_query_update = mysqli_query($conn, $update);
        if($result_query_update){
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
    <!-- Bootstrap css CDN -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center text-success mt-3">Edit account</h1>
    <form action="" method="post">
        <div class="form-outline mb-4 ">
            <input type="text" name="user_name" value="<?php  echo $user_name ?>" class="form-control w-50 m-auto "
                id="">
        </div>
        <div class="form-outline mb-4 ">
            <input type="email" name="user_email" value="<?php  echo $user_email ?>" class="form-control w-50 m-auto "
                id="">
        </div>
        <div class="form-outline mb-4 ">
            <input type="text" name="user_address" value="<?php  echo $user_addr ?>" class="form-control w-50 m-auto "
                id="">
        </div>
        <div class="form-outline mb-4 ">
            <input type="text" name="user_mobile" value="<?php  echo $user_mobile ?>" class="form-control w-50 m-auto "
                id="">
        </div>
        <input type="submit" value="update" name="user_submit" class="bg-info border-0 " id="">
    </form>
</body>

</html>