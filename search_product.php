<?php   
include '_connectdb.php' ; 
include 'functions/common_function.php';
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
    <!-- HEADER STARTS HERE  -->
    <?php   //include 'header.php'   ?>
    <header class ="container" >
    <div class="container_content">
        <div class="logo">
            DK&Co.
        </div>
        <div>
            <nav class="nav_list">
                    <a href="index.php">HOME</a>
                    <a href="">PRODUCT CATEGORIES</a>
                    <a href="">BRANDS</a>
            </nav>
        </div>
        
            <div class="list_bnt">
                <form action="" method="get">
                <input type="search" name="search-value" id="" class="search-input" placeholder="Search">
                <input type="submit" value="search" name="search-data" class="search-btn">
            </form>
                <a class="loginbtn" href="user_login.php">Login</a>
                <a class="signupbtn" href="">SignUp</a>
            </div>
        
    </div>
</header>
    <!-- HEADER ENDS HERE -->

    <main>
        <div class="main_content">
       <?php search_product(); ?>
        <!-- <div class="card">
            <div class="card_img_section">
                <img class="card_img" src="img/liquid_concentrate.png" alt="card image">
            </div>
            <div class="card_desc">
                <h3>NAME</h3>
                <p>description</p>
            </div>
        </div> -->
    </div>
        <?php  // include 'main.php'   ?>
    </main>

    <!-- <div class="footer">
    <h1>FOOTER</h1>
</div> -->

    <?php   include 'footer.php'   ?>


</body>

</html>