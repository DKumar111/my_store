<?php
include '_connectdb.php';

if(isset($_POST['submit'])){
    $name = $_POST['brand_name'];

    //select data from database check for duplicate data

    $select_query = "SELECT * FROM `brands` WHERE brand_title = '$name'";
    $select_result = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($select_result);
    if($number>0){
        echo "<script>alert('This category is already present in database')</script>";
    }else{
        $sql = "INSERT INTO `brands` (`brand_title`) VALUES ('$name')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Data inserted successfully')</script>";
    }
    }


    
}
// echo "$image_name, $image_tmp";
?>

<form action="" method="post">
<h1>Insert Brand</h1><br>
    <div class="">
        <label for="brand_name">Brand Name:</label>
        <input type="text" name="brand_name" id="">
        <input type="submit" value="submit brand" name="submit">
    </div>
</form>