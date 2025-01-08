<?php
include 'config.php';

$code = $_GET['code'] ?? '';
$stmt = $pdo->prepare("SELECT original_url, visit_count, created_at FROM urls WHERE short_code = ?");
$stmt->execute([$code]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    echo json_encode($result);
} else {
    echo json_encode(['error' => 'Short URL not found.']);
}
?>
