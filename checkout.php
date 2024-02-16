<?php   
include '_connectdb.php' ; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index_style.css">
</head>

<body>
    <!-- HEADER STARTS HERE  -->
    <header class="container">
        <div class="container_content">
            <div class="logo">
                DK&Co.
            </div>
            <div>
                <nav class="nav_list">
                    <a href="index.php"  style = "color:white;">HOME</a>
                    <a href="" style = "color:white;">FAQs</a>
                </nav>
            </div>

            <div class="list_bnt">
            <?php
                if(!isset($_SESSION['username'])){
                    echo "<a href=''>Welcome Guest</a>";
                }else{
                    echo "<a href='#'>Welcome ".$_SESSION['username']."</a>";
                }

                if(!isset($_SESSION['username'])){
                    echo " <a class='loginbtn' href='user_login.php'>Login</a>";
                    echo " <a class='signupbtn' href='user_registration.php'>SignUp</a>";
                }else{
                    echo " <a class='loginbtn' href='user_logout.php'>Logout</a>";
                }

            ?>
            </div>

        </div>
    </header>
    <!-- HEADER ENDS HERE -->

    <main>
        <div class="main_content">
            <?php
            if(!isset($_SESSION['username'])){
                include('user_login.php');
            }else{
                include('payment.php');
            }
            ?>
        </div>
    </main>

    <!-- <div class="footer">
    <h1>FOOTER</h1>
</div> -->

    <?php   //include 'footer.php'   ?>


</body>

</html>