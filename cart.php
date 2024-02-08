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
                <div class="navbar">
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
                    <div class="cart">
                        <a href="cart.php">CART<sup><?php  cart_item();  ?></sup></a>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <!-- HEADER ENDS HERE -->
    <?php
cart();
?>
    <main>
        <div class="main_content">
            <form action="" method="post">
                <table>
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php code to display dynamic data -->
                        <?php
                          global $conn;
                          $ip = getIPAddress();
                          $total = 0;
                          $cart_query = "SELECT * FROM `cart_details` WHERE ip_address ='$ip'";
                          $result = mysqli_query($conn, $cart_query);
                          while($row=mysqli_fetch_array($result)){
                              $product_id = $row['product_id'];
                              $select_product = "SELECT * FROM `products` WHERE product_id = '$product_id'";
                              $result_product = mysqli_query($conn, $select_product);
                              while($row_product_price=mysqli_fetch_array($result_product)){
                                  $product_price = array($row_product_price['product_price']);
                                  $price_table = $row_product_price['product_price'];
                                  $product_title = $row_product_price['product_title'];
                                  $product_image = $row_product_price['product_img1'];
                                  $product_value = array_sum($product_price);
                                  $total+= $product_value;
                    ?>
                        <tr>
                            <td><?php  echo $product_title; ?></td>
                            <td><img width="150px" height="120px"
                                    src="./admin/product_images/<?php  echo $product_image; ?>" alt=""></td>
                            <td><input type="text" name="qty"></td>
                            <?php
                                $ip = getIPAddress();
                                if(isset($_POST['update_cart'])){
                                    $quantity = $_POST['qty'];
                                    $update_cart = "UPDATE `cart_details` SET quantity = $quantity WHERE ip_address = '$ip'";
                                    $result_product_qty = mysqli_query($conn, $update_cart);
                                    $total = $total*$quantity;
                                }
                            ?>
                            <td><?php  echo $price_table; ?>/-</td>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>
                                <!-- <button>Update</button> -->
                                <input type="submit" value="Update Cart" name="update_cart">
                                <button>Remove</button>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>

                <!-- Subtotal -->
                <div>
                    <h4>Subtotal: <strong><?php  echo $total; ?></strong></h4>
                    <button><a href="index.php">Go Home</a></button>
                    <a href="#"><button>Checkout</button></a>
                </div>
            </form>
        </div>

    </main>



    <?php   include 'footer.php'   ?>


</body>

</html>