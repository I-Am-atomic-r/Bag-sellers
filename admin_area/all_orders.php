<h3 class="text-center text-success">ALL Orders</h3>
<table class="table-bordered mt-5 w-50 m-auto text-center">
    <thead class="bg-info">
        <?php
        $get_orders="select * from `user_orders`";
        $result=mysqli_query($con,$get_orders);
        $row_cont=mysqli_num_rows($result);
         


    if($row_cont==0){
        echo "<h2 class='text-danger text-center mt-5'>No Orders Yet</h2>";
    }else{
        echo " <tr>
            <th>Slno</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
        $number=0;
        while ($row_data=mysqli_fetch_assoc($result)) {
           $order_id=$row_data['order_id'];
           $user_id=$row_data['user_id'];
           $amount_due=$row_data['amount_due'];
           $invoice_no=$row_data['invoice_no'];
           $total_products=$row_data['total_products'];
           $order_date=$row_data['order_date'];
           $order_status=$row_data['order_status'];
           $number++;
           echo " <tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_no</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='index.php?delete_orders=$order_id' class=' text-light'>Delete</a></td>
        </tr>
    ";
        }
       
    }
        ?>
    </tbody>   
       
</table>