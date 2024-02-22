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

</head>

<body>
    <?php   include 'header.php'   ?>
    <div class="banner">
        <!-- <img class="banner-img" src="img/banner.jpg" alt=""> -->
    </div>
    <?php
cart();
     ?>
    <main>
        <div class="main_content">
            <?php    
            get_products();
            get_category_products();
            get_brand_products();   ?>
        </div>
    </main>

    <?php   include 'footer.php'   ?>


</body>

</html>