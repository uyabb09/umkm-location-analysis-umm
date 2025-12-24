<?php
// File: homepage.php
// Halaman utama untuk memandu pengguna memilih jenis tempat usaha.
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>GeoLoka | Solusi Lokasi UMKM Pintar</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Light grey background */
            color: #333;
            line-height: 1.6;
        }

        /* --- Navbar / Header --- */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            position: fixed;
            width: 90%; 
            top: 0;
            z-index: 1000;
        }
        .navbar .logo {
            font-size: 1.8em;
            font-weight: 700;
            color: #007bff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .navbar .nav-links {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar .nav-links li {
            margin-left: 30px;
        }
        .navbar .nav-links a {
            text-decoration: none;
            color: #555;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .navbar .nav-links a:hover {
            color: #007bff;
        }

        /* --- Hero Section --- */
        .hero-section {
            /* Placeholder Image */
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center/cover;
            color: white;
            text-align: left;
            padding: 150px 5% 100px 5%; 
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .hero-content {
            max-width: 600px;
        }
        .hero-content h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
            font-weight: 700;
            line-height: 1.2;
            color: white;
        }
        .hero-content p {
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #e0e0e0;
        }
        .hero-buttons a {
            text-decoration: none;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 600;
            margin-right: 15px;
            transition: background-color 0.3s ease;
            display: inline-block;
        }
        .hero-buttons .main-btn {
            background-color: #007bff;
        }
        .hero-buttons .main-btn:hover {
            background-color: #0056b3;
        }
        .hero-buttons .secondary-btn {
            background-color: transparent;
            border: 2px solid white;
        }
        .hero-buttons .secondary-btn:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* --- Category Section --- */
        .category-section {
            padding: 80px 5%;
            text-align: center;
            background-color: #1a365d; /* Warna Navy Blue */
        }
        .category-section h2 {
            font-size: 2.5em;
            color: #ffffff;
            margin-bottom: 10px;
        }
        .category-section h3 {
            color: #ffffff;
            font-size: 1.5em;
            margin-bottom: 25px;
        }
        .category-section p {
            font-size: 1.1em;
            color: #ffffff;
            margin-bottom: 50px;
        }
        .category-group-wrapper {
            display: flex;
            flex-direction: column; 
            gap: 40px; 
        }
        .category-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .category-group a {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #fffafa;
            background-color: #040404;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            padding: 25px 20px;
            width: 180px; 
            min-height: 120px;
            text-align: center;
            font-weight: 600;
            font-size: 1em;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .category-group a:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }
        .category-group a i {
            font-size: 2em;
            margin-bottom: 10px;
            color: #007bff; 
        }

        /* Specific icon colors */
        .category-group a.ruko i { color: #007bff; }
        .category-group a.kios i { color: #28a745; }
        .category-group a.lahan i { color: #ffc107; }
        .category-group a.gudang i { color: #6c757d; }
        .category-group a.rumah i { color: #17a2b8; }
        .category-group a.mangkal i { color: #dc3545; }
        .category-group a.teras i { color: #fd7e14; }
        .category-group a.mall i { color: #6f42c1; }
        .category-group a.semua i { color: #343a40; }


        .all-categories-button {
            text-decoration: none;
            background-color: #000000;
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
            display: inline-block;
        }
        .all-categories-button:hover {
            background-color: #212529;
        }

        /* --- Contact Section Styling (BARU) --- */
        .contact-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 15px; /* Jarak antar tombol */
            margin-top: 30px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px; /* Jarak ikon ke teks */
            background-color: rgba(255, 255, 255, 0.1); /* Transparan */
            padding: 15px 25px;
            border-radius: 50px; /* Bentuk Kapsul */
            color: #ffffff;
            text-decoration: none;
            font-size: 1.1em;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: fit-content;
            min-width: 320px; /* Lebar minimum agar rapi */
        }

        .contact-item:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: scale(1.02);
        }

        .contact-item i {
            font-size: 1.5em;
        }

        /* Warna Ikon Kontak */
        .contact-item .fa-whatsapp { color: #25D366; }
        .contact-item .fa-envelope { color: #ffc107; }


        /* --- Footer --- */
        .footer {
            background-color: #050505;
            color: white;
            text-align: center;
            padding: 30px 5%;
            font-size: 0.9em;
        }
    </style>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <nav class="navbar">
        <a href="homepage.php" class="logo"><i class="fas fa-map-marked-alt"></i> GEOLOKA</a>
        <ul class="nav-links">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="#category-selection">Cari Lokasi</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
        </nav>

    <section class="hero-section">
        <div class="hero-content">
            <h1>Petakan Sukses Bisnismu</h1>
            <p>Sistem Informasi Geografis kami menganalisis potensi pasar, demografi, dan kompetisi untuk memberikan rekomendasi lokasi terbaik yang selalu *up-to-date*.</p>
            <div class="hero-buttons">
                <a href="#category-selection" class="main-btn">Lihat Lokasi</a>
                <a href="#about" class="secondary-btn">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <section id="category-selection" class="category-section">
        <h2>Pilih Jenis Tempat Usaha yang Anda Cari</h2>
        <p>Mulai perjalanan bisnis Anda dengan memilih jenis lokasi yang paling sesuai dengan kebutuhan UMKM Anda. Kami memiliki data lengkap untuk berbagai pilihan.</p>

        <div class="category-group-wrapper">
            
            <div>
                <h3>Berdasarkan Struktur Fisik</h3>
                <div class="category-group">
                    <a class="ruko"><i class="fas fa-store"></i> Ruko/Rukan</a>
                    <a class="kios"><i class="fas fa-cash-register"></i> Kios/Los Pasar</a>
                    <a class="lahan"><i class="fas fa-tree"></i> Lahan Kosong</a>
                    <a class="gudang"><i class="fas fa-warehouse"></i> Gudang/Bengkel</a>
                    <a class="rumah"><i class="fas fa-home"></i> Rumah Industry</a>
                </div>
            </div>

            <div>
                <h3>Berdasarkan Sifat Operasional</h3>
                <div class="category-group">
                    <a class="mangkal"><i class="fas fa-truck-moving"></i> Tempat Mangkal</a>
                    <a class="teras"><i class="fas fa-chair"></i> Teras/Pelataran</a>
                    <a class="mall"><i class="fas fa-shopping-bag"></i> Pusat Keramaian</a>
                </div>
            </div>

        </div> 
        
        <div class="center-button-wrapper" style="margin-top: 80px; margin-bottom: 50px;"> 
            <a href="index.php?jenis=Semua" class="all-categories-button">
                Tampilkan Semua Lokasi
            </a>
        </div>
    </section>
    
    <section id="contact" class="category-section">
        <h2>Kontak Kami</h2>
        <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi kami.</p>
        
        <div class="contact-container">
            <a href="https://wa.me/6282338093846" target="_blank" class="contact-item">
                <i class="fab fa-whatsapp"></i>
                <span>+62 8233 8093 846</span>
            </a>

            <a href="mailto:Darirakyatuntukrakyat@gmail.com" class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>Darirakyatuntukrakyat@gmail.com</span>
            </a>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; Since 2024, stand for the people and for the sake of the people</p>
    </footer>

</body>
</html>