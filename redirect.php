<?php
include 'config.php';

$code = $_GET['code'] ?? '';
$stmt = $pdo->prepare("SELECT original_url, expires_at FROM urls WHERE short_code = ?");
$stmt->execute([$code]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // Check if URL has expired
    if ($result['expires_at'] && strtotime($result['expires_at']) < time()) {
        echo "This short URL has expired!";
        exit;
    }

    $stmt = $pdo->prepare("UPDATE urls SET visit_count = visit_count + 1, last_accessed = CURRENT_TIMESTAMP WHERE short_code = ?");
    $stmt->execute([$code]);

    header("Location: " . $result['original_url']);
} else {
    echo "Invalid URL!";
}
?>
