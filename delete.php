<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE' || $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $short_code = $data['short_code'] ?? '';

    if (empty($short_code)) {
        http_response_code(400);
        echo json_encode(['error' => 'Short code is required']);
        exit;
    }

    $stmt = $pdo->prepare("DELETE FROM urls WHERE short_code = ?");
    $stmt->execute([$short_code]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'URL deleted successfully']);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Short URL not found']);
    }
}
?>
