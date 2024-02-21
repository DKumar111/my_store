<h3 class="text-center text-success ">All Categories</h3>

<table class="table table-bordered ">
    <thead>
        <tr>
            <th>SNo.</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
<?php
$select_cat = "SELECT * FROM `categories`";
$result_cat = mysqli_query($conn, $select_cat);
$number = 0;
while($row = mysqli_fetch_assoc($result_cat)){
    $cat_id = $row['category_id'];
    $cat_title = $row['category_title'];
    $number++;
?>
        <tr>
            <td><?php  echo $number ?></td>
            <td><?php  echo $cat_title ?></td>
            <td><a href='admin_index.php?edit_category=<?php  echo $cat_id ?>'>Edit</a></td>
            <td><a href='admin_index.php?delete_category=<?php  echo $cat_id ?>'>Delete</a></td>
        </tr>
<?php
}
?>
    </tbody>
</table>