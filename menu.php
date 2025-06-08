<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
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
    <link rel="stylesheet" href="css/menu.css">
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
              <a href="profile.php">My Profile</a>
              <a href="login.php">Login</a>
              <a href="register.php">Register</a>
              <a href="logout.php">Logout</a>
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
    </header>
    <div class="heading2" style="padding-top: 100px;">
      <h2>Menu</h2>
    </div>
    <section class="row1" id="row1">
      <div class="menu-card">
        <div class="menu-card-img">
          <img src="image/drink1.jpg" alt="" />
        </div>
        <button href="#" class="menu-card-btn"><i class="fas fa-heart"></i></button>
        <div class="menu-card-body">
          <div class="food-detail">
            <h4>Strawberry <br> Lassi</h4>
            <p>Sweet & Sour</p>
          </div>
          <div class="food-price">
            <p>RM 7.00</p>
          </div>
        </div>
        <div class="button-container">
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
    
      <div class="menu-card">
        <div class="menu-card-img">
          <img src="image/drink2.jpg" alt="" />
        </div>
        <button href="#" class="menu-card-btn"><i class="fas fa-heart"></i></button>
        <div class="menu-card-body">
          <div class="food-detail">
            <h4>Vanilla <br> Latte</h4>
            <p>Sweet & Creamy</p>
          </div>
          <div class="food-price">
            <p>RM 9.00</p>
          </div>
        </div>
        <div class="button-container">
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
    
      <div class="menu-card">
        <div class="menu-card-img">
          <img src="image/drink3.jpg" alt="" />
        </div>
        <button href="#" class="menu-card-btn"><i class="fas fa-heart"></i></button>
        <div class="menu-card-body">
          <div class="food-detail">
            <h4>Kiosla <br> Asia</h4>
            <p>Sweet & Bitter</p>
          </div>
          <div class="food-price">
            <p>RM 11.00</p>
          </div>
        </div>
        <div class="button-container">
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
    
      <div class="menu-card">
        <div class="menu-card-img">
          <img src="image/drink4.jpg" alt="" />
        </div>
        <button href="#" class="menu-card-btn"><i class="fas fa-heart"></i></button>
        <div class="menu-card-body">
          <div class="food-detail">
            <h4>Pola <br> Ungu</h4>
            <p>Sweet & Creamy</p>
          </div>
          <div class="food-price">
            <p>RM 12.00</p>
          </div>
        </div>
        <div class="button-container">
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
    </section>
    
    <section class="row2" id="row2">
      <div class="menu-card">
        <div class="menu-card-img">
          <img src="image/drink5.jpg" alt="" />
        </div>
        <button href="#" class="menu-card-btn"><i class="fas fa-heart"></i></button>
        <div class="menu-card-body">
          <div class="food-detail">
            <h4>Gula <br> Secawan</h4>
            <p>Sweet & Creme</p>
          </div>
          <div class="food-price">
            <p>RM 13.00</p>
          </div>
        </div>
        <div class="button-container">
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
      
      <div class="menu-card">
        <div class="menu-card-img">
          <img src="image/drink6.jpg" alt="" />
        </div>
        <button href="#" class="menu-card-btn"><i class="fas fa-heart"></i></button>
        <div class="menu-card-body">
          <div class="food-detail">
            <h4>Secangkir <br> Bersama</h4>
            <p>Sweet & Creamy</p>
          </div>
          <div class="food-price">
            <p>RM 11.00</p>
          </div>
        </div>
        <div class="button-container">
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
      
      <div class="menu-card">
        <div class="menu-card-img">
          <img src="image/drink7.jpg" alt="" />
        </div>
        <button href="#" class="menu-card-btn"><i class="fas fa-heart"></i></button>
        <div class="menu-card-body">
          <div class="food-detail">
            <h4>Analisa</h4>
            <p>Salty & Creamy</p>
          </div>
          <div class="food-price">
            <p>RM 9.00</p>
          </div>
        </div>
        <div class="button-container">
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
      
      <div class="menu-card">
        <div class="menu-card-img">
          <img src="image/drink8.jpg" alt="" />
        </div>
        <button href="#" class="menu-card-btn"><i class="fas fa-heart"></i></button>
        <div class="menu-card-body">
          <div class="food-detail">
            <h4>Orang <br> Kita</h4>
            <p>Sweet & Bitter</p>
          </div>
          <div class="food-price">
            <p>RM 8.00</p>
          </div>
        </div>
        <div class="button-container">
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
      
      </section>
      
      <section class="row3" id="row3">
        <div class="menu-card">
          <div class="menu-card-img">
            <img src="image/drink9.jpg" alt="" />
          </div>
          <button href="#" class="menu-card-btn"><i class="fas fa-heart"></i></button>
          <div class="menu-card-body">
            <div class="food-detail">
              <h4>Dibawah <br> Matahari <br> Terbit</h4>
              <p>Sweet & Fresh</p>
            </div>
            <div class="food-price">
              <p>RM 11.00</p>
            </div>
          </div>
          <div class="button-container">
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
      
        <div class="menu-card">
          <div class="menu-card-img">
            <img src="image/drink10.jpg" alt="" />
          </div>
          <button href="#" class="menu-card-btn"><i class="fas fa-heart"></i></button>
          <div class="menu-card-body">
            <div class="food-detail">
              <h4>Black <br> Tiramisu</h4>
              <p>Sweet & Bitter</p>
            </div>
            <div class="food-price">
              <p>RM 11.00</p>
            </div>
          </div>
          <div class="button-container">
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
    
        <div class="menu-card">
          <div class="menu-card-img">
            <img src="image/drink11.jpg" alt="" />
          </div>
          <button href="#" class="menu-card-btn"><i class="fas fa-heart"></i></button>
          <div class="menu-card-body">
            <div class="food-detail">
              <h4>Caramel <br> Macchiato</h4>
              <p>Sweet & Salty</p>
            </div>
            <div class="food-price">
              <p>RM 12.00</p>
            </div>
          </div>
          <div class="button-container">
            <button class="buy-btn">Buy Now</button>
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
      <script src="java/checkbox.js"></script>
      <button class="cart-button" onclick="cart.showCart()">
    🛒
    <span id="cart-count">0</span>
</button>
<script src="java/cart-handling.js"></script>
</body>
</html>