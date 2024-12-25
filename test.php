<?php 
  include("includes/connect.php");
  include("./functions/common_function.php");
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
  </style>

</head>

<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-info">
      <div class="container-fluid">
        <img src="images/logo.webp" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item()?></sup></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php 
      cart();
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto px-1">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
      </ul>
    </nav>

    <!-- third child -->
    <div class="bg-light">
      <h3 class="text-center">Netflee Mart</h3>
      <p class="text-center">Shopping Made Simple, Memories Made Precious(Crafted to Care, Delivered with Heart❤️)</p>
    </div>

    <!-- fourth child -->
    <div class="container">
        <div class="row">
          <form action="" method="post">
            <table class="table table-bordered text-center">
              <tbody>
                <!-- php code to display dynamic data -->
                  <?php
                      $get_ip_add = getIPAddress();
                      $total=0;
                      
                      $cart_query= "select * from `cart_details` where ip_address='$get_ip_add'";
                      $result=mysqli_query($conn,$cart_query);
                      $result_count=mysqli_num_rows($result);
                      if($result_count>0)
                      {
                        echo "<thead>
                              <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                              </tr>
                            </thead>";
                        while($row=mysqli_fetch_array($result))
                        {
                            $product_id=$row['product_id'];
                            $select_products="select * from `products` where product_id='$product_id'";
                            $result_products=mysqli_query($conn,$select_products);
                            while($row_products_price=mysqli_fetch_array($result_products))
                            {
                              $product_price=array($row_products_price['product_price']);
                              $price_table=$row_products_price['product_price'];
                              $product_title=$row_products_price['product_title'];
                              $product_image1=$row_products_price['product_image1'];
                              $product_values=array_sum($product_price);
                              $total += $product_values; 
                    ?>
                    <tr>
                      <td><?php echo $product_title ?></td>
                      <td>
                        <img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img">
                      </td>
                      <td>
                        <input type="text" name="qty" id="" class="form-input w-50">
                        <?php
                          $get_ip_add = getIPAddress();
                          if(isset($_POST['update_cart']))
                          {
                            $quantities=$_POST['qty'];
                            $update_cart="update cart_details set quantity=$quantities where ip_address='$get_ip_add'";
                            $result_products_quantity=mysqli_query($conn,$update_cart);
                            $total=$total*$quantities;
                          }
                        ?>
                      </td>
                      <td>
                        <?php echo $price_table ?>/-
                      </td>
                      <td>
                        <input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>">
                      </td>
                      <td>
                         <input type="submit" value="Update Cart" name="update_cart" class="bg-info px-3 border-0 mx-3 py-2">
                         <input type="submit" value="Remove Cart" name="remove_cart" class="bg-info px-3 border-0 mx-3 py-2">
                      </td>
                    </tr>
                    <?php
                          }
                      }
                    }
                    else{
                      echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
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
                  <h4 class='px-3'>Subtotal: <strong class='text-info'>$total/-</strong></h4>
                  <a href='index.php'>
                      <button class='bg-info px-3 border-0 mx-3 py-2'>Continue Shopping</button>
                  </a>
                  <a href='#'><button class='bg-secondary  px-3 border-0 py-2 text-light'>Checkout</button></a>
                  ";
                }
                
                else{
                    echo "
                    <a href='index.php'>
                    <button class='bg-info px-3 border-0 mx-3 py-2'>Continue Shopping</button></a>
                    ";
                }
              ?>
             </div>
        </div>
    </div>
    
    <!-- function to remove item -->
    <?php 
      // function remove_cart_item()
      // {
      //   global $conn;
      //   if(isset($_POST['remove_cart']))
      //   {
      //     foreach($_POST['removeitem'] as $remove_id)
      //     {
      //       echo $remove_id;
      //       $delete_query="Delete from `cart_details` where product_id=$remove_id";
      //       $run_delete=mysqli_query($conn,$delete_query);
      //       if($run_delete)
      //       {
      //         echo "<script>window.open('cart.php','_self')</script>";
      //       }
      //     }
      //   }
      // }

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