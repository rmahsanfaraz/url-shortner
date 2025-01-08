<?php
include 'config.php';

$code = $_GET['code'] ?? '';
$stmt = $pdo->prepare("SELECT original_url FROM urls WHERE short_code = ?");
$stmt->execute([$code]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $stmt = $pdo->prepare("UPDATE urls SET visit_count = visit_count + 1 WHERE short_code = ?");
    $stmt->execute([$code]);

    header("Location: " . $result['original_url']);
} else {
    echo "Invalid URL!";
}
?>
