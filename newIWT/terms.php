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
        <a class="navitem" href="./aboutus.php">About Us</a>
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
        <h1>Terms and Conditions</h1>
        <div class="content">


<p>Please note that the following terms and conditions govern your use of the tourism and travel management system provided by Our company. By accessing or using the system, you agree to abide by these terms and conditions. If you do not agree with any part of these terms, please refrain from using the system.
</p>

<p>
<span>Acceptance of Terms:</span> 
<br>
<span>1.1.</span> By using the tourism and travel management system, you acknowledge that you have read, understood, and agree to be bound by these terms and conditions.
<br> <span>1.2.</span> These terms may be updated or modified from time to time, and it is your responsibility to review them periodically.
 </p>

<p>
<span>User Account:</span>
<br>
<span>2.1.</span> To use the system, you may be required to create a user account. You agree to provide accurate and complete information when creating your account.<br>
<span>2.2.</span> You are responsible for maintaining the confidentiality of your account credentials, and you agree to accept responsibility for all activities that occur under your account.<br>
<span>2.3.</span> You must notify Our company immediately if you suspect any unauthorized use of your account or any other security breach.
</p>

<p>
<span>System Usage:</span><br>
<span>3.1.</span> The tourism and travel management system is provided solely for your personal or internal business use and not for commercial purposes unless explicitly authorized.<br>
<span>3.2.</span> You agree not to use the system in any way that violates any applicable laws, regulations, or the rights of others.<br>
<span>3.3.</span> You are solely responsible for any content or information you upload, transmit, or share through the system.
</p>

<p>
<span>Intellectual Property:</span><br>
<span>4.1.</span> The tourism and travel management system, including all associated software, graphics, designs, and other materials, are owned or licensed by Travel Eagle, and they are protected by intellectual property laws.
<br><span>4.2.</span> You agree not to copy, modify, distribute, transmit, display, reproduce, or create derivative works of the system or any part thereof without prior written consent from our company.
</p>

<p>
<span>Privacy and Data Security:</span><br>
<span>5.1.</span> Our company respects your privacy and handles your personal data in accordance with applicable data protection laws. Please refer to the system's Privacy Policy for more information.<br>
<span>5.2.</span> While Travel Eagle implements reasonable security measures, it cannot guarantee the absolute security of your data. You acknowledge and accept the inherent risks associated with transmitting and storing data online.
</p>

<p>
<span>Limitation of Liability:</span><br>
<span>6.1.</span> The tourism and travel management system is provided on an "as is" and "as available" basis. Our Company makes no warranties or representations of any kind, whether express or implied, regarding the system's availability, functionality, or accuracy.
<br><span>6.2.</span> Our company shall not be liable for any direct, indirect, incidental, consequential, or punitive damages arising out of or in connection with the use or inability to use the system.
</p>

<p>
<span>Termination:</span><br>
<span>7.1.</span>Our Company reserves the right to suspend or terminate your access to the tourism and travel management system at any time and for any reason, without prior notice.
<br><span>7.2.</span> Upon termination, your right to use the system will immediately cease, and any provisions of these terms and conditions that should reasonably survive termination shall continue to apply.
</p>

<p>
<span>Governing Law and Jurisdiction:</span><br>
<span>8.1.</span> These terms and conditions shall be governed by and construed in accordance with the laws.
<br><span>8.2.</span> Any disputes arising out of or in connection with these terms shall be subject to the exclusive jurisdiction of the courts.
</p>

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

