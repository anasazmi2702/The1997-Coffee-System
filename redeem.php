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
    <link rel="stylesheet" href="css/point.css">
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

    <div class="rewards-container">
        <div class="points-summary">
            <div class="balance-wrapper">
                <h1 class="balance-text">Points Balance: <span class="balance-number">0</span></h1>
            </div>
        </div>
    </div>

        <h2 class="heading2">Available Rewards</h2>
        
        <!-- Row 1 -->
        <section class="row1">
            <div class="reward-card">
                <div class="reward-card-img">
                    <img src="image/drink1.jpg" alt="Strawberry Lassi">
                </div>
                <div class="reward-card-body">
                    <h3>Free Strawberry Lassi</h3>
                    <p class="points-required">30</p>
                    <button class="redeem-btn">Redeem Reward</button>
                </div>
            </div>

            <div class="reward-card">
                <div class="reward-card-img">
                    <img src="image/drink2.jpg" alt="Vanilla Latte">
                </div>
                <div class="reward-card-body">
                    <h3>Free Vanilla Latte</h3>
                    <p class="points-required">26</p>
                    <button class="redeem-btn">Redeem Reward</button>
                </div>
            </div>

            <div class="reward-card">
                <div class="reward-card-img">
                    <img src="image/drink3.jpg" alt="Kiosla Asia">
                </div>
                <div class="reward-card-body">
                    <h3>Free Kiosla Asia</h3>
                    <p class="points-required">40</p>
                    <button class="redeem-btn">Redeem Reward</button>
                </div>
            </div>
        </section>

        <!-- Row 2 -->
        <section class="row2">
            <div class="reward-card">
                <div class="reward-card-img">
                    <img src="image/drink4.jpg" alt="Pola Ungu">
                </div>
                <div class="reward-card-body">
                    <h3>Free Pola Ungu</h3>
                    <p class="points-required">50</p>
                    <button class="redeem-btn">Redeem Reward</button>
                </div>
            </div>

            <div class="reward-card">
                <div class="reward-card-img">
                    <img src="image/drink5.jpg" alt="Gula Secawan">
                </div>
                <div class="reward-card-body">
                    <h3>Free Gula Secawan</h3>
                    <p class="points-required">56</p>
                    <button class="redeem-btn">Redeem Reward</button>
                </div>
            </div>

            <div class="reward-card">
                <div class="reward-card-img">
                    <img src="image/drink6.jpg" alt="Secangkir Bersama">
                </div>
                <div class="reward-card-body">
                    <h3>Free Secangkir Bersama</h3>
                    <p class="points-required">54</p>
                    <button class="redeem-btn">Redeem Reward</button>
                </div>
            </div>
        </section>

        <!-- Row 3 -->
        <section class="row3">
            <div class="reward-card">
                <div class="reward-card-img">
                    <img src="image/drink7.jpg" alt="Analisa">
                </div>
                <div class="reward-card-body">
                    <h3>Free Analisa</h3>
                    <p class="points-required">35</p>
                    <button class="redeem-btn">Redeem Reward</button>
                </div>
            </div>

            <div class="reward-card">
                <div class="reward-card-img">
                    <img src="image/drink8.jpg" alt="Orang Kita">
                </div>
                <div class="reward-card-body">
                    <h3>Free Orang Kita</h3>
                    <p class="points-required">28</p>
                    <button class="redeem-btn">Redeem Reward</button>
                </div>
            </div>

            <div class="reward-card">
                <div class="reward-card-img">
                    <img src="image/drink9.jpg" alt="Dibawah Matahari Terbit">
                </div>
                <div class="reward-card-body">
                    <h3>Free Dibawah Matahari Terbit</h3>
                    <p class="points-required">42</p>
                    <button class="redeem-btn">Redeem Reward</button>
                </div>
            </div>
        </section>
    </div>

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
      <script src="java/redeem.js"></script>
</body>
</html>