<?php 
    include("../includes/connect.php");
    if(isset($_POST["insert_cat"]))
    {
        $category_title = $_POST["cat_title"];

        // Select data from database
        $select_query = "select * from categories where category_title='$category_title'";

        $result_select=mysqli_query($conn, $select_query);

        $number=mysqli_num_rows($result_select);

        if($number > 0){
            echo"<script>alert('Category already inserted')</script>";
        }
        else{
            $insert="insert into categories(category_title) values('$category_title')";
            $result = mysqli_query($conn, $insert);

            if($result)
                echo  "<script>alert('Category inserted')</script>";
        }
    }
?>
<style>
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
</style>
<h2 class="text-center" style="color: white;">Insert Categories</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text" id="basic-addon1" style="background-color: #E50914;"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Categories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="update-btn p-2 my-3 btn btn-outline-light submit-btn" name="insert_cat" value="Insert Categories" >
    </div>
</form>