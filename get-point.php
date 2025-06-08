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
if (!isset($_SESSION['id'])) {
    sendResponse(false, [], 'Not logged in');
}

$user_id = $_SESSION['id'];

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    $conn->set_charset('utf8mb4');
    
    // Get points balance
    $stmt = $conn->prepare("SELECT points FROM points WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // If no points record exists, create one with 0 points
    if ($result->num_rows === 0) {
        $stmt = $conn->prepare("INSERT INTO points (user_id, points) VALUES (?, 0)");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $points = 0;
    } else {
        $points = $result->fetch_assoc()['points'];
    }
    
    sendResponse(true, [
        'points' => $points,
        'username' => $_SESSION['username']
    ]);
    
} catch (Exception $e) {
    error_log('[Points Balance Error] ' . $e->getMessage());
    sendResponse(false, [], 'Error fetching points balance');
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
