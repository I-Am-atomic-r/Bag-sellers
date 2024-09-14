<?php

if(isset($_GET['delete_category'])){
    $delete_id=$_GET['delete_category'];

    //delete query
    $delete_query="delete from `categories` where category_id=$delete_id";
    $result_category=mysqli_query($con,$delete_query);
    if($result_category){
        echo "<script>alert('Category Deleted Successfully')</script>";
        echo"<script>window.open('./index.php','_self')</script>";
    }
}
?>