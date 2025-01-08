<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $original_url = $data['url'];
    $custom_code = $data['custom_code'] ?? '';

    $short_code = $custom_code ?: substr(md5(uniqid(rand(), true)), 0, 6);

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM urls WHERE short_code = ?");
    $stmt->execute([$short_code]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['error' => 'Custom short code already exists.']);
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO urls (original_url, short_code) VALUES (?, ?)");
    $stmt->execute([$original_url, $short_code]);

    echo json_encode(['short_url' => "http://short.skystreamstech.com/redirect.php?code=$short_code"]);
}
?>
