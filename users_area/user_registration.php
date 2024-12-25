<?php 
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css" />
    <style>
        body{
            background-color: #353535;
        }
        .loginform {
            border: 4px solid rgb(255, 0, 0);
            border-radius: 8px;
            padding: 1.5rem;
            padding-top: 2.5rem;
            position: relative;
            margin-bottom: 10px;
            /* display: inline-block; */
        }

        .loginform legend {
            font-size: 3.25rem;
            width: 316px;
            font-weight: bold;
            color: rgb(255, 0, 0);
            text-shadow: 1px 1px 2px black,0 0 25px red,0 0 5px pink;
            background-color: #353535;
            padding: 0 10px;
            position: absolute;
            top: -2.25rem;
            left: 1.5rem;
        }

        label{
            font-size: 27px;
            color: rgb(255, 0, 0);
            text-shadow: 1px 1px 2px black,0 0 25px red,0 0 5px pink;
        }

        .update-btn{
            background-color: #E50914;
            border-color: #E50914;
            color: #fff;
            font-weight: bold;
            }
        .update-btn:hover{
            color: white;
            background-color:rgb(159, 11, 11);
            border-color: grey; 
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
        
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg nav1">
      <div class="container-fluid">
        <img src="../images/Netlee logo.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav1Ul">
            <li class="nav-item" >
              <a class="nav-link" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

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
              <a class='nav-link' href='user_login.php'>Login</a>
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
              <a class='nav-link' href='logout.php'>Logout</a>
            </li>
            ";
          }
        ?>
      </ul>
    </nav>

    <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6" style="margin-top: 35px;">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Username -->
                    <fieldset class="loginform">
                        <legend class=" mb-4">Registration</legend>
                        <div class="form-outline mb-4">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required" name="user_username">
                        </div>
                        <!-- Email -->
                        <div class="form-outline mb-4">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
                        </div>
                        <!-- Image -->
                        <div class="form-outline mb-4">
                            <label for="user_image" class="form-label">User Image</label>
                            <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                        </div>
                        <!-- password -->
                        <div class="form-outline mb-4">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                        </div>
                        <!-- confirm password -->
                        <div class="form-outline mb-4">
                            <label for="conf_user_password" class="form-label">Confirm Password</label>
                            <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="conf_user_password">
                        </div>
                        <!-- address -->
                        <div class="form-outline mb-4">
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                        </div>
                        <!-- contact -->
                        <div class="form-outline mb-4">
                            <label for="user_contact" class="form-label">Contact</label>
                            <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact number" autocomplete="off" required="required" name="user_contact">
                        </div>
                        <div class="mt-4 pt-2">
                            <input type="submit" value="Register" class="update-btn py-2 px-3 border-0 btn btn-outline-light submit-btn" name="user_register">
                            <p class="small fw-bold mt-2 pt-1 mb-5 text-light">Already have an account? <a href="user_login.php" class="text-danger"> Login</a></p>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <!-- Last child -->
        <?php 
        include("../includes/footer.php");
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
<!-- php code -->
<?php 
    if(isset($_POST['user_register']))
    {
        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        // $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
        $conf_user_password=$_POST['conf_user_password'];
        $user_address=$_POST['user_address'];
        $user_contact=$_POST['user_contact'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        $user_ip=getIPAddress();

        // select query
        $select_query="select * from `user_table` where username='$user_username' or user_email='$user_email'";
        $result=mysqli_query($conn,$select_query);
        $row_count=mysqli_num_rows($result);
        if($row_count>0)
            echo "<script>alert('Username or Email already exist')</script>";
        else if($user_password != $conf_user_password)
            echo "<script>alert('Passwords do not match!')</script>";
        else{
            // insert_query
            move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    
            $insert_query="INSERT INTO `user_table`(username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username','$user_email','$user_password','$user_image','$user_ip','$user_address','$user_contact')";
    
            $sql_execute=mysqli_query($conn,$insert_query);
        }

        // selecting cart items
        $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
        $result_cart=mysqli_query($conn,$select_cart_items);
        $row_count=mysqli_num_rows($result_cart);
        if($row_count>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('You have items in your Cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }
        else{
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
?>