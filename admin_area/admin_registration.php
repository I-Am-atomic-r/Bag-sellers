<?php

include('../includes/connect.php');
include('../functions/common_function.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
        <h2 class="text-center mb-5">Admin Registration</h2>
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
                        <label for="useremail" class="form-label">User Email</label>
                        <input type="email" id="useremail" name="useremail" placeholder="Enter Your User Email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4 w-100 m-auto">
                        <label for="userpassword" class="form-label">User Password</label>
                        <input type="password" id="userpassword" name="userpassword" placeholder="Enter Your User password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4 w-100 m-auto">
                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                        <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Re-enter Your User password" required="required" class="form-control">
                    </div>
                    <div class="">
                        <input type="submit" class="bg-info py-2 px-3 border-0 " name="admin_register" value="Register">
                        <p class="smallfw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>

                </form>
            </div>
            
            
        </div>
    </div>
</body>
</html>

<?php

if (isset($_POST['admin_register'])) {
    $user_username = $_POST['username'];
    $user_email = $_POST['useremail'];
    $user_password = $_POST['userpassword'];
    $conform_user_password = $_POST['confirmpassword'];
    $user_ip = getIPAddress();

    //select query
    $select_query = "select * from `admin_table` where admin_name='$user_username' or admin_email='$user_email'";
    $result_query = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result_query);
    if ($rows_count > 0) {
        echo "<script>alert('Admin name and email already exists')</script>";
    } elseif ($user_password != $conform_user_password) {
        echo "<script>alert('Password donot match')</script>";
    } else {
        $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password) values ('$user_username','$user_email','$user_password')  ";
        $sql_execute = mysqli_query($con, $insert_query);
    }
    


   
    

}




?>