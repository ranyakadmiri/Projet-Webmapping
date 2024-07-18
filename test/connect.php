<?php
$host = 'localhost';
$dbname = 'SIG-APP';
$user = 'postgres';
$password = '123';

$dsn = "pgsql:host=$host;dbname=$dbname;user=$user;password=$password";

try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
