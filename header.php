<header class=" container ">
    <div class="container_content">
        <div class="logo">
            <a style="color:white;" href="index.php">BS JAIN&Co.</a>
        </div>


        <div id="mysidenav" class="navbar ">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="index.php">HOME</a>
                <div class="dropdown">
                    <button class="dropbtn">PRODUCT CATEGORIES
                    </button>
                    <div class="dropdown-content">
                        <?php
                    get_categories();
                        ?>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">BRANDS
                    </button>
                    <div class="dropdown-content">
                        <?php
                        getbrands();
                        ?>
                    </div>
                </div>
                <?php
                if(isset($_SESSION['username'])){
                    echo " <a href='profile.php'>PROFILE</a>";
                }
                ?>

                <!-- <div class="cart"> -->
                <a href="cart.php">CART<sup><?php  cart_item();  ?></sup></a>
                <h5>Total cart price: <?php total_cart_price();  ?></h5>
                <!-- </div> -->
        </div>

        <div class="list_bnt">
            <form action="search_product.php" method="get">
                <input type="search" name="search-value" id="" class="search-input" placeholder="Search">
                <input type="submit" value="search" name="search-data" class="search-btn">
            </form>
            <?php
                if(!isset($_SESSION['username'])){
                    echo "";
                }else{
                    echo "<a href='profile.php'>Welcome ".$_SESSION['username']."</a>";
                }

                if(!isset($_SESSION['username'])){
                    echo " <a class='loginbtn' href='user_login.php'>Login</a>";
                    echo " <a class='signupbtn' href='user_registration.php'>SignUp</a>";
                }else{
                    echo " <a class='loginbtn' href='user_logout.php'>Logout</a>";
                }
            ?>

        </div>
        <span class="hamburger" style="font-size: 30px; cursor: pointer;" onclick="openNav()">&#9776;</span>
    </div>
</header>
