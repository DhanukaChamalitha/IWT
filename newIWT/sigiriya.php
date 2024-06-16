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

        <!--custom main css file-->
        <link rel="stylesheet" href="./style/style.css">

        <!--custom tour css file-->
        <link rel="stylesheet" href="./style/stlyeTour.css">

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
        <a class="navitem" href="./home.php">Home</a>
        <a class="navitem active" href="./tour.php">Tour</a>
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
<!--login form container-->

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



<!--buy tour start-->




<!--buy tour end-->
<script>

function buytour(){
    alert("Please create an account!");
}
</script>

<!--hide content start-->

<section class="select-tour">

    <h1 class="heading-selected" id="tour-header">sigiriya</h1>

    <div class="box-container-selected">
        <div class="box-selected">
            <img class="select-img" id="select-img-top" src="Image/sigiriya.jpeg" alt="">
            <div class="content-selected">
                <h3><i class="fas fa-map-marker-alt"></i>Sigiriya</h3>
                <p id="select-p">The fortress consists of an ancient citadel built by King Kashyapa during the 5th century. The Sigiriya site contains the ruins of an upper palace located on the flat top of the rock, a mid-level terrace that includes the Lion Gate and the mirror wall with its frescoes, the lower palaces clings to the slopes below the rocks. The moats, walls and gardens of the palace extended for a few hundred metres from the base of the rock. The site was both a palace and a fortress. The upper palace on the top of the rock includes cisterns cut into the rock.
                                    The Lion Gate is a monumental gateway that leads to the upper palace. It is formed by the paws of a giant lion, which are carved out of the rock. The mirror wall is a long, polished wall that was once covered in graffiti. It is thought that the wall was used by the women of the palace to admire their reflection.
                                    The frescoes are a series of paintings that were found on the western face of the rock. They depict nude female figures, which are thought to be either portraits of Kadapa's wives and concubines or priestesses performing religious rituals.
                                    Sigiriya is a UNESCO World Heritage Site and is one of the most popular tourist destinations in Sri Lanka. It is a fascinating place to visit and offers stunning views of the surrounding countryside.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price-selected"> $100.00 <span> $150.00</span></div>
            <a href="./register.php"  class="btn" id="buy-btn" onclick="buytour()">book now</a>
            </div>
        </div>
</section>

<!--hide content end-->


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

 <!--custom js file-->
 <script src="./js/scriptTour.js"></script>

 <!--swipper script-->
 <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


</html>

