<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$host = 'localhost';
$db   = 'sig_potensi_lokasi'; // Pastikan nama DB benar
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    
    // Ambil data apa adanya
    $stmt = $pdo->query("SELECT * FROM lokasi_potensi");
    $locations = $stmt->fetchAll();

    // Kirim langsung (Tanpa diubah jadi GeoJSON)
    echo json_encode($locations);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
}
?>