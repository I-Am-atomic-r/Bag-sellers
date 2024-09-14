<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-info">
        <tr>
            <th>Slno</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary">
        <?php
        $select_cat="select * from `categories`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];

        $number++
        
        ?>
        <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $category_title ?></td>
            <td><a href='index.php?edit_categories=<?php echo $category_id ?>' class='text-success'>Edit</a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-sucess'>Delete</a></td>
        </tr>

        <?php
        }
        ?>
    </tbody>
</table>