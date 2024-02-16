<?php   
include '_connectdb.php' ; 
include 'functions/common_function.php';
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- <link rel="stylesheet" href="index_style.css"> -->
    <!-- Bootstrap css CDN -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>

<!-- php code to access user id -->
<?php
$user_ip = getIPAddress();
$get_user = "SELECT * FROM `user_table` WHERE user_ip_addr='$user_ip'";
$result = mysqli_query($conn, $get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];

?>

    <div class="payment_content">
        <h2 class="text-center text-info">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://wwww.paypal.com" target="_blank"><h2 class="text-center">Paypal</h2></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>" ><h2 class="text-center">Pay offline</h2></a>
            </div>
        </div>
    </div>

</body>
<?php  //include 'footer.php'; ?>
</html>