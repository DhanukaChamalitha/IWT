<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `new_user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:home_user.php');
   }else{
      $message[] = 'incorrect email or password!';
   }
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>TravelEagel</title>
        <meta charset="UFT-8">
        <meta name="viweport" content="width=device-width", initial-scale="1.0">

        <!--custom css file-->
        <link rel="stylesheet" href="./style/style.css">

        <!--font css file-->
        <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!--privacy trems css file-->
       
        <link rel="stylesheet" href="./style/stylePriTre.css">

        <!--swipper link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
       
        <!--<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
        -->
        </head>

<body>

<!-- header section starts -->
<header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="./home.html">
        <img  class= "logo"  src="./Image/logo.png" alt="Logo">
    </a>
   
    <nav class="navbar">
        <a class="navitem" href="./Home.php">Home</a>
        <a class="navitem" href="./tour.php">Tour</a>
        <a class="navitem" href="./agency.php">Agency</a>
        <a class="navitem" href="#News">News</a>
        <a class="navitem" href="./contactus.php">Contact Us</a>
        <a class="navitem active" href="./aboutus.php">About Us</a>
    </nav>

    <div class="icons">
        <i class="fas fa-search" id="search-btn"></i>
        <i class="fas fa-user" id="login-btn"></i>
    </div>

    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search here...">
        <label for="search-bar" class="fas fa-search"></label>
    </form>

</header>

<!--header section ends-->

<!--login form container-->


<div class="login-form-container">

    <i class="fas fa-times" id="form-close"></i>

    <form action="" method="post">
        <h3>login</h3>
                <?php
            
            if(isset( $error)){
                foreach($error as $error){
                    echo '<span class="eror-msg">'.$error.'</span>';
                }
            };
            ?>
        <input type="email" name="email" class="box" placeholder="enter your email">
        <input type="password"  name="password" class="box" placeholder="enter your password">
        <input type="submit" name="submit" value="login now" class="btn">
        <p>don't have an account? <a href="register.php">register now</a> </p>
    </form>
</div>


<!--home section start-->

<section class="home" id="home">

<div class="content">
        <h3>find your miracle</h3>
        <h2>destination</h2>
    </div>

    <div class="cotrals">
        <span class="video-btn active" data-src="Image/imagev1.mp4"></span>
        <span class="video-btn" data-src="Image/imagev2.mp4"></span>
        <span class="video-btn" data-src="Image/imagev3.mp4"></span>
        <span class="video-btn" data-src="Image/imagev4.mp4"></span>
        <span class="video-btn" data-src="Image/imagev5.mp4"></span>
    </div>

    <div class="video-container">
        <video src="Image/imagev1.mp4" id="video-slider" loop autoplay muted></video>
    </div>
</section>
<!--home section end-->

<!--content-->

<div class="ful-con">
    <div class="box">
        <h1>About us</h1>
        <div class="content">
     
<p>
        At travel eagle, we believe that travel is a transformative experience. It's a chance to learn about new cultures, 
        meet new people, and see the world in a whole new way. We're passionate about helping people make the most of their travel experiences, 
        and we're committed to providing our clients with the best possible service.</p>
<br>
<p>We offer a wide range of travel and tourism management services,including:</p> 
<br>

            <p>Flight booking<br>Hotel booking<br>Car rental<br>Tour and activity booking<br>Visa and passport processing<br>Travel insurance</p>

<br>
<p>We have a team of experienced travel experts who are dedicated to helping you plan your perfect trip. We will work with you to create a customized itinerary that fits your budget and interests. We will also make sure you have all the necessary travel documentation and that your trip is fully insured.

    We understand that travel can be stressful, but we are here to make it as easy and enjoyable as possible. We will take care of the details so you can relax and focus on enjoying your trip.</p>




        </div>
    </div>
</div>
<!--end content-->

<!--footer section-->

<section class="footer">

    <div class="box-container">
        <div class="box">
            <h3>about us</h3>
            <p>This is our web page</p>
        </div>
        <div class="box">
            <h3>countact us</h3>
            <a href="#">Mobile number</a>
            <a href="#">location</a>
            <a href="#">email</a>
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="./aboutus.php">about us</a>
            <a href="./contactus.php">contact us</a>
            <a href="./news.php">news</a>
            <a href="./privacy.php">Privacy Policy</a>
            <a href="./terms.php">Terms and Conditions</a>
            
        </div>
        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">twitter</a>
            <a href="#">linkedin</a>
        </div>

    </div>    

    <h1 class="credit"> create by <span>TravelEagel</span>|all rigths reserved!</h1>


</section>




<!--footer section end-->

 <!--swipper script-->
 <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


</body>
 <!--custom js file-->
 <script src="./js/script.js"></script>

 <!--swipper script-->
 <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</html>

