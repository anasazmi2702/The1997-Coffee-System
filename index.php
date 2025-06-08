<?php
session_start();
$isLoggedIn = isset($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The 1997</title>
    <link rel="shortcut icon" href="logo.svg" type="image/svg+xml">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/moon.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
<div class="logo-container">
        <img src="image/logo.jpg" alt="Logo">
        <h2 class="logo">The 1997</h2>
    </div>
    
    <nav class="navigation">
        <a href="index.php">Home</a>
        <a href="about.html">About</a>
        <a href="menu.php">Menu</a>
        <a href="contactus.html">Contact Us</a>
        <a href="redeem.php">Redeem</a>
    </nav>
    
    <div class="header-controls">
        <div class="dropdown">
            <button class="dropbtn">Account</button>
            <div class="dropdown-content">
                <?php if ($isLoggedIn): ?>
                    <a href="profile.php">Profile</a>
                    <a href="logout.php" class="register-btn">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                    <a href="register.php" class="register-btn">Register</a>
                <?php endif; ?>
            </div>
        </div>

        <div>
            <input type="checkbox" class="checkbox" id="checkbox">
            <label for="checkbox" class="checkbox-label">
                <i class="gg-moon"></i>
                <i class="fa fa-sun-o" style="font-size:20px"></i>
                <span class="ball"></span>
            </label>
        </div>
    </div>
</header>

    <section class="hero">
        <video class="hero-video" autoplay muted loop>
            <source src="video/starting.MOV" type="video/mp4" />
        </video>
        <div class="hero-content">
            <h1>Welcome to our website</h1>
            <p>Discover the best coffee in town</p>
        </div>
    </section>

    <section class="about" id="about">

        <h1 class="heading"> <span>News</span></h1>
        <div class="slider">
          <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">

            <div class="slide first">
              <img src="image/event.jpeg" alt="">
            </div>
            <div class="slide">
              <img src="image/merch.jpeg" alt="">
            </div>
            <div class="slide">
              <img src="image/quote.jpeg" alt="">
            </div>

            <div class="navigation-auto">
              <div class="auto-btn1"></div>
              <div class="auto-btn2"></div>
              <div class="auto-btn3"></div>
            </div>
          </div>

          <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
          </div>
        </div>
    
        <script type="text/javascript">
        var counter = 1;
        setInterval(function(){
          document.getElementById('radio' + counter).checked = true;
          counter++;
          if(counter > 3){
            counter = 1;
          }
        }, 5000);
        </script>
    </section>
    
    <h1 class="heading2">Signature Menu</h1>>

    <section class="menu" id="menu">

        <div class="card-container"></div>
        <div class="card rgb" data-tilt data-tilt-scale="1.1">
            <div class="card-image" style="background-image: url('image/air.jpeg');"></div>
            <div class="card-text">
              <h2>Koalisi Asia</h2>
              <p>The taste of the drink will give you the sensation of ASIA.</p>
            </div>
            </div>
          </div>
          <div class="card rgb" data-tilt data-tilt-glare data-tilt-max-glare="0.5">
            <div class="card-image card2" style="background-image: url('image/air2.jpeg');"></div>
            <div class="card-text card2">
              <h2>'97 coffee</h2>
              <p>Savor the creamy delight of coffee crowned with cold foam.</p>
            </div>
              </div>
            </div>
          </div>
          <div class="card rgb" data-tilt data-tilt-scale="1.1">
              <div class="card-image card3" style="background-image: url('image/air3.jpeg');"></div>
              <div class="card-text card3">
                <h2>Tèga</h2>
                <p>The definition of balance bitter sweet in life.</p>
              </div>
                </div>
              </div>
            </div>
    </section>

    <section class="review" id="review">

      <h1 class="heading"> customer's <span>review</span> </h1>
  
      <div class="box-container">
  
          <div class="box">
              <img src="image/quotelogo.png" alt="" class="quote">
              <p>"This coffee shop has become my go-to spot for a caffeine fix. The coffee is consistently amazing, with a smooth and velvety texture. They offer a wide range of options, like jb style brother!"</p>
              <img src="image/ijie.jpg" class="user" alt="">
              <h3>Noor Farzanah</h3>
              <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
              </div>
          </div>
  
          <div class="box">
              <img src="image/quotelogo.png" alt="" class="quote">
              <p>"Absolutely loved the coffee at this shop! The flavors were exquisite and perfectly balanced. The baristas were friendly and knowledgeable, making the experience even better. Highly recommended!"</p>
              <img src="image/dayah.jpg" class="user" alt="">
              <h3>Nur hidayah</h3>
              <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
              </div>
          </div>
          
          <div class="box">
              <img src="image/quotelogo.png" alt="" class="quote">
              <p>"I have tried coffee from various places, but this coffee shop takes the crown! The quality of their coffee is unmatched. Each sip was a delightful experience, with rich and complex flavors that lingered on my palate."</p>
              <img src="image/aisya.jpg" class="user" alt="">
              <h3>Aisya</h3>
              <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
              </div>
          </div>
  
      </div>
  
  </section>

    <footer>
      <div class="container">
        <div class="footer-content">
          <p>&copy; est 2021 The 1997. All rights reserved.</p>
          <div class="social-icons">
            <a href="https://www.instagram.com/the1997.rcc/"><i class="fab fa-instagram" aria-hidden="true"></i></i></a>
            <a href="https://www.facebook.com/the1997.rcc/"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </footer>
    
    <script src="java/vanilla-tilt.min.js"></script>
    <script>
      VanillaTilt.init(document.querySelectorAll(".card"),{
        glare: true,
        reverse: true,
        "max-glare": 0.5
      });

      document.querySelector('.dropbtn').addEventListener('click', function() {
    document.querySelector('.dropdown-content').classList.toggle('show');
});
    </script>
    <script src="java/checkbox.js"></script>
</body>
</html>