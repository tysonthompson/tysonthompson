<?php
session_start();
$stories_file = 'stories.json';
$required_password = 'TomChater18';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $received_password = isset($_POST['password']) ? $_POST['password'] : '';
    if ($received_password === $required_password) {
        if (file_exists($stories_file)) {
            unlink($stories_file);
            echo json_encode(['success' => true, 'message' => 'All stories cleared']);
        } else {
            echo json_encode(['success' => true, 'message' => 'No stories to clear']);
        }
    } else {
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Incorrect password']);
    }
} else {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>