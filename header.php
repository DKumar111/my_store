<header class="container">
    <div class="container_content">
        <div class="logo">
            BS JAIN&Co.
        </div>
        <div>
            <div class="navbar">
                <a href="#home">HOME</a>
                <div class="dropdown">
                    <button class="dropbtn">PRODUCT CATEGORIES
                    </button>
                    <div class="dropdown-content">
                    <?php
                          $select_category = "SELECT * FROM `categories`";
                          $result_category = mysqli_query($conn, $select_category);
                          // $row = mysqli_fetch_assoc($result_brand);
                          // echo $row['brand_title'];
                          while( $row = mysqli_fetch_assoc($result_category)){
                              $category_title = $row['category_title'];
                              $category_id= $row['category_id'];
                              echo "<a href='index.php?category=$category_id'>$category_title</a>";
                          }  
                        
                        ?>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">BRANDS
                    </button>
                    <div class="dropdown-content">
                        <?php
                            $select_brand = "SELECT * FROM `brands`";
                            $result_brand = mysqli_query($conn, $select_brand);
                            // $row = mysqli_fetch_assoc($result_brand);
                            // echo $row['brand_title'];
                            while( $row = mysqli_fetch_assoc($result_brand)){
                                $brand_titie = $row['brand_title'];
                                $brand_id = $row['brand_id'];
                                echo "<a href='index.php?brand=$brand_titie'>$brand_titie</a>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="list_bnt">
            <a class="loginbtn" href="">Login</a>
            <a class="signupbtn" href="">SignUp</a>
        </div>

    </div>
</header>