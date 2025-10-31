<?php
include 'config.php';

// Get all URLs ordered by creation date
$stmt = $pdo->prepare("SELECT id, original_url, short_code, visit_count, created_at, expires_at, last_accessed FROM urls ORDER BY created_at DESC");
$stmt->execute();
$urls = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($urls);
?>
