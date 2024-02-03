<?php
include '_connectdb.php';

if(isset($_POST['Insert'])){
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_desc'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_Brand'];
    $product_status = 'true';

    //accessing images
    $product_image1 = $_FILES['$product_image1']['name'];
    $product_image2 = $_FILES['$product_image2']['name'];
    
    //accessing temp name
    $temp_image1 = $_FILES['$product_image1']['tmp_name'];
    $temp_image2 = $_FILES['$product_image2']['tmp_name'];

    // checking empty condition

    if($product_title == '' || $product_price == '' || $product_description == '' ||  $product_category == '' || $product_brand == '' 
    || $product_image1 == '' || $product_image2 == '' ){
        echo "<script>alert('Please fill all the field')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");

        //insert qurey
        $insert_product = "INSERT INTO `products`(`product_title`, `product_price`, `product_desc`, `category_id`, `brand_id`, `product_img1`, `product_img2`, `date`, `status`) 
        VALUES ('$product_title','$product_price','$product_description','$product_category','$product_brand','$product_image1','$product_image2',NOW(),'$product_status ')";

        $result_query = mysqli_query($conn, $insert_product);
        if($result_query){
            echo "<script>alert('Successfully inserted')</script>";
        }
    }
}

?>

<div class="">
    <h1>Insert Product </h1><br /><br />
    <form action="" method="post"  enctype="multipart/form-data">
        <label for="p_name">Product Name  </label><br />
        <input type="text" name="product_title" id="" placeholder="Product title" required="required"><br /><br />
        <label for="p_price">Product Price  </label><br />
        <input type="text" name="product_price" id="" placeholder="Product price" required="required"><br /><br />
        <label for="p_desc">Product Description  </label><br />
        <input type="text" name="product_desc" id="" placeholder="Product description" required="required"><br /><br />
        <div class="">
            <select name="product_category" id="">
                <option value="">select a category</option>
                <?php
                    $select_query = "SELECT * FROM `categories`";
                    $result_query = mysqli_query($conn, $select_query);
                    // $row = mysqli_fetch_assoc($result_brand);
                    // echo $row['brand_title'];
                    while( $row = mysqli_fetch_assoc($result_query)){
                        $cat_title = $row['category_title'];
                        $cat_id = $row['category_id'];
                        echo " <option value=' $cat_id'>$cat_title</option>";
                    }
                ?>
            </select>
        </div><br />
        <div class="">
            <select name="product_Brand" id="">
                <option value="">select a Brand</option>
                <?php
                    $select_query = "SELECT * FROM `brands`";
                    $result_query = mysqli_query($conn, $select_query);
                    // $row = mysqli_fetch_assoc($result_brand);
                    // echo $row['brand_title'];
                    while( $row = mysqli_fetch_assoc($result_query)){
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo " <option value='  $brand_id '>$brand_title</option>";
                    }
                ?>
            </select>
        </div><br />
        <label for="p_image">Product Image 1  </label><br />
        <input type="file" name="$product_image1" id=""><br /><br />
        <label for="p_image">Product Image 2  </label><br />
        <input type="file" name="$product_image2" id=""><br /><br />
        <input type="submit" value="Insert" name = "Insert">
    </form>
</div>

