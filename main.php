<div class="main_content">
    <!-- fetching the products -->
    <?php
    $select_query = "SELECT * FROM `products` order by rand()";
    $result_query = mysqli_query($conn, $select_query);
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
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
        <div class='card_img_section'>
            <img class='card_img' src='./admin/product_images/$product_image1' alt='$product_title'>
        </div>
        <div class='card_desc'>
            <h3>$product_title</h3>
            <h4>$product_price</h4>
            <p>$product_desc</p>
        </div>
    </div>
        ";
    }
?>

    <!-- <div class="card">
        <div class="card_img_section">
            <img class="card_img" src="img/liquid_concentrate.png" alt="card image">
        </div>
        <div class="card_desc">
            <h3>NAME</h3>
            <h4>Price</h4>
            <p>description</p>
        </div>
    </div> -->
</div>