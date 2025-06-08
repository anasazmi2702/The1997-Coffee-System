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
    <link rel="stylesheet" href="css/form.css">
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
            <a href="register.php" class="register-btn">Register</a>
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

    <section class="form" id="form">
    <div class="form-box">
        <h1 class="heading">Registration Form</h1>
        <form action="register.php" method="POST">
            <div class="input-box">
                <h3>Name :</h3>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="input-box">
                <h3>Date Of Birth :</h3>
                <input type="date" name="dateofbirth" id="dateofbirth" required>
            </div>

            <div class="input-box">
                <h3>Email :</h3>
                <input type="text" name="email" id="email" required>
            </div>

            <div class="input-box">
                <h3>Phone :</h3>
                <input type="text" name="phone" id="phone" required>
            </div>

            <div class="input-box">
                <h3>Username :</h3>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="input-box">
                <h3>Password :</h3>
                <input type="password" name="password" id="password" required>
            </div>

            <input type="submit" name="submit" value="Register" class="submit-btn">
        </form>
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
      
</body>
</html>

<?php
$name=$_POST["name"];
$dateofbirth=$_POST["dateofbirth"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$username=$_POST["username"];
$password=$_POST["password"];

$con = mysqli_connect ("localhost", "root", "", "the1997db") or die
(mysqli_connect_errno($con));

mysqli_query($con, "insert into register (name, dateofbirth, email, phone, username, password, status)
values ('$name', '$dateofbirth', '$email', '$phone', '$username', '$password', 'USER')") or die(mysqli_error($con));

?>
