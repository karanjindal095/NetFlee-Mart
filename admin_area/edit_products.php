<?php 
    if (isset($_GET['edit_products'])) {
        $edit_id=$_GET['edit_products'];
        $get_data="Select * from `products` where product_id=$edit_id";
        $result=mysqli_query($conn,$get_data);
        $row=mysqli_fetch_assoc($result);
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_image3=$row['product_image3'];
        $product_price=$row['product_price'];

        // fetch category name
        $select_category="Select * from `categories` where category_id=$category_id";
        $result_category=mysqli_query($conn,$select_category);
        $row=mysqli_fetch_assoc($result_category);
        $category_title=$row['category_title'];

        // fetch brand name
        $select_brand="Select * from `brand` where brand_id=$brand_id";
        $result_brand=mysqli_query($conn,$select_brand);
        $row=mysqli_fetch_assoc($result_brand);
        $brand_title=$row['brand_title'];
    }
?>

<style>
    .pro_img{
        width: 100px;
        object-fit: contain;
    }
</style>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" class="form-control" id="product_title" name="product_title" required="required" value="<?php echo $product_title?>">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" class="form-control" id="product_desc" name="product_desc" required="required" value="<?php echo $product_description?>">
        </div>
        
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" class="form-control" id="product_keywords" name="product_keywords" required="required" value="<?php echo $product_keywords?>">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Category</label>
            <select name="product_category" id="" class="form-select">
                <option value="<?php echo $category_id?>"><?php echo $category_title?></option>
                <?php 
                    $select_category_all="Select * from `categories`";
                    $result_category_all=mysqli_query($conn,$select_category_all);
                    while ($row_category=mysqli_fetch_assoc($result_category_all)) {
                        $category_title_all=$row_category['category_title'];
                        $category_id=$row_category['category_id'];
                        echo "<option value='$category_id'>$category_title_all</option>";
                    }
                ?>
                
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" id="" class="form-select">
                <option value="<?php echo $brand_id?>"><?php echo $brand_title?></option>
                <?php 
                    $select_brand_all="Select * from `brand`";
                    $result_brand_all=mysqli_query($conn,$select_brand_all);
                    while ($row_brand=mysqli_fetch_assoc($result_brand_all)) {
                        $brand_title_all=$row_brand['brand_title'];
                        $brand_id=$row_brand['brand_id'];
                        echo "<option value='$brand_id'>$brand_title_all</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" id="product_image1" name="product_image1">
                <img src="product_images/<?php echo $product_image1?>" alt="" class="pro_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" id="product_image2" name="product_image2">
                <img src="product_images/<?php echo $product_image2?>" alt="" class="pro_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" id="product_image3" name="product_image3">
                <img src="product_images/<?php echo $product_image3?>" alt="" class="pro_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" class="form-control" id="product_price" name="product_price" required="required" value="<?php echo $product_price?>">
        </div>

        <div class="text-center">
            <input type="submit" name="edit_products" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>
<?php 
    // if(isset($_POST['edit_products']))
    // {
    //     $product_title=$_POST['product_title'];
    //     $product_desc=$_POST['product_desc'];
    //     $product_keywords=$_POST['product_keywords'];
    //     $product_category=$_POST['product_category'];
    //     $product_brands=$_POST['product_brands'];
    //     $product_price=$_POST['product_price'];

    //     // Accessing image
    //     $product_image1=$_FILES['product_image1']['name'];
    //     $product_image2=$_FILES['product_image2']['name'];
    //     $product_image3=$_FILES['product_image3']['name'];
        
    //     //Accessing image tmp name
    //     $temp_image1=$_FILES['product_image1']['tmp_name'];
    //     $temp_image2=$_FILES['product_image2']['tmp_name'];
    //     $temp_image3=$_FILES['product_image3']['tmp_name'];

    //     move_uploaded_file($temp_image1,"./product_images/$product_image1");
    //     move_uploaded_file($temp_image2,"./product_images/$product_image2");
    //     move_uploaded_file($temp_image3,"./product_images/$product_image3");

    //     // update query
    //     $update_products="UPDATE `products` SET product_title='$product_title',product_description='$product_desc',product_keywords='$product_keywords', category_id='$product_category',brand_id='$product_brands',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price',date=NOW() where product_id=$edit_id";

    //     $result_update=mysqli_query($conn,$update_products);
    //     if($result_update){
    //         echo "<script>alert('Product Updated Successfully')</script>";
    //         echo "<script>window.open('./insert_product.php','_self')</script>";
    //     }
    // }
?>

<?php
if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];

    // Fetch product data
    $get_data = "SELECT * FROM `products` WHERE product_id=$edit_id";
    $result = mysqli_query($conn, $get_data);
    if (!$result || mysqli_num_rows($result) == 0) {
        die("Product not found.");
    }
    $row = mysqli_fetch_assoc($result);

    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    // Fetch category name
    $select_category = "SELECT category_title FROM `categories` WHERE category_id=$category_id";
    $result_category = mysqli_query($conn, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category ? $row_category['category_title'] : "Unknown";

    // Fetch brand name
    $select_brand = "SELECT brand_title FROM `brand` WHERE brand_id=$brand_id";
    $result_brand = mysqli_query($conn, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand ? $row_brand['brand_title'] : "Unknown";
}

if (isset($_POST['edit_products'])) {
    $product_title = $_POST['product_title'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];

    // Accessing images
    $new_image1 = $_FILES['product_image1']['name'];
    $new_image2 = $_FILES['product_image2']['name'];
    $new_image3 = $_FILES['product_image3']['name'];

    // Keeping old images if new ones are not uploaded
    $product_image1 = $new_image1 ?: $product_image1;
    $product_image2 = $new_image2 ?: $product_image2;
    $product_image3 = $new_image3 ?: $product_image3;

    // Moving uploaded files
    if ($new_image1) move_uploaded_file($_FILES['product_image1']['tmp_name'], "./product_images/$new_image1");
    if ($new_image2) move_uploaded_file($_FILES['product_image2']['tmp_name'], "./product_images/$new_image2");
    if ($new_image3) move_uploaded_file($_FILES['product_image3']['tmp_name'], "./product_images/$new_image3");

    // Update query
    $update_products = "UPDATE `products` SET 
        product_title='$product_title', 
        product_description='$product_desc', 
        product_keywords='$product_keywords', 
        category_id='$product_category', 
        brand_id='$product_brands', 
        product_image1='$product_image1', 
        product_image2='$product_image2', 
        product_image3='$product_image3', 
        product_price='$product_price', 
        date=NOW() 
        WHERE product_id=$edit_id";

    $result_update = mysqli_query($conn, $update_products);
    if ($result_update) {
        echo "<script>alert('Product Updated Successfully');</script>";
        echo "<script>window.open('./index.php', '_self');</script>";
    } else {
        echo "<script>alert('Error updating product.');</script>";
    }
}
?>


