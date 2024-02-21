<?php
if(isset($_GET['delete_category'])){
    $delete_category = $_GET['delete_category'];
    
    $delete_cat_query = "DELETE FROM `categories` WHERE category_id = $delete_category";
    $result_delete = mysqli_query($conn, $delete_cat_query);
    if($result_delete){
        echo "<script>alert('Cateogory has been deleted successfully')</script>";
        echo "<script>window.open('admin_index.php?view_category','_self')</script>";
    }
}

?>