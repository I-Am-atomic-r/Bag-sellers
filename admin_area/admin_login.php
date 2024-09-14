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
    <title>Admin Login</title>
    <!-- Bootstrap Css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <!-- Font awesom -->
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <!-- css -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="d-flex justify-contain ">
            <div class="col-lg-6 col-xl-5 ">
                <img src="../images/Admin registrartion.jpg" alt="Admin Registration" class="">
            </div>
            <div class="col-lg-6 colxl-4 align-item-center">
                <form action="" method="post">
                    <div class="form-outline mb-4 w-100 m-auto">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" id="username" name="username" placeholder="Enter Your User Name" required="required" class="form-control">
                    </div>
                    
                    <div class="form-outline mb-4 w-100 m-auto">
                        <label for="userpassword" class="form-label">User Password</label>
                        <input type="password" id="userpassword" name="userpassword" placeholder="Enter Your User password" required="required" class="form-control">
                    </div>
                    
                    <div class="">
                        <input type="submit" class="bg-info py-2 px-3 border-0 " name="admin_login" value="Login">
                        <p class="smallfw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class="link-danger">Register</a></p>
                    </div>

                </form>
            </div>
            
            
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['admin_login']))
{
    $user_username=$_POST['username'];
    $user_password=$_POST['userpassword'];

    $select_query="Select * from `admin_table` where admin_name='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data= mysqli_fetch_assoc($result);
    

    if($row_count>0){
        $_SESSION['user_name']=$user_username;
        if(password_verify($user_password,$row_data['user_password']))
        {
            
            echo "<script>alert('login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
           
            

        }else{
            echo "<script>alert('Invalid Credientials')</script>"; 
        }
    }else{
        echo "<script>alert('Invalid Credientials')</script>";
    }
}

?>