-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2026 pada 05.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_ekstra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Pramuka', 'Pramuka', 'alternatif/LOes0TQSwNEgdNPSadaR6EOzRfF6Y3TIFuHMJvam.png', '2025-11-11 06:00:51', '2026-05-17 23:49:34'),
(2, 'PMR', 'PMR', 'alternatif/1gR5gvGJB9APEfKlEO6FQR7MqRZfqqmsxWOaM8oU.png', '2025-11-11 06:01:25', '2026-05-17 23:50:44'),
(3, 'Paskib', 'Paskib', 'alternatif/4DocqbfYFEOxfTRY94Rwk8VRxKuB5gqdHvRFR4x1.jpg', '2025-11-11 06:01:58', '2026-05-17 23:52:08'),
(4, 'Marching band', 'Marching band', 'alternatif/LdNWOtE5wVPE0ICMtiHWyHiDBesPTsQ5ssifZqAp.jpg', '2025-11-11 06:02:38', '2026-05-17 23:53:06'),
(6, 'Panahan', 'Panahan', 'alternatif/1U4FnbwZm0jPLVD0FmuuhAv6yVA29GRIrzf0KvGH.jpg', '2026-05-17 23:54:16', '2026-05-17 23:54:16'),
(8, 'Seni tari dan seni suara', 'Seni tari dan seni suara', 'alternatif/FFBGG5B9Ur0DVb0kp2hGaJ682932s46rARPLGeST.jpg', '2026-05-17 23:56:13', '2026-05-17 23:56:13'),
(9, 'Basket', 'Basket', 'alternatif/x3W1Z0eetochajaiWRostWZneywsiCetkxnAy4gp.jpg', '2026-05-17 23:56:52', '2026-05-17 23:56:52'),
(10, 'Sepak Bola', 'Sepak Bola', 'alternatif/DakEdmbgIPwTzeE17i5Bm3SEYSs7DiJ2rrd29H80.jpg', '2026-05-17 23:58:00', '2026-05-17 23:58:00'),
(11, 'Bulutangkis', 'Bulutangkis', 'alternatif/DxhgOBtl2QOSEjvQzaM5jc5zxjjM0bY6q1F7IKTS.jpg', '2026-05-17 23:59:27', '2026-05-17 23:59:27'),
(12, 'Volleyball', 'Volleyball', 'alternatif/YJKxp4L04BUajNehdGbKUfB2xS97NdyiXMwuJzV6.jpg', '2026-05-18 00:00:18', '2026-05-18 00:00:18'),
(13, 'Dakwah', 'Dakwah', 'alternatif/kkPloGR89SboSBIjA1egnGIcajpacOp4sd2FWPWM.jpg', '2026-05-18 00:01:13', '2026-05-18 00:01:13'),
(14, 'Kelompok Ilmiah Remaja', 'Kelompok Ilmiah Remaja', 'alternatif/d2UbS2L7WgAd7jJeW16QbF5mf2iyk58bnBZV30Td.jpg', '2026-05-18 00:01:50', '2026-05-18 00:01:50'),
(15, 'Robotik', 'Robotik', 'alternatif/2FhMw6xgGcnMbLTvzBsQgyb6QpAfL0yJ42nsigxo.jpg', '2026-05-18 00:02:39', '2026-05-18 00:02:39'),
(16, 'Osis', 'Osis', 'alternatif/vgAr6119keMQ4RBFfHMPNUFCpH1aDtM6rZWRwQxd.jpg', '2026-05-18 00:06:01', '2026-05-18 00:06:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `bobot` decimal(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `deskripsi`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'Kepemimpinan', 'Kepemimpinan', 0.5421, '2025-11-11 05:58:43', '2026-05-16 19:51:07'),
(2, 'Kerjasama', 'Kerjasama', 0.0844, '2025-11-11 05:58:57', '2026-05-16 19:51:25'),
(3, 'Kedisiplinan', 'Kedisiplinan', 0.2338, '2025-11-11 05:59:09', '2026-05-16 19:51:46'),
(4, 'Kreativitas', 'Kreativitas', 0.1396, '2025-11-11 05:59:23', '2026-05-16 19:52:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2025_11_11_115936_create_kriteria_table', 1),
(24, '2025_11_11_123547_create_alternatif_table', 1),
(25, '2025_11_11_125450_create_perbandingan_kriteria_table', 1),
(26, '2025_11_11_131623_create_perbandingan_alternatif_table', 1),
(27, '2025_11_11_135303_create_preferensi_pembeli_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbandingan_alternatif`
--

CREATE TABLE `perbandingan_alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_1_id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_2_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` decimal(8,4) NOT NULL DEFAULT 1.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perbandingan_alternatif`
--

INSERT INTO `perbandingan_alternatif` (`id`, `alternatif_1_id`, `alternatif_2_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1.0000, '2025-11-11 06:54:32', '2025-11-22 05:06:28'),
(2, 1, 3, 1, 3.0000, '2025-11-11 06:54:32', '2025-11-22 05:06:28'),
(3, 1, 4, 1, 2.0000, '2025-11-11 06:54:32', '2025-11-22 05:06:28'),
(4, 2, 3, 1, 3.0000, '2025-11-11 06:54:32', '2025-11-22 05:06:28'),
(5, 2, 4, 1, 2.0000, '2025-11-11 06:54:32', '2025-11-22 05:06:28'),
(6, 3, 4, 1, 0.5000, '2025-11-11 06:54:32', '2025-11-22 05:06:28'),
(7, 1, 2, 3, 3.0000, '2025-11-11 06:55:14', '2025-11-22 05:17:24'),
(8, 1, 3, 3, 2.0000, '2025-11-11 06:55:14', '2025-11-22 05:17:24'),
(9, 1, 4, 3, 4.0000, '2025-11-11 06:55:14', '2025-11-22 05:17:24'),
(10, 2, 3, 3, 0.5000, '2025-11-11 06:55:14', '2025-11-22 05:17:24'),
(11, 2, 4, 3, 2.0000, '2025-11-11 06:55:14', '2025-11-22 05:17:24'),
(12, 3, 4, 3, 3.0000, '2025-11-11 06:55:14', '2025-11-22 05:17:24'),
(13, 1, 2, 2, 1.0000, '2025-11-11 06:55:49', '2025-11-22 05:15:57'),
(14, 1, 3, 2, 0.5000, '2025-11-11 06:55:49', '2025-11-22 05:15:57'),
(15, 1, 4, 2, 2.0000, '2025-11-11 06:55:49', '2025-11-22 05:15:57'),
(16, 2, 3, 2, 0.5000, '2025-11-11 06:55:49', '2025-11-22 05:15:57'),
(17, 2, 4, 2, 2.0000, '2025-11-11 06:55:49', '2025-11-22 05:15:58'),
(18, 3, 4, 2, 3.0000, '2025-11-11 06:55:49', '2025-11-22 05:15:58'),
(19, 1, 2, 4, 0.5000, '2025-11-11 06:56:17', '2025-11-22 05:19:07'),
(20, 1, 3, 4, 1.0000, '2025-11-11 06:56:17', '2025-11-22 05:19:07'),
(21, 1, 4, 4, 0.3333, '2025-11-11 06:56:17', '2025-11-22 05:19:07'),
(22, 2, 3, 4, 2.0000, '2025-11-11 06:56:17', '2025-11-22 05:19:07'),
(23, 2, 4, 4, 0.5000, '2025-11-11 06:56:17', '2025-11-22 05:19:07'),
(24, 3, 4, 4, 0.3333, '2025-11-11 06:56:17', '2025-11-22 05:19:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_1_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_2_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` decimal(8,4) NOT NULL DEFAULT 1.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id`, `kriteria_1_id`, `kriteria_2_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5.0000, '2025-11-11 06:22:59', '2025-12-08 12:29:06'),
(2, 1, 3, 3.0000, '2025-11-11 06:22:59', '2025-12-08 12:29:06'),
(3, 1, 4, 4.0000, '2025-11-11 06:22:59', '2025-12-08 12:29:06'),
(4, 2, 3, 0.3300, '2025-11-11 06:22:59', '2025-12-08 12:29:06'),
(5, 2, 4, 0.5000, '2025-11-11 06:22:59', '2025-12-08 12:29:06'),
(6, 3, 4, 2.0000, '2025-11-11 06:22:59', '2025-12-08 12:29:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `preferensi_pembeli`
--

CREATE TABLE `preferensi_pembeli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `nilai_kriteria` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`nilai_kriteria`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `preferensi_pembeli`
--

INSERT INTO `preferensi_pembeli` (`id`, `nama_pembeli`, `nilai_kriteria`, `created_at`, `updated_at`) VALUES
(1, 'adi', '{\"1\":\"5\",\"2\":\"2\",\"3\":\"4\",\"4\":\"3\"}', '2025-11-11 06:59:42', '2025-11-11 06:59:42'),
(2, 'adam', '{\"1\":\"2\",\"2\":\"5\",\"3\":\"3\",\"4\":\"5\"}', '2025-11-11 07:00:58', '2025-11-11 07:00:58'),
(3, 'ade', '{\"1\":\"1\",\"2\":\"8\",\"3\":\"5\",\"4\":\"9\"}', '2025-11-11 07:02:13', '2025-11-11 07:02:13'),
(4, 'aan', '{\"1\":\"1\",\"2\":\"5\",\"3\":\"2\",\"4\":\"9\"}', '2025-11-11 07:05:49', '2025-11-11 07:05:49'),
(5, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 07:42:39', '2025-11-11 07:42:39'),
(6, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 07:51:42', '2025-11-11 07:51:42'),
(7, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 07:52:41', '2025-11-11 07:52:41'),
(8, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 07:52:49', '2025-11-11 07:52:49'),
(9, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 07:59:20', '2025-11-11 07:59:20'),
(10, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 08:01:21', '2025-11-11 08:01:21'),
(11, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 08:06:20', '2025-11-11 08:06:20'),
(12, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 08:08:02', '2025-11-11 08:08:02'),
(13, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 08:08:28', '2025-11-11 08:08:28'),
(14, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 08:11:46', '2025-11-11 08:11:46'),
(15, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 08:12:35', '2025-11-11 08:12:35'),
(16, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 08:14:25', '2025-11-11 08:14:25'),
(17, 'ade', '{\"1\":\"9\",\"2\":\"2\",\"3\":\"6\",\"4\":\"5\"}', '2025-11-11 08:22:44', '2025-11-11 08:22:44'),
(18, 'adi', '{\"1\":\"9\",\"2\":\"1\",\"3\":\"8\",\"4\":\"2\"}', '2025-11-11 08:23:36', '2025-11-11 08:23:36'),
(19, 'ade', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-11 11:24:31', '2025-11-11 11:24:31'),
(20, 'dffddf', '{\"1\":\"2\",\"2\":\"3\",\"3\":\"4\",\"4\":\"5\"}', '2025-11-12 02:18:07', '2025-11-12 02:18:07'),
(21, 'ade', '{\"1\":\"9\",\"2\":\"3\",\"3\":\"5\",\"4\":\"3\"}', '2025-11-12 09:43:37', '2025-11-12 09:43:37'),
(22, 'ade', '{\"1\":\"9\",\"2\":\"3\",\"3\":\"1\",\"4\":\"7\"}', '2025-11-12 09:44:47', '2025-11-12 09:44:47'),
(23, 'adi', '{\"1\":\"9\",\"2\":\"3\",\"3\":\"1\",\"4\":\"7\"}', '2025-11-12 10:00:30', '2025-11-12 10:00:30'),
(24, 'adi', '{\"1\":\"7\",\"2\":\"2\",\"3\":\"7\",\"4\":\"1\"}', '2025-11-12 10:02:28', '2025-11-12 10:02:28'),
(25, 'adi', '{\"1\":\"9\",\"2\":\"3\",\"3\":\"7\",\"4\":\"1\"}', '2025-11-12 10:15:19', '2025-11-12 10:15:19'),
(26, 'Pembeli', '{\"1\":\"9\",\"2\":\"3\",\"3\":\"7\",\"4\":\"1\"}', '2025-11-12 10:27:52', '2025-11-12 10:27:52'),
(27, 'Pembeli', '{\"1\":\"9\",\"2\":\"3\",\"3\":\"7\",\"4\":\"1\"}', '2025-11-12 18:11:48', '2025-11-12 18:11:48'),
(28, 'Pembeli', '{\"1\":\"5\",\"2\":\"3\",\"3\":\"9\",\"4\":\"2\"}', '2025-11-14 06:23:32', '2025-11-14 06:23:32'),
(29, 'Pembeli', '{\"1\":\"4\",\"2\":\"6\",\"3\":\"3\",\"4\":\"8\"}', '2025-11-14 18:58:32', '2025-11-14 18:58:32'),
(30, 'Pembeli', '{\"1\":\"7\",\"2\":\"9\",\"3\":\"5\",\"4\":\"3\"}', '2025-11-14 19:33:52', '2025-11-14 19:33:52'),
(31, 'Pembeli', '{\"1\":\"9\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-14 19:51:22', '2025-11-14 19:51:22'),
(32, 'Pembeli', '{\"1\":\"9\",\"2\":\"9\",\"3\":\"9\",\"4\":\"9\"}', '2025-11-14 19:54:53', '2025-11-14 19:54:53'),
(33, 'Pembeli', '{\"1\":\"9\",\"2\":\"9\",\"3\":\"9\",\"4\":\"9\"}', '2025-11-14 19:55:16', '2025-11-14 19:55:16'),
(34, 'Pembeli', '{\"1\":\"9\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\"}', '2025-11-14 19:55:45', '2025-11-14 19:55:45'),
(35, 'Pembeli', '{\"1\":\"9\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\"}', '2025-11-14 19:58:52', '2025-11-14 19:58:52'),
(36, 'Pembeli', '{\"1\":\"9\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\"}', '2025-11-14 20:09:54', '2025-11-14 20:09:54'),
(37, 'Pembeli', '{\"1\":\"1\",\"2\":\"8\",\"3\":\"3\",\"4\":\"8\"}', '2025-11-14 21:27:58', '2025-11-14 21:27:58'),
(38, 'Pembeli', '{\"1\":\"3\",\"2\":\"5\",\"3\":\"8\",\"4\":\"5\"}', '2025-11-14 21:50:15', '2025-11-14 21:50:15'),
(39, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-18 03:55:07', '2025-11-18 03:55:07'),
(40, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-18 05:33:37', '2025-11-18 05:33:37'),
(41, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-22 04:21:16', '2025-11-22 04:21:16'),
(42, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-22 04:21:51', '2025-11-22 04:21:51'),
(43, 'Pembeli', '{\"1\":\"2\",\"2\":\"7\",\"3\":\"4\",\"4\":\"8\"}', '2025-11-22 04:28:25', '2025-11-22 04:28:25'),
(44, 'Pembeli', '{\"1\":\"1\",\"2\":\"5\",\"3\":\"3\",\"4\":\"9\"}', '2025-11-22 05:21:35', '2025-11-22 05:21:35'),
(45, 'Pembeli', '{\"1\":\"3\",\"2\":\"1\",\"3\":\"7\",\"4\":\"9\"}', '2025-11-23 00:53:27', '2025-11-23 00:53:27'),
(46, 'Pembeli', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\"}', '2025-11-23 00:54:14', '2025-11-23 00:54:14'),
(47, 'Pembeli', '{\"1\":\"1\",\"2\":\"6\",\"3\":\"3\",\"4\":\"8\"}', '2025-11-23 00:54:29', '2025-11-23 00:54:29'),
(48, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-23 01:11:09', '2025-11-23 01:11:09'),
(49, 'Pembeli', '{\"1\":\"9\",\"2\":\"3\",\"3\":\"8\",\"4\":\"5\"}', '2025-11-23 01:11:33', '2025-11-23 01:11:33'),
(50, 'Pembeli', '{\"1\":\"2\",\"2\":\"9\",\"3\":\"6\",\"4\":\"3\"}', '2025-11-23 01:12:05', '2025-11-23 01:12:05'),
(51, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-11-23 01:16:40', '2025-11-23 01:16:40'),
(52, 'Pembeli', '{\"1\":\"1\",\"2\":\"5\",\"3\":\"3\",\"4\":\"9\"}', '2025-11-23 01:21:30', '2025-11-23 01:21:30'),
(53, 'Pembeli', '{\"1\":\"3\",\"2\":\"9\",\"3\":\"5\",\"4\":\"1\"}', '2025-11-25 04:55:41', '2025-11-25 04:55:41'),
(54, 'Pembeli', '{\"1\":\"9\",\"2\":\"2\",\"3\":\"5\",\"4\":\"7\"}', '2025-12-08 09:12:16', '2025-12-08 09:12:16'),
(55, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-12-08 13:19:00', '2025-12-08 13:19:00'),
(56, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2025-12-18 00:52:31', '2025-12-18 00:52:31'),
(57, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2026-01-15 06:40:43', '2026-01-15 06:40:43'),
(58, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2026-01-15 07:11:41', '2026-01-15 07:11:41'),
(59, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2026-01-15 07:15:25', '2026-01-15 07:15:25'),
(60, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2026-01-15 07:18:48', '2026-01-15 07:18:48'),
(61, 'Pembeli', '{\"1\":\"3\",\"2\":\"7\",\"3\":\"1\",\"4\":\"9\"}', '2026-01-15 07:19:49', '2026-01-15 07:19:49'),
(62, 'Pembeli', '{\"1\":\"2\",\"2\":\"5\",\"3\":\"8\",\"4\":\"3\"}', '2026-02-20 17:49:52', '2026-02-20 17:49:52'),
(63, 'Pembeli', '{\"1\":\"3\",\"2\":\"5\",\"3\":\"7\",\"4\":\"2\"}', '2026-02-20 18:33:46', '2026-02-20 18:33:46'),
(64, 'Pembeli', '{\"1\":\"2\",\"2\":\"6\",\"3\":\"7\",\"4\":\"3\"}', '2026-02-20 18:53:10', '2026-02-20 18:53:10'),
(65, 'Pembeli', '{\"1\":\"5\",\"2\":\"5\",\"3\":\"5\",\"4\":\"5\"}', '2026-05-16 19:52:20', '2026-05-16 19:52:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$LR.xVYKwNOPHg555dm5eJuVFgtdojQjf0rIjmzJ5VkfJQYYLhriu6', NULL, '2025-11-11 09:05:28', '2025-11-11 09:05:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perbandingan_alternatif_alternatif_1_id_foreign` (`alternatif_1_id`),
  ADD KEY `perbandingan_alternatif_alternatif_2_id_foreign` (`alternatif_2_id`),
  ADD KEY `perbandingan_alternatif_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perbandingan_kriteria_kriteria_1_id_foreign` (`kriteria_1_id`),
  ADD KEY `perbandingan_kriteria_kriteria_2_id_foreign` (`kriteria_2_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `preferensi_pembeli`
--
ALTER TABLE `preferensi_pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `preferensi_pembeli`
--
ALTER TABLE `preferensi_pembeli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD CONSTRAINT `perbandingan_alternatif_alternatif_1_id_foreign` FOREIGN KEY (`alternatif_1_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perbandingan_alternatif_alternatif_2_id_foreign` FOREIGN KEY (`alternatif_2_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perbandingan_alternatif_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD CONSTRAINT `perbandingan_kriteria_kriteria_1_id_foreign` FOREIGN KEY (`kriteria_1_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perbandingan_kriteria_kriteria_2_id_foreign` FOREIGN KEY (`kriteria_2_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
