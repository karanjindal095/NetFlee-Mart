<?php 
  include("../includes/connect.php");
  include("../functions/common_function.php");

  if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
  }

  // Initialize variables
  $get_ip_address = getIPAddress();
  $total_price = 0;
  $invoice_number = mt_rand();
  $status = 'pending';

  // Fetch cart details for the current user's IP
  $cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
  $result_cart_price = mysqli_query($conn, $cart_query_price);
  if (!$result_cart_price) {
      die("Query Failed: " . mysqli_error($conn));
  }
  $count_products = mysqli_num_rows($result_cart_price);

  while ($row_price = mysqli_fetch_array($result_cart_price)) {
      $product_id = $row_price['product_id'];
      $quantity = isset($row_price['quantity']) ? $row_price['quantity'] : 1; // Default to 1 if quantity is not set

      // Fetch product price
      $select_product = "SELECT product_price FROM `products` WHERE product_id=$product_id";
      $run_price = mysqli_query($conn, $select_product);
      if ($run_price && $row_product_price = mysqli_fetch_array($run_price)) {
          $product_price = $row_product_price['product_price'];
          $total_price += $product_price * $quantity; // Calculate total for this product
      } else {
          die("Product Query Failed: " . mysqli_error($conn));
      }
  }

  $subtotal = $total_price; // Final total price is already calculated

  $insert_orders="INSERT INTO `user_orders`(`user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES ($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";

  $result_query=mysqli_query($conn,$insert_orders);
  if($result_query){
    echo "<script>alert('Orders are submitted Successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
  }


  // orders pending
  $insert_pending_orders="INSERT INTO `orders_pending`(`user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES ($user_id,$invoice_number,$product_id,$quantity,'$status')";

  $result_pending_orders=mysqli_query($conn,$insert_pending_orders);


  // delete items from cart
  $empty_cart="Delete from `cart_details` where ip_address='$get_ip_address'";
  $result_delete=mysqli_query($conn,$empty_cart);
?>
