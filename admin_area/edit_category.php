<?php 
    if (isset($_GET['edit_category'])) {
        $edit_category=$_GET['edit_category'];

        $get_category="Select * from `categories` where category_id=$edit_category";
        $result=mysqli_query($conn,$get_category);

        $row=mysqli_fetch_assoc($result);
        $category_title=$row['category_title'];
    }

    if (isset($_POST['edit_cat'])){
        $cat_title=$_POST['category_title'];

        $update_query="update `categories` set category_title='$cat_title' where category_id=$edit_category";
        $result_cat=mysqli_query($conn,$update_query);
        if($result_cat){
            echo "<script>alert('Category Updated Successfully');</script>";
            echo "<script>window.open('index.php?view_categories', '_self');</script>";    
        }
    }
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" class="form-control" name="category_title" id="category_title" required="required" value="<?php echo $category_title?>">
        </div>

        <input type="submit" class="btn btn-info px-3 mb-3" value="Update Category" name="edit_cat">
    </form>
</div>