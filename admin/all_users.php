<h3 class="text-center text-success">All Users</h3>

<table class="table table-bordered mt-5 ">
    <thead>
        <?php
$get_user = "SELECT * FROM `user_table`";
$result_user = mysqli_query($conn, $get_user);
$row_count = mysqli_num_rows($result_user);

echo " <tr>
<th>S No.</th>
<th>User Name</th>
<th>Email</th>
<th>Address</th>
<th>Mobile No.</th>
<th>Delete</th>
</tr>
</thead>
<tbody>";

if($row_count==0){
    echo "<h2 class='text-danger text-center  mt-4 '>No user here</h2>";
}else{
    $number = 0;
    while($row_data = mysqli_fetch_assoc($result_user)){
        $user_id = $row_data['user_id'];
        $username = $row_data['username'];
        $user_email = $row_data['user_email'];
        $user_addr = $row_data['user_addr'];
        $user_mobile = $row_data['user_mobile'];
        $number++;
        echo " <tr>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td>$user_addr</td>
        <td>$user_mobile</td>
        <td><a href='#'>delete</a></td>
    </tr>";
    }

}


?>
       
       
    </tbody>
</table>