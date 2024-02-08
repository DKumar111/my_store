
<header class="container">
    <div class="container_content">
        <div class="logo">
            DK&Co.
        </div>
        <div>
            <div class="navbar">
                <a href="index.php">HOME</a>
                <div class="dropdown">
                    <button class="dropbtn">PRODUCT CATEGORIES
                    </button>
                    <div class="dropdown-content">
                    <?php
                    get_categories();
                        //   $select_category = "SELECT * FROM `categories`";
                        //   $result_category = mysqli_query($conn, $select_category);
                        //   // $row = mysqli_fetch_assoc($result_brand);
                        //   // echo $row['brand_title'];
                        //   while( $row = mysqli_fetch_assoc($result_category)){
                        //       $category_title = $row['category_title'];
                        //       $category_id= $row['category_id'];
                        //       echo "<a href='index.php?category=$category_id'>$category_title</a>";
                        //   }  
                        
                        ?>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">BRANDS
                    </button>
                    <div class="dropdown-content">
                        <?php
                        getbrands();
                            // $select_brand = "SELECT * FROM `brands`";
                            // $result_brand = mysqli_query($conn, $select_brand);
                            // // $row = mysqli_fetch_assoc($result_brand);
                            // // echo $row['brand_title'];
                            // while( $row = mysqli_fetch_assoc($result_brand)){
                            //     $brand_titie = $row['brand_title'];
                            //     $brand_id = $row['brand_id'];
                            //     echo "<a href='index.php?brand=$brand_titie'>$brand_titie</a>";
                            // }
                        ?>
                    </div>
                </div>
                <div class="cart">
                    <a href="cart.php">CART<sup><?php  cart_item();  ?></sup></a>
                    <h5>Total cart price: <?php total_cart_price();  ?></h5>
                </div>
            </div>
        </div>

        <div class="list_bnt">
            <form action="search_product.php" method= "get">
                <input type="search" name="search-value" id="" class="search-input" placeholder="Search">
                <input type="submit" value="search" name="search-data" class="search-btn">
            </form>
            <a class="loginbtn" href="">Login</a>
            <a class="signupbtn" href="">SignUp</a>
        </div>

    </div>
</header>