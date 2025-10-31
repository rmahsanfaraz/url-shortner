<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $original_url = $data['url'];
    $custom_code = $data['custom_code'] ?? '';
    $expires_in_days = $data['expires_in_days'] ?? null;

    $short_code = $custom_code ?: substr(md5(uniqid(rand(), true)), 0, 6);

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM urls WHERE short_code = ?");
    $stmt->execute([$short_code]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['error' => 'Custom short code already exists.']);
        exit;
    }

    // Calculate expiration date if provided
    $expires_at = null;
    if ($expires_in_days && is_numeric($expires_in_days) && $expires_in_days > 0) {
        $expires_at = date('Y-m-d H:i:s', strtotime("+$expires_in_days days"));
    }

    $stmt = $pdo->prepare("INSERT INTO urls (original_url, short_code, expires_at) VALUES (?, ?, ?)");
    $stmt->execute([$original_url, $short_code, $expires_at]);

    echo json_encode(['short_url' => "http://short.skystreamstech.com/redirect.php?code=$short_code", 'short_code' => $short_code]);
}
?>
