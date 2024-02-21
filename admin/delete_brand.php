<?php
if(isset($_GET['delete_brand'])){
    $delete_brand = $_GET['delete_brand'];
    
    $delete_brand_query = "DELETE FROM `brands` WHERE brand_id = $delete_brand";
    $result_brand_delete = mysqli_query($conn, $delete_brand_query);
    if($result_brand_delete){
        echo "<script>alert('Brand has been deleted successfully')</script>";
        echo "<script>window.open('admin_index.php?view_brand','_self')</script>";
    }
}

?>