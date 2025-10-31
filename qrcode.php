<?php
include 'config.php';

// QR Code generation endpoint
$code = $_GET['code'] ?? '';

if (empty($code)) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Short code is required']);
    exit;
}

$shortUrl = "$base_url/redirect.php?code=$code";

// Generate QR code using Google Charts API (free, no dependencies)
$qrUrl = "https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=" . urlencode($shortUrl);

// Return QR code image
header('Content-Type: application/json');
echo json_encode(['qr_url' => $qrUrl, 'short_url' => $shortUrl]);
?>
