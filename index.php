<?php
// connection file
include('includes/connect.php');
include('./functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bag sellers</title>
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
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>

                        <?php
                        if(isset($_SESSION['user_name'])){
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>My Acccount</a>
                        </li>";
                        }else{
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                        </li>";
                        }
                        ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i><sup>
                                        <?php
                                        cart_item();
                                        ?>
                                    </sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:
                                <?php
                                total_cart_price();
                                ?>
                            </a>
                        </li>

                    </ul>
                    <form action="search_product.php" method="get" class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- Calling cart function-->

        <?php
        cart();

        ?>

        <!-- second child-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

                <?php 
                if(!isset($_SESSION['user_name'])){
                    echo" <li class='nav-item'>
                    <a class='nav-link' href=''>Welcome Guest</a>
                </li>";
                }else{
                    echo" <li class='nav-item'>
                    <a class='nav-link' href=''>Welcome ".$_SESSION['user_name']."</a>
                </li>";
                }
                if(!isset($_SESSION['user_name'])){
                    echo" <li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
                }else{
                    echo" <li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>";
                }
                ?>

                
            </ul>
        </nav>



        <!-- third child-->
        <div class="bg-light">
            <h3 class="text-center">Bag sellers</h3>
            <p class="text-center">We have every thing you might need</p>
        </div>

        <!--fourth child-->
        <div class="row px-1">
            <div class="col md-10">
                <!-- products -->
                <div class="row">
                    <!-- fetching products -->
                    <?php
                    // calling function
                    getproducts();
                    get_unique_categories();
                    get_unique_brands();
                    ?>

                    <!-- Row Ends-->
                </div>
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- side nav -->

                <!-- Brands to be displayed-->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light text-center">
                            <h4>Delivary Brands</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light text-center">
                            <?php

                            getbrands();
                            ?></a>
                    </li>
                </ul>

                <!-- Categories to be Displayed-->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light text-center">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light text-center">
                            <?php

                            getcategories();
                            ?></a>
                    </li>
                </ul>

            </div>
        </div>

        <!-- last child -->
        <?php
        include('./includes/footer.php')
        ?>
    </div>


    <!-- Bootstrap Js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>