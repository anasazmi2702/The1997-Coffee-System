<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Please login to complete your order'
    ]);
    exit;
}

// Get JSON data from request
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data || !isset($data['items']) || empty($data['items'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid order data'
    ]);
    exit;
}

try {
    $conn = new mysqli('localhost', 'root', '', 'the1997db');
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    $conn->begin_transaction();
    
    $total_points_earned = 0;
    $user_id = $_SESSION['id'];
    
    // Process each item in the cart
    foreach ($data['items'] as $item) {
        $drink_name = $conn->real_escape_string($item['drinkName']);
        $price = floatval($item['price']) * intval($item['quantity']);
        $points_earned = floor($price); // 1 point per RM
        $total_points_earned += $points_earned;
        
        // Insert order
        $stmt = $conn->prepare("INSERT INTO orders (user_id, drink_name, price, points_earned, status) VALUES (?, ?, ?, ?, 'PENDING')");
        $stmt->bind_param("isdi", $user_id, $drink_name, $price, $points_earned);
        
        if (!$stmt->execute()) {
            throw new Exception("Error creating order: " . $stmt->error);
        }
    }
    
    // Update points
    $stmt = $conn->prepare("SELECT id FROM points WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        $stmt = $conn->prepare("INSERT INTO points (user_id, points) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $total_points_earned);
    } else {
        $stmt = $conn->prepare("UPDATE points SET points = points + ? WHERE user_id = ?");
        $stmt->bind_param("ii", $total_points_earned, $user_id);
    }
    
    if (!$stmt->execute()) {
        throw new Exception("Error updating points: " . $stmt->error);
    }
    
    // Get total points
    $stmt = $conn->prepare("SELECT points FROM points WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $points_result = $stmt->get_result();
    $total_points = $points_result->fetch_assoc()['points'];
    
    $conn->commit();
    
    echo json_encode([
        'success' => true,
        'points_earned' => $total_points_earned,
        'total_points' => $total_points,
        'message' => 'Order completed successfully'
    ]);
    
} catch (Exception $e) {
    if (isset($conn) && !$conn->connect_error) {
        $conn->rollback();
    }
    echo json_encode([
        'success' => false,
        'message' => 'Error processing order: ' . $e->getMessage()
    ]);
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>
