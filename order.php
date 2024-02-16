<?php   
include '_connectdb.php' ; 
include 'functions/common_function.php';


if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    echo $user_id;
}

//getting total items and total price of all items

$get_ip_address =  getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
$result_cart_price = mysqli_query($conn, $cart_query_price);
$invoice_number = mt_rand();
$status = "pending";
$count = mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM `products` WHERE product_id = $product_id";
    $run_price = mysqli_query($conn, $select_product);
    while($row_product_price = mysqli_fetch_array($run_price)){
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price += $product_values; 
    }
}

//getting quantity from cart

$get_cart = "SELECT * FROM `cart_details`";
$run_cart = mysqli_query($conn, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];
if($quantity == 0){
    $quantity = 1;
    $subtotal = $total_price;
}else{
    $quantity = $quantity;
    $subtotal = $total_price*$quantity;
}

//insert order

$insert_order = "INSERT INTO `user_orders`(user_id, amount, invoice_number, total_products, order_date, order_status) 
VALUES ($user_id, $subtotal, $invoice_number, $count, NOW(), '$status')";
$result_query = mysqli_query($conn, $insert_order);
if($result_query){
    echo "<script>alert('Order submitted successfully');</script>";
    echo "<script>window.open('profile.php', '_self');</script>";
}

//insert pending order
$insert_pending_order = "INSERT INTO `order_pending`(user_id, invoice_number, product_id, quantity, order_status) 
VALUES ($user_id, $invoice_number,$product_id, $count, '$status')";
$result_pending_order = mysqli_query($conn, $insert_pending_order);


//delete items from cart
$empty_cart = "DELETE FROM `cart_details` WHERE ip_address= '$get_ip_address'";
$result_delete_order = mysqli_query($conn, $empty_cart);
?>