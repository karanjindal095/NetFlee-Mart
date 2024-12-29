<?php 
  include("includes/connect.php");
  include("./functions/common_function.php");
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Netflee Mart</title>
  <!-- Bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font Awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />

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
            max-width: 90%; 
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
    .mute-button {
      position: absolute;
      bottom: 10px;
      right: 60px;
      z-index: 10;
      background: rgba(0, 0, 0, 0.6);
      border: none;
      border-radius: 50%;
      padding: 10px;
      color: white;
      cursor: pointer;
    }

    .mute-button i {
      font-size: 20px;
      color: white;
    }

    .mute-button:hover {
      background: rgba(0, 0, 0, 0.8);
    }

  </style>

</head>

<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg nav1">
      <div class="container-fluid">
        <img src="images/Netlee logo.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav1Ul">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <?php 
               if(isset($_SESSION['username']))
               {
                echo "
                  <li class='nav-item'>
                    <a class='nav-link' href='users_area/profile.php'>My Account</a>
                  </li>
                ";
              }
              else{
                 echo "
                   <li class='nav-item'>
                     <a class='nav-link' href='users_area/user_registration.php'>Register</a>
                   </li>
                 ";
               }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item()?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Total Price: <?php total_cart_price()?>/-</a>
            </li>
          </ul>
          <form class="d-flex" role="search" action="search_product.php" method="get">
            <input class="form-control me-2 search-input" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <button class="btn btn-outline-light submit-btn" type="submit" name="search_data_product">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <?php 
      cart();
    ?>

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
              <a class='nav-link' href='users_area/user_login.php'>Login</a>
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
              <a class='nav-link' href='users_area/logout.php'>Logout</a>
            </li>
            ";
          }
        ?>
      </ul>
    </nav>

    <div class="bg-light">
    <h3 class="text-center logo-container">
        <img src="images/NetfleeLogo2.png" alt="Netflee Logo" class="responsive-logo">
      </h3>
      <p class="text-center" style="color:#FFFFFF; background-color: #000000ba">Shopping Made Simple, Memories Made Precious(Crafted to Care, Delivered with Heart❤️)</p>
    </div>
    <!-- Slider videos play -->
    <div id="carouselExampleAutoplaying" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a href="product_details.php?product_id=7">
            <video id="video1" src="videos/Redmi Note 13 Pro+ 5G.mp4" class="d-block w-100" style="height: 400px;"></video>
          </a>
          <button id="toggleSound1" class="mute-button">
            <i class="fa-solid fa-volume-xmark"></i>
          </button>
        </div>
        <div class="carousel-item">
          <a href="product_details.php?product_id=8">
            <video id="video2" src="videos/Realme buds air 6.mp4" class="d-block w-100" style="height: 400px;"></video>
          </a>
          <button id="toggleSound2" class="mute-button">
            <i class="fa-solid fa-volume-xmark"></i>
          </button>
        </div>
        <div class="carousel-item">
          <a href="product_details.php?product_id=2">
            <video id="video3" src="videos/Asus Vivobook.mp4" class="d-block w-100" style="height: 400px;"></video>
          </a>
          <button id="toggleSound3" class="mute-button">
            <i class="fa-solid fa-volume-xmark"></i>
          </button>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


<script>

  document.addEventListener("DOMContentLoaded", () => {
    const carousel = document.getElementById("carouselExampleAutoplaying");
    const videos = document.querySelectorAll("video");
    const muteButtons = document.querySelectorAll(".mute-button");

    let currentIndex = 0;
    let isMuted = true; 

    // Function to play the current video
    const playCurrentVideo = () => {
      videos.forEach((video, index) => {
        if (index === currentIndex) {
          video.muted = isMuted; 
          if (video.paused) {
            video.play(); 
          }
        } else {
          video.pause();
          video.currentTime = 0;
        }
      });
    };

    // Update mute/unmute icon for the current slide
    const updateMuteIcon = () => {
      muteButtons.forEach((button, index) => {
        const icon = button.querySelector("i");
        if (index === currentIndex) {
          icon.className = isMuted ? "fa-solid fa-volume-xmark" : "fa-solid fa-volume-high";
        }
      });
    };

    // Add mute/unmute functionality for each video
    muteButtons.forEach((button, index) => {
      button.addEventListener("click", () => {
        if (index === currentIndex) {
          isMuted = !isMuted; 
          videos[currentIndex].muted = isMuted;
          updateMuteIcon(); 
          playCurrentVideo(); 
        }
      });
    });

    // Event listener for next and previous buttons
    carousel.addEventListener("slide.bs.carousel", (event) => {
      const activeIndex = Array.from(carousel.querySelectorAll(".carousel-item")).indexOf(event.relatedTarget);
      currentIndex = activeIndex;
      playCurrentVideo();
      updateMuteIcon();
    });

    // When the current video ends, move to the next slide
    videos.forEach((video, index) => {
      video.addEventListener("ended", () => {
        const carouselItems = document.querySelectorAll(".carousel-item");
        carouselItems[currentIndex].classList.remove("active");
        currentIndex = (currentIndex + 1) % videos.length;
        carouselItems[currentIndex].classList.add("active");
        playCurrentVideo();
        updateMuteIcon();
      });
    });

    // Ensure autoplay and muted state are handled by JavaScript
    window.onload = () => {
      videos.forEach((video) => {
        video.muted = isMuted;
        video.autoplay = true;
      });

      // Make sure the first video starts playing when the page loads
      playCurrentVideo();
      updateMuteIcon();
    };

    // Function to mute/unmute all videos
    window.setAllVideosMuteState = (muteState) => {
      isMuted = muteState; 
      videos.forEach((video) => {
        video.muted = muteState;
      });
      updateMuteIcon(); 

      // Ensure the first video starts playing after unmute
      if (!muteState && videos[currentIndex].paused) {
        videos[currentIndex].play(); 
      }
    };

  });
</script>


    <div class="row px-1">
      <div class="col-md-10">
        <!-- Products -->
        <div class="row">
          <!-- fetching products -->
          <?php
             get_all_products();
             get_unique_categories();
             get_unique_brands();
          ?>
        </div>
      </div>

      <div class="col-md-2 p-0 sidenav">
        <ul class="navbar-nav me-auto text-center sidenavUl">
          <li class="nav-item bg">
            <a href="#" class="nav-link">
              <h4>Delivery Brands</h4>
            </a>
          </li>

          <?php
             getbrands()
          ?>
        </ul>
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg">
            <a href="#" class="nav-link">
              <h4>Categories</h4>
            </a>
          </li>
          <?php
            getcategories()
          ?>
        </ul>
      </div>
    </div>
    <!-- Last child -->
    <?php 
      include("./includes/footer.php");
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>