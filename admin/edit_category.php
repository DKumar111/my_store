<?php
if(isset($_GET['edit_category'])){
    $edit_cat = $_GET['edit_category'];
    

    $get_category = "SELECT * FROM `categories` WHERE category_id = $edit_cat";
    $result_category = mysqli_query($conn, $get_category);
    $row = mysqli_fetch_assoc($result_category);
    $category_title = $row['category_title'];
}

if(isset($_POST['edit_category'])){
    $cat_title = $_POST['cat_title'];

    $update_query = "UPDATE `categories` set category_title = '$cat_title' WHERE category_id = $edit_cat";
    $update_category = mysqli_query($conn, $update_query);
    if($update_category){
        echo "<script>alert('Cateogory has been updated successfully')</script>";
        echo "<script>window.open('admin_index.php?view_category','_self')</script>";
    }
}
?>

<h2 class="text-success">Edit Category</h2>
<form action="" method="post" class="text-center mt-4 ">
    <div class="form-outlin mb-4">
        <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="cat_title" value="<?php  echo $category_title ?>" class="form-control" required="required" id="">
    </div>
    <input type="submit" name="edit_category" value="Update Category" class="btn btn-info text-white px-3 mb-3">
</form>

