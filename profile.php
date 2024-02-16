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
    <title>Welcome <?php  echo $_SESSION['username']   ?></title>
    <!-- <link rel="stylesheet" href="index_style.css"> -->

     <!-- Bootstrap css CDN -->
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <!-- HEADER STARTS HERE  -->
    
<header class=" w-100 p-0 bg-primary">
    <div class="d-flex justify-content-between align-items-center px-4 ">
        <div class="logo text-white  text-decoration-none">
            DK&Co.
        </div>
        <div class="d-flex justify-content-center align-items-center text-white">
                <a class="text-white p-2 text-decoration-none " href="index.php">HOME</a>
                <a class="text-white p-2 text-decoration-none"  href="profile.php">MY ACCOUNT</a>
                <a class="text-white p-2 mx-2 text-decoration-none" href="cart.php">CART<sup><?php  cart_item();  ?></sup></a>
                <span>Total cart price: <?php total_cart_price();  ?></span>
        </div>

        <div class="list_bnt">
            <form action="search_product.php" method= "get">
                <input type="search" name="search-value" id="" class="search-input" placeholder="Search">
                <input type="submit" value="search" name="search-data" class="search-btn">
            </form>
            <?php
                if(!isset($_SESSION['username'])){
                    echo "<a class='text-white p-2 text-decoration-none ' href=''>Welcome Guest</a>";
                }else{
                    echo "<a class='text-white p-2 text-decoration-none ' href='profile.php'>Welcome ".$_SESSION['username']."</a>";
                }

                if(!isset($_SESSION['username'])){
                    echo " <a class='text-white p-2 text-decoration-none ' class='loginbtn' href='user_login.php'>Login</a>";
                    echo " <a class='text-white p-2 text-decoration-none ' class='signupbtn' href='user_registration.php'>SignUp</a>";
                }else{
                    echo " <a class='text-white p-2 text-decoration-none ' class='loginbtn' href='user_logout.php'>Logout</a>";
                }

            ?>
            
        </div>

    </div>
</header>
    <!-- HEADER ENDS HERE -->
<!-- calling cart function -->
<?php
cart();
?>
    <main class="">
       <div class="row">
        <div class="col-md-2 p-0">
            <ul class="navbar-nav bg-secondary text-center ">
                <li class="nav-item "><a class="nav-link text-light " href="#"><h4 >Your Profile</h4 ></a></li>
                <?php
                    $username = $_SESSION['username'];
                    $user_name = "SELECT * FROM `user_table` WHERE username = '$username'";
                    $result_uname = mysqli_query($conn, $user_name);
                    $row_name = mysqli_fetch_array($result_uname);
                    $user_email = $row_name['user_email'];
                    echo "<li class='nav-item '><a class='nav-link text-light ' href='#'>$user_email</a></li>";



                ?>
                <li class="nav-item "><a class="nav-link text-light " href="profile.php?pendingOrder">Pending Order</a></li>
                <li class="nav-item "><a class="nav-link text-light " href="profile.php?edit_account">Edit account</a></li>
                <li class="nav-item "><a class="nav-link text-light " href="profile.php?my_order">My order</a></li>
                <li class="nav-item "><a class="nav-link text-light " href="profile.php?delete_account">Delete account</a></li>
                <li class="nav-item "><a class="nav-link text-light " href="user_logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="col-md-10 text-center ">
            <?php  get_user_order_details();
            if(isset($_GET['edit_account'])){
                include 'edit_account.php';
            }
            if(isset($_GET['my_order'])){
                include 'user_orders.php';
            }
            if(isset($_GET['delete_account'])){
                include 'delete_account.php';
            }
            ?>
        </div>
       </div>
    </main>

    <!-- <div class="footer">
    <h1>FOOTER</h1>
</div> -->

    <?php   include 'footer.php'   ?>


</body>

</html>