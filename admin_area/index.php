<?php 
  include("../includes/connect.php");
  include("../functions/common_function.php");
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../style.css" />

    <style>
    .nav1{
        background-color: #141414;
        color: #FFFFFF;
    }
    .nav1Ul{
        color: #FFFFFF;
    }
    .nav1Ul .nav-link {
        color: #FFFFFF;
    }
    .nav1Ul .nav-link:hover{
        color: #E50914;
    }
    .responsive-logo { 
        max-width: 100%;
        max-height: 100px;
        display: block;  
        margin: 0; /* Ensure no automatic centering */
        border-radius: 20px;
        filter: drop-shadow(10px 10px 20px black);
        transition: transform 0.3s ease, filter 0.3s ease;
    }

    .responsive-logo:hover {
        transform: scale(1.2); 
        filter: drop-shadow(15px 15px 30px black); 
    }

    .logo-container {
        max-width: 100%;
        padding: 10px;
        text-align: left !important;
        margin: 0; 
        background-color: #aca9a9;
        box-shadow: inset 0 0 90px black;
    }


    @media (max-width: 600px) {
        .logo-container {
            max-width: 100%; 
            max-height:60%;
        }
    }
    body{
        background-color: black;
        overflow-x: hidden;
    }

    .nav2 {
        background-color: #1F1F1F;
        /* padding: 10px 20px; */
        border-bottom: 1px solid #333333; 
        }

    .nav2 .nav-link {
        color: #B3B3B3; 
        text-decoration: none;
        transition: color 0.3s ease-in-out;
        font-size: 1rem; 
        }

    .nav2 .nav-link:hover,
    .nav2 .nav-link:focus {
        color: #E50914; 
        }

    .btnbg{
        background-color:#3c3c3cba;
        background-color: #E50914;
        font-weight: bold;
        border-radius: 10px;
    }

    .btnbgt:hover{
        transform: scale(1.1); 
        filter: drop-shadow(10px 10px 20px red);
    }
  </style>
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg nav1">
            <div class="container-fluid">
                <img src="../images/Netlee logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg nav2">
                    <ul class="navbar-nav nav2Ul2">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>

    <div class="me-auto" style="background-color:#1F1F1F;color:#B3B3B3;overflow: hidden;">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <div class="row">
        <div class="col-md-12 logo-container d-flex align-items-center">
            <h3 class="m-3">
                <a href="../index.php">
                    <img src="../images/NetfleeLogo2.png" alt="Netflee Logo" class="responsive-logo">
                </a>
            </h3>

            <div class="button text-center">
                <button class="my-3 p-1 m-4 btnbg border-0 btnbgt"><a href="insert_product.php" class="nav-link text-light btnbg my-1 p-1">Insert Products</a></button>
                <button class="p-1 m-2 btnbg border-0 btnbgt"><a href="index.php?view_products" class="nav-link text-light btnbg my-1 p-1">View Products</a></button>
                <button class="p-1 m-2 btnbg border-0 btnbgt"><a href="index.php?insert_category" class="nav-link text-light btnbg my-1 p-1">Insert Categories</a></button>
                <button class="p-1 m-2 btnbg border-0 btnbgt"><a href="#" class="nav-link text-light btnbg my-1 p-1">View Categories</a></button>
                <button class="p-1 m-2 btnbg border-0 btnbgt"><a href="index.php?insert_brand" class="nav-link text-light btnbg my-1 p-1">Insert Brands</a></button>
                <button class="p-1 m-2 btnbg border-0 btnbgt"><a href="#" class="nav-link text-light btnbg my-1 p-1">View Brands</a></button>
                <button class="p-1 m-2 btnbg border-0 btnbgt"><a href="#" class="nav-link text-light btnbg my-1 p-1">All Orders</a></button>
                <button class="p-1 m-2 btnbg border-0 btnbgt"><a href="#" class="nav-link text-light btnbg my-1 p-1">All Payments</a></button>
                <button class="p-1 m-2 btnbg border-0 btnbgt"><a href="#" class="nav-link text-light btnbg my-1 p-1">List Users</a></button>
                <button class="p-1 m-2 btnbg border-0 btnbgt"><a href="#" class="nav-link text-light btnbg my-1 p-1">Logout</a></button>
            </div>
        </div>
        <p class="text-center" style="color:#FFFFFF; background-color:#3c3c3cba;">Admin Name</p>
    </div>

    <div class="container my-3">
        <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
        ?>
    </div>

    <?php 
      include("../includes/footer.php");
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>