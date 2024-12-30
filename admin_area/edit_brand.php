<?php 
    if (isset($_GET['edit_brand'])) {
        $edit_brand=$_GET['edit_brand'];

        $get_brand="Select * from `brand` where brand_id=$edit_brand";
        $result=mysqli_query($conn,$get_brand);

        $row=mysqli_fetch_assoc($result);
        $brand_title=$row['brand_title'];
    }

    if (isset($_POST['edit_bran'])){
        $bran_title=$_POST['brand_title'];

        $update_query="update `brand` set brand_title='$bran_title' where brand_id=$edit_brand";
        $result_bran=mysqli_query($conn,$update_query);
        if($result_bran){
            echo "<script>alert('Brand Updated Successfully');</script>";
            echo "<script>window.open('index.php?view_brands', '_self');</script>";    
        }
    }
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" class="form-control" name="brand_title" id="brand_title" required="required" value="<?php echo $brand_title?>">
        </div>

        <input type="submit" class="btn btn-info px-3 mb-3" value="Update Brand" name="edit_bran">
    </form>
</div>