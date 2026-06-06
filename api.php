<?php
header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

if ($action === 'status') {
    echo json_encode([
        'status' => 'online',
        'message' => 'DNForge Backend is running.',
        'time' => date('Y-m-d H:i:s')
    ]);
} else {
    echo json_encode(['error' => 'Invalid action']);
}
?>
