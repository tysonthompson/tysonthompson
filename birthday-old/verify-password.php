<?php
session_start();
$stories_file = 'stories.json';
$required_password = 'TomChater18';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $received_password = isset($_POST['password']) ? $_POST['password'] : '';
    if ($received_password === $required_password) {
        $_SESSION['password_verification'] = true;
        echo json_encode(['success' => true]);
    } else {
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Incorrect password']);
    }
} else {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>