<?php

if(isset($_GET['delete_orders'])){
    $delete_id=$_GET['delete_orders'];

    //delete query
    $delete_query="delete from `user_orders` where order_id=$delete_id";
    $result_order=mysqli_query($con,$delete_query);
    if($result_order){
        echo "<script>alert(Order Deleted Successfully)</script>";
        echo"<script>window.open('./index.php','_self')</script>";
    }
}
?>