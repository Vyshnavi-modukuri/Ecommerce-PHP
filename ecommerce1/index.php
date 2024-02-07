<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<?php session_start();?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="icon" type="image/png" href="products/T.jpg" sizes="64x64"/>
 <title>Trendzz</title>
  <link href="index1.css" rel="stylesheet" />
   
  <link rel="stylesheet" 
        href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        crossorigin="anonymous">
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
  <header class="containerHeader">
        <nav class="flex space-between text-size fixed-top nav-links">
            <div class="left flex items-center">
                <img style="height:28px;width: 35px;" src="products/T.jpg"/>
                <ul class="flex items-center justify-center uppercase semibold">
                    <li><a href="men.php">Men</a></li>
                    <li><a href="women.php">Women</a></li>
                    <li><a href="kids.php">Kids</a></li>
                    <li><a href="home.php">Home and Living</a></li>
                    <li><a href="beauty.php">Beauty</a></li>
                    <li><a href="foot.php">Footwear</a></li>
        
                </ul>
            </div>
            <div class="right flex items-center">
                <form action="search.php" method="get">
    <input class="search" name="searchTerm" placeholder="Search for products, brands and more" class="desktop-searchBar" value="" data-reactid="904">
    <button type="submit"><span class="fa fa-search"></span></button>
</form>
                <div class="rightBox">
                    <?php
                    
                    if(isset($_SESSION['username'])) {
                        // If the user is signed in, display "Profile," "Bag," and "Logout"
                        echo '<div class="profile mx-2"><a href="profile.php">Profile</a></div>';
                        echo '<a href="cart.php"><span class="fa fa-shopping-cart">&nbsp&nbsp</span></button>';
                        echo '<a href="wishlist.php"><span class="fa fa-heart">&nbsp&nbsp</span></button>';
                        echo '<a href="logout.php"><button>Logout</button></a>';
                    } else {
                        // If the user is not signed in, display "Sign In"
                        echo '<div class="profile mx-2"><a href="login.php">Sign-in</a></div>';
                        echo '<a href="login.php"><button onclick="wish()"><span class="fa fa-heart"></span></button></a>';
                    }   
                    ?>
                </div>
            </div>
        </nav>
    </header>
  <section class="container section2">
    <div class="slideshow-container">
        <div class="mySlides fade">
          <a href="women.php"><img src="products/slide4.png" style="width:100%"></a>
        </div>
        
        <div class="mySlides fade">
            <a href="handbag.html"><img src="products/slide6.png" style="width:100%"></a>
        </div>
        
        <div class="mySlides fade">
            <a href="men.php"><img src="products/slide3.png" style="width:100%"></a>
        </div>
        
        <div class="mySlides fade">
           <img src="products/slide7.png" style="width:100%">
          </div>
        
        <div class="mySlides fade">
            <img src="products/slide5.png" style="width:100%">
          </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot"></span> 
          <span class="dot"></span> 
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>
    <img style="width:100%;" class="homeImg" src="products/slidedown.png"/>
  </section>
  <h1 style="font-family:'Poppins','sans-serif';padding-left:5px;padding-bottom:3px;text-align: center;font-style: oblique;">Stylera</h1>
  <section class="section1 flex flex-wrap">
    <a href="women.html"><img class="itemImg" src="https://assets.myntassets.com/f_webp,w_140,c_limit,fl_progressive,dpr_2.0/assets/images/2022/5/2/f7575784-edbf-411f-acc0-51891ea7f4331651484798329-Inddus-_Varanga.jpg"/></a>
    <img class="itemImg" src="https://assets.myntassets.com/f_webp,w_140,c_limit,fl_progressive,dpr_2.0/assets/images/2022/5/2/ce40419d-6408-404e-9320-96e41aee1b791651484798300-Hrx-_Puma_-_More.jpg"/>
    <a href="kids.php"><img class="itemImg" src="https://assets.myntassets.com/f_webp,w_140,c_limit,fl_progressive,dpr_2.0/assets/images/2022/5/2/44192c45-7393-4ede-a926-11f30b0b92a51651484798036-All.jpg"/></a>
    <a href="foot.php"><img class="itemImg" src="https://assets.myntassets.com/f_webp,w_140,c_limit,fl_progressive,dpr_2.0/assets/images/2022/5/2/764761e7-c505-459e-92a2-6c4387f9e2511651484798319-Hush_Puppies-_Arrow.jpg"/></a> 
    <a href="foot.php"><img class="itemImg" src="https://assets.myntassets.com/f_webp,w_140,c_limit,fl_progressive,dpr_2.0/assets/images/2022/5/2/2f424664-e746-4af1-b0e1-366ccb0f2c681651484798552-Red_Tape.jpg"/></a>
  </section>
  <h1 style="font-family:'Poppins','sans-serif';padding-left:5px;padding-bottom:3px;text-align: center;font-style: oblique;">Pick Your Flavor</h1>

    <div class="shop-category-container">
      <div class="set-container">
        <div class="inside-category">
          <a href="women.php"><img style="border-radius:10px;" src="products/ethnic1.png"  height="300px" width="250px"></a><br>
        </div>
        <div class="inside-category">
            <a href="ww.php"><img style="border-radius:10px;" src="products/western1.png"  height="300px" width="250px"></a><br>
        </div>
        <div class="inside-category">
            <a href="jewel.php"><img style="border-radius:10px;" src="products/jewel1.png"  height="300px" width="250px"></a><br>
        </div> 
        <div class="inside-category">
          <img style="border-radius:10px;" src="products/sports1.png"  height="300px" width="250px"><br>
        </div>
      </div>
      <div class="set-container">
          <div class="inside-category">
            <a href="kids.php"><img style="border-radius:10px;" src="products/kids1.png"  height="300px" width="250px"></a><br>
          </div>
          <div class="inside-category">
              <a href="ww.html"><img style="border-radius:10px;" src="products/office1.png"  height="300px" width="250px"></a><br>
          </div>
          <div class="inside-category">
            <a href="foot.php"><img style="border-radius:10px;" src="products/foot1.png"  height="300px" width="250px"></a><br>
          </div>
          <div class="inside-category">
              <a href="watch.html"><img style="border-radius:10px;" src="products/watches1.png"  height="300px" width="250px"></a><br>
          </div>
      </div>
      <div class="set-container">
        <div class="inside-category">
          <a href="beauty.php"><img style="border-radius:10px;" src="products/beauty1.png"  height="300px" width="250px"></a><br>
        </div>
        <div class="inside-category">
          <img style="border-radius:10px;" src="products/accessories1.png"  height="300px" width="250px"><br>
        </div>
        <div class="inside-category">
          <img style="border-radius:10px;" src="products/bags1.png"  height="300px" width="250px"><br>
        </div>
        <div class="inside-category">
          <img style="border-radius:10px;" src="products/bags2.png"  height="300px" width="250px"><br>
        </div>
    </div>
    </div>
  
    <footer>
      <div class="footer-container">
        <div class="footer-logo">
            <img style="height:65px;width: 65px;" src="products/T.jpg" alt="Fashion Urself">
        </div>
        <div class="footer-social">
          Copyright &copy; Trendzz.com | All rights reserved
        </div>
        <div class="footer-links">
          <ul>
              <li><a href="about.html">About Us</a></li>
              <li><a href="#">Contact</a></li>
          </ul>
      </div>
    </div>
  </footer>
  <script src="script.js"></script>
  <script>
      function wish(){
          alert("Sign in to see your wishlist..!!");
      }
      </script>
</body>
</html>