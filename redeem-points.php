<?php
session_start();

// Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'the1997db');
define('DB_USER', 'root');
define('DB_PASS', '');

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

// Validate session
if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    sendResponse(false, [], 'Please login first');
}

// Process redemption
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse(false, [], 'Invalid request method');
}

// Get the reward points required from POST data
if (!isset($_POST['points_required']) || !isset($_POST['reward_name'])) {
    sendResponse(false, [], 'Missing reward information');
}

$points_required = intval($_POST['points_required']);
$reward_name = $_POST['reward_name'];
$user_id = $_SESSION['id'];

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    $conn->set_charset('utf8mb4');
    
    // Start transaction
    $conn->begin_transaction();
    
    // Get current points
    $stmt = $conn->prepare("SELECT points FROM points WHERE user_id = ? FOR UPDATE");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        throw new Exception("No points record found");
    }
    
    $current_points = $result->fetch_assoc()['points'];
    
    // Check if user has enough points
    if ($current_points < $points_required) {
        throw new Exception("Insufficient points");
    }
    
    // Update points by deducting the required amount
    $new_points = $current_points - $points_required;
    $stmt = $conn->prepare("UPDATE points SET points = ? WHERE user_id = ?");
    $stmt->bind_param("ii", $new_points, $user_id);
    
    if (!$stmt->execute()) {
        throw new Exception("Error updating points");
    }
    
    // Insert into redemption history (optional - you'll need to create this table)
    $stmt = $conn->prepare("INSERT INTO orders (user_id, drink_name, price, points_earned, status) VALUES (?, ?, 0.00, ?, 'REDEEMED')");
    $points_spent = -$points_required; // Store as negative to indicate points spent
    $stmt->bind_param("isi", $user_id, $reward_name, $points_spent);
    $stmt->execute();
    
    $conn->commit();
    
    sendResponse(true, [
        'points_redeemed' => $points_required,
        'remaining_points' => $new_points,
        'reward_name' => $reward_name
    ], 'Reward redeemed successfully');
    
} catch (Exception $e) {
    if (isset($conn) && !$conn->connect_error) {
        $conn->rollback();
    }
    error_log('[Redemption Error] ' . $e->getMessage());
    sendResponse(false, [], $e->getMessage());
    
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}