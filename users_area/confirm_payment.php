<?php

include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    
    $select_data="select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_no=$row_fetch['invoice_no'];
    $amount_due=$row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_no=$_POST['invoice_no'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query ="insert into `user_payments` (order_id,invoice_no,amount,payment_mode,date) values ($order_id,$invoice_no,$amount,'$payment_mode',NOW())";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<h3 class='text-center text-light'>Successfully Completed</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }

    $update_orders="update `user_orders` set order_status='complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap Css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font awesom -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- css -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-secondary">
   
    <div class="container my-5">
    <h1 class="text-center text-light">Conform Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_no" value="<?php echo "$invoice_no";?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo "$amount_due";?>" >
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option >Select Payment Mode</option>
                    <option >E-banking</option>
                    <option >E-sewa</option>
                    <option >Khalti</option>
                    <option >Cash On delevery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
    
</body>
</html>