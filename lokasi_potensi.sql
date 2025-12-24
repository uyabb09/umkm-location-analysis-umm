-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2025 at 04:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig_potensi_lokasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_potensi`
--

CREATE TABLE `lokasi_potensi` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `lat` varchar(100) NOT NULL,
  `lon` varchar(100) NOT NULL,
  `status_ketersediaan` enum('Kosong','Terisi','Segera Kosong') NOT NULL DEFAULT 'Kosong',
  `nomor_hp` varchar(50) DEFAULT NULL,
  `kondisi_jalan` varchar(100) DEFAULT NULL,
  `tingkat_keramaian` int(1) DEFAULT 0,
  `dominasi_sekitar` text DEFAULT NULL,
  `foto_lokasi` varchar(255) DEFAULT 'default.jpg',
  `tanggal_update` date DEFAULT NULL,
  `skor_akhir` decimal(5,2) DEFAULT NULL,
  `kategori_ruko` varchar(40) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi_potensi`
--

INSERT INTO `lokasi_potensi` (`id`, `nama_lokasi`, `alamat`, `lat`, `lon`, `status_ketersediaan`, `nomor_hp`, `kondisi_jalan`, `tingkat_keramaian`, `dominasi_sekitar`, `foto_lokasi`, `tanggal_update`, `skor_akhir`, `kategori_ruko`, `keterangan`) VALUES
(1, 'ruko depan rays', NULL, '-7.920234', '112.593977', 'Kosong', '081321399548', 'Jalan Raya Besar', 4, 'banyak warung ', 'https://drive.google.com/open?id=1YjBBSjwFgaKvRVl-jyzJ8YbOb4fPm1gh', '2025-12-14', 80.00, 'Ruko', NULL),
(2, 'ruko depan rays', NULL, '-7.920234', '112.593977', 'Kosong', '081335165689', 'Jalan Raya Besar', 4, 'banyak warung madura( sekitar ruko kosong)', 'https://drive.google.com/open?id=1uGJEwX4vpRdTBFlGfx4ql6BwqcsJXc_4', '2025-12-14', 80.00, 'Ruko', NULL),
(3, 'Ruko depan Hotel Rayz UMM', NULL, '-7.920188', '112.593915', 'Kosong', '081334495115', 'Jalan Raya Besar', 5, 'Barber, dan toko alat tulis', 'https://drive.google.com/open?id=12rYnhqEbvfEyYIYHhGX6t2RI2eJGe3iV', '2025-12-14', 100.00, 'Ruko', NULL),
(4, 'ruko depan rayz', NULL, '-7.920234', '112.593977', 'Kosong', '087831307955', 'Jalan Raya Besar', 4, 'sebelah nya toko atk( banyak ruko kosong)', 'https://drive.google.com/open?id=1Qlosc4xem52q91j8R2tTUrx4Uhlx4_K_', '2025-12-14', 80.00, 'Ruko', NULL),
(5, 'depan toko buku umm', NULL, '-7.9202773', '112.5940822', 'Kosong', '087831307955', 'Jalan Raya Besar', 4, 'masih banyak ruko kosong', 'https://drive.google.com/open?id=1mHgdogI9gK_v62o30gPtszI6EVkrbExp', '2025-12-14', 80.00, 'Kios/Lapak', NULL),
(6, 'ruko samping rujak ndower', NULL, '-7.924409', '112.5994516', 'Kosong', '085231002429', 'Jalan Raya Besar', 4, 'banyak jual makanan ', 'https://drive.google.com/open?id=1BjdIDMv1CfkEbSvzgAt24TWVtTOZS_dS', '2025-12-14', 80.00, 'Ruko', NULL),
(7, 'sebelah laundri tlogomas', NULL, '-7.925009', '112.600279', 'Kosong', '081338659239', 'Jalan Raya Besar', 4, 'banyak laundry', 'https://drive.google.com/open?id=1xd_bg_sTmfQOHMVkjNeCRpPSbbs0vSFw', '2025-12-14', 80.00, 'Kios/Lapak', NULL),
(8, 'depan cw coffe', NULL, '-7.9252239', '112.6005346', 'Kosong', '089647494372', 'Jalan Raya Besar', 4, 'banyak coffe', 'https://drive.google.com/open?id=1kEkXQw4N6WL_wOGRJI_atZ5-KUK9lQhO', '2025-12-14', 80.00, 'Rumah Tinggal', NULL),
(9, 'samping ce coffe', NULL, '-7.9253451', '112.6004652', 'Kosong', '', 'Jalan Raya Besar', 4, 'banyak coffe', 'https://drive.google.com/open?id=1KfI3WmrsrxE5nkw6JYzX8bIbUJ9r8nzJ', '2025-12-14', 80.00, 'Rumah Tinggal', NULL),
(10, 'sebelah timur harmonie homestay', NULL, '-7.9253763', '112.6007116', 'Kosong', '082132870308', 'Jalan Raya Besar', 4, 'banyak warung makan', 'https://drive.google.com/open?id=1mZLSyVyrtG9MndVuvuqr153xqZpVglqX', '2025-12-14', 80.00, 'Ruko', NULL),
(11, 'sebelah barat paket express', NULL, '-7.9253763', '112.6007116', 'Kosong', '081216293355', 'Jalan Raya Besar', 5, 'bermacam macam, tapi tidak ada yang jual makanan', 'https://drive.google.com/open?id=1qiBC4F5gnpkwIYWQkhqgOGdcRtRO4OXy', '2025-12-14', 100.00, 'Kios/Lapak', NULL),
(12, 'sebelah timur warung pecel sleko', NULL, '-7.925993', '112.6014063', 'Kosong', '087784531250', 'Jalan Raya Besar', 5, 'banyak warung makan', 'https://drive.google.com/open?id=17hGsyh4j2sPkssUCOOA9T6Fs8ncN_2-P', '2025-12-14', 100.00, 'Kios/Lapak', NULL),
(13, 'sebelah barat warung pecel sleko', NULL, '-7.9257718', '112.6011977', 'Kosong', '', 'Jalan Raya Besar', 4, 'banyak jual makanan berat', 'https://drive.google.com/open?id=1bEbvTCKcIvs94DzlBCoHCdnMbYo-HhtB', '2025-12-14', 80.00, 'Ruko', NULL),
(14, 'depan toko raja sakti', NULL, '-7.9244528', '112.5993447', 'Kosong', '085236509383', 'Jalan Raya Besar', 4, 'banyak jual makanan ringan', 'https://drive.google.com/open?id=1KHRm6sS5Y_2HoxNzXcIfrLBiLGFnokjx', '2025-12-14', 80.00, 'Kios/Lapak', NULL),
(15, 'Sebelah Timur Terminal Landungsari', NULL, '-7.92432', '112.5991928', 'Kosong', '08113667491', 'Jalan Raya Besar', 5, 'dekat masjid, dekat konter hp', 'https://drive.google.com/open?id=1-er7Hy6ouPXiMCKFEg7dshUK6IeYBrfY', '2025-12-14', 100.00, 'Kios/Lapak', NULL),
(16, 'Jl. Raya Dawuhan No.132, Wunutsari, Tegalgondo, Kec. Karang Ploso, Kabupaten Malang, Jawa Timur 65152', NULL, '-7.9127849', '112.589804', 'Kosong', '0851 00314338', 'Mobil Simpangan (2 jalur)', 3, 'Banyak Jualan makanan, Laundry, Masjid, ', 'https://drive.google.com/open?id=1Oces31WPPTRIqGpEOmv-9sO3_AyGq__5', '2025-12-14', 60.00, 'Rumah Tinggal', NULL),
(17, 'samping pegadaian', NULL, '-7.9240769', '112.5986879', 'Kosong', '081252333055', 'Jalan Raya Besar', 4, 'beragam tapi bukan jual makanan', 'https://drive.google.com/open?id=1klzYe1qiQRTlChP4OKFetzToeTLeumTZ', '2025-12-14', 80.00, 'Ruko', NULL),
(18, 'sebelah utara koba rasa dan pancong', NULL, '-7.9235091', '112.597334', 'Kosong', '', 'Mobil Simpangan (2 jalur)', 3, 'banyak jualanan makanan berat', 'https://drive.google.com/open?id=1SSHsxAenoX_Zo5jceGCGw5BYIc1BVXYi', '2025-12-14', 60.00, 'Ruko', NULL),
(19, 'sebelah sambal killer', NULL, '-7.9259482', '112.595492', 'Kosong', '082131083488', 'Mobil Simpangan (2 jalur)', 3, 'banyak jualan makanan berat', 'https://drive.google.com/open?id=1sZRokmq2VIL7ZY6hmB4qxNIFzPQYQAtk', '2025-12-14', 60.00, 'Kios/Lapak', NULL),
(20, 'Jl. Tegalgondo, Wunutsari, Tegalgondo, Karang Ploso, Malang Regency, East Java 65152 (sebelah toko bangunan berkah illahi)', NULL, '-7.9148385', '112.5915461', 'Kosong', '081 334 145 252', 'Mobil Simpangan (2 jalur)', 3, 'Cafe, Laundry, Jajanan Ringan, Banyak jual makanan berat', 'https://drive.google.com/open?id=1qzxmNuD-wXsngEYRpeU8IvX2tvVmgoDI', '2025-12-14', 60.00, 'Lahan Kosong', NULL),
(21, 'sebelah toko sisma', NULL, '-7.9259986', '112.5953334', 'Kosong', '0895333600060', 'Mobil Simpangan (2 jalur)', 3, 'banyak jual makanan', 'https://drive.google.com/open?id=1c1zP5nkJ8LlVXxk6wur9xJyi6Bn9F90B', '2025-12-14', 60.00, 'Ruko', NULL),
(22, 'samping cuci separu republik bersih', NULL, '-7.9268398', '112.5948365', 'Kosong', '', 'Mobil Simpangan (2 jalur)', 3, 'banyak jualan makanan', 'https://drive.google.com/open?id=1HSpHRi6mS50L4Xh53Lex6SKh2bqqHTQ8', '2025-12-14', 60.00, 'Kios/Lapak', NULL),
(23, '3HMV+884, Jalan, Babatan, Tegalgondo, Karang Ploso, Malang Regency, East Java 65152', NULL, '-7.9168386', '112.5932259', 'Kosong', '085 234 500 332', 'Mobil Simpangan (2 jalur)', 3, 'Cafe, Laundry', 'https://drive.google.com/open?id=1KBjW9imf_Rmr7A5F9R0zfbFejiiri-jB', '2025-12-14', 60.00, 'Lahan Kosong', NULL),
(24, 'sebelah mie ayam pak doel', NULL, '-7.9274578', '112.5943651', 'Kosong', '082131850356', 'Mobil Simpangan (2 jalur)', 3, 'banyak jualan makanan', 'https://drive.google.com/open?id=1-9dkfWuKnzR9cW08iTb2qJhTLqOFy-WR', '2025-12-14', 60.00, 'Ruko', NULL),
(25, 'depan bakso sayur ub malang', NULL, '-7.9274657', '112.5942495', 'Kosong', '082331664880', 'Mobil Simpangan (2 jalur)', 3, 'banyak kost ', 'https://drive.google.com/open?id=1ARhdEpIjdJPh-hVJNxXoUTAgJejRo6GU', '2025-12-14', 60.00, 'Kios/Lapak', NULL),
(26, 'depan kantor desa landung sari', NULL, '-7.9278161', '112.5939984', 'Kosong', '082257225789', 'Mobil Simpangan (2 jalur)', 3, 'banyak jual makanan', 'https://drive.google.com/open?id=1Dk92NEdCNeeq9BFpGm6VQwcsT4HI_nbj', '2025-12-14', 60.00, 'Rumah Tinggal', NULL),
(27, 'Sebelah Utara Kantor Desa Landungsari', NULL, '-7.9277101', '112.5939873', 'Kosong', '08885828588 / 085103011388', 'Mobil Simpangan (2 jalur)', 4, 'sebelah apotek, banyak warung nasi', 'https://drive.google.com/open?id=1f55nnd_o3de6hGyUppLnzwD8pcBEbEFC', '2025-12-14', 80.00, 'Ruko', NULL),
(28, 'Belakang Jl. Karyawiguna No.24, Babatan, Tegalgondo, Kec. Karang Ploso, Kabupaten Malang, Jawa Timur 65152', NULL, '-7.9186863', '112.5953314', 'Kosong', '', 'Mobil Simpangan (2 jalur)', 2, 'Warung makan, Sablon Baju', 'https://drive.google.com/open?id=1lgo-BmwtTl-3RFbS6Wkyu93krRQs3asJ', '2025-12-14', 40.00, 'Lahan Kosong', NULL),
(29, 'depan fotokopi bintang', NULL, '-7.9251289', '112.5963674', 'Kosong', '085608635327', 'Mobil Simpangan (2 jalur)', 3, 'banyak jual makanan berat', 'https://drive.google.com/open?id=1nxRtg_xMd2FZdgQp56teVNfs8laICnFY', '2025-12-14', 60.00, 'Kios/Lapak', NULL),
(30, 'sebelah oyi chicken', NULL, '-7.9230485', '112.5968821', 'Kosong', '', 'Jalan Raya Besar', 4, 'banyak jualan makanan berat', 'https://drive.google.com/open?id=1leGkAjgW7Zf-_9xSB9G4WTBrvnUfiJu0', '2025-12-14', 80.00, 'Ruko', NULL),
(31, 'sebelah oyi chicken', NULL, '-7.9230485', '112.5968821', 'Kosong', '', 'Jalan Raya Besar', 4, 'banyak jualan makanan berat', 'https://drive.google.com/open?id=106WYOD8efZYnfcwsIRP1UnfFXHu27tLB', '2025-12-14', 80.00, 'Lahan Kosong', NULL),
(32, 'Ruko Dapur Aisyah, Jl. Karyawiguna Ruko No.3-4, RT.13/RW.04, Wunuksari, Tegalgondo, Kec. Karang Ploso, Kota Malang, Jawa Timur 65152', NULL, '-7.9174048', '112.5937372', 'Kosong', '085 108 356 789', 'Mobil Simpangan (2 jalur)', 4, 'Banyak Kost, Warung makan', 'https://drive.google.com/open?id=1ApkcTliOEgC8nyPWHN9oShsGixCamBvB', '2025-12-14', 80.00, 'Ruko', NULL),
(33, 'depan spbu umm', NULL, '-7.920895', '112.594708', 'Kosong', '', 'Jalan Raya Besar', 4, 'banyak warkop', 'https://drive.google.com/open?id=1UM0R0F5jv5llRks_vmHdGzdoIdO5qZS9', '2025-12-14', 80.00, 'Kios/Lapak', NULL),
(34, 'Sebelah Hj. Syahrini Kantin & Catering', NULL, '-7.9226015', '112.6018009', 'Kosong', '0877 8454 0518', 'Mobil Simpangan (2 jalur)', 5, 'Banyak Cafe, Banyak Warung makan, Banyak Jajanan', 'https://drive.google.com/open?id=1HdlzLCxffO12jWjeX8GIliy_UOnGoPht', '2025-12-14', 100.00, 'Lahan Kosong', NULL),
(35, '(Jaya Makmur) 3JG3+6GW, Jl. Saxophone, Tunggulwulung, Kec. Lowokwaru, Kota Malang, Jawa Timur 65143', NULL, '-7.9243642', '112.6038216', 'Kosong', '0819-4489-1642', 'Mobil Simpangan (2 jalur)', 5, 'Banyak warkop, Banyak Jual Makanan dan jajanan, Laundry, Thrift. ', 'https://drive.google.com/open?id=1BMiB_BIOYe5H3A_T8IAPunS7PmYNFQNS', '2025-12-14', 100.00, 'Kios/Lapak', NULL),
(36, 'Depan The RIL Second ', NULL, '-7.9251518', '112.6043534', 'Kosong', '085649504123', 'Mobil Simpangan (2 jalur)', 5, 'Foodcourt, Cafe, Thrift, Bengkel Motor, Kuburan', 'https://drive.google.com/open?id=1epjQ_HByzd7FbU4xOhddRpi0AVkuom4U', '2025-12-14', 100.00, 'Ruko', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lokasi_potensi`
--
ALTER TABLE `lokasi_potensi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lokasi_potensi`
--
ALTER TABLE `lokasi_potensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
