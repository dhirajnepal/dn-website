<?php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$action = $_GET['action'] ?? '';

if ($action === 'status') {
    echo json_encode([
        'status' => 'online',
        'message' => 'DNForge Backend is running.',
        'time' => date('Y-m-d H:i:s')
    ]);
    exit;
}

http_response_code(400);
echo json_encode(['error' => 'Invalid action']);
