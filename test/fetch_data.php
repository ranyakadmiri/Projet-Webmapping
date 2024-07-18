<?php
require_once 'connect.php';

// Fetch points
$stmt_points = $pdo->query('SELECT id, name, ST_AsGeoJSON(geom) AS geom FROM points');
$points = $stmt_points->fetchAll(PDO::FETCH_ASSOC);

// Fetch lines
$stmt_lines = $pdo->query('SELECT id, name, ST_AsGeoJSON(geom) AS geom FROM lines');
$lines = $stmt_lines->fetchAll(PDO::FETCH_ASSOC);

$data = [
    'points' => $points,
    'lines' => $lines
];

header('Content-Type: application/json');
echo json_encode($data);
