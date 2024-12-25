<?php 
  include("../includes/connect.php");
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Netflee Mart Checkout Page</title>
  <!-- Bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font Awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../style.css" />

  <style>
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
    .responsive-logo {
        max-width: 100%;
        max-height: 100px;
        display: block;  
        margin: 0 auto;  
        border-radius: 20px;
        filter: drop-shadow(10px 10px 20px black);
        transition: transform 0.3s ease, filter 0.3s ease;
    }
    .responsive-logo:hover {
        transform: scale(1.2); 
        filter: drop-shadow(15px 15px 30px black); 
    }
    .logo-container {
        max-width: 100%;
        padding: 10px;
        text-align: center;
        margin: auto;
        background-color: #000000ba;
        background-color: #c41919;
        box-shadow: inset 0 0 90px black;
    }

    @media (max-width: 600px) {
        .logo-container {
            max-width: 100%; 
            max-height:60%;
        }
    }
    body{
        background-color: black;
        overflow-x: hidden;
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

    /* Side Nav container */
    .sidenav {
        background-color: #1F1F1F; 
        }

    /* Style for regular links */
    .sidenav .nav-link {
        color: #FFFFFF; 
        }

    /* Active link - change color to Netflix red */
    .sidenav .nav-link.active {
        color: #E50914;
        }

    /* Hover effect for links */
    .sidenav .nav-link:hover {
        background-color: #333333; 
        color: #FFFFFF; 
        }

    /* Optional: Style for the 'Delivery Brands' section */
    .sidenav .nav-item.bg {
        background-color: #333333; 
        background-color: #E50914; 
        }

        /* Style for search input */
    .search-input {
    background-color: transparent; 
    border: 2px solid grey; 
    color: grey; 
    }

    .search-input::placeholder {
    color: grey; 
    }

    /* Style for submit button */
    .submit-btn {
    border-color: grey; 
    }

    .submit-btn:hover {
    background-color: red; 
    border-color: red; 
    color: #FFFFFF;
    }

    .search-input:focus {
    outline: none; 
    box-shadow: none; 
    border-color: 2px solid #FFFFFF; 
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
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_registration.php">Register</a>
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

    <div class="bg-light">
      <!-- <h3 class="text-center">Netflee Mart</h3> -->
      <h3 class="text-center logo-container">
        <img src="../images/NetfleeLogo2.png" alt="Netflee Logo" class="responsive-logo">
      </h3>
      <p class="text-center" style="color:#FFFFFF; background-color: #000000ba">Shopping Made Simple, Memories Made Precious(Crafted to Care, Delivered with Heart❤️)</p>
    </div>

    <div class="row px-1">
      <div class="col-md-12">
        <div class="row">
            <?php 
                if(!isset($_SESSION['username'])){
                    include('user_login.php');
                }
                else{
                    include('payment.php');
                }
            
            ?>
        </div>
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