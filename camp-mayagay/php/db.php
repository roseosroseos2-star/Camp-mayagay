<?php
declare(strict_types=1);

$DB_HOST = getenv('MYSQLHOST') ?: 'localhost';
$DB_PORT = getenv('MYSQLPORT') ?: '3306';
$DB_NAME = getenv('MYSQLDATABASE') ?: 'camp_mayagay';
$DB_USER = getenv('MYSQLUSER') ?: 'root';
$DB_PASS = getenv('MYSQLPASSWORD') ?: '';
$DB_CHARSET = 'utf8mb4';

$dsn = "mysql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME};charset={$DB_CHARSET}";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, $options);
} catch (PDOException $e) {
    error_log('db.php connection error: ' . $e->getMessage());
    http_response_code(500);
    die(json_encode([
        'success' => false,
        'message' => 'Database connection failed.'
    ]));
}
