<h3 class="text-danger mt-2">Delet Account</h3>
<form action="" method="post" class="mt-3">
    <div class="form-outline mb-4">
        <input type="submit" value="Delete Account" class="form-control w-25 m-auto" name="Delete">
    </div>
    <div class="form-outline mb-4 ">
        <input type="submit" value="Don`t Delete Account" class="form-control w-25 m-auto" name="Dont_Delete">
    </div>
</form>

<?php
$username_session = $_SESSION['username'];
if(isset($_POST['Delete'])){
    $delete_query = "DELETE FROM `user_table` WHERE username = '$username_session'";
    $result = mysqli_query($conn, $delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

if(isset($_POST['Dont_Delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
}

?>