<?php  include '_connectdb.php';  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>


    <div class="container">
        <nav>
            <a href="admin_index.php?insert_product">INSERT PRODUCT</a>
            <a href="">VIEW PRODUCT</a>
            <a href="admin_index.php?insert_category">INSERT CATEGORY</a>
            <a href="">VIEW CATEGORY</a>
            <a href="admin_index.php?insert_brand">INSERT BRAND</a>
            <a href="">VIEW BRAND</a>
            <a href="">ALL ORDER</a>
            <a href="">ALL PAYMENT</a>
            <a href="">ALL USER</a>
            <a href="">LOGOUT</a>
        </nav>
    </div>

    <div class="form_area">
        <div class="form_content">
        <?php
        if(isset($_GET['insert_product'])){
            include 'insert_product.php';
        }

        if(isset($_GET['insert_category']))
        {
            include 'insert_category.php';
        }

        if(isset($_GET['insert_brand']))
        {
            include 'insert_brand.php';
        }
       
        ?>
        </div>
    </div>
</body>
</html>