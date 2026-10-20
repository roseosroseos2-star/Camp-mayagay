<?php
declare(strict_types=1);

/**
 * Database connection - standalone MySQL Server 8.x (NOT XAMPP).
 * Edit the values below, or set environment variables
 * DB_HOST / DB_PORT / DB_NAME / DB_USER / DB_PASS instead.
 */
$DB_HOST    = getenv('DB_HOST') ?: '127.0.0.1';   // use 127.0.0.1 (TCP), not "localhost" (socket)
$DB_PORT    = getenv('DB_PORT') ?: '3306';        // MySQL Server default port
$DB_NAME    = getenv('DB_NAME') ?: 'camp_mayagay_db';
$DB_USER    = getenv('DB_USER') ?: 'camp_user';
$DB_PASS    = getenv('DB_PASS') !== false ? getenv('DB_PASS') : 'CampMayagay@2026';
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
    error_log('Camp Mayagay DB connection failed: ' . $e->getMessage());
    http_response_code(500);
    die(json_encode([
        'success' => false,
        'message' => 'Database connection failed.'
    ]));
}
