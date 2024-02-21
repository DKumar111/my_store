<h3 class="text-center text-success ">All Brand</h3>
<table class="table table-bordered ">
    <thead>
        <tr>
            <th>SNo.</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
$select_brand = "SELECT * FROM `brands`";
$result_brand = mysqli_query($conn, $select_brand);
$number = 0;
while($row = mysqli_fetch_assoc($result_brand)){
    $brand_id = $row['brand_id'];
    $brand_title = $row['brand_title'];
    $number++;
?>
        <tr>
            <td><?php  echo $number ?></td>
            <td><?php  echo $brand_title ?></td>
            <td><a href='admin_index.php?edit_brand=<?php  echo $brand_id ?>'>Edit</a></td>
            <td><a href='admin_index.php?delete_brand=<?php  echo $brand_id ?>'>Delete</a></td>
        </tr>
        <?php
}
?>
    </tbody>
</table>

<!-- <button type="button" class="btn btn-primary" data-toggal="modal" data-target="#exampleModal">modal</button> -->


<div class="modal fade" id="exampleModal" tabindex="-1" rol="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Are you sure you want to delete this?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>