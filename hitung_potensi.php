<?php
// Koneksi ke Database
$servername = "localhost";
$username = "root"; // Ganti jika Anda punya username lain
$password = "";     // Ganti jika Anda punya password lain
$dbname = "sig_potensi_lokasi";

// Bobot Algoritma (Total harus 1.00)
$W_DEMO = 0.35;
$W_COMP = 0.30;
$W_AKSES = 0.25;
$W_HARGA = 0.10; // Kita asumsikan skor harga 50 untuk contoh ini

// 1. Buat Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// 2. Ambil Data Lokasi
$sql_select = "SELECT id, skor_demografi, skor_kompetitor, skor_aksesibilitas FROM lokasi_potensi";
$result = $conn->query($sql_select);

echo "<h1>Perhitungan Skor Potensi Bisnis</h1>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $S_DEMO = $row["skor_demografi"];
        $S_COMP = $row["skor_kompetitor"]; // Angka besar = kompetisi tinggi (buruk)
        $S_AKSES = $row["skor_aksesibilitas"];
        $S_HARGA = 50.00; // Asumsi skor harga 50 untuk simplifikasi

        // **Normalisasi Skor Kompetitor:**
        // Karena skor kompetitor yang tinggi berarti potensi RENDAH,
        // kita balik nilainya (100 - Skor_Kompetitor) sebelum dimasukkan ke rumus.
        $S_COMP_NORM = 100 - $S_COMP;
        
        // 3. HITUNG SKOR AKHIR (sesuai rumus HKI)
        $skor_akhir = 
            ($W_DEMO * $S_DEMO) + 
            ($W_COMP * $S_COMP_NORM) + 
            ($W_AKSES * $S_AKSES) + 
            ($W_HARGA * $S_HARGA);

        // 4. Update Skor Akhir di Database
        $sql_update = "UPDATE lokasi_potensi SET skor_akhir = ? WHERE id = ?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("di", $skor_akhir, $id);
        $stmt->execute();
        
        echo "<p>Lokasi ID: $id | Skor Kompetitor Awal: $S_COMP | Skor Kompetitor Normalisasi: $S_COMP_NORM | **Skor Akhir Dihitung: " . number_format($skor_akhir, 2) . "**</p>";
        $stmt->close();
    }
} else {
    echo "Tidak ada data lokasi ditemukan.";
}

$conn->close();
echo "<p>Perhitungan selesai. Cek di phpMyAdmin untuk melihat hasilnya.</p>";
?>