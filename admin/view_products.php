<h2 class="text-success text-center ">All Products</h2><br>

<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Product ID</th>
            <th>Product</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
$get_products = "SELECT * FROM `products` ";
$result = mysqli_query($conn, $get_products);
$number = 0;
while($row = mysqli_fetch_assoc($result)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_img1 = $row['product_img1'];
    $product_price = $row['product_price'];
    $status = $row['status'];
    $number++;
    ?>
        <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $product_title ?></td>
            <td><img width='90px' height='90px' src='product_images/<?php echo $product_img1 ?>' alt=''></td>
            <td><?php echo $product_price ?></td>
            <td>
                <?php
            $get_count = "SELECT * FROM `order_pending` WHERE product_id = $product_id";
            $result_count = mysqli_query($conn, $get_count);
            $row_count = mysqli_num_rows($result_count);
            echo $row_count
        ?>
            </td>
            <td><?php echo $status ?></td>
            <td><a href='admin_index.php?edit_products=<?php echo $product_id ?>'>edit</a></td>
            <td><a href='admin_index.php?delete_product=<?php echo $product_id ?>'>delete</a></td>
        </tr>
        <?php
}
?>
    </tbody>
</table>