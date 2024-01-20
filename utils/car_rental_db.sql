-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 01:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'Admin001', '$2y$12$1PHVlIvwhZ.zjvBAS0AtQOsU88HlOfof9zKI3H.Z6gNTdgvt9xTJy', '2024-01-20 04:37:34', '2024-01-20 04:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `tipe_mobil` varchar(20) NOT NULL,
  `kapasitas` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(20, '2024_01_02_040025_create_users_table', 1),
(21, '2024_01_03_093227_create_mobils_table', 1),
(22, '2024_01_05_161127_create_admins_table', 1),
(23, '2024_01_06_102532_create_kategoris_table', 1),
(24, '2024_01_09_034524_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobils`
--

CREATE TABLE `mobils` (
  `id_mobil` bigint(20) UNSIGNED NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `sewa_perjam` bigint(20) NOT NULL,
  `sewa_perhari` bigint(20) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `id_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobils`
--

INSERT INTO `mobils` (`id_mobil`, `no_plat`, `merk`, `warna`, `tahun`, `sewa_perjam`, `sewa_perhari`, `gambar`, `status`, `id_kategori`, `created_at`, `updated_at`) VALUES
(1, 'B 1234 AB', 'ALPHARD 2.5 G A/T', 'putih', 2021, 400000, 2000000, 'ALPHARD 2.5 G AT putih 2021.png', 'aktif', 'MPV', '2024-01-20 04:55:31', '2024-01-20 05:00:44'),
(2, 'D 5678 CD', 'ALPHARD 2.5 G A/T', 'Gold', 2023, 480000, 2400000, 'ALPHARD 2.5 G AT 2023.jpg', 'aktif', 'MPV', '2024-01-20 05:00:29', '2024-01-20 05:00:51'),
(3, 'F 9102 EF', 'ALPHARD 2.5 G A/T', 'putih', 2023, 480000, 2400000, 'ALPHARD 2.5 G AT putih 2023.png', 'aktif', 'MPV', '2024-01-20 05:02:18', '2024-01-20 05:02:18'),
(4, 'G 3456 GH', 'CAMRY 2.5V A/T', 'hitam', 2017, 240000, 1200000, 'CAMRY 2.5V AT hitam 2017.jpg', 'aktif', 'sedan', '2024-01-20 05:04:24', '2024-01-20 05:04:24'),
(5, 'J 7890 IJ', 'CAMRY Facelift 2.5 V A/T', 'putih', 2020, 300000, 1500000, 'CAMRY Facelift 2.5 V AT putih 2020.jpg', 'aktif', 'sedan', '2024-01-20 05:05:35', '2024-01-20 05:05:36'),
(6, 'K 1234 KL', 'FORTUNER 2.4 VRZ 4X2 A/T DSL GR SPORT', 'silver', 2021, 240000, 1200000, 'Fortuner-2.4-VRZ-2.7SRZ-with-Optional-TRD-Sportivo-Package-Front-e1507284764193.jpg', 'aktif', 'SUV', '2024-01-20 05:09:03', '2024-01-20 05:09:03'),
(7, 'M 5678 MN', 'FORTUNER 4x2 2.4 VRZ A/T DSL', 'putih', 2018, 200000, 1000000, 'toyota-all-new-fortuner-vrz-still-depan24.jpg', 'aktif', 'SUV', '2024-01-20 05:10:57', '2024-01-20 05:10:57'),
(8, 'P 9102 OP', 'INNOVA 2.0 G A/T', 'hitam', 2021, 150000, 600000, 'innova-g-so-tu-dong.jpg', 'aktif', 'MPV', '2024-01-20 05:12:44', '2024-01-20 05:12:45'),
(9, 'R 3456 RS', 'INNOVA 2.4 V A/T DSL', 'hitam', 2021, 175000, 700000, '58040_2021_Toyota_innova_crysta_1.jpg', 'aktif', 'MPV', '2024-01-20 05:14:22', '2024-01-20 05:14:22'),
(10, 'T 7890 TU', 'INNOVA VENTURER 2.4 A/T DSL', 'hitam', 2020, 220000, 800000, '1.jpg', 'aktif', 'MPV', '2024-01-20 05:15:39', '2024-01-20 05:15:39'),
(11, 'U 1234 UV', 'INNOVA ZENIX-G 2.0 HV', 'putih', 2023, 200000, 900000, '01.jpg', 'aktif', 'MPV', '2024-01-20 05:17:02', '2024-01-20 05:17:03'),
(12, 'W 5678 WX', 'LEXUS LX570 A/T DSL', 'hitam', 2015, 2000000, 10000000, 'Lexus-LX-570-2015-(4).jpg', 'aktif', 'SUV', '2024-01-20 05:19:08', '2024-01-20 05:19:08'),
(13, 'Y 9102 YZ', 'MERCY C300 AMG A/T', 'hitam', 2018, 500000, 2500000, 'image.png', 'aktif', 'sedan', '2024-01-20 05:20:34', '2024-01-20 05:20:34'),
(14, 'Z 3456 ZA', 'PAJERO SPORT DAKAR (4x2) A/T DSL', 'putih', 2021, 275000, 1300000, '275603-pajero-sport-ready-mitsubishi-pajero-dakar-4x2-at-tahun-2021-warna-putih-img-20220131-wa0012.jpg', 'aktif', 'SUV', '2024-01-20 05:22:20', '2024-01-20 05:22:20'),
(15, 'X 7890 XY', 'XPANDER Ultimate A/T', 'hitam', 2020, 150000, 600000, 'xpander.jpg', 'aktif', 'MPV', '2024-01-20 05:24:09', '2024-01-20 05:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `tgl_rental` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `jam_mulai` varchar(255) NOT NULL,
  `jam_selesai` varchar(255) NOT NULL,
  `biaya_sewa` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `denda` int(11) DEFAULT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `status_sewa` varchar(255) DEFAULT NULL,
  `status_pengembalian` tinyint(1) DEFAULT NULL,
  `id_mobil` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_admin` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_peminjam` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `foto_diri` varchar(255) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `jalan` varchar(150) DEFAULT NULL,
  `verifikasi` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_peminjam`, `nik`, `username`, `password`, `email`, `no_hp`, `foto_ktp`, `foto_diri`, `provinsi`, `kota`, `jalan`, `verifikasi`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ahmad Jaenal', '$2y$12$nmI3f4sO1fqHMcRBJsqfoOw0DcXSZvX65ithfGbCE0milUZ110nVy', 'ahmadjaenal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'eEPW5HEI1d', '2024-01-20 04:37:32', '2024-01-20 04:37:32'),
(2, NULL, 'Stefan', '$2y$12$2Kze3rji92Vrujjn5uahsO1dtZcS7.QnNFTrItrIKN8as24VmMwNe', 'stefan@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'cvLBRf8uGw', '2024-01-20 04:37:33', '2024-01-20 04:37:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobils`
--
ALTER TABLE `mobils`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mobils`
--
ALTER TABLE `mobils`
  MODIFY `id_mobil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_peminjam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
