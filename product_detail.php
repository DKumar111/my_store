<?php   
include '_connectdb.php' ; 
include 'functions/common_function.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index_stl.css">
    <link rel="stylesheet" href="product_detail.css">
</head>

<body>
    <?php   include 'header.php'   ?>
    <div class='main-container'>
        <?php  view_details(); ?>
    </div>

    <div class="h-bar"></div>

    <div class="suggest-heading">
        <h3>Related Products</h3>
    </div>
    <div class="suggest-items">
        <?php 
        if(isset($_GET['product_id'])){
        if(isset($_GET['category_id'])){
            $get_product_id = $_GET['product_id'];
            $category_id = $_GET['category_id'];
            $select_query = "SELECT * FROM `products` WHERE  category_id = $category_id";
            $result_query = mysqli_query($conn, $select_query);
            $num_of_rows =mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo "<h2 class='zero_product'>No stock for this category</h2>";
            }
           while($row = mysqli_fetch_assoc($result_query)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_price = $row['product_price'];
                $product_desc = $row['product_desc'];
                $product_image1 = $row['product_img1'];
                $category_id= $row['category_id'];
                $brand_id = $row['brand_id'];
                if($get_product_id == $product_id) continue;
    
                echo "
                <div class='card'>
                    <a href='product_detail.php?product_id=$product_id&category_id=$category_id'>
                    <img src='./admin/product_images/$product_image1' alt=''>
                    </a>
                    <p>Product Name</p>
                </div>";
           }
        }
    }
        ?>
    </div>

    <?php   include 'footer.php'   ?>
</body>
<script>

    function openNav(){
        document.getElementById("mysidenav").style.width = "250px";
    }

    function closeNav(){
        document.getElementById("mysidenav").style.width = "0";
    }

 
</script>
</html>