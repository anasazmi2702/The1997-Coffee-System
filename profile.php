<?php
session_start();

// Direct database connection
$conn = new mysqli('localhost', 'root', '', 'the1997db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['id'];

// Fetch user information
$user_query = "SELECT * FROM register WHERE id = ?";
$stmt = $conn->prepare($user_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();
$user_data = $user_result->fetch_assoc();

// Get total orders and calculate total points earned
$orders_query = "SELECT COUNT(*) as total_orders, SUM(points_earned) as total_points_earned FROM orders WHERE user_id = ?";
$stmt = $conn->prepare($orders_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$orders_result = $stmt->get_result();
$orders_data = $orders_result->fetch_assoc();
$total_orders = $orders_data['total_orders'] ?? 0;
$total_points_earned = $orders_data['total_points_earned'] ?? 0;

// Get current points
$points_query = "SELECT points FROM points WHERE user_id = ?";
$stmt = $conn->prepare($points_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$points_result = $stmt->get_result();
$current_points = $points_result->fetch_assoc()['points'] ?? 0;

// Get recent orders
$recent_orders_query = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC LIMIT 5";
$stmt = $conn->prepare($recent_orders_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$recent_orders_result = $stmt->get_result();

// Calculate join date
$join_date = new DateTime($user_data['dateofbirth']); // Using registration date
$join_date_formatted = $join_date->format('F Y');

// Fetch user badges (using placeholder data since badge table wasn't in the SQL)
$badges = array(
    'coffee_explorer' => array('current' => 5, 'target' => 10),
    'early_bird' => array('current' => 3, 'target' => 5)
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The 1997 - Profile</title>
    <link rel="shortcut icon" href="logo.svg" type="image/svg+xml">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/moon.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/profile.css">
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
    </header>

    <div class="profile-container">
        <div class="tab-buttons">
            <button class="tab-button active" onclick="switchTab('profile')">Profile</button>
            <button class="tab-button" onclick="switchTab('badges')">Badges & Progress</button>
        </div>

        <!-- Profile Tab -->
        <div id="profile-tab" class="tab-content">
            <div class="profile-header">
                <h1>Welcome, <?php echo htmlspecialchars($user_data['name']); ?></h1>
                <p>Member since: <?php echo $join_date_formatted; ?></p>
            </div>

            <div class="points-display">
                <h2>Current Points</h2>
                <div class="points-number"><?php echo $current_points; ?></div>
            </div>

            <div class="profile-info">
                <div class="info-card">
                    <h3><i class="fas fa-user"></i> Personal Information</h3>
                    <div class="info-item">
                        <span class="info-label">Name:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user_data['name']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user_data['email']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Phone:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user_data['phone']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Date of Birth:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user_data['dateofbirth']); ?></span>
                    </div>
                </div>

                <div class="info-card">
                    <h3><i class="fas fa-chart-line"></i> Account Statistics</h3>
                    <div class="info-item">
                        <span class="info-label">Total Orders:</span>
                        <span class="info-value"><?php echo $total_orders; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Points Earned:</span>
                        <span class="info-value"><?php echo $total_points_earned; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Current Points:</span>
                        <span class="info-value"><?php echo $current_points; ?></span>
                    </div>
                </div>
            </div>

            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <div class="order-grid">
                    <?php if ($recent_orders_result->num_rows > 0): ?>
                        <?php while ($order = $recent_orders_result->fetch_assoc()): ?>
                        <div class="order-card">
                            <div class="order-details">
                                <h4><?php echo htmlspecialchars($order['drink_name']); ?></h4>
                                <p class="order-date"><?php echo date('M d, Y', strtotime($order['order_date'])); ?></p>
                            </div>
                            <div class="order-points">
                                <p>+<?php echo $order['points_earned']; ?> points</p>
                                <span class="status <?php echo strtolower($order['status']); ?>"><?php echo $order['status']; ?></span>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No recent orders found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Badges Tab -->
        <div id="badges-tab" class="tab-content" style="display: none;">
            <div class="badge-section">
                <h2>Your Badges</h2>
                <div class="badge-grid">
                    <div class="badge-card">
                        <div class="badge-icon">
                            <i class="fas fa-coffee"></i>
                        </div>
                        <h3>Coffee Explorer</h3>
                        <p>Try different drinks from our menu</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?php echo ($badges['coffee_explorer']['current'] / $badges['coffee_explorer']['target'] * 100) ?>%"></div>
                        </div>
                        <p><?php echo $badges['coffee_explorer']['current'] . '/' . $badges['coffee_explorer']['target'] ?> drinks</p>
                    </div>

                    <div class="badge-card">
                        <div class="badge-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Loyalty Star</h3>
                        <p>Complete orders at The 1997</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?php echo ($total_orders / 20 * 100) ?>%"></div>
                        </div>
                        <p><?php echo $total_orders ?>/20 orders</p>
                    </div>

                    <div class="badge-card">
                        <div class="badge-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3>Premium Member</h3>
                        <p>Earn reward points</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?php echo ($current_points / 300 * 100) ?>%"></div>
                        </div>
                        <p><?php echo $current_points ?>/300 points</p>
                    </div>

                    <div class="badge-card">
                        <div class="badge-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Early Bird</h3>
                        <p>Morning visits (before 9 AM)</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?php echo ($badges['early_bird']['current'] / $badges['early_bird']['target'] * 100) ?>%"></div>
                        </div>
                        <p><?php echo $badges['early_bird']['current'] . '/' . $badges['early_bird']['target'] ?> visits</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        function switchTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.style.display = 'none';
            });
            
            // Show selected tab
            document.getElementById(tabName + '-tab').style.display = 'block';
            
            // Update active button
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active');
            });
            event.target.classList.add('active');
        }
    </script>
</body>
</html>
