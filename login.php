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
    <link rel="stylesheet" href="css/login.css">
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
        
        <div>
            <input type="checkbox" class="checkbox" id="checkbox">
            <label for="checkbox" class="checkbox-label">
                <i class="gg-moon"></i>
                <i class="fa fa-sun-o" style="font-size:20px"></i>
                <span class="ball"></span>
            </label>
        </div>
    </header>

    <main class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form name="log in" method="POST" action="process.php">
                <div class="input-box">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
                <div class="register-link">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <p>&copy; est 2021 The 1997. All rights reserved.</p>
                <div class="social-icons">
                    <a href="https://www.instagram.com/the1997.rcc/"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/the1997.rcc/"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </footer>
      <script src="java/checkbox.js"></script>
</body>
</html>