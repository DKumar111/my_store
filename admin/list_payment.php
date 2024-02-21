<h3 class="text-center text-success">All Payment</h3>

<table class="table table-bordered mt-5 ">
    <thead>
        <?php
$get_payment = "SELECT * FROM `user_payment`";
$result = mysqli_query($conn, $get_payment);
$row_count = mysqli_num_rows($result);

echo " <tr>
<th>S No.</th>
<th>Invoice Number</th>
<th>Amount</th>
<th>Payment Mode</th>
<th>Payment Date</th>
<th>Delete</th>
</tr>
</thead>
<tbody>";

if($row_count==0){
    echo "<h2 class='text-danger text-center  mt-4 '>No payment here</h2>";
}else{
    $number = 0;
    while($row_data = mysqli_fetch_assoc($result)){
        $order_id = $row_data['order_id'];
        $payment_id = $row_data['payment_id'];
        $amount = $row_data['amount'];
        $invoice_number = $row_data['invoice_number'];
        $payment_mode = $row_data['payment_mode'];
        $payment_date = $row_data['date'];
        $number++;
        echo " <tr>
        <td>$number</td>
        <td>$invoice_number</td>
        <td>$amount</td>
        <td>$payment_mode</td>
        <td>$payment_date</td>
        <td><a href='#'>delete</a></td>
    </tr>";
    }

}


?>
       
       
    </tbody>
</table>