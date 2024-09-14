<?php
// connection file
include('../includes/connect.php');
include('../functions/common_function.php');

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
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            overflow-x: hidden;
        }

        img{
            width: 50%;
            margin: auto;
            display: block;
        }
    </style>
</head>
<body>
    <!-- php code to acess user id -->
     <?php
     $user_ip=getIPAddress(); 
     $get_user = "Select * from `user_table` where user_ip='$user_ip'";
     $result=mysqli_query($con,$get_user);
     $run_query=mysqli_fetch_array($result);
     $user_id = $run_query['user_id']
     ?>
    <div class="container">
        <h2 class="text-center text-info">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center text-center my-5">
            <div class="col-md-6">
            <a href="https://esewa.com.np/#/home"><img src="../images/esewa.png" alt=""></a>
            </div>
            <div class="col-md-6">
            <a href="Order.php?user_id=<?php echo $user_id ?>"><h2>Pay Offline</h2></a>
            </div>
            
        </div>
    </div>
    
    
</body>
</html>