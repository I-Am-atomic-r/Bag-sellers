<?php

include('../includes/connect.php');
include('../functions/common_function.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap Css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row de-flex align-items-center justify-contain-center">
            <div class="col-lg-12 col-xl-16">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- User Name Field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label ">User Name</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Your User Name" autocomplete="off" required="required" name="user_username">
                    </div>

                    <!-- Email Field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label ">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email">
                    </div>

                    <!-- Image Field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label ">User Image</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                    </div>

                    <!-- Password Field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label ">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                    </div>

                    <!-- Conform Password Field -->
                    <div class="form-outline mb-4">
                        <label for="conform_user_password" class="form-label ">Conform Password</label>
                        <input type="password" id="conform_user_password" class="form-control" placeholder="Re Enter Your Password" autocomplete="off" required="required" name="conform_user_password">
                    </div>

                    <!-- Address Field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label ">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" required="required" name="user_address">
                    </div>

                    <!-- Contact Field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label ">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Contact Number" autocomplete="off" required="required" name="user_contact">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" name="user_register" value="Register" class="bg-info py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Alredy have an account ? <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>



<!-- php code -->
<?php

if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conform_user_password = $_POST['conform_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['temp_name'];
    $user_ip = getIPAddress();

    //select query
    $select_query = "select * from `user_table` where user_name='$user_username' or user_email='$user_email'";
    $result_query = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result_query);
    if ($rows_count > 0) {
        echo "<script>alert('User name and email already exists')</script>";
    } elseif ($user_password != $conform_user_password) {
        echo "<script>alert('Password donot match')</script>";
    } else {

        move_uploaded_file($user_image_temp, './user_images/$user_image');
        $insert_query = "insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$user_password','$user_image','$user_ip','$user_address','$user_contact')  ";
        $sql_execute = mysqli_query($con, $insert_query);
    }
    // insert query


    //selecting cart items
    $select_cart_items="select * from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['user_name']=$user_username;
        echo "<script>alert('You have items in cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else {
        echo "<script>window.open('../index.php','_self')</script>";
    }

}




?>