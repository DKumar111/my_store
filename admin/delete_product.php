<?php
if(isset($_GET['delete_product'])){
    $delete_id = $_GET['delete_product'];
    //delete query 

    $delete_query = "DELETE FROM `products` WHERE product_id = $delete_id";
    $result_query = mysqli_query($conn, $delete_query);
    if($result_query){
        echo "<script>alert('Product deleted successfully')</script>";
        echo "<script>window.open('admin_index.php?view_product','_self')</script>"; 
    }
}

?>