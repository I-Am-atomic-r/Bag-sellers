<h3 class="text-center text-success">ALL Payments</h3>
<table class="table-bordered mt-5 w-50 m-auto text-center">
    <thead class="bg-info">
        <?php
        $get_payment="select * from `user_payments`";
        $result=mysqli_query($con,$get_payment);
        $row_cont=mysqli_num_rows($result);
         


    if($row_cont==0){
        echo "<h2 class='text-danger text-center mt-5'>No Payment Recived Yet</h2>";
    }else{
        echo " <tr>
            <th>Slno</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
        $number=0;
        while ($row_data=mysqli_fetch_assoc($result)) {
           $order_id=$row_data['order_id'];
           $payment_id=$row_data['payment_id'];
           $invoice_no=$row_data['invoice_no'];
           $amount=$row_data['amount'];
           $payment_mode=$row_data['payment_mode'];
           $order_date=$row_data['date'];
           $number++;
           echo " <tr>
            <td>$number</td>
            <td>$invoice_no</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$order_date</td>
            <td><a href='index.php?delete_payment=$order_id' class=' text-light'>Delete</a></td>
        </tr>
    ";
        }
       
    }
        ?>
    </tbody>   
       
</table>