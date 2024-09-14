<?php

if(isset($_GET['delete_brands'])){
    $delete_id=$_GET['delete_brands'];

    //delete query
    $delete_query="delete from `brands` where brand_id=$delete_id";
    $result_brands=mysqli_query($con,$delete_query);
    if($result_brands){
        echo "<script>alert('Brand Deleted Successfully')</script>";
        echo"<script>window.open('./index.php','_self')</script>";
    }
}
?>