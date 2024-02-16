<?php   
include '_connectdb.php' ; 
session_start();

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    

    $select_data = "SELECT * FROM `user_orders` WHERE order_id = $order_id";
    $result = mysqli_query($conn, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount = $row_fetch['amount'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];

    $insert_query = "INSERT INTO `user_payment`(`order_id`, `invoice_number`, `amount`, `payment_mode`)
     VALUES ($order_id ,$invoice_number,$amount,'$payment_mode')";
     $result = mysqli_query($conn, $insert_query);
     if($result){
        echo "<h3 class='text-center text-light '>Pyment completed successfully</h3>";
        echo "<script>window.open('profile.php?my_order', '_self')</script>";
     }
     $update = "UPDATE `user_orders` SET order_status='Completed' WHERE order_id = $order_id";
     $result_orders = mysqli_query($conn, $update);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap css CDN -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-secondary">
    <h2 class="text-center text-light ">Confirm Payment</h2>
    <div class="container my-5 ">
        <form action="" method="post">
            <div class="form-outline my-4 text-center ">
            <label class="text-center text-light " for="invoice_numnber">Invoice Number</label>
                <input type="text" class="form-control w-25 m-auto" value="<?php  echo $invoice_number ?>" name="invoice_number" id="">
            </div>
            <div class="form-outline my-4 text-center ">
                <label class="text-center text-light " for="amount">Amount</label>
                <input type="text" class="form-control w-25 m-auto" value="<?php  echo $amount ?>" name="amount" id="">
            </div>
            <div class="form-outline my-4 text-center ">
              <select name="payment_mode" class="form-select w-25 m-auto" id="">
                <option>Select Payment Mode</option>
                <option>UPI</option>
                <option>Netbanking</option>
                <option>Paypal</option>
                <option>Cash on delivery</option>
              </select>
            </div>
            <div class="form-outline my-4 text-center ">
                <input type="submit" class=" bg-light border-0  m-auto" value="confirm payment" name="confirm_payment" id="">
            </div>
        </form>
    </div>
</body>
</html>