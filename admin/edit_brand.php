<?php
if(isset($_GET['edit_brand'])){
    $edit_brand = $_GET['edit_brand'];
    

    $get_brands = "SELECT * FROM `brands` WHERE brand_id = $edit_brand";
    $result_brands = mysqli_query($conn, $get_brands);
    $row = mysqli_fetch_assoc($result_brands);
    $brands_title = $row['brand_title'];
}

if(isset($_POST['edit_Brand'])){
    $brand_title = $_POST['brand_title'];

    $update_query = "UPDATE `brands` set brand_title = '$brand_title' WHERE brand_id = $edit_brand";
    $update_brand = mysqli_query($conn, $update_query);
    if($update_brand){
        echo "<script>alert('Brand has been updated successfully')</script>";
        echo "<script>window.open('admin_index.php?view_brand','_self')</script>";
    }
}
?>

<h2 class="text-success">Edit Brand</h2>
<form action="" method="post" class="text-center mt-4 ">
    <div class="form-outlin mb-4">
        <label for="category_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" value="<?php  echo $brands_title ?>" class="form-control" required="required" id="">
    </div>
    <input type="submit" name="edit_Brand" value="Update Category" class="btn btn-info text-white px-3 mb-3">
</form>

