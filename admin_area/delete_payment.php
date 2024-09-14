<?php

if(isset($_GET['delete_payment'])){
    $delete_id=$_GET['delete_payment'];

    //delete query
    $delete_query="delete from `user_payments` where order_id=$delete_id";
    $result_payment=mysqli_query($con,$delete_query);
    if($result_payment){
        echo "<script>alert(Payment Deleted Successfully)</script>";
        echo"<script>window.open('./index.php','_self')</script>";
    }
}
?>