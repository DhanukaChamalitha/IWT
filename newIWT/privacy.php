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

        <!--swipper link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

        <!--privacy trems css file-->
       
        <link rel="stylesheet" href="./style/stylePriTre.css">

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
        <h1>Privacy Policy</h1>
        <div class="content">
<p>
At Travel Eagle, we understand the importance of privacy and are committed to protecting the personal information of our users. This Privacy Policy outlines how we collect, use, disclose, and safeguard the personal information of individuals who interact with our Tourism and Travel Management System. Please read this policy carefully to understand our practices regarding your personal information.
</p>
<h2>1. Information We Collect:</h2>
<p>
    We may collect the following types of personal information:
    - Contact information (such as name, email address, phone number) provided by users during registration or booking processes.
    - Travel-related information (such as travel preferences, itinerary details, flight information) provided by users or obtained from travel agencies, airlines, or other travel service providers.
    - Payment information (such as credit card details) for processing transactions related to travel bookings.
    - Usage information, including IP addresses, browser type, and operating system, obtained through the use of cookies and similar technologies when you interact with our system.
</p>


<h2>2. Use of Information:</h2>
<p>
    We use the collected information for the following purposes:
    - To provide and personalize the services offered through our Tourism and Travel Management System.
    - To process and fulfill travel bookings and reservations.
    - To communicate with users regarding their bookings, changes, updates, or other relevant information.
    - To improve and enhance our system's functionality, features, and user experience.
    - To analyze user behavior and trends, and to perform statistical analysis.
    - To prevent fraud, unauthorized access, or other illegal activities.
    - To comply with legal obligations and resolve any disputes.
</p>


<h2>3. Sharing of Information:</h2>
<p>
    We may share your personal information with the following entities, only to the extent necessary to fulfill the purposes described in this Privacy Policy:
    - Travel service providers, such as airlines, hotels, car rental companies, or tour operators, to facilitate your travel bookings and reservations.
    - Third-party vendors, contractors, and service providers who assist us in operating our system and providing the requested services.
    - Legal and regulatory authorities, when required to comply with applicable laws, regulations, or legal processes.
    - Other users, with your explicit consent or as necessary to fulfill your travel arrangements, such as sharing your contact details with travel companions.
</p>


<h2>4. Data Security:</h2>
<p>
    We implement appropriate technical and organizational measures to protect the security and confidentiality of your personal information. However, please note that no method of transmission over the internet or electronic storage is entirely secure, and we cannot guarantee absolute security.
</p>

<h2>5. Data Retention:</h2>
<p>We retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law.
</p>

<h2>6. Your Rights:</h2>
<p>You have certain rights regarding your personal information, including the right to access, correct, update, or delete the information we hold about you. You may also have the right to object to or restrict certain processing activities. To exercise these rights, please contact us using the information provided at the end of this policy.
</p>

<h2>7. Third-Party Links:</h2>
<p>Our Tourism and Travel Management System may contain links to third-party websites or services. We are not responsible for the privacy practices or content of such third parties. We encourage you to read the privacy policies of any third-party websites you visit.
</p>

<h2>8. Updates to the Privacy Policy:</h2>
<p>We may update this Privacy Policy from time to time to reflect changes in our practices or legal obligations. We will post the updated policy on our website, and the revised date will indicate the effective date of the changes.
</p>

<h3>
By using our Tourism and Travel Management System, you consent to the collection, use, and disclosure of your personal information as described in this Privacy Policy.
</h3>

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

