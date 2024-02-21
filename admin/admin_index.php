<?php  
include '_connectdb.php';  
include '../functions/common_function.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin_style.css">

     <!-- Bootstrap css CDN -->
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>


    <div class="container">
        <nav>
            <?php
                if(!isset($_SESSION['admin_name'])){
                    echo "<a href=''>Welcome Guest</a>";
                }else{
                    echo "<a href=''>Welcome ".$_SESSION['admin_name']."</a>";
                }

                if(!isset($_SESSION['admin_name'])){
                    echo " <a class='loginbtn' href='admin_index.php?admin_login'>ADMIN LOGIN</a>";
                    echo " <a class='signupbtn' href='admin_index.php?admin_registration'>ADMIN REGISTRATION</a>";
                }else{
                    echo " <a class='loginbtn' href='admin_logout.php'>LOGOUT</a>";
                    echo "
                    <a href='admin_index.php?insert_product'>INSERT PRODUCT</a>
                    <a href='admin_index.php?view_product'>VIEW PRODUCT</a>
                    <a href='admin_index.php?insert_category'>INSERT CATEGORY</a>
                    <a href='admin_index.php?view_category'>VIEW CATEGORY</a>
                    <a href='admin_index.php?insert_brand'>INSERT BRAND</a>
                    <a href='admin_index.php?view_brand'>VIEW BRAND</a>
                    <a href='admin_index.php?list_orders'>ALL ORDER</a>
                    <a href='admin_index.php?list_payment'>ALL PAYMENT</a>
                    <a href='admin_index.php?all_users'>ALL USER</a>
                    ";
                }

            ?>
            <!-- <a href="">LOGOUT</a>
            <a href="admin_index.php?admin_login">ADMIN LOGIN</a>
            <a href="admin_index.php?admin_registration">ADMIN REGISTRATION</a> -->
        </nav>
    </div>

    <div class="form_area ">
        <div class="form_content d-flex justify-content-center align-items-center  flex-column ">
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
        if(isset($_GET['view_product']))
        {
            include 'view_products.php';
        }
        if(isset($_GET['edit_products']))
        {
            include 'edit_product.php';
        }
        if(isset($_GET['delete_product']))
        {
            include 'delete_product.php';
        }
        if(isset($_GET['view_category']))
        {
            include 'view_category.php';
        }
        if(isset($_GET['view_brand']))
        {
            include 'view_brand.php';
        }
        if(isset($_GET['edit_category']))
        {
            include 'edit_category.php';
        }
        if(isset($_GET['edit_brand']))
        {
            include 'edit_brand.php';
        }
        if(isset($_GET['delete_category']))
        {
            include 'delete_category.php';
        }
        if(isset($_GET['delete_brand']))
        {
            include 'delete_brand.php';
        }
        if(isset($_GET['list_orders']))
        {
            include 'list_orders.php';
        }
        if(isset($_GET['list_payment']))
        {
            include 'list_payment.php';
        }
        if(isset($_GET['all_users']))
        {
            include 'all_users.php';
        }
        if(isset($_GET['admin_login']))
        {
            include 'admin_login.php';
        }
        if(isset($_GET['admin_registration']))
        {
            include 'admin_registration.php';
        }
       
        ?>
        </div>
    </div>
</body>
</html>