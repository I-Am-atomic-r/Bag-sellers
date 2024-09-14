<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap Css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- css -->
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row de-flex align-items-center justify-contain-center mt-5">
            <div class="col-lg-12 col-xl-16">
                <form action="" method="post" enctype="multipart/form-data" >
                    <!-- User Name Field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label ">User Name</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Your User Name" autocomplete="off" required="required" name="user_username">
                    </div>

                    <!-- Password Field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label ">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                    </div>

                    <!-- Register Button-->
                    <div class="mt-4 pt-2">
                        <input type="submit" name="user_login"  value="Login" class="bg-info py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger"> Register </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>


<?php

if(isset($_POST['user_login']))
{
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="select * from `user_table` where user_name='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data= mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // cart item
    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
    $select_cart= mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($result);
    if($row_count>0){
        $_SESSION['user_name']=$user_username;
        if(password_verify($user_password,$row_data['user_password']))
        {
            if($row_count==1 & $row_count_cart==0)
            {
                echo "<script>alert('login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                echo "<script>alert('login successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }

        }else{
            echo "<script>alert('Invalid Credientials')</script>"; 
        }
    }else{
        echo "<script>alert('Invalid Credientials')</script>";
    }
}

?>