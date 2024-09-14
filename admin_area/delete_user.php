<?php

if(isset($_GET['delete_user'])){
    $delete_id=$_GET['delete_user'];

    //delete query
    $delete_query="delete from `user_table` where user_id=$delete_id";
    $result_user=mysqli_query($con,$delete_query);
    if($result_user){
        echo "<script>alert('User Deleted Successfully')</script>";
        echo"<script>window.open('./index.php','_self')</script>";
    }
}
?>