<?php
$username = $_SESSION['username'];
$get_user = "SELECT * FROM `user_table` WHERE username = '$username'";
$result = mysqli_query($conn, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];


?>

<h3 class="text-success mt-3 ">All Orders</h3>

<table class="table table-bordered mt-4">
    <thead class="bg-info">
    <tr>
        <th>Sl No.</th>
        <th>Amount Due</th>
        <th>Total products</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary">
        <?php
        $get_order_details = "SELECT * FROM `user_orders` WHERE user_id = $user_id";
        $result_order = mysqli_query($conn, $get_order_details);
        $number = 1;
        while($row_orders=mysqli_fetch_assoc($result_order)){
            $oid = $row_orders['order_id'];
            $amount = $row_orders['amount'];
            $nvoice_number = $row_orders['invoice_number'];
            $total_products = $row_orders['total_products'];
            $order_date = $row_orders['order_date'];
            $order_status = $row_orders['order_status'];
            if($order_status == 'pending'){
                $order_status = 'Incomplete';
            }else{
                $order_status = 'Complete';
            }
            
            echo "<tr>
            <td>$number</td>
            <td>$amount</td>
            <td>$total_products</td>
            <td>$nvoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>";
            ?>
            <?php
            if($order_status == 'Complete')
            {
                echo "<td class='text-success '>Paid</td>";
            }else{
                echo " <td><a href='confirm_payment.php?order_id=$oid'>Make Payment</a></td>
                </tr>";
            }
           
        $number++;
        }
        ?>
    </tbody>
</table>