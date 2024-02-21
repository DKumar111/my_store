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
    <link rel="stylesheet" href="index_stle.css">
     
</head>

<body>
    <!-- HEADER STARTS HERE  -->
    <?php   include 'header.php'   ?>
    <!-- HEADER ENDS HERE -->
    <!-- Banner starts here -->
    <div class="banner">
        
            <!-- <img class="banner-img" src="img/banner.jpg" alt=""> -->
       
    </div>
    <!-- Banner ends here -->
<!-- calling cart function -->
<?php
cart();
?>
    <main>
        <!-- <div class="main_content">
        <div class="card">
            <div class="card_img_section">
                <img class="card_img" src="img/liquid_concentrate.png" alt="card image">
            </div>
            <div class="card_desc">
                <h3>NAME</h3>
                <p>description</p>
            </div>
        </div>
    </div> -->
        <?php   include 'main.php'   ?>
    </main>

    <!-- <div class="footer">
    <h1>FOOTER</h1>
</div> -->

    <?php   include 'footer.php'   ?>


</body>

</html>