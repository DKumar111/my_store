<?php

// including connect file
include './_connectdb.php';

//getting product
function get_products(){
    global $conn;
    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query = "SELECT * FROM `products` ";
    $result_query = mysqli_query($conn, $select_query);
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_price = $row['product_price'];
        $product_desc = $row['product_desc'];
        $product_image1 = $row['product_img1'];
        $category_id= $row['category_id'];
        $brand_id = $row['brand_id'];

        echo "
        <div class='card'>
        <a href='product_detail.php?product_id=$product_id&category_id=$category_id'>
        <div class='card_img_section'>
            <img class='card_img' src='./admin/product_images/$product_image1' alt='$product_title'>
        </div>
        </a>
        <div class='card_desc'>
            <h3>$product_title</h3>
            <h4>Rs. $product_price/-</h4>
            
        </div>
    </div>
        ";
    }
}
}
}

// getting categories specific products
function get_category_products(){
    global $conn;
    //condition to check isset or not
    if(isset($_GET['category'])){
        $category_id = $_GET['category'];
    $select_query = "SELECT * FROM `products` WHERE  category_id = $category_id";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows =mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='zero_product'>No stock for this category</h2>";
    }
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_price = $row['product_price'];
        $product_desc = $row['product_desc'];
        $product_image1 = $row['product_img1'];
        $category_id= $row['category_id'];
        $brand_id = $row['brand_id'];

        echo "
        <div class='card'>
        <a href='product_detail.php?product_id=$product_id'>
        <div class='card_img_section'>
            <img class='card_img' src='./admin/product_images/$product_image1' alt='$product_title'>
        </div>
        </a>
        <div class='card_desc'>
            <h3>$product_title</h3>
            <h4>Rs. $product_price</h4>
            <a href='index.php?add_to_cart=$product_id'>Add to cart</a>
        </div>
    </div>
        ";
    }
}
}


// getting categories specific products
function get_brand_products(){
    global $conn;
    //condition to check isset or not
    if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
    $select_query = "SELECT * FROM `products` WHERE  brand_id = $brand_id";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows =mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='zero_product'>This brands of products is not available</h2>";
    }
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_price = $row['product_price'];
        $product_desc = $row['product_desc'];
        $product_image1 = $row['product_img1'];
        $category_id= $row['category_id'];
        $brand_id = $row['brand_id'];

        echo "
        <div class='card'>
        <a href='product_detail.php?product_id=$product_id'>
        <div class='card_img_section'>
            <img class='card_img' src='./admin/product_images/$product_image1' alt='$product_title'>
        </div>
        </a>
        <div class='card_desc'>
            <h3>$product_title</h3>
            <h4>Rs. $product_price</h4>
            <a href='index.php?add_to_cart=$product_id'>Add to cart</a>
        </div>
    </div>
        ";
    }
}
}

//getting brands
function getbrands(){
    global $conn;
    $select_brand = "SELECT * FROM `brands`";
                            $result_brand = mysqli_query($conn, $select_brand);
                            // $row = mysqli_fetch_assoc($result_brand);
                            // echo $row['brand_title'];
                            while( $row = mysqli_fetch_assoc($result_brand)){
                                $brand_titie = $row['brand_title'];
                                $brand_id = $row['brand_id'];
                                echo "<a href='index.php?brand=$brand_id'>$brand_titie</a>";
                            }
}


//getting catefories

function get_categories(){
    global $conn;
    $select_category = "SELECT * FROM `categories`";
    $result_category = mysqli_query($conn, $select_category);
    // $row = mysqli_fetch_assoc($result_brand);
    // echo $row['brand_title'];
    while( $row = mysqli_fetch_assoc($result_category)){
        $category_title = $row['category_title'];
        $category_id= $row['category_id'];
        echo "<a href='index.php?category=$category_id'>$category_title</a>";
    }  
}

//searching products function
function search_product(){
    global $conn;
    if(isset($_GET['search-data'])){
        $user_search_keyword = $_GET['search-value'];
    $search_query = "SELECT * FROM `products` WHERE product_title like '%$user_search_keyword%'";
    $result_query = mysqli_query($conn, $search_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='zero_product'>No Result Found</h2>";
    }
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_price = $row['product_price'];
        $product_desc = $row['product_desc'];
        $product_image1 = $row['product_img1'];
        $category_id= $row['category_id'];
        $brand_id = $row['brand_id'];

        echo "
        <div class='card'>
        <a href='product_detail.php?product_id=$product_id'>
        <div class='card_img_section'>
            <img class='card_img' src='./admin/product_images/$product_image1' alt='$product_title'>
        </div>
        </a>
        <div class='card_desc'>
            <h3>$product_title</h3>
            <h4>Rs. $product_price</h4>
            <a href='index.php?add_to_cart=$product_id'>Add to cart</a>
        </div>
    </div>
        ";
    }
}
}

//View details

function view_details(){
    global $conn;
    //condition to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $product_id = $_GET['product_id'];
    $select_query = "SELECT * FROM `products` WHERE product_id = $product_id ";
    $result_query = mysqli_query($conn, $select_query);
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_price = $row['product_price'];
        $product_desc = $row['product_desc'];
        $product_image1 = $row['product_img1'];
        $product_image2 = $row['product_img2'];
        $category_id= $row['category_id'];
        $brand_id = $row['brand_id'];
 
        echo "
        <div class='img_container'>
        <div class='img'>
            <img class='card_img' src='./admin/product_images/$product_image1' alt='$product_title'>
        </div>
        <div class='sub_img'>
            <img src='./admin/product_images/$product_image1' alt='$product_image1'>
        </div>
    </div>
    <div class='desc-container'>
        <div class='desc-content'>
            <h2>$product_title </h2>
            <p><span>Description:-</span>Toilet cleaner liquid </p>
            <p><span>Price:- </span>Rs. $product_price/-</p>
            <a href='index.php?add_to_cart=$product_id'><button>Add to cart</button></a>
        </div>
        
    </div>";
    }
}
}
}
}


//get IP address function 

function getIPAddress(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// $ip = getIPAddress();
// echo 'User real IP address is - '.$ip;


//cart function 

function cart(){
if(isset($_GET['add_to_cart'])){
    global $conn;
    $ip = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip' AND product_id = $get_product_id";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows>0){
        echo "<script>alert('This item is already present inside cart');</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }else{
        $insert_query = "INSERT INTO `cart_details`(`product_id`, `ip_address`, `quantity`) 
        VALUES ('$get_product_id','$ip','0')";
         $result_query = mysqli_query($conn, $insert_query);
         echo "<script>alert('Item is added to cart');</script>";
         echo "<script>window.open('index.php', '_self')</script>";

    }
}
}

//function to get cart item numbers

function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $ip = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip' ";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
        }else{
            global $conn;
        $ip = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip' ";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    
        }
        echo  $count_cart_items ;
    }

    // Total price function
    function total_cart_price(){
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
                $product_value = array_sum($product_price);
                $total+= $product_value;
            }
        }
        echo $total;
    }

    //get user order details
    function get_user_order_details(){
        global $conn;
        $username = $_SESSION['username'];
        $get_detail = "SELECT * FROM `user_table` WHERE username = '$username'";
        $result_query = mysqli_query($conn, $get_detail);
        while($row_query = mysqli_fetch_array($result_query)){
            $user_id = $row_query['user_id'];
            if(isset($_GET['pendingOrder'])){
                $get_order = "SELECT * FROM `user_orders` WHERE user_id = $user_id  AND order_status = 'pending'";
                $result_orders_query = mysqli_query($conn, $get_order);
                $row_count = mysqli_num_rows($result_orders_query);
                if($row_count>0){
                    echo "<h4 class='text_center text-success mt-5 mb-2 '>You have <span class='text-danger' >$row_count</span> pending orders</h4>
                    <a href='profile.php?my_order'>Order Details</a>";
                }else{
                    echo "<h4 class='text_center text-success mt-5 mb-2 '>You have <span class='text-danger' >0</span> pending orders</h4>
                    <a href='index.php'>Go Home</a>";
                }
            }
        }
    }
?>