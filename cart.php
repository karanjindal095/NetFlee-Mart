<?php 
  include("includes/connect.php");
  include("./functions/common_function.php");
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Netflee Mart Cart Details</title>
  <!-- Bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font Awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />

  <style>
    .cart_img{
      width: 80px; 
      height: 80px;
      object-fit: contain;
    }
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
        margin: 0 auto;  
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
        text-align: center;
        margin: auto;
        background-color: #000000ba;
        background-color: #c41919;
        box-shadow: inset 0 0 90px black;
    }

    @media (max-width: 600px) {
        .logo-container {
            max-width: 90%; 
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

    /* Side Nav container */
    .sidenav {
        background-color: #1F1F1F; 
        }

    /* Style for regular links */
    .sidenav .nav-link {
        color: #FFFFFF; 
        }

    /* Active link - change color to Netflix red */
    .sidenav .nav-link.active {
        color: #E50914;
        }

    /* Hover effect for links */
    .sidenav .nav-link:hover {
        background-color: #333333; 
        color: #FFFFFF; 
        }

    /* Optional: Style for the 'Delivery Brands' section */
    .sidenav .nav-item.bg {
        background-color: #333333; 
        background-color: #E50914; 
        }

        /* Style for search input */
    .search-input {
    background-color: transparent; 
    border: 2px solid grey; 
    color: grey; 
    }

    .search-input::placeholder {
    color: grey; 
    }

    /* Style for submit button */
    .submit-btn {
    border-color: grey; 
    }

    .submit-btn:hover {
    background-color: red; 
    border-color: red; 
    color: #FFFFFF;
    }

    .search-input:focus {
    outline: none; 
    box-shadow: none; 
    border-color: 2px solid #FFFFFF; 
    }

    .custom-table thead tr th{
      background-color: #E50914;
      color: #FFFFFF;
    }

    .custom-table th {
        border: 1px solid black;
      }
      
      .custom-table tbody tr td{
        background-color: #1F1F1F;
        color: white;
        vertical-align: middle;
      }
      
      .custom-table {
        border: 1px solid black; 
        border-radius: 10px; 
        overflow: hidden; 
        }
      .custom-table td {
            border: 1px solid black;
        }

      .custom-checkbox {
        appearance: none; /* Remove default checkbox styling */
        width: 20px;
        height: 20px;
        border: 2px solid black; /* Customize border */
        border-radius: 4px; /* Optional: for rounded corners */
        background-color: white; /* Default background */
        cursor: pointer;
        position: relative;
      }

    .custom-checkbox:checked {
        background-color: red; /* Background color when checked */
        border-color: red; /* Border color when checked */
    }

    .custom-checkbox:checked::after {
        content: '✓'; /* Add a tick */
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white; /* Tick color */
        font-size: 16px; /* Adjust size as needed */
        font-weight: bold;
    }

    .update-btn{
      background-color: #E50914;
      border-color: #E50914;
      color: #fff;
      font-weight: bold;
      /* border-radius: 10px; */
    }
    .update-btn:hover{
      background-color: grey;
      background-color: #1F1F1F;
      border-color: grey; 
    }
    
    
    .remove-btn{
      border-color: grey; 
      font-weight: bold;
    }

    .remove-btn:hover {
      background-color: red; 
      border-color: red; 
      color: #FFFFFF;
    }

  </style>

</head>

<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg nav1">
      <div class="container-fluid">
        <img src="images/Netlee logo.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav1Ul">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <?php 
               if(isset($_SESSION['username']))
               {
                echo "
                  <li class='nav-item'>
                    <a class='nav-link' href='users_area/profile.php'>My Account</a>
                  </li>
                ";
              }
              else{
                 echo "
                   <li class='nav-item'>
                     <a class='nav-link' href='users_area/user_registration.php'>Register</a>
                   </li>
                 ";
               }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item()?></sup></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php 
      cart();
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark nav2">
      <ul class="navbar-nav me-auto px-1 nav2Ul2">
      <?php 
          if(!isset($_SESSION['username'])){
            echo "
           <li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest</a>
          </li>
            ";
            echo "
            <li class='nav-item'>
              <a class='nav-link' href='users_area/user_login.php'>Login</a>
            </li>
            ";
          }
          else{
            echo "
            <li class='nav-item'>
              <a class='nav-link' href='#'>Welcome ".ucwords($_SESSION['username'])."</a>
            </li>
            ";
            echo "
            <li class='nav-item'>
              <a class='nav-link' href='users_area/logout.php'>Logout</a>
            </li>
            ";
          }
        ?>
      </ul>
    </nav>

    <!-- third child -->
    <div class="bg-light">
      <!-- <h3 class="text-center">Netflee Mart</h3> -->
      <h3 class="text-center logo-container">
        <img src="images/NetfleeLogo2.png" alt="Netflee Logo" class="responsive-logo">
      </h3>
      <p class="text-center" style="color:#FFFFFF; background-color: #000000ba">Shopping Made Simple, Memories Made Precious(Crafted to Care, Delivered with Heart❤️)</p>
    </div>

    <!-- fourth child -->
    <div class="container">
        <div class="row">
          <form action="" method="post">
            <table class="table table-bordered text-center ">
              <tbody>
                <!-- php code to display dynamic data -->
                  <?php
                      $get_ip_add = getIPAddress();
                      $total = 0;
                    
                      // Query to get cart items for the current user
                      $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                      $result = mysqli_query($conn, $cart_query);
                      $result_count = mysqli_num_rows($result);
                    
                      if ($result_count > 0) {
                          // Display the cart
                          echo "
                          <form action='' method='POST'>
                          <table class='table table-bordered text-center custom-table'>
                              <thead>
                                  <tr>
                                      <th>Product Title</th>
                                      <th>Product Image</th>
                                      <th>Quantity</th>
                                      <th>Total Price</th>
                                      <th>Remove</th>
                                      <th colspan='2'>Operations</th>
                                  </tr>
                              </thead>
                              <tbody>
                          ";
                    
                          // Loop through cart items
                          while ($row = mysqli_fetch_array($result)) {
                              $product_id = $row['product_id'];
                              $quantity = $row['quantity'];
                              
                              // Get product details
                              $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                              $result_products = mysqli_query($conn, $select_products);
                    
                              while ($row_products_price = mysqli_fetch_array($result_products)) {
                                  $product_price = $row_products_price['product_price'];
                                  $product_title = $row_products_price['product_title'];
                                  $product_image1 = $row_products_price['product_image1'];
                    
                                  $total_item_price = $product_price * $quantity; // Calculate total for this product
                                  $total += $total_item_price; // Add to the overall total
                    
                                  // Display the product in the cart
                                  echo "
                                  <tr>
                                      <td>$product_title</td>
                                      <td><img src='./admin_area/product_images/$product_image1' alt='' class='cart_img'></td>
                                      <td>
                                          <input type='number' name='qty[$product_id]' value='$quantity' min='1' class='form-input w-50 text-center' style='background-color:rgb(224 224 224 / 75%);color:black; '>
                                      </td>
                                      <td>$total_item_price/-</td>
                                      <td><input type='checkbox' name='removeitem[]' value='$product_id' class='custom-checkbox'></td>
                                      <td>
                                        <input type='submit' name='update_cart' value='Update Cart' class='update-btn px-3 mx-3 py-2 btn btn-outline-light submit-btn'>
                                        <input type='submit' name='remove_cart' value='Remove Cart' class='remove-btn px-3 mx-3 py-2 btn btn-outline-light submit-btn'>
                                      </td>
                                  </tr>
                                  ";
                              }
                          }
                    
                          echo "
                              </tbody>
                          </table>
                          ";
                          // Subtotal
                          // echo "<h4 class='px-3 '>Subtotal: <strong class='text-info'>$total/-</strong></h4>";
                          
                          // Submit buttons for updating or removing items
                          // <div class='d-flex mb-5 justify-content-around'>
                          //     <h4 class='px-3 '>Subtotal: <strong class='text-info'>$total/-</strong></h4>
                          //     <div>
                          //       <input type='submit' name='update_cart' value='Update Cart' class='bg-info px-3 border-0 mx-3 py-2'>
                          //       <input type='submit' name='remove_cart' value='Remove Cart' class='bg-info px-3 border-0 mx-3 py-2'>
                          //     </div>
                          // </div>
                          echo "
                          </form>
                          ";
                      } else {
                          echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                      }
                    
                      // Update Cart Quantities
                      if (isset($_POST['update_cart'])) {
                          foreach ($_POST['qty'] as $product_id => $quantity) {
                              $update_cart = "UPDATE `cart_details` SET quantity=$quantity WHERE ip_address='$get_ip_add' AND product_id=$product_id";
                              $result_update = mysqli_query($conn, $update_cart);
                          }
                          echo "<script>window.open('cart.php','_self')</script>";
                      }
                    
                      // Remove Items from Cart
                      if (isset($_POST['remove_cart'])) {
                          if (isset($_POST['removeitem'])) {
                              foreach ($_POST['removeitem'] as $remove_id) {
                                  $delete_query = "DELETE FROM `cart_details` WHERE product_id=$remove_id";
                                  $run_delete = mysqli_query($conn, $delete_query);
                              }
                              echo "<script>window.open('cart.php','_self')</script>";
                          }
                      }
                    ?>
                </tbody>
              </table>
          </form>

            <!-- subtotal -->
             <div class="d-flex mb-5">
              <?php 
                $get_ip_add = getIPAddress();
                $cart_query= "select * from `cart_details` where ip_address='$get_ip_add'";
                $result=mysqli_query($conn,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0)
                {
                  echo "                  
                    <h4 class='px-3' style='color:white'>Subtotal: <strong class='text-danger'>$total/-</strong></h4>
                    <a href='index.php'><button class='update.btn px-3 mx-3 py-2 btn btn-outline-light submit-btn'>Continue Shopping</button></a>
                    <a href='./users_area/checkout.php'><button class='remove.btn px-3 py-2 btn btn-outline-light submit-btn'>Checkout</button></a>
                  ";
                }
                
                else{
                    echo "
                    <a href='index.php'>
                    <button class='update-btn px-3 mx-3 py-2 btn btn-outline-light submit-btn'>Continue Shopping</button></a>
                    ";
                }
              ?>
             </div>
        </div>
    </div>
    
    <!-- function to remove item -->
    <?php 
      function remove_cart_item()
      {
          global $conn;
          if (isset($_POST['remove_cart'])) {
              if (isset($_POST['removeitem']) && is_array($_POST['removeitem'])) {
                  foreach ($_POST['removeitem'] as $remove_id) {
                      $delete_query = "DELETE FROM `cart_details` WHERE product_id = $remove_id";
                      $run_delete = mysqli_query($conn, $delete_query);
                      if ($run_delete) {
                          echo "<script>alert('Item removed successfully.')</script>";
                          echo "<script>window.open('cart.php', '_self')</script>";
                      }
                  }
              } else {
                  echo "<script>alert('No items selected to remove.')</script>";
              }
          }
      }
      remove_cart_item();
    ?>
    <!-- Last child -->
    <?php 
      include("./includes/footer.php");
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>
