<?php
session_start();

// Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'the1997db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('SESSION_TIMEOUT', 1800); // 30 minutes

// Helper function for safe response
function sendResponse($success, $data = [], $message = '') {
    $response = [
        'success' => $success,
        'message' => $message,
        'data' => $data
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Validate session and user authentication
if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    sendResponse(false, [], 'Please login to place an order.');
}

// Process order
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse(false, [], 'Invalid request method');
}

// Get JSON input
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!isset($data['items']) || !isset($data['total'])) {
    sendResponse(false, [], 'Invalid input parameters');
}

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    $conn->set_charset('utf8mb4');
    
    // Calculate total points (1 point per RM)
    $total_points_earned = floor($data['total']);
    $user_id = $_SESSION['id'];
    
    // Start transaction
    $conn->begin_transaction();
    
    // Insert orders for each item
    foreach ($data['items'] as $item) {
        $stmt = $conn->prepare("INSERT INTO orders (user_id, drink_name, price, points_earned, status) VALUES (?, ?, ?, ?, 'PENDING')");
        $item_points = floor($item['price'] * $item['quantity']);
        $total_price = $item['price'] * $item['quantity'];
        $stmt->bind_param("isdi", $user_id, $item['drinkName'], $total_price, $item_points);
        
        if (!$stmt->execute()) {
            throw new Exception("Error creating order");
        }
    }
    
    // Check if user has points record
    $stmt = $conn->prepare("SELECT id FROM points WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        // Create new points record
        $stmt = $conn->prepare("INSERT INTO points (user_id, points) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $total_points_earned);
    } else {
        // Update existing points
        $stmt = $conn->prepare("UPDATE points SET points = points + ? WHERE user_id = ?");
        $stmt->bind_param("ii", $total_points_earned, $user_id);
    }
    
    if (!$stmt->execute()) {
        throw new Exception("Error updating points");
    }
    
    // Get updated total points
    $stmt = $conn->prepare("SELECT points FROM points WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $points_result = $stmt->get_result();
    $total_points = $points_result->fetch_assoc()['points'];
    
    $conn->commit();
    
    sendResponse(true, [
        'points_earned' => $total_points_earned,
        'total_points' => $total_points,
        'username' => $_SESSION['username']
    ]);
    
} catch (Exception $e) {
    if (isset($conn) && !$conn->connect_error) {
        $conn->rollback();
    }
    error_log('[Order Error] ' . $e->getMessage());
    sendResponse(false, [], 'An error occurred while processing your order');
    
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}