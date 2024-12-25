<?php 
    include('../includes/connect.php');
    include('../functions/common_function.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <style>
        body{
            background-color:  #292929;
            overflow-x: hidden;
        }
        .loginform {
            border: 4px solid rgb(255, 0, 0);
            border-radius: 8px;
            padding: 1.5rem;
            padding-top: 2.5rem;
            position: relative;
            /* display: inline-block; */
        }

        .loginform legend {
            font-size: 3.25rem;
            font-weight: bold;
            color: rgb(255, 0, 0);
            text-shadow: 1px 1px 2px black,0 0 25px red,0 0 5px pink;
            background-color: #fff;
            padding: 0 10px;
            position: absolute;
            top: -2.25rem;
            left: 1.5rem;
            width: 300px;
            background-color:  #292929;
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
    </style>
</head>
<body>
    <div class="container-fluid my-3 ">
        <!-- <h2 class="text-center">User Login</h2> -->
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6 ">
                <form action="" method="post">
                    <!-- Username -->
                    <fieldset class="loginform">
                        <legend>User Login</legend>
                        <div class="form-outline mb-4">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required" name="user_username">
                        </div>
                        
                        <!-- password -->
                        <div class="form-outline mb-4">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                        </div>
                        
                        <div class="mt-4 pt-2">
                            <input type="submit" value="Login" class="update-btn py-2 px-3 border-0 btn btn-outline-light submit-btn" name="user_login">
                            <p class="small fw-bold mt-2 pt-1 mb-0 text-light">Don't have an account? <a href="user_registration.php" class="text-danger"> Register</a></p>
                        </div>
                    </fieldset>    
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
    // if(isset($_POST['user_login']))
    // {
    //     $user_username=$_POST['user_username'];
    //     $user_password=$_POST['user_password'];

    //     $select_query="Select * from `user_table` where username='$user_username'";
    //     $result=mysqli_query($conn,$select_query);
    //     $row_count=mysqli_num_rows($result);
    //     $row_data=mysqli_fetch_assoc($result);
    //     if($row_count>0)
    //     {
    //         // if(password_verify($user_password,$row_data['user_password']))
    //         if($user_password == $row_data['user_password'])
    //             echo "<script>alert('Login Successful')</script>";
    //         else
    //             echo "<script>alert('Invalid Credentials')</script>";
    //     }
    //     else
    //         echo "<script>alert('Invalid Credentials')</script>";
    // }

    if (isset($_POST['user_login'])) {
    
        $user_username = trim($_POST['user_username']); 
        $user_password = trim($_POST['user_password']); 
    
        // Query to select user
        $select_query = "SELECT * FROM `user_table` WHERE username='$user_username'";
        echo "Query: $select_query<br>"; // Debugging
        $result = mysqli_query($conn, $select_query);
    
        $row_count = mysqli_num_rows($result);
    
        if ($row_count > 0) {
            $row_data = mysqli_fetch_assoc($result);
    
            // Compare passwords
            if ($user_password === $row_data['user_password']) {
                echo "<script>alert('Login Successful')</script>";
            } else {
                echo "<script>alert('Invalid Password')</script>";
            }
        } else {
            echo "<script>alert('Invalid Username')</script>";
        }
    }
    
?>