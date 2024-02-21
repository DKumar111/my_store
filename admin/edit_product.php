<?php
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id";
    $result = mysqli_query($conn, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_price = $row['product_price'];
    $product_desc = $row['product_desc'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_img1 = $row['product_img1'];
    $product_img2 = $row['product_img2'];

    //fetching category name
    $select_category = "SELECT * FROM `categories` WHERE category_id = $category_id";
    $result_category = mysqli_query($conn, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];
    $category_id = $row_category['category_id'];

    //fetching brand name
    $select_brands = "SELECT * FROM `brands` WHERE brand_id = $brand_id";
    $result_brands = mysqli_query($conn, $select_brands);
    $row_brands = mysqli_fetch_assoc($result_brands);
    $brands_title = $row_brands['brand_title'];
    $brands_id = $row_brands['brand_id'];
    
    
}

?>

<div class=" mt-1">
    <h1 class="text-center ">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" value="<?php echo $product_title ?>" class="form-control"
                required="required" id="">
        </div>
        <div class="form-outline">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" value="<?php echo $product_price ?>" class="form-control"
                required="required" id="">
        </div>
        <div class="form-outline">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" name="product_desc" value="<?php echo $product_desc ?>" class="form-control"
                required="required" id="">
        </div><br>
        <div class="form-outline">
            <label for="product_category" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select" id="">
                <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                <?php
                 $select_category_all = "SELECT * FROM `categories`";
                 $result_category_all = mysqli_query($conn, $select_category_all);
                 while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                    $category_title = $row_category_all['category_title'];
                    $category_id = $row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                 }
            ?>
            </select>
        </div><br>
        <div class="form-outline">
            <label for="product_brand" class="form-label">Product Brands</label>
            <select name="product_brand" class="form-select" id="">
                <option value="<?php echo $brands_id ?>"><?php echo $brands_title ?></option>
                <?php
                 $select_brand_all = "SELECT * FROM `brands`";
                 $result_brand_all = mysqli_query($conn, $select_brand_all);
                 while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
                    $brand_title = $row_brand_all['brand_title'];
                    $brand_id = $row_brand_all['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                 }
            ?>
            </select>
        </div>

        <div class="form-outline">
            <label for="product_img1" class="form-label">Product Image1</label>
            <div class="d-flex">
                <input type="file" name="product_img1" class="form-control" required="required" id="">
                <img width="90px" heigh="90px" src="product_images/<?php echo $product_img1 ?>" alt="">
            </div>

        </div><br>
        <div class="form-outline">
            <label for="product_img2" class="form-label">Product Image2</label>
            <div class="d-flex">
                <input type="file" name="product_img2" class="form-control" required="required" id="">
                <img width="90px" heigh="90px" src="product_images/<?php echo $product_img2 ?>" alt="">
            </div>
        </div><br>
        <div class="text-center">
            <input type="submit" value="Update_product" name="edit_product" class="bg-info border-0 p-2 ">
        </div>
    </form>
</div>

<!-- editing ptoduct  -->
<?php
if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];


    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];

    $temp_img1 = $_FILES['product_img1']['tmp_name'];
    $temp_img2 = $_FILES['product_img2']['tmp_name'];

    //checking for empty field 

    if($product_title == '' || $product_price == '' || $product_desc == '' ||  $product_category == '' || $product_brand == '' 
    || $product_img1 == '' || $product_img2 == '' ){
        echo "<script>alert('Please fill all the field')</script>";
    }else{
        move_uploaded_file($temp_img1, "./product_images/$product_img1");
        move_uploaded_file($temp_img2, "./product_images/$product_img2");

        //update query

        $update_data = "UPDATE `products` SET `product_title`='$product_title',
        `product_price`='$product_price',`product_desc`='$product_desc',`category_id`='$product_category',
        `brand_id`='$product_brand',`product_img1`='$product_img1',`product_img2`='$product_img2',
        `date`= NOW() WHERE product_id = $edit_id";
        $result_update = mysqli_query($conn, $update_data);
        if($result_update){
            echo "<script>alert('Product updated successfully!')</script>"; 
            echo "<script>window.open('admin_index.php?view_product','_self')</script>"; 
        }
    }



}

?>