<?php 
    include("../includes/connect.php");
    if(isset($_POST["insert_brand"]))
    {
        $brand_title = $_POST["brand_title"];

        // Select data from database
        $select_query = "select * from brand where brand_title='$brand_title'";

        $result_select=mysqli_query($conn, $select_query);

        $number=mysqli_num_rows($result_select);

        if($number > 0){
            echo"<script>alert('Brand already inserted')</script>";
        }
        else{
            $insert="insert into brand(brand_title) values('$brand_title')";
            $result = mysqli_query($conn, $insert);

            if($result)
                echo  "<script>alert('Brand inserted')</script>";
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
<h2 class="text-center" style="color: white;">Insert Brands</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text" id="basic-addon1" style="background-color: #E50914;"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="update-btn p-2 my-3 btn btn-outline-light submit-btn" name="insert_brand" value="Insert Brands" >
    </div>
</form>