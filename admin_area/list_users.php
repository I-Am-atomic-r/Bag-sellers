<h3 class="text-center text-success">ALL Users</h3>
<table class="table-bordered mt-5 w-50 m-auto text-center">
    <thead class="bg-info">
        <?php
        $get_user="select * from `user_table`";
        $result=mysqli_query($con,$get_user);
        $row_cont=mysqli_num_rows($result);
         


    if($row_cont==0){
        echo "<h2 class='text-danger text-center mt-5'>No Users Yet</h2>";
    }else{
        echo " <tr>
            <th>Slno</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Image</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
        $number=0;
        while ($row_data=mysqli_fetch_assoc($result)) {
            $user_id=$row_data['user_id'];
           $user_name=$row_data['user_name'];
           $user_email=$row_data['user_email'];
           $user_image=$row_data['user_image'];
           $user_address=$row_data['user_address'];
           $user_mobile=$row_data['user_mobile'];
           
           $number++;
           echo " <tr>
            <td>$number</td>
            <td>$user_name</td>
            <td>$user_email</td>
            <td><img src='../users_area/user_images/ $user_image' class='product_image'></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href='index.php?delete_user=$user_id' class=' text-light'>Delete</a></td>
        </tr>
    ";
        }
       
    }
        ?>
    </tbody>   
       
</table>