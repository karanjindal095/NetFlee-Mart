<?php 
    include('../includes/connect.php');
    if(isset($_POST['insert_product']))
    {
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_categories=$_POST['product_categories'];
        $product_brands=$_POST['product_brands'];
        $product_price=$_POST['product_price'];
        $product_status="true";

        // Accessing image
        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];
        
        //Accessing image tmp name
        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];

        if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_categories=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='')
        {
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        }
        else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            // insert query
            $insert_products="INSERT INTO `products` (product_title,product_description,product_keywords, category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) VALUES ('$product_title', '$product_description','$product_keywords','$product_categories','$product_brands','$product_image1','$product_image2', '$product_image3','$product_price',NOW(),'$product_status')";

            $result_query=mysqli_query($conn,$insert_products);
            if($result_query){
                echo "<script>alert('Successfully Inserted the products')</script>";
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
     <!-- Bootstrap link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../style.css" />
</head>
<body class="bg-light">
    <h1 class="text-center">Insert Products</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <!-- Title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" class="form-control" name="product_title" id="product_title" auto-complete="off" required="required" placeholder="Enter Product Title">
        </div>
        
        <!-- Description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" class="form-control" name="product_description" id="product_description" auto-complete="off" required="required" placeholder="Enter Product Description">
        </div>
        
        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" class="form-control" name="product_keywords" id="product_keywords" auto-complete="off" required="required" placeholder="Enter Product Keywords">
        </div>
        
        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
           <select name="product_categories" id="product_categories" class="product_category form-select">
               <option value="">Select a Category</option>
               <?php 
                    $select_query = "select * from categories";
                    $resust_query = mysqli_query($conn,$select_query);
                    while($row=mysqli_fetch_assoc($resust_query))
                    {
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
               ?>
            </select>
        </div>

        <!-- brands -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brands" id="product_brands" class="product_brand form-select">
                <option value="">Select a Brand</option>
                <?php 
                    $select_query = "select * from brand";
                    $resust_query = mysqli_query($conn,$select_query);
                    while($row=mysqli_fetch_assoc($resust_query))
                    {
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
               ?>
            </select>
        </div>

        <!-- Image 1 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product image 1</label>
            <input type="file" class="form-control" name="product_image1" id="product_image1"  required="required">
        </div>

        <!-- Image 2 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product image 2</label>
            <input type="file" class="form-control" name="product_image2" id="product_image2"  required="required">
        </div>
        
        <!-- Image 3 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Product image 3</label>
            <input type="file" class="form-control" name="product_image3" id="product_image3"  required="required">
        </div>

         <!-- price -->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" class="form-control" name="product_price" id="product_price" auto-complete="off" required="required" placeholder="Enter Product Price">
        </div>

         <!-- button -->
         <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
        </div>
    </form>
</body>
</html>