<?php
$host = 'localhost';
$db = 'url_shortener';
$user = 'root';
$pass = 'yourpassword';

// Base URL for the application - change this to your domain
$base_url = 'http://short.skystreamstech.com';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
