<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `new_user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `new_user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `new_user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
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
        <a class="navitem" href="./home_user.php">Home</a>
        <a class="navitem active" href="./tour_user.php">Tour</a>
        <a class="navitem" href="./agency_user.php">Agency</a>
        <a class="navitem" href="#News">News</a>
        <a class="navitem" href="#Contact Us">Contact Us</a>
        <a class="navitem" href="./aboutus_user.php">About Us</a>
    </nav>

    <div class="icons">
        <i class="fas fa-search" id="search-btn"></i>
        <i class="fas fa-user" id="login-btn"></i>
        <!--<a href="./login.php"></a>-->
    </div>

    <h1>welcome <span><?php echo $_SESSION['user_name']?></span></h1>


    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search here...">
        <label for="search-bar" class="fas fa-search"></label>
    </form>

</header>

<!--header section ends-->


<!--login form container-->
<div class="login-form-container">

    <i class="fas fa-times" id="form-close"></i>
<?php
      $select = mysqli_query($conn, "SELECT * FROM `new_user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
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

<!--tranding tour starts-->
<section class="trande" id="trande">
    <h1 class="heading">

        <span>t</span>
        <span>r</span>
        <span>e</span>
        <span>n</span>
        <span>d</span>
        <span>i</span>
        <span>n</span>
        <span>g</span>
        <span class="space"></span>
        <span>d</span>
        <span>e</span>
        <span>s</span>
        <span>t</span>
        <span>i</span>
        <span>n</span>
        <span>a</span>
        <span>t</span>
        <span>i</span>
        <span>o</span>
        <span>n</span>
        <span>s</span>

    </h1>

    <div class="box-container">
        <div class="box">
            <img src="Image/sigiriya.jpeg" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i>Sirigiya</h3>
                <p>Siriya is a rock.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price"> $100.00 <span> $150.00</span></div>
                <a href="./sigiriya_user.php" class="btn">visit tour</a>
            </div>
        </div>

        <div class="box">
            <img id="select-img" src="Image/ambuwawa.jpeg" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i>Ambuluwawa</h3>
                <p>Siriya is a rock.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price"> $100.00 <span> $150.00</span></div>
                <a href="#" class="btn">visit tour</a>
            </div>
        </div>

        <div class="box">
            <img src="Image/mirissa.jpeg" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i>Mirissa</h3>
                <p>Siriya is a rock.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price"> $100.00 <span> $150.00</span></div>
                <a href="#" class="btn">visit tour</a>
            </div>
        </div>
   

    <div class="box">
        <img src="Image/nuwaraeliya.jpeg" alt="">
        <div class="content">
            <h3><i class="fas fa-map-marker-alt"></i>Sirigiya</h3>
            <p>Siriya is a rock.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $100.00 <span> $150.00</span></div>
            <a href="#" class="btn">visit tour</a>
        </div>
    </div>

    <div class="box">
        <img src="Image/palama.jpeg" alt="">
        <div class="content">
            <h3><i class="fas fa-map-marker-alt"></i>Sirigiya</h3>
            <p>Siriya is a rock.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $100.00 <span> $150.00</span></div>
            <a href="#" class="btn">visit tour</a>
        </div>
    </div>

    <div class="box">
        <img src="Image/sigiriya.jpeg" alt="">
        <div class="content">
            <h3><i class="fas fa-map-marker-alt"></i>Sirigiya</h3>
            <p>Siriya is a rock.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $100.00 <span> $150.00</span></div>
            <a href="#" class="btn">visit tour</a>
        </div>
    </div>
</div>

</section>
<!--tranding tour end-->

<!--tranding tour starts-->
<section class="trande" id="trande">
    <h1 class="heading">

        <span>r</span>
        <span>e</span>
        <span>c</span>
        <span>e</span>
        <span>n</span>
        <span>t</span>
        <span class="space"></span>
        <span>t</span>
        <span>o</span>
        <span>u</span>
        <span>r</span>
        <span>s</span>
    </h1>

    <div class="box-container">
        <div class="box">
            <img src="Image/sigiriya.jpeg" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i>Sirigiya</h3>
                <p>Siriya is a rock.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <div class="price"> $100.00 <span> $150.00</span></div>
                <a href="#" class="btn">visit tour</a>
            </div>
        </div>

        <div class="box">
            <img id="select-img" src="Image/ambuwawa.jpeg" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i>Ambuluwawa</h3>
                <p>Siriya is a rock.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price"> $100.00 <span> $150.00</span></div>
                <a href="#" class="btn" onclick="changeHeader()">visit tour</a>
            </div>
        </div>

        <div class="box">
            <img src="Image/mirissa.jpeg" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i>Mirissa</h3>
                <p>Siriya is a rock.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price"> $100.00 <span> $150.00</span></div>
                <a href="#" class="btn">visit tour</a>
            </div>
        </div>
   

    <div class="box">
        <img src="Image/nuwaraeliya.jpeg" alt="">
        <div class="content">
            <h3><i class="fas fa-map-marker-alt"></i>Sirigiya</h3>
            <p>Siriya is a rock.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $100.00 <span> $150.00</span></div>
            <a href="#" class="btn">visit tour</a>
        </div>
    </div>

    <div class="box">
        <img src="Image/palama.jpeg" alt="">
        <div class="content">
            <h3><i class="fas fa-map-marker-alt"></i>Sirigiya</h3>
            <p>Siriya is a rock.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $100.00 <span> $150.00</span></div>
            <a href="#" class="btn">visit tour</a>
        </div>
    </div>

    <div class="box">
        <img src="Image/sigiriya.jpeg" alt="">
        <div class="content">
            <h3><i class="fas fa-map-marker-alt"></i>Sirigiya</h3>
            <p>Siriya is a rock.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $100.00 <span> $150.00</span></div>
            <a href="#" class="btn">visit tour</a>
        </div>
    </div>
</div>

</section>

<!--search tour start-->



<!--search tour start-->


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
            <a href="./aboutus_user.php">about us</a>
            <a href="#">contact us</a>
            <a href="#">news</a>
            <a href="./privacy_user.php">Privacy Policy</a>
            <a href="./terms_user.php">Terms and Conditions</a>
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

