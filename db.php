<?php
$db_path = __DIR__ . '/clinic_duty.db';

$dsn = "sqlite:$db_path";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, null, null, $opt);
} catch (\PDOException $e) {
    die("Помилка підключення до SQLite: " . $e->getMessage());
}
?>