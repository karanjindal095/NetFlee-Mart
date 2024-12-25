<?php 
    // include("./includes/connect.php");

    // getting products
    function getproducts()
    {
        global $conn;

        if(!isset($_GET["category"]))
        {
            if(!isset($_GET["brand"]))
            {
                $select_query="select * from `products` order by rand() LIMIT 0,6";
                $result_query=mysqli_query($conn,$select_query);
        
                while($row=mysqli_fetch_array($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $product_categories=$row['category_id'];
                $product_brands=$row['brand_id'];
        
                echo "<div class='col-md-4 mb-2'>
                        <div class='card item-box'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info add-to-cart-btn'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                        </div>";
                }
            }
        }

    }

    // getting all products
    function get_all_products()
    {
        global $conn;

        if(!isset($_GET["category"]))
        {
            if(!isset($_GET["brand"]))
            {
                $select_query="select * from `products` order by rand()";
                $result_query=mysqli_query($conn,$select_query);
        
                while($row=mysqli_fetch_array($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $product_categories=$row['category_id'];
                $product_brands=$row['brand_id'];
        
                echo "<div class='col-md-4 mb-2'>
                        <div class='card item-box'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                        </div>";
                }
            }
        }

    }
    
    // getting unique categories
    function get_unique_categories()
    {
        global $conn;

        if(isset($_GET["category"]))
        {
            $category_id=$_GET["category"];
            $select_query="select * from `products` where category_id= $category_id";
            $result_query=mysqli_query($conn,$select_query);

            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows == 0)
            {
                echo "<h2 class='text-center text-danger'>No Stock for this Category</h2>";
            }
            while($row=mysqli_fetch_array($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $product_categories=$row['category_id'];
            $product_brands=$row['brand_id'];
    
            echo "<div class='col-md-4 mb-2'>
                    <div class='card item-box'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Price: $product_price/-</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                    </div>";
            }
            
        }
    }

    // getting unique brands
    function get_unique_brands()
    {
        global $conn;

        if(isset($_GET["brand"]))
        {
            $brand_id=$_GET["brand"];
            $select_query="select * from `products` where brand_id= $brand_id";
            $result_query=mysqli_query($conn,$select_query);

            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows == 0)
            {
                echo "<h2 class='text-center text-danger'>No Stock for this Brand</h2>";
            }
            while($row=mysqli_fetch_array($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $product_categories=$row['category_id'];
            $product_brands=$row['brand_id'];
    
            echo "<div class='col-md-4 mb-2'>
                    <div class='card item-box'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Price: $product_price/-</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                    </div>";
            }
            
        }

    }
    

    // display brand in sidenav
    function getbrands()
    {
        global $conn;
        $select_brands="select * from brand";
        $result_brands= mysqli_query($conn,$select_brands);

        while($row_data=mysqli_fetch_assoc($result_brands))
        {
          $brand_title= $row_data["brand_title"];
          $brand_id= $row_data["brand_id"];
          echo "<li class='nav-item'>
          <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li>";
        }
    }

    // display brand in sidenav
    function getcategories()
    {
        global $conn;
        $select_categories="select * from categories";
        $result_categories= mysqli_query($conn,$select_categories);

        while($row_data=mysqli_fetch_assoc($result_categories))
        {
          $category_title= $row_data["category_title"];
          $category_id= $row_data["category_id"];
          echo "<li class='nav-item'>
          <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        </li>";
        }
    }

    // searching products function

    function search_product()
    {
        global $conn;
        if(isset($_GET["search_data_product"]))
        {
            $search_data_value=$_GET['search_data'];
            $search_query="select * from `products` where product_keywords LIKE '%$search_data_value%'";
            $result_query=mysqli_query($conn,$search_query);

            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows == 0)
            {
                echo "<h2 class='text-center text-danger'>No results match. No products found on this category</h2>";
            }
    
            while($row=mysqli_fetch_array($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $product_categories=$row['category_id'];
            $product_brands=$row['brand_id'];
    
            echo "<div class='col-md-4 mb-2'>
                    <div class='card item-box'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Price: $product_price/-</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                    </div>";
            }
        }       
    }

    // view details
    function view_details()
    {
        global $conn;
        if(isset($_GET["product_id"]))
        {
            if(!isset($_GET["category"]))
            {
                if(!isset($_GET["brand"]))
                {
                    $product_id=$_GET["product_id"];

                    $select_query="select * from `products` where product_id= $product_id";
                    $result_query=mysqli_query($conn,$select_query);
            
                    while($row=mysqli_fetch_array($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_image2=$row['product_image2'];
                    $product_image3=$row['product_image3'];
                    $product_price=$row['product_price'];
                    $product_categories=$row['category_id'];
                    $product_brands=$row['brand_id'];
            
                    echo "<div class='col-md-4 mb-2'>
                            <div class='card item-box'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                </div>
                            </div>
                            </div>
                            
                            <div class='col-md-8'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <h4 class='text-center mb-5' style='color:#E50914;border-bottom: 2px solid #E50914;'>
                                            Related Products
                                        </h4>
                                    </div>

                        
                                    <div class='card item-box col-md-5'>
                                        <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                                        <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_description</p>
                                        <p class='card-text'>Price: $product_price/-</p>
                                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                        <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                        </div>
                                    </div>
                                    
                                    <div class='col-md-1'></div>
                                    
                                    <div class='card item-box col-md-5'>
                                        <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                                        <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_description</p>
                                        <p class='card-text'>Price: $product_price/-</p>
                                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                        <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                          
                    }
                }
            }
        }
    }

    // get ip address
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
    // echo 'User Real IP Address - '.$ip;  
    
    // cart function
    // function cart()
    // {
    //     if(isset($_GET['add_to_cart']))
    //     {
    //         global $conn;
    //         $get_ip_add = getIPAddress();  
    //         $get_product_id=$_GET['add_to_cart'];

    //         $select_query= "select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
    //         $result_query=mysqli_query($conn,$select_query);

    //         $num_of_rows=mysqli_num_rows($result_query);
    //         if($num_of_rows > 0)
    //         {
    //             echo "<script> alert('Item is already added to Cart') </script>";
    //             echo "<script> window.open('index.php','_self') </script>";
    //         }
    //         else{
    //             $insert_query= "insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
                
    //             $result_query=mysqli_query($conn,$insert_query);
    //             echo "<script>alert('Item is added to Cart')</script>";
    //             echo "<script>window.open('index.php','_self')</script>";

    //         }
    //     }
    // }
    function cart()
{
    if (isset($_GET['add_to_cart']))
    {
        global $conn;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        // Check if the item is already in the cart
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0)
        {
            echo "<script> alert('Item is already added to Cart') </script>";
            echo "<script> window.open('index.php','_self') </script>";
        }
        else
        {
            // Insert the item into the cart with a default quantity of 1
            $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_add', 1)";
            $result_query = mysqli_query($conn, $insert_query);
            echo "<script>alert('Item is added to Cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


    // get cart item number
    function cart_item()
    {
        if(isset($_GET['add_to_cart']))
        {
            global $conn;
            $get_ip_add = getIPAddress();

            $select_query= "select * from `cart_details` where ip_address='$get_ip_add'";
            $result_query=mysqli_query($conn,$select_query);

            $count_cart_items=mysqli_num_rows($result_query);
        }
        else{
            global $conn;
            $get_ip_add = getIPAddress();

            $select_query= "select * from `cart_details` where ip_address='$get_ip_add'";
            $result_query=mysqli_query($conn,$select_query);

            $count_cart_items=mysqli_num_rows($result_query);
        }
        echo "$count_cart_items";
    }

    // total price function
    function total_cart_price()
    {
        global $conn;
        $get_ip_add = getIPAddress();
        $total=0;

        $cart_query= "select * from `cart_details` where ip_address='$get_ip_add'";
        $result=mysqli_query($conn,$cart_query);
        
        while($row=mysqli_fetch_array($result))
        {
            $product_id=$row['product_id'];
            $select_products="select * from `products` where product_id='$product_id'";
            $result_products=mysqli_query($conn,$select_products);
            while($row_products_price=mysqli_fetch_array($result_products))
            {
                $product_price=array($row_products_price['product_price']);
                $product_values=array_sum($product_price);
                $total += $product_values; 
            }
        }
        echo $total;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Netflee Mart</title> -->
    <style>
        .card.item-box {
            background-color: rgb(40 40 40 / 80%);
            /* border: 2px solid #E50914;   */
            color: #FFFFFF;  
            border: 2px solid grey;
            padding: 15px;
            transition: box-shadow 0.3s ease;  
        }

        .card.item-box .card-title {
            color: #FFFFFF;  
        }

        .card.item-box .card-text {
            color: #B3B3B3; 
        }

        /* Hover effect */
        .card.item-box:hover {
            border: 2px solid #E50914;
            background-color: rgba(34, 31, 31, 0.801);
            box-shadow: 7px 8px 16px rgba(229, 9, 20, 0.8);
            cursor: pointer;
        }

        /* Buttons Styling */
        .card.item-box .btn-info {
            background-color: #E50914;
            border-color: #E50914;
            color: #fff;
        }

        .card.item-box .btn-info:hover {
            background-color: #d2080d;  
        }

        .card.item-box .btn-secondary {
            background-color: #555;
            border-color: #555;
            color: #fff;
        }

        .card.item-box .btn-secondary:hover {
            background-color: #444; 
        }

    </style>
</head>
<body>
    
</body>
</html>