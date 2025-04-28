-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2025 at 11:38 AM
-- Server version: 10.6.21-MariaDB-cll-lve
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inlifesu_tsel_hajii`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget_histories`
--

CREATE TABLE `budget_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_insentif_id` bigint(20) UNSIGNED NOT NULL,
  `change_amount` decimal(15,2) NOT NULL,
  `previous_budget` decimal(15,2) NOT NULL,
  `current_budget` decimal(15,2) NOT NULL,
  `action` enum('add','update','remove') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budget_insentif`
--

CREATE TABLE `budget_insentif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_insentif` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `insentifs`
--

CREATE TABLE `insentifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe_insentif` enum('persen','harga') NOT NULL,
  `nilai_insentif` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchandises`
--

CREATE TABLE `merchandises` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `merch_nama` varchar(255) NOT NULL,
  `merch_detail` text NOT NULL,
  `merch_stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stok_terakhir` int(11) NOT NULL DEFAULT 0,
  `merch_terambil` int(11) NOT NULL DEFAULT 0,
  `merch_terambil_history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`merch_terambil_history`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchandises`
--

INSERT INTO `merchandises` (`deleted_at`, `id`, `merch_nama`, `merch_detail`, `merch_stok`, `created_at`, `updated_at`, `stok_terakhir`, `merch_terambil`, `merch_terambil_history`) VALUES
('2025-04-08 07:14:55', 1, 'Payung', 'Payung', 95, NULL, '2025-04-08 07:14:55', 0, 5, '[{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Payung\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Payung\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Payung\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Payung\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Payung\"}]'),
('2025-04-08 07:14:59', 2, 'Bantal Leher', 'Bantal Leher', 97, NULL, '2025-04-08 07:14:59', 0, 3, '[{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Bantal Leher\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Bantal Leher\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Bantal Leher\"}]'),
('2025-04-08 07:14:57', 3, 'Tas Serut', 'Tas Serut', 96, NULL, '2025-04-08 07:14:57', 0, 4, '[{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Tas Serut\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Tas Serut\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Tas Serut\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Tas Serut\"}]'),
('2025-04-08 07:16:57', 4, 'Tumblr', 'Tumblr', 98, NULL, '2025-04-08 07:16:57', 0, 2, '[{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Tumblr\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Tumblr\"}]'),
('2025-04-08 07:15:02', 5, 'Kipas', 'Kipas', 95, NULL, '2025-04-08 07:15:02', 0, 5, '[{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Kipas\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Kipas\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Kipas\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Kipas\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"Kipas\"}]'),
(NULL, 6, 'BANTAL LEHER', 'BANTAL LEHER', 883, '2025-04-08 07:16:46', '2025-04-25 08:47:26', 0, 117, '[{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-09 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-17 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-17 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-19 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"},{\"tanggal\":\"2025-04-25 00:00:00\",\"jumlah\":1,\"merch_nama\":\"BANTAL LEHER\"}]'),
(NULL, 7, 'TUMBLER', 'TUMBLER', 902, '2025-04-08 07:17:22', '2025-04-24 02:48:30', 0, 98, '[{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-17 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-17 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-17 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-17 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-17 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-24 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"},{\"tanggal\":\"2025-04-24 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TUMBLER\"}]'),
(NULL, 8, 'PAYUNG', 'PAYUNG', 910, '2025-04-08 07:17:40', '2025-04-25 09:38:59', 0, 90, '[{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-08 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-24 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"},{\"tanggal\":\"2025-04-25 00:00:00\",\"jumlah\":1,\"merch_nama\":\"PAYUNG\"}]'),
(NULL, 9, 'TAS SERUT', 'TAS SERUT', 983, '2025-04-08 07:18:01', '2025-04-20 11:03:53', 0, 17, '[{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-10 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-11 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-16 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-17 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"TAS SERUT\"}]'),
(NULL, 10, 'TEMPAT AIR ZAMZAM', 'TEMPAT AIR ZAMZAM', 1000, '2025-04-08 07:18:30', '2025-04-08 07:18:30', 0, 0, NULL),
(NULL, 11, 'MINI FAN (KBIH TAKHOBAR)', 'Khusus untuk KBIH TAKHOBAR', 22, '2025-04-18 01:14:20', '2025-04-22 12:10:46', 0, 18, '[{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-20 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"},{\"tanggal\":\"2025-04-22 00:00:00\",\"jumlah\":1,\"merch_nama\":\"MINI FAN (KBIH TAKHOBAR)\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise_produk`
--

CREATE TABLE `merchandise_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `merchandise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchandise_produk`
--

INSERT INTO `merchandise_produk` (`id`, `produk_id`, `merchandise_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 4, 6, NULL, NULL),
(7, 4, 7, NULL, NULL),
(8, 4, 8, NULL, NULL),
(9, 4, 9, NULL, NULL),
(10, 4, 10, NULL, NULL),
(11, 5, 6, NULL, NULL),
(12, 5, 7, NULL, NULL),
(13, 5, 8, NULL, NULL),
(14, 5, 9, NULL, NULL),
(15, 5, 10, NULL, NULL),
(16, 6, 6, NULL, NULL),
(17, 6, 7, NULL, NULL),
(18, 6, 8, NULL, NULL),
(19, 6, 9, NULL, NULL),
(20, 6, 10, NULL, NULL),
(21, 7, 6, NULL, NULL),
(22, 7, 7, NULL, NULL),
(23, 7, 8, NULL, NULL),
(24, 7, 9, NULL, NULL),
(25, 7, 10, NULL, NULL),
(26, 8, 6, NULL, NULL),
(27, 8, 7, NULL, NULL),
(28, 8, 8, NULL, NULL),
(29, 8, 9, NULL, NULL),
(30, 8, 10, NULL, NULL),
(31, 9, 6, NULL, NULL),
(32, 9, 7, NULL, NULL),
(33, 9, 8, NULL, NULL),
(34, 9, 9, NULL, NULL),
(35, 9, 10, NULL, NULL),
(36, 10, 6, NULL, NULL),
(37, 10, 7, NULL, NULL),
(38, 10, 8, NULL, NULL),
(39, 10, 9, NULL, NULL),
(40, 10, 10, NULL, NULL),
(41, 11, 6, NULL, NULL),
(42, 11, 7, NULL, NULL),
(43, 11, 8, NULL, NULL),
(44, 11, 9, NULL, NULL),
(45, 11, 10, NULL, NULL),
(46, 12, 6, NULL, NULL),
(47, 12, 7, NULL, NULL),
(48, 12, 8, NULL, NULL),
(49, 12, 9, NULL, NULL),
(50, 12, 10, NULL, NULL),
(51, 13, 6, NULL, NULL),
(52, 13, 7, NULL, NULL),
(53, 13, 8, NULL, NULL),
(54, 13, 9, NULL, NULL),
(55, 13, 11, NULL, NULL),
(56, 14, 6, NULL, NULL),
(57, 14, 7, NULL, NULL),
(58, 14, 8, NULL, NULL),
(59, 14, 9, NULL, NULL),
(60, 14, 11, NULL, NULL),
(61, 15, 6, NULL, NULL),
(62, 15, 7, NULL, NULL),
(63, 15, 8, NULL, NULL),
(64, 15, 9, NULL, NULL),
(65, 15, 11, NULL, NULL),
(66, 16, 6, NULL, NULL),
(67, 16, 7, NULL, NULL),
(68, 16, 8, NULL, NULL),
(69, 16, 9, NULL, NULL),
(70, 16, 11, NULL, NULL),
(71, 17, 6, NULL, NULL),
(72, 17, 7, NULL, NULL),
(73, 17, 8, NULL, NULL),
(74, 17, 9, NULL, NULL),
(75, 17, 11, NULL, NULL),
(76, 18, 6, NULL, NULL),
(77, 18, 7, NULL, NULL),
(78, 18, 8, NULL, NULL),
(79, 18, 9, NULL, NULL),
(80, 18, 11, NULL, NULL),
(81, 19, 6, NULL, NULL),
(82, 19, 7, NULL, NULL),
(83, 19, 8, NULL, NULL),
(84, 19, 9, NULL, NULL),
(85, 19, 11, NULL, NULL),
(86, 20, 6, NULL, NULL),
(87, 20, 7, NULL, NULL),
(88, 20, 8, NULL, NULL),
(89, 20, 9, NULL, NULL),
(90, 21, 6, NULL, NULL),
(91, 21, 7, NULL, NULL),
(92, 21, 8, NULL, NULL),
(93, 21, 9, NULL, NULL),
(94, 22, 6, NULL, NULL),
(95, 22, 7, NULL, NULL),
(96, 22, 8, NULL, NULL),
(97, 22, 9, NULL, NULL),
(98, 23, 6, NULL, NULL),
(99, 23, 7, NULL, NULL),
(100, 23, 8, NULL, NULL),
(101, 23, 9, NULL, NULL),
(102, 24, 6, NULL, NULL),
(103, 24, 7, NULL, NULL),
(104, 24, 8, NULL, NULL),
(105, 24, 9, NULL, NULL),
(106, 25, 6, NULL, NULL),
(107, 25, 7, NULL, NULL),
(108, 25, 8, NULL, NULL),
(109, 25, 9, NULL, NULL),
(110, 26, 6, NULL, NULL),
(111, 26, 7, NULL, NULL),
(112, 26, 8, NULL, NULL),
(113, 26, 9, NULL, NULL),
(114, 27, 6, NULL, NULL),
(115, 27, 7, NULL, NULL),
(116, 27, 8, NULL, NULL),
(117, 27, 9, NULL, NULL),
(118, 28, 6, NULL, NULL),
(119, 28, 7, NULL, NULL),
(120, 28, 8, NULL, NULL),
(121, 28, 9, NULL, NULL),
(122, 29, 6, NULL, NULL),
(123, 29, 7, NULL, NULL),
(124, 29, 8, NULL, NULL),
(125, 29, 9, NULL, NULL),
(126, 30, 6, NULL, NULL),
(127, 30, 7, NULL, NULL),
(128, 30, 8, NULL, NULL),
(129, 30, 9, NULL, NULL);

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
(335, '0001_01_01_000000_create_users_table', 1),
(336, '0001_01_01_000001_create_cache_table', 1),
(337, '0001_01_01_000002_create_jobs_table', 1),
(338, '2025_01_14_065926_create_role_users_table', 1),
(339, '2025_01_14_070425_create_produks_table', 1),
(340, '2025_01_14_071301_create_merchandises_table', 1),
(341, '2025_01_14_071444_create_insentifs_table', 1),
(342, '2025_01_14_075104_create_permission_tables', 1),
(343, '2025_01_15_032100_add_is_superuser_to_role_users_table', 1),
(344, '2025_01_16_024554_add_tipe_insentif_to_insentifs_table', 1),
(345, '2025_01_20_024321_add_merchandise_id_to_produks_table', 1),
(346, '2025_01_20_040319_create_merchandise_produk_table', 1),
(347, '2025_01_20_055344_create_transaksis_table', 1),
(348, '2025_01_22_012937_add_is_setoran_sales', 1),
(349, '2025_02_03_055222_create_budget_insentif', 1),
(350, '2025_02_05_075551_create_stock_histories_table', 1),
(351, '2025_02_09_215910_add_stok_terakhir_to_produks_table', 1),
(352, '2025_02_09_215914_add_stok_terakhir_to_merchandises_table', 1),
(353, '2025_02_09_233135_add_stock_tracking_to_stock_histories', 1),
(354, '2025_02_10_015138_create_table_budget_insentif', 1),
(355, '2025_02_10_075243_add_produk_terjual_to_produks_table', 1),
(356, '2025_02_10_082232_add_merch_terambil_to_produks_table', 1),
(357, '2025_02_12_101445_add_history_setoran_to_transaksi_table', 1),
(358, '2025_02_13_145136_add_is_setor_to_transaksis_table', 1),
(359, '2025_04_16_082725_add_bertugas_and_tempat_tugas_to_role_users_table', 2),
(360, '2025_04_16_085532_add_bertugas_and_tempat_tugas_to_transaksi_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage tasks', 'web', '2025-04-08 02:37:02', '2025-04-08 02:37:02'),
(2, 'view tasks', 'web', '2025-04-08 02:37:02', '2025-04-08 02:37:02'),
(3, 'assign tasks', 'web', '2025-04-08 02:37:02', '2025-04-08 02:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_nama` varchar(255) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_diskon` int(11) NOT NULL DEFAULT 0,
  `produk_harga_akhir` int(11) GENERATED ALWAYS AS (`produk_harga` - `produk_diskon`) VIRTUAL,
  `produk_detail` text NOT NULL,
  `produk_stok` int(11) NOT NULL,
  `produk_insentif` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `merchandise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stok_terakhir` int(11) NOT NULL DEFAULT 0,
  `produk_terjual` int(11) NOT NULL DEFAULT 0,
  `produk_terjual_history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`produk_terjual_history`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`deleted_at`, `id`, `produk_nama`, `produk_harga`, `produk_diskon`, `produk_detail`, `produk_stok`, `produk_insentif`, `created_at`, `updated_at`, `merchandise_id`, `stok_terakhir`, `produk_terjual`, `produk_terjual_history`) VALUES
('2025-04-08 07:18:54', 1, '11GB_COMBO_20D_590000', 590000, 0, '11 GB - COMBO - 20D', 81, 10000, NULL, '2025-04-08 07:18:54', NULL, 0, 19, '\"[{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"11GB_COMBO_20D_590000\\\"}]\"'),
('2025-04-08 07:18:58', 2, '17GB_COMBO_30D_850000', 850000, 0, '17 GB - COMBO - 30D', 100, 20000, NULL, '2025-04-08 07:18:58', NULL, 0, 0, NULL),
('2025-04-08 07:19:00', 3, '23GB_COMBO_45D_1010000', 1010000, 0, '23 GB - COMBO - 45D', 100, 30000, NULL, '2025-04-08 07:19:00', NULL, 0, 0, NULL),
('2025-04-18 01:15:32', 4, '15GB 20D ROAMAX COMBO', 610000, 30000, '15GB (14GB Arab, 1GB Negara Transit), 50 mnt tlpn, 50 SMS, 20 hari', 975, 0, '2025-04-08 07:20:46', '2025-04-18 01:15:32', NULL, 0, 25, '\"[{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-16 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-17 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-17 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-17 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-17 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-17 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-17 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-17 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"15GB 20D ROAMAX COMBO\\\"}]\"'),
('2025-04-08 07:26:23', 5, '23GB 30D ROAMAX COMBO', 870, 30000, '23GB (22GB Arab, 1GB Negara Transit), 80 mnt tlpn, 80 SMS, 30 hari', 1000, 0, '2025-04-08 07:22:24', '2025-04-08 07:26:23', NULL, 0, 0, NULL),
('2025-04-08 07:26:45', 6, '30GB 45D ROAMAX COMBO', 1050000, 30000, '30GB (29GB Arab, 1GB Negara Transit), 120 mnt tlpn, 120 SMS, 45 hari', 999, 0, '2025-04-08 07:23:23', '2025-04-08 07:26:45', NULL, 0, 0, NULL),
('2025-04-08 07:31:25', 7, '23GB 30D INTERNET HAJI', 720000, 30000, '23GB (22GB Arab, 1GB Negara Transit), 30 hari', 1000, 0, '2025-04-08 07:24:14', '2025-04-08 07:31:25', NULL, 0, 0, NULL),
('2025-04-18 01:15:35', 8, '30GB 45D INTERNET HAJI', 880000, 40000, '30GB (29GB Arab, 1GB Negara Transit), 45 hari', 856, 0, '2025-04-08 07:25:31', '2025-04-18 01:15:35', NULL, 0, 144, '\"[{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D INTERNET HAJI\\\"}]\"'),
('2025-04-18 01:15:40', 9, '30GB 45D ROAMAX COMBO', 1050000, 0, '30GB (29GB Arab, 1GB Negara Transit), 120 mnt tlpn, 120 SMS, 45 hari', 994, 0, '2025-04-08 07:27:48', '2025-04-18 01:15:40', NULL, 0, 6, '\"[{\\\"tanggal\\\":\\\"2025-04-09 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-10 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D ROAMAX COMBO\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"30GB 45D ROAMAX COMBO\\\"}]\"'),
('2025-04-18 01:15:42', 10, '15GB 20D INTERNET HAJI', 500000, 20000, '15GB (14GB Arab, 1GB Negara Transit), 20 hari', 1000, 0, '2025-04-08 07:28:48', '2025-04-18 01:15:42', NULL, 0, 0, NULL),
('2025-04-18 01:15:45', 11, '23GB 30D INTERNET HAJI', 720000, 30000, '23GB (22GB Arab, 1GB Negara Transit), 30 hari', 996, 0, '2025-04-08 07:29:47', '2025-04-18 01:15:45', NULL, 0, 4, '\"[{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"23GB 30D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"23GB 30D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-11 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"23GB 30D INTERNET HAJI\\\"},{\\\"tanggal\\\":\\\"2025-04-17 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"23GB 30D INTERNET HAJI\\\"}]\"'),
('2025-04-18 07:24:53', 12, '23GB 30D ROAMAX COMBO', 870000, 30000, '23GB (22GB Arab, 1GB Negara Transit), 80 mnt tlpn, 80 SMS, 30 hari', 999, 0, '2025-04-08 07:32:22', '2025-04-18 07:24:53', NULL, 0, 1, '\"[{\\\"tanggal\\\":\\\"2025-04-08 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"23GB 30D ROAMAX COMBO\\\"}]\"'),
('2025-04-18 01:25:33', 13, 'POSKO_Combo 15GB 20 HARI', 610, 20000, '15GB (14GB Arab, 1GB Negara Transit), 50 mnt tlpn, 50 SMS, 20 hari', 1000, 0, '2025-04-18 01:19:43', '2025-04-18 01:25:33', NULL, 0, 0, NULL),
(NULL, 14, 'TAKHOBAR_COMBO 15GB 20HARI', 610000, 30000, 'Paket Combo 15GB 20 hari', 199, 0, '2025-04-18 01:40:15', '2025-04-19 09:43:12', NULL, 0, 1, '\"[{\\\"tanggal\\\":\\\"2025-04-19 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_COMBO 15GB 20HARI\\\"}]\"'),
(NULL, 15, 'TAKHOBAR_COMBO 23GB 30HARI', 870000, 30000, 'Paket Combo 23GB 30 Hari', 199, 0, '2025-04-18 01:41:07', '2025-04-25 08:47:26', NULL, 0, 1, '\"[{\\\"tanggal\\\":\\\"2025-04-25 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_COMBO 23GB 30HARI\\\"}]\"'),
(NULL, 16, 'TAKHOBAR_COMBO 30GB 45HARI', 1050000, 0, 'Paket Combo 30GB 45Hari', 199, 0, '2025-04-18 01:41:54', '2025-04-20 00:47:23', NULL, 0, 1, '\"[{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_COMBO 30GB 45HARI\\\"}]\"'),
(NULL, 17, 'TAKHOBAR_INTERNET 15GB 20HARI', 500000, 20000, 'Internet Haji 15GB 30Hari', 200, 0, '2025-04-18 01:44:20', '2025-04-18 01:44:20', NULL, 0, 0, NULL),
(NULL, 18, 'TAKHOBAR_INTERNET 23GB 30HARI', 720000, 30000, 'Internet Haji 23GB 30 Hari', 199, 0, '2025-04-18 01:44:56', '2025-04-20 05:55:00', NULL, 0, 1, '\"[{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 23GB 30HARI\\\"}]\"'),
(NULL, 19, 'TAKHOBAR_INTERNET 30GB 45HARI', 880000, 40000, 'Internet Haji 30GB 45 Hari', 144, 0, '2025-04-18 03:43:43', '2025-04-24 02:36:22', NULL, 0, 56, '\"[{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-22 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-24 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"TAKHOBAR_INTERNET 30GB 45HARI\\\"}]\"'),
(NULL, 20, 'MUHAMMADIYAH_COMBO 15GB 20HARI', 610000, 20000, 'Combo 15GB 20 Hari', 200, 0, '2025-04-18 07:31:39', '2025-04-18 07:31:39', NULL, 0, 0, NULL),
(NULL, 21, 'MUHAMMADIYAH_COMBO 23GB 30HARI', 870000, 20000, 'Combo 23GB 30HARI', 199, 0, '2025-04-18 07:34:36', '2025-04-25 09:38:59', NULL, 0, 1, '\"[{\\\"tanggal\\\":\\\"2025-04-25 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"MUHAMMADIYAH_COMBO 23GB 30HARI\\\"}]\"'),
(NULL, 22, 'MUHAMMADIYAH_COMBO 30GB 45HARI', 1050000, 0, 'COMBO 30GB 45HARI', 99, 0, '2025-04-19 16:57:36', '2025-04-20 06:10:50', NULL, 0, 1, '\"[{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"MUHAMMADIYAH_COMBO 30GB 45HARI\\\"}]\"'),
(NULL, 23, 'MUHAMMADIYAH_INTERNET 15GB 20HARI', 500000, 10000, 'INTERNET 15GB 20HARI', 100, 0, '2025-04-19 16:58:27', '2025-04-19 16:58:27', NULL, 0, 0, NULL),
(NULL, 24, 'MUHAMMDIYAH_INTERNET 30GB 45HARI', 880000, 25000, 'INTERNET 30GB 45HARI', 99, 0, '2025-04-19 16:59:14', '2025-04-20 11:03:53', NULL, 0, 1, '\"[{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"MUHAMMDIYAH_INTERNET 30GB 45HARI\\\"}]\"'),
(NULL, 25, 'SHAFIRA_COMBO 15GB 20HARI', 610000, 0, 'COMBO 15GB 20HARI', 996, 0, '2025-04-19 17:02:55', '2025-04-20 08:38:43', NULL, 0, 4, '\"[{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 15GB 20HARI\\\"}]\"'),
(NULL, 26, 'SHAFIRA_COMBO 23GB 30HARI', 870000, 0, 'Combo 30 Hari', 991, 0, '2025-04-19 17:03:42', '2025-04-20 10:16:04', NULL, 0, 9, '\"[{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 23GB 30HARI\\\"}]\"'),
(NULL, 27, 'SHAFIRA_COMBO 30GB 45HARI', 1050000, 0, 'Combo 45 Hari', 999, 0, '2025-04-19 17:05:39', '2025-04-20 09:31:03', NULL, 0, 1, '\"[{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_COMBO 30GB 45HARI\\\"}]\"'),
(NULL, 28, 'SHAFIRA_INTERNET 15GB 20HARI', 500000, 0, 'Internet 20 Hari', 983, 0, '2025-04-19 17:06:35', '2025-04-20 10:14:49', NULL, 0, 17, '\"[{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 15GB 20HARI\\\"}]\"'),
(NULL, 29, 'SHAFIRA_INTERNET 23GB 30HARI', 720000, 0, 'Internet 30 Hari', 940, 0, '2025-04-19 17:07:24', '2025-04-20 10:27:44', NULL, 0, 60, '\"[{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 23GB 30HARI\\\"}]\"'),
(NULL, 30, 'SHAFIRA_INTERNET 30GB 45HARI', 880000, 0, 'Internet 45Hari', 994, 0, '2025-04-19 17:08:12', '2025-04-24 02:48:30', NULL, 0, 6, '\"[{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-20 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-24 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 30GB 45HARI\\\"},{\\\"tanggal\\\":\\\"2025-04-24 00:00:00\\\",\\\"jumlah\\\":1,\\\"produk_nama\\\":\\\"SHAFIRA_INTERNET 30GB 45HARI\\\"}]\"');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'supervisor', 'web', '2025-04-08 02:37:02', '2025-04-08 02:37:02'),
(2, 'sales', 'web', '2025-04-08 02:37:03', '2025-04-08 02:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `pin` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` enum('supervisor','sales') NOT NULL DEFAULT 'sales',
  `is_setoran` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_superuser` tinyint(1) NOT NULL DEFAULT 0,
  `bertugas` tinyint(1) NOT NULL DEFAULT 0,
  `tempat_tugas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `name`, `email`, `photo`, `pin`, `phone`, `role`, `is_setoran`, `created_at`, `updated_at`, `is_superuser`, `bertugas`, `tempat_tugas`) VALUES
(1, 'Supervisor ', 'supervisor@test.com', NULL, '$2y$12$ZgPiDMU2j43.Dz0UM7GlzOTI1.CG8WR38T.vrFqTvVscrWCysmJpG', '081231780991', 'supervisor', 0, NULL, NULL, 0, 0, NULL),
(2, 'Superuservisor ', 'superuservisor@test.com', NULL, '$2y$12$.M2puCNy3v9dfKFuqtE39OPuX4.2xiIJbhSQCX/e.FtlZzcoC4sRG', '081231780991', 'supervisor', 0, NULL, NULL, 1, 0, NULL),
(3, 'Sales ', 'sales@test.com', NULL, '$2y$12$JjPWMLp7UxsiFq8VusDpIu3OqCFpuT5VuyUDAFfA/54d3HMZyuxfG', '081231780991', 'sales', 1, NULL, '2025-04-19 16:49:16', 0, 1, 'ASRAMA HAJI'),
(4, 'DWI SULVIATI', 'silvi.afizh@gmail.com', NULL, '$2y$12$e0CZw2btqtCwuX4lC0y51edSOgG7BANYO9E1/c/hMbdnxsKc8S6Za', '081331555330', 'sales', 1, '2025-04-08 05:26:37', '2025-04-19 16:49:17', 0, 1, 'SHAFIRA'),
(5, 'FARAH ALINDA SAFITRI', 'farahalindasafitri31@gmail.com', NULL, '$2y$12$S0YCxZuPcNosFsAjVNpzee0beiddMd/7z41Dqqhelh7D6BNJiCLBK', '082231455001', 'sales', 1, '2025-04-08 05:57:21', '2025-04-19 16:49:17', 0, 1, 'SHAFIRA'),
(6, 'FARIZ RACHMAN', 'farizrachman020994@gmail.com', NULL, '$2y$12$sfPrJv.triak6EFPk3ehhu3WwsFtI/rse9w/7VMiCYfJSD1dCqqIi', '085136080440', 'sales', 1, '2025-04-08 05:57:47', '2025-04-19 16:49:17', 0, 1, 'SHAFIRA'),
(7, 'M SUTRIO FEBRI F', 'sutrio1994@gmail.com', NULL, '$2y$12$kukpsPXOR0Dt9lE7l.lBSe2pZ7ZEAhucTeA/cLS8xVwimxk14wHSC', NULL, 'supervisor', 0, '2025-04-08 05:58:52', '2025-04-08 05:58:52', 0, 0, NULL),
(8, 'LISIYANI RAHMA', 'rahmaasmara260@gmail.com', NULL, '$2y$12$SzCxff3M8OiH4e0hY5aVceEU78DLyexSDTYpS8R4qt8eJlM.faHrC', '081234540567', 'sales', 1, '2025-04-08 05:59:38', '2025-04-19 16:49:17', 0, 1, 'SHAFIRA'),
(9, 'M AGUNG DIMASUDIN', 'dimasyupi995@gmail.com', NULL, '$2y$12$YoK1nQ3h2kFI0t95eCvYY.Uan5ZTgNswVZljbHhllq/bmarQgRCDq', '082342086170', 'sales', 1, '2025-04-08 07:09:10', '2025-04-19 16:41:43', 0, 1, 'TAKHOBAR'),
(10, 'MOCH RAZZAK NADHIF', 'razzaknadhif1995@gmail.com', NULL, '$2y$12$8Zuby79xz9mat.kjK3/2veMq.nsgZWYGwBdWw8MNF3BB8DJE3WpDK', '081335384866', 'sales', 1, '2025-04-08 07:10:03', '2025-04-19 16:41:59', 0, 1, 'MUHAMMADIYAH'),
(11, 'RAFLY AGUNG', 'ciptawanrafly@gmail.com', NULL, '$2y$12$Sg0lXlBUQWQfMp64pBIE0e1PQEExdwE8yUVo9isrgFpjqdgfKed2S', '081232713042', 'sales', 1, '2025-04-08 07:10:53', '2025-04-19 16:41:28', 0, 1, 'SHAFIRA'),
(12, 'SAKINA RISMA', 'Sakinarisma0704@gmail.com', NULL, '$2y$12$8.iVOMXmd1CDLVo9fOBySuyp2BDAgmOw5mIrtwVaunCya9FkVdueW', '081230763574', 'sales', 1, '2025-04-08 07:11:43', '2025-04-19 16:41:43', 0, 1, 'TAKHOBAR'),
(13, 'SAKINAH MUTIARA', 'sakinahmutiara1515@gmail.com', NULL, '$2y$12$.j8v3VZq6fQ/m5alHnH2P.CHeBLDemwIJyY3rwh5BDkkqogn7m1Z2', '082138653824', 'sales', 1, '2025-04-08 07:13:31', '2025-04-19 16:41:28', 0, 1, 'SHAFIRA'),
(14, 'SARAH NAULITA', 'sarahnaulitas@gmail.com', NULL, '$2y$12$xQRPPQ0lNbeea96XrP2ujuupFKdI9703lw6jVC5VuZJklEMZM9S7.', '081330737303', 'sales', 1, '2025-04-08 07:14:36', '2025-04-19 16:49:04', 0, 1, 'MUHAMMADIYAH'),
(15, 'SYIFA NADHIFA BAHASYIM', 'syifa123@gmail.com', NULL, '$2y$12$WmRc9thUs9bLZdTVS/tqQOvMayeUIBRq3MKq/tmxkV/p83tWo19MG', NULL, 'supervisor', 0, '2025-04-09 03:12:18', '2025-04-09 03:12:18', 0, 0, NULL),
(16, 'Enrico Satria', 'enricosatria12perman@gmail.com', NULL, '$2y$12$O6b4kneoc2tP5w1htvSwb..nCDzIfvZG/49wMzp69Sm.q5PaRNz.m', NULL, 'supervisor', 0, '2025-04-09 03:13:06', '2025-04-09 03:13:06', 0, 0, NULL),
(17, 'EKO SANTOSO', 'eksan123@gmail.com', NULL, '$2y$12$XOYWWdtOyMDWX5p2hYtSju4cA3iIXhVA1BFXG4UFkQmbbCod4xPPu', NULL, 'supervisor', 0, '2025-04-09 03:14:25', '2025-04-09 03:14:25', 0, 0, NULL),
(18, 'SANDRA', 'sandra@gmail.com', NULL, '$2y$12$RAy.YGskUe1Xtfg8pd/rUOZ.xFOoeQR3e4C77n4Oo/vBjQe08IW.e', '081234566264', 'sales', 1, '2025-04-10 00:44:06', '2025-04-19 16:49:04', 0, 1, 'SHAFIRA'),
(19, 'ANITA MERLIA', 'anita@gmail.com', NULL, '$2y$12$SDl3K1q2RH6flMJN1GKoCuR9TeU4lJxwPJijfT4Y6Ke81k8V3Q0My', '081252079428', 'sales', 1, '2025-04-10 01:19:19', '2025-04-19 16:49:04', 0, 1, 'MUHAMMADIYAH'),
(24, 'NABILA', 'nabila123@gmail.com', NULL, '$2y$12$SiotsGTbatkh0DkITybCQOSH5eeeKCyZZjd8n5DmrJ5veTLjLZ8o.', '085138003282', 'sales', 1, '2025-04-19 16:44:05', '2025-04-19 16:49:04', 0, 1, 'SHAFIRA'),
(25, 'NISA', 'nisa123@gmail.com', NULL, '$2y$12$90jZ4tGexB6bXAe36EcvwOa46enlu0ZSMwEwJe5ijwPsH92ce./Te', '085138003282', 'sales', 1, '2025-04-19 16:45:49', '2025-04-19 16:49:04', 0, 1, 'SHAFIRA'),
(26, 'NADILA', 'nadila123@gmail.com', NULL, '$2y$12$h1ID8loKai80NsmY/tkWQeYMlgfcMbJgqgjgkPrdbF8S3Yea8f6KK', '085138003282', 'sales', 1, '2025-04-19 16:46:10', '2025-04-19 16:52:17', 0, 1, 'SHAFIRA'),
(27, 'DANISH', 'danish123@gmail.com', NULL, '$2y$12$0VmE/THRMUih4WDpGrP6WeXfdoaPPMvI/o8yKW.s.ZzXGasFzGQOK', '085138003282', 'sales', 1, '2025-04-19 16:46:52', '2025-04-19 16:52:17', 0, 1, 'SHAFIRA'),
(28, 'NELLY', 'nelly123@gmail.com', NULL, '$2y$12$k1iB4irgjMUC.k1t59iFE.g0xXk0VcQV9k8DxuiyU7XxcbhkU.sui', '085138003282', 'sales', 1, '2025-04-19 16:47:18', '2025-04-19 16:52:17', 0, 1, 'SHAFIRA'),
(29, 'RAHMA', 'rahma123@gmail.com', NULL, '$2y$12$1rLFQjS0N5zBeXBY90k34uta6VOgFtiv0jJWDG3gA.Ncti3eyjPQa', '085138003282', 'sales', 1, '2025-04-19 16:47:49', '2025-04-19 16:52:17', 0, 1, 'SHAFIRA'),
(30, 'KEVIN', 'kevin123@gmail.com', NULL, '$2y$12$ruNp0aajhgU2TEJlATWN0.IKyOOlzhhBExKrWoZ/0ziaOO.J2g0fG', '085138003282', 'sales', 1, '2025-04-19 16:50:36', '2025-04-19 16:52:37', 0, 1, 'TAKHOBAR'),
(31, 'UBAY', 'ubay123@gmail.com', NULL, '$2y$12$WcGwh.cqFSFwoqjnADYyke1h4nFgCF/bPAm6qe6DGfrxr8SDburiO', '085138003282', 'sales', 1, '2025-04-19 16:51:02', '2025-04-19 16:54:03', 0, 1, 'TAKHOBAR'),
(32, 'HAIKAL', 'haikal123@gmail.com', NULL, '$2y$12$KPQXMtQWk1GJ/NlxBciZT.Muv53i3WNOCVB.0L2z2EH3oedtsLcfy', '085138003282', 'sales', 1, '2025-04-19 16:51:36', '2025-04-19 16:54:03', 0, 1, 'TAKHOBAR'),
(33, 'ABID', 'abid123@gmail.com', NULL, '$2y$12$5Z7G729ZiF/sYmrO7/.r5e7AidNUAh3m9xQDfsXadSdS5WmhbK9De', '085138003282', 'sales', 1, '2025-04-19 16:51:58', '2025-04-19 16:54:03', 0, 1, 'TAKHOBAR'),
(34, 'YASMIN', 'yasmin123@gmail.com', NULL, '$2y$12$fMVsbARvNMFHatO2EzDn4epGNGM00G0CRSwsUcK7tGiZHs.gb23QW', '085138003282', 'sales', 1, '2025-04-19 16:53:09', '2025-04-19 16:54:17', 0, 1, 'MUHAMMADIYAH'),
(35, 'DESY', 'desy123@gmail.com', NULL, '$2y$12$IFym3YQ.1Ng3azu7mbwbKu7VgGtDCbwXdMZQXMhnsqzCeP7fbFJC2', '085138003282', 'sales', 1, '2025-04-19 16:53:30', '2025-04-19 16:54:17', 0, 1, 'MUHAMMADIYAH'),
(36, 'TINA', 'tina123@gmail.com', NULL, '$2y$12$HRS2vwlMSjrZKpDpee7Dyus5wp7QxV6XB7CuS4nw8CSyPfKNwFM3O', '085138003282', 'sales', 1, '2025-04-19 16:53:48', '2025-04-19 16:54:17', 0, 1, 'MUHAMMADIYAH');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('383UTAAuINtWXKAQ1klLMY2A4VT085nYak5QzZgn', NULL, '149.108.215.58', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjM4SWxrQ1VLT2dQc2cyUXk0STRNNEhnYk9vcEVIZE53T0w5YWswUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzQ6Imh0dHBzOi8vcHJvZ3JhbWhhamkuaW5saWZlc3VyYWJheWEuY29tL3Byb2dyYW1oYWppL3N1cHZpcy9hcHByb3ZldHJhbnNha3NpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1745631484),
('cLhvfRsVh4VT9Ovd6KwjOf2xYHEChBD6xk4uey2A', NULL, '36.85.16.103', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 OPR/117.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHlIQUwyVXZZVWNGQUF5SkNRYjBjQWxZRVJpeU1zbWtneFEwdDVYcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly9wcm9ncmFtaGFqaS5pbmxpZmVzdXJhYmF5YS5jb20vcHJvZ3JhbWhhamkvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1745637131),
('h1ncnDHBKBo0lLzNHsbV6lwKWhOYAW4bi8i4IK2O', 2, '182.1.82.224', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 OPR/117.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid0JrNTNlbE02ZXIza3BGbFFwcTNJcFZlWU9qVHlSdnBUOHdoWUIyTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHBzOi8vcHJvZ3JhbWhhamkuaW5saWZlc3VyYWJheWEuY29tL3Byb2dyYW1oYWppL3N1cGVydXNlci9yb2xldXNlcnMvc2FsZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1745639848),
('qq3isXvPwGap1rUSTdwerXJ7NEj89agT3hZTKbwW', NULL, '182.1.96.65', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHVKZnQyS3drSm5Jdll5UWt0QXowdWtRTzhET28zOEtReWpSY2hMYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHBzOi8vcHJvZ3JhbWhhamkuaW5saWZlc3VyYWJheWEuY29tL3Byb2dyYW1oYWppL3NhbGVzL3RyYW5zYWtzaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745593644),
('RnGLfOQpyA1CXV5wQcDAzATQxFxhr2HJL0lJc1mE', 2, '180.241.0.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVk5Lc2prRHpkY1JDY3pjVUV6VUpnbVFjdjQyUmdZUUZXaFowTExPZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTc6Imh0dHBzOi8vcHJvZ3JhbWhhamkuaW5saWZlc3VyYWJheWEuY29tL3Byb2dyYW1oYWppL3N1cHZpcy90cmFuc2Frc2kva3dpdGFuc2kvcHJpbnQvVDAwMzI1MDQyNTYxZjQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1745600829),
('YPQefVVmniSQlWQX7VgtqwhCakayUXoZHdBN1hqX', NULL, '114.125.125.181', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.4 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejhkVXUyUXRuVGFNbG5UUHcyeGtjT0NBNGFEQzN2TmtHdXlPdXRLMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHBzOi8vcHJvZ3JhbWhhamkuaW5saWZlc3VyYWJheWEuY29tL3Byb2dyYW1oYWppL3NhbGVzL3RyYW5zYWtzaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745636873);

-- --------------------------------------------------------

--
-- Table structure for table `stock_histories`
--

CREATE TABLE `stock_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `merchandise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `change_amount` int(11) NOT NULL,
  `previous_stock` int(11) DEFAULT NULL,
  `current_stock` int(11) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_histories`
--

INSERT INTO `stock_histories` (`id`, `product_id`, `merchandise_id`, `change_amount`, `previous_stock`, `current_stock`, `action`, `created_at`, `updated_at`) VALUES
(1, NULL, 6, 1000, 0, 1000, 'add', '2025-04-08 07:16:46', '2025-04-08 07:16:46'),
(2, NULL, 7, 1000, 0, 1000, 'add', '2025-04-08 07:17:22', '2025-04-08 07:17:22'),
(3, NULL, 8, 1000, 0, 1000, 'add', '2025-04-08 07:17:40', '2025-04-08 07:17:40'),
(4, NULL, 9, 1000, 0, 1000, 'add', '2025-04-08 07:18:01', '2025-04-08 07:18:01'),
(5, NULL, 10, 1000, 0, 1000, 'add', '2025-04-08 07:18:30', '2025-04-08 07:18:30'),
(6, 4, NULL, 1000, NULL, NULL, 'add', '2025-04-08 07:20:46', '2025-04-08 07:20:46'),
(7, 5, NULL, 1000, NULL, NULL, 'add', '2025-04-08 07:22:24', '2025-04-08 07:22:24'),
(8, 6, NULL, 999, NULL, NULL, 'add', '2025-04-08 07:23:23', '2025-04-08 07:23:23'),
(9, 7, NULL, 1000, NULL, NULL, 'add', '2025-04-08 07:24:14', '2025-04-08 07:24:14'),
(10, 8, NULL, 1000, NULL, NULL, 'add', '2025-04-08 07:25:31', '2025-04-08 07:25:31'),
(11, 9, NULL, 1000, NULL, NULL, 'add', '2025-04-08 07:27:48', '2025-04-08 07:27:48'),
(12, 10, NULL, 1000, NULL, NULL, 'add', '2025-04-08 07:28:48', '2025-04-08 07:28:48'),
(13, 11, NULL, 1000, NULL, NULL, 'add', '2025-04-08 07:29:47', '2025-04-08 07:29:47'),
(14, 12, NULL, 1000, NULL, NULL, 'add', '2025-04-08 07:32:22', '2025-04-08 07:32:22'),
(15, NULL, 11, 40, 0, 40, 'add', '2025-04-18 01:14:20', '2025-04-18 01:14:20'),
(16, 13, NULL, 1000, NULL, NULL, 'add', '2025-04-18 01:19:44', '2025-04-18 01:19:44'),
(17, 14, NULL, 200, NULL, NULL, 'add', '2025-04-18 01:40:15', '2025-04-18 01:40:15'),
(18, 15, NULL, 200, NULL, NULL, 'add', '2025-04-18 01:41:07', '2025-04-18 01:41:07'),
(19, 16, NULL, 200, NULL, NULL, 'add', '2025-04-18 01:41:54', '2025-04-18 01:41:54'),
(20, 17, NULL, 200, NULL, NULL, 'add', '2025-04-18 01:44:20', '2025-04-18 01:44:20'),
(21, 18, NULL, 200, NULL, NULL, 'add', '2025-04-18 01:44:56', '2025-04-18 01:44:56'),
(22, 19, NULL, 200, NULL, NULL, 'add', '2025-04-18 03:43:43', '2025-04-18 03:43:43'),
(23, 20, NULL, 200, NULL, NULL, 'add', '2025-04-18 07:31:39', '2025-04-18 07:31:39'),
(24, 21, NULL, 200, NULL, NULL, 'add', '2025-04-18 07:34:36', '2025-04-18 07:34:36'),
(25, 22, NULL, 100, NULL, NULL, 'add', '2025-04-19 16:57:36', '2025-04-19 16:57:36'),
(26, 23, NULL, 100, NULL, NULL, 'add', '2025-04-19 16:58:27', '2025-04-19 16:58:27'),
(27, 24, NULL, 100, NULL, NULL, 'add', '2025-04-19 16:59:14', '2025-04-19 16:59:14'),
(28, 25, NULL, 1000, NULL, NULL, 'add', '2025-04-19 17:02:55', '2025-04-19 17:02:55'),
(29, 26, NULL, 1000, NULL, NULL, 'add', '2025-04-19 17:03:42', '2025-04-19 17:03:42'),
(30, 27, NULL, 1000, NULL, NULL, 'add', '2025-04-19 17:05:43', '2025-04-19 17:05:43'),
(31, 28, NULL, 1000, NULL, NULL, 'add', '2025-04-19 17:06:35', '2025-04-19 17:06:35'),
(32, 29, NULL, 1000, NULL, NULL, 'add', '2025-04-19 17:07:24', '2025-04-19 17:07:24'),
(33, 30, NULL, 1000, NULL, NULL, 'add', '2025-04-19 17:08:12', '2025-04-19 17:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `aktivasi_tanggal` date DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `nama_sales` varchar(255) DEFAULT NULL,
  `jenis_paket` varchar(255) DEFAULT NULL,
  `merchandise` varchar(255) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `history_setoran` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`history_setoran`)),
  `is_setor` tinyint(1) NOT NULL DEFAULT 0,
  `nomor_injeksi` varchar(255) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `telepon_pelanggan` varchar(255) DEFAULT NULL,
  `addon_perdana` tinyint(1) NOT NULL DEFAULT 0,
  `id_supervisor` bigint(20) UNSIGNED DEFAULT NULL,
  `bertugas` tinyint(1) NOT NULL DEFAULT 0,
  `tempat_tugas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`deleted_at`, `id_transaksi`, `nama_pelanggan`, `nomor_telepon`, `aktivasi_tanggal`, `tanggal_transaksi`, `nama_sales`, `jenis_paket`, `merchandise`, `metode_pembayaran`, `history_setoran`, `is_setor`, `nomor_injeksi`, `is_paid`, `telepon_pelanggan`, `addon_perdana`, `id_supervisor`, `bertugas`, `tempat_tugas`) VALUES
(NULL, 'T003200425581c', 'FEBRI COBA', '081231780991', '2025-04-21', '2025-04-20', 'Sales', '28', 'TUMBLER', 'Mandiri', NULL, 0, '082234136551', 1, '082234136551', 1, 2, 0, NULL),
(NULL, 'T0322004256d37', 'Liza apriani natalina', '085138003282', '2025-04-20', '2025-04-20', 'HAIKAL', '19', 'MINI FAN (KBIH TAKHOBAR)', 'BCA', NULL, 0, '081216746222', 1, '081216746222', 0, NULL, 0, NULL),
(NULL, 'T03220042508bc', 'Siti Mariyam', '085138003282', '2025-04-20', '2025-04-20', 'HAIKAL', '19', 'PAYUNG', 'BCA', NULL, 0, '082338418035', 1, '082338418035', 0, NULL, 0, NULL),
(NULL, 'T032200425a3b7', 'Imam', '085138003282', '2025-04-20', '2025-04-20', 'HAIKAL', '19', 'MINI FAN (KBIH TAKHOBAR)', 'BCA', NULL, 0, '082139231011', 1, '082139231011', 0, NULL, 0, NULL),
(NULL, 'T031200425f7a7', 'Kasilah', '085138003282', '2025-04-20', '2025-04-20', 'UBAY', '19', 'PAYUNG', 'BCA', NULL, 0, '081235221599', 1, '081235221599', 0, NULL, 0, NULL),
(NULL, 'T0302004251f7c', 'Usintanto', '085138003282', '2025-04-20', '2025-04-20', 'KEVIN', '19', 'MINI FAN (KBIH TAKHOBAR)', 'Tunai', NULL, 0, '08113165650', 1, '08113165650', 1, NULL, 0, NULL),
(NULL, 'T0322004251923', 'AlIman CChoirum', '085138003282', '2025-04-20', '2025-04-20', 'HAIKAL', '19', 'BANTAL LEHER', 'Tunai', NULL, 0, '085106121233', 1, '085106121233', 0, NULL, 0, NULL),
(NULL, 'T0312004252fd3', 'Desiah handriani', '085138003282', '2025-04-20', '2025-04-20', 'UBAY', '19', 'PAYUNG', 'BCA', NULL, 0, '081332123598', 1, '081332123598', 0, NULL, 0, NULL),
(NULL, 'T032200425df7f', 'Alimah Sumarah', '085138003282', '2025-04-20', '2025-04-20', 'HAIKAL', '19', 'BANTAL LEHER', 'Tunai', NULL, 0, '081330732852', 1, '081330732852', 0, NULL, 0, NULL),
(NULL, 'T032200425c2e5', 'Siti jamilah', '085138003282', '2025-04-20', '2025-04-20', 'HAIKAL', '19', 'MINI FAN (KBIH TAKHOBAR)', 'Tunai', NULL, 0, '081353409330', 1, '085792532605', 1, NULL, 0, NULL),
(NULL, 'T031200425bce3', 'Hadi wibowo', '085138003282', '2025-04-20', '2025-04-20', 'UBAY', '19', 'TUMBLER', 'BCA', NULL, 0, '081353409335', 1, '081703100892', 1, NULL, 0, NULL),
(NULL, 'T0312004256d17', 'Adiati arum', '085138003282', '2025-04-20', '2025-04-20', 'UBAY', '19', 'TUMBLER', 'BCA', NULL, 0, '081217277325', 1, '081217277325', 0, NULL, 0, NULL),
(NULL, 'T0332004253f6d', 'siti muntini', '085138003282', '2025-04-20', '2025-04-20', 'ABID', '19', 'MINI FAN (KBIH TAKHOBAR)', 'BCA', NULL, 0, NULL, 1, '081232885860', 0, NULL, 0, NULL),
(NULL, 'T032200425a675', 'Yenny', '085138003282', '2025-04-20', '2025-04-20', 'HAIKAL', '16', 'PAYUNG', 'Tunai', NULL, 0, '081216134445', 1, '081216134445', 0, NULL, 0, NULL),
(NULL, 'T0122004258aa9', 'Taaj Tuhfah Aulia', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'PAYUNG', 'BCA', NULL, 0, '081232338324', 1, '081232338324', 0, NULL, 0, NULL),
(NULL, 'T0322004258374', 'Gunadi', '085138003282', '2025-04-20', '2025-04-20', 'HAIKAL', '19', 'BANTAL LEHER', 'Tunai', NULL, 0, '081234888218', 1, '081234888218', 0, NULL, 0, NULL),
(NULL, 'T0312004258ce3', 'Suntoyo', '085138003282', '2025-04-20', '2025-04-20', 'UBAY', '19', 'PAYUNG', 'BCA', NULL, 0, '081230988146', 1, '081230988146', 0, NULL, 0, NULL),
(NULL, 'T03120042585f3', 'Nur hayati', '085138003282', '2025-04-20', '2025-04-20', 'UBAY', '19', 'BANTAL LEHER', 'BCA', NULL, 0, '081332154866', 1, '081332154866', 0, NULL, 0, NULL),
(NULL, 'T032200425b858', 'Katim', '085138003282', '2025-04-20', '2025-04-20', 'HAIKAL', '19', 'TUMBLER', 'Tunai', NULL, 0, '082338416977', 1, '082338416977', 0, NULL, 0, NULL),
(NULL, 'T0322004257086', 'Mariya', '085138003282', '2025-04-20', '2025-04-20', 'HAIKAL', '19', 'TUMBLER', 'Tunai', NULL, 0, '082338416944', 1, '082338416944', 0, NULL, 0, NULL),
(NULL, 'T0322004257086', 'Mariya', '085138003282', '2025-04-20', '2025-04-20', 'HAIKAL', '19', 'TUMBLER', 'Tunai', NULL, 0, '082338416944', 1, '082338416944', 0, NULL, 0, NULL),
(NULL, 'T033200425e28e', 'amin sholeh', '085138003282', '2025-04-20', '2025-04-20', 'ABID', '19', 'MINI FAN (KBIH TAKHOBAR)', 'BCA', NULL, 0, '082160650007', 1, '082160650007', 0, NULL, 0, NULL),
(NULL, 'T030200425406e', 'Rini astuti', '085138003282', '2025-04-20', '2025-04-20', 'KEVIN', '19', 'MINI FAN (KBIH TAKHOBAR)', 'Tunai', NULL, 0, '081353409292', 1, '081234908333', 0, NULL, 0, NULL),
(NULL, 'T012200425f1cf', 'Bpk yuliyanto', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'TUMBLER', 'BCA', NULL, 0, '08123140327', 1, '08123140327', 0, NULL, 0, NULL),
(NULL, 'T03120042522d9', 'Eny likawati', '085138003282', '2025-04-20', '2025-04-20', 'UBAY', '19', 'MINI FAN (KBIH TAKHOBAR)', 'BCA', NULL, 0, '081370156800', 1, '081370156800', 0, NULL, 0, NULL),
(NULL, 'T01220042509c0', 'BU LULU MACHFULLAH', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'TUMBLER', 'BCA', NULL, 0, '081353409252', 1, '089666084752', 1, NULL, 0, NULL),
(NULL, 'T030200425e550', 'Sriani', '085138003282', '2025-04-20', '2025-04-20', 'KEVIN', '19', 'TUMBLER', 'BCA', NULL, 0, '082146774850', 1, '082146774850', 0, NULL, 0, NULL),
(NULL, 'T018200425f645', 'Ibu Maskurun', '081234566264', '2025-04-20', '2025-04-20', 'SANDRA', '30', 'TUMBLER', 'Tunai', NULL, 0, '081249518617', 1, '087726242303', 0, 17, 0, NULL),
(NULL, 'T0302004256b2d', 'Miartoo', '085138003282', '2025-04-20', '2025-04-20', 'KEVIN', '19', 'MINI FAN (KBIH TAKHOBAR)', 'BCA', NULL, 0, '081333385142', 1, '081333385142', 0, NULL, 0, NULL),
(NULL, 'T0312004250040', 'DJANGLOT ir', '085138003282', '2025-04-20', '2025-04-20', 'UBAY', '19', 'TUMBLER', 'Tunai', NULL, 0, '081353409254', 1, '089601636860', 1, NULL, 0, NULL),
(NULL, 'T03120042500bd', 'Tien maroussiah jw drg', '085138003282', '2025-04-20', '2025-04-20', 'UBAY', '19', 'MINI FAN (KBIH TAKHOBAR)', 'Tunai', NULL, 0, '081353409253', 1, '0811328162', 1, NULL, 0, NULL),
(NULL, 'T0182004256cf9', 'Ibu Sartiyem', '081234566264', '2025-04-20', '2025-04-20', 'SANDRA', '29', 'PAYUNG', 'Tunai', NULL, 0, '081332075732', 1, '081332075732', 0, 17, 0, NULL),
(NULL, 'T01820042567ec', 'Bu Ida maryuti', '081234566264', '2025-05-14', '2025-04-20', 'SANDRA', '30', 'TUMBLER', 'Tunai', NULL, 0, '081340440135', 1, '081340440135', 0, 17, 0, NULL),
(NULL, 'T0182004250f3e', 'Risdianto', '081234566264', '2025-04-20', '2025-04-20', 'SANDRA', '29', 'PAYUNG', 'BNI', NULL, 0, '082143765761', 1, '082143765761', 0, 17, 0, NULL),
(NULL, 'T0332004255b8a', 'Yodhi mahendra', '085138003282', '2025-04-20', '2025-04-20', 'ABID', '19', 'PAYUNG', 'BCA', NULL, 0, '081234224577', 1, '081234224577', 0, NULL, 0, NULL),
(NULL, 'T018200425bf43', 'Sri wilujeng', '081234566264', '2025-05-30', '2025-04-20', 'SANDRA', '29', 'PAYUNG', 'BNI', NULL, 0, '081356424468', 1, '081356424468', 0, 17, 0, NULL),
(NULL, 'T008200425a5f2', 'Bp Imam', '081234540567', '2025-05-30', '2025-04-20', 'LISIYANI RAHMA', '26', 'BANTAL LEHER', 'Mandiri', NULL, 0, '081334525240', 1, '081334525240', 0, 17, 0, NULL),
(NULL, 'T012200425cee1', 'Endang Sucianti', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'BANTAL LEHER', 'Tunai', NULL, 0, '081353409337', 1, '085732365068', 1, NULL, 0, NULL),
(NULL, 'T012200425a91f', 'Kusnowo', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'BANTAL LEHER', 'Tunai', NULL, 0, '081353409336', 1, '085745891040', 1, NULL, 0, NULL),
(NULL, 'T0082004253350', 'Bp Mochamad sofii', '081234540567', '2025-05-20', '2025-04-20', 'LISIYANI RAHMA', '28', 'TUMBLER', 'BNI', NULL, 0, '082110488845', 1, '082110488845', 0, 17, 0, NULL),
(NULL, 'T0042004254683', 'Bpk galih', '081331555330', '2025-05-14', '2025-04-20', 'DWI SULVIATI', '29', 'TUMBLER', 'Tunai', NULL, 0, '081349345914', 1, '089678864826', 0, 17, 0, NULL),
(NULL, 'T004200425f487', 'Ibu retno', '081331555330', '2025-05-15', '2025-04-20', 'DWI SULVIATI', '29', 'TUMBLER', 'Tunai', NULL, 0, '081216167703', 1, '081216167703', 0, 17, 0, NULL),
(NULL, 'T00520042581bc', 'ELLIS TRISNAWATI', '082231455001', '2025-05-18', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'TAS SERUT', 'Tunai', NULL, 0, '081289779234', 1, '081289779234', 0, 17, 0, NULL),
(NULL, 'T012200425ab3d', 'Ria cholifah', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'TAS SERUT', 'Tunai', NULL, 0, '081357505367', 1, '081357505367', 0, NULL, 0, NULL),
(NULL, 'T0092004259382', 'Pak slamet', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'BANTAL LEHER', 'Tunai', NULL, 0, '08123079211', 1, '08123079211', 0, NULL, 0, NULL),
(NULL, 'T009200425125e', 'Indah wahyuni', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '30', 'PAYUNG', NULL, NULL, 0, '081237116116', 0, '081237116116', 0, NULL, 0, NULL),
(NULL, 'T0122004258511', 'ENDANG SUHARTINI', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'TUMBLER', 'Tunai', NULL, 0, '082264856370', 1, '082264856370', 0, NULL, 0, NULL),
(NULL, 'T0092004258123', 'Pak slamet', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'BANTAL LEHER', NULL, NULL, 0, '08123079211', 0, '08123079211', 0, NULL, 0, NULL),
(NULL, 'T009200425acbc', 'Ibu indah', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'PAYUNG', 'Tunai', NULL, 0, '081237116116', 1, '081237116116', 0, NULL, 0, NULL),
(NULL, 'T01220042518d1', 'HARUN', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'PAYUNG', 'BCA', NULL, 0, '081280658550', 1, '081280658550', 0, NULL, 0, NULL),
(NULL, 'T0092004259726', 'Ahmad muliadi', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'MINI FAN (KBIH TAKHOBAR)', 'BCA', NULL, 0, '082336646647', 1, '082336646647', 0, NULL, 0, NULL),
(NULL, 'T01220042572c0', 'ELI FAUZIAH', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'BANTAL LEHER', 'Tunai', NULL, 0, '081333019682', 1, '081333019682', 0, NULL, 0, NULL),
(NULL, 'T009200425324e', 'Muhammad anas', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'PAYUNG', 'BCA', NULL, 0, '082331948553', 1, '082331948553', 0, NULL, 0, NULL),
(NULL, 'T0092004255ed5', 'Muhammad nur solikin', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'BANTAL LEHER', 'Tunai', NULL, 0, '081331651234', 1, '081331651234', 0, NULL, 0, NULL),
(NULL, 'T0122004250000', 'OTTYFAIDARINI', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'BANTAL LEHER', 'Tunai', NULL, 0, '081230395099', 1, '081230395099', 0, NULL, 0, NULL),
(NULL, 'T0092004255867', 'Sulistyowati indriani', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'MINI FAN (KBIH TAKHOBAR)', 'BCA', NULL, 0, '08123134583', 1, '08123134583', 0, NULL, 0, NULL),
(NULL, 'T00920042554c7', 'Bu Ika ratnawani', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'MINI FAN (KBIH TAKHOBAR)', 'BCA', NULL, 0, '085100934968', 1, '085100934968', 0, NULL, 0, NULL),
(NULL, 'T005200425b2f5', 'Bapak Romeli', '082231455001', '2025-05-14', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'BANTAL LEHER', 'BNI', NULL, 0, '082336750878', 1, '0811320138', 0, 17, 0, NULL),
(NULL, 'T009200425c9e8', 'Elvia', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'MINI FAN (KBIH TAKHOBAR)', 'BCA', NULL, 0, '081313475501', 1, '081313475501', 0, NULL, 0, NULL),
(NULL, 'T03120042577b8', 'Ratna nurul aida', '085138003282', '2025-04-20', '2025-04-20', 'UBAY', '19', 'MINI FAN (KBIH TAKHOBAR)', 'Tunai', NULL, 0, '085236577447', 1, '0818500320', 0, NULL, 0, NULL),
(NULL, 'T0092004259c61', 'Lilik elianawati', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'MINI FAN (KBIH TAKHOBAR)', 'BCA', NULL, 0, NULL, 1, '082131249277', 0, NULL, 0, NULL),
(NULL, 'T012200425c95b', 'Subandi', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'BANTAL LEHER', 'Tunai', NULL, 0, '085102091104', 1, '085102091104', 0, NULL, 0, NULL),
(NULL, 'T00920042541d6', 'Sugimen', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'BANTAL LEHER', 'BCA', NULL, 0, '082230251064', 1, '082230251064', 0, NULL, 0, NULL),
(NULL, 'T0122004250163', 'Nirma Duri Utami', '081230763574', '2025-04-20', '2025-04-20', 'SAKINA RISMA', '19', 'MINI FAN (KBIH TAKHOBAR)', 'Tunai', NULL, 0, '085106270841', 1, '085106270841', 0, NULL, 0, NULL),
(NULL, 'T00920042572f4', 'Eko kawitono', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'BANTAL LEHER', 'BCA', NULL, 0, '082174977739', 1, '082174977739', 0, NULL, 0, NULL),
(NULL, 'T009200425d86c', 'Susmawati', '082342086170', '2025-04-20', '2025-04-20', 'M AGUNG DIMASUDIN', '19', 'TAS SERUT', 'BCA', NULL, 0, '081390943329', 1, '081390943329', 0, NULL, 0, NULL),
(NULL, 'T030200425a3f4', 'Elly rosidaa', '085138003282', '2025-04-20', '2025-04-20', 'KEVIN', '19', 'BANTAL LEHER', 'BCA', NULL, 0, '082337722475', 1, '082337722475', 0, NULL, 0, NULL),
(NULL, 'T0052004259538', 'Endang Setyawati', '082231455001', '2025-05-19', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'TUMBLER', 'Mandiri', NULL, 0, '081353409366', 1, '0811371221', 1, NULL, 0, NULL),
(NULL, 'T011200425222d', 'ii fithri', '081232713042', '2025-04-20', '2025-04-20', 'RAFLY AGUNG', '29', 'TUMBLER', 'Mandiri', NULL, 0, '081311221268', 1, '081311221268', 0, 17, 0, NULL),
(NULL, 'T0082004254591', 'Bp Analis', '081234540567', '2025-05-14', '2025-04-20', 'LISIYANI RAHMA', '29', 'BANTAL LEHER', 'Mandiri', NULL, 0, '081211224479', 1, '081211224479', 0, 17, 0, NULL),
(NULL, 'T0082004253962', 'Ibu Rini', '081234540567', '2025-05-14', '2025-04-20', 'LISIYANI RAHMA', '29', 'BANTAL LEHER', 'Mandiri', NULL, 0, '082221551981', 1, '082221551981', 0, NULL, 0, NULL),
(NULL, 'T018200425e24d', 'Bagus Darmawan', '081234566264', '2025-05-14', '2025-04-20', 'SANDRA', '29', 'TUMBLER', 'BNI', NULL, 0, '082231307799', 1, '085854459500', 0, 17, 0, NULL),
(NULL, 'T030200425a5fb', 'Yusuf amrozi', '085138003282', '2025-04-20', '2025-04-20', 'KEVIN', '19', 'BANTAL LEHER', 'BCA', NULL, 0, '081353409338', 1, '087852725045', 1, NULL, 0, NULL),
(NULL, 'T00420042574ad', 'Bpk virmawan', '081331555330', '2025-06-01', '2025-04-20', 'DWI SULVIATI', '28', 'BANTAL LEHER', 'Tunai', NULL, 0, '081234262399', 1, '081234262399', 0, 17, 0, NULL),
(NULL, 'T011200425b0f7', 'jagus', '081232713042', '2025-05-19', '2025-04-20', 'RAFLY AGUNG', '26', 'BANTAL LEHER', 'Mandiri', NULL, 0, '081259666663', 1, '081259666663', 0, 17, 0, NULL),
(NULL, 'T0052004256b14', 'BAPAK MAULANA INDRAWAN', '082231455001', '2025-05-14', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'TUMBLER', 'Mandiri', NULL, 0, '081310921692', 1, '081310921692', 0, 17, 0, NULL),
(NULL, 'T0182004256f45', 'Riza', '081234566264', '2025-05-14', '2025-04-20', 'SANDRA', '29', 'TUMBLER', 'BNI', NULL, 0, '081353409389', 1, '085859752299', 1, 17, 0, NULL),
(NULL, 'T0132004253865', 'eva', '082138653824', '2025-05-14', '2025-04-20', 'SAKINAH MUTIARA', '30', 'PAYUNG', 'BNI', NULL, 0, '081222664444', 1, '081222664444', 0, 17, 0, NULL),
(NULL, 'T004200425817d', 'Ibu pipit', '081331555330', '2025-05-13', '2025-04-20', 'DWI SULVIATI', '29', 'PAYUNG', 'BNI', NULL, 0, '081231589610', 1, '081231589610', 0, 17, 0, NULL),
(NULL, 'T00820042538b7', 'Ibu Ayu', '081234540567', '2025-05-19', '2025-04-20', 'LISIYANI RAHMA', '29', 'TAS SERUT', 'Mandiri', NULL, 0, '081353409391', 1, '08113394726', 1, 17, 0, NULL),
(NULL, 'T00820042596a4', 'Bp Ansori', '081234540567', '2025-05-19', '2025-04-20', 'LISIYANI RAHMA', '29', 'TUMBLER', 'Mandiri', NULL, 0, '081353409392', 1, '08113012800', 1, 17, 0, NULL),
(NULL, 'T011200425f7dc', 'ibu reni', '081232713042', '2025-05-20', '2025-04-20', 'RAFLY AGUNG', '25', 'PAYUNG', 'BNI', NULL, 0, '081325766588', 1, '081325766588', 0, 17, 0, NULL),
(NULL, 'T0132004254eeb', 'arista', '082138653824', '2025-05-14', '2025-04-20', 'SAKINAH MUTIARA', '29', 'PAYUNG', 'Tunai', NULL, 0, '081252565768', 1, '081252565768', 0, NULL, 0, NULL),
(NULL, 'T01320042564a0', 'david', '082138653824', '2025-05-14', '2025-04-20', 'SAKINAH MUTIARA', '29', 'TUMBLER', 'Tunai', NULL, 0, '082228054060', 1, '082228054060', 0, 17, 0, NULL),
(NULL, 'T005200425a66a', 'Bapak Samsudin', '082231455001', '2025-06-01', '2025-04-20', 'FARAH ALINDA SAFITRI', '28', 'BANTAL LEHER', 'Tunai', NULL, 0, '08123153795', 1, '08123153795', 0, NULL, 0, NULL),
(NULL, 'T0052004258f3c', 'Ibu Surip Utami', '082231455001', '2025-06-01', '2025-04-20', 'FARAH ALINDA SAFITRI', '28', 'BANTAL LEHER', 'Tunai', NULL, 0, '081353409370', 1, '08123153795', 1, 17, 0, NULL),
(NULL, 'T013200425e5e4', 'saraswati', '082138653824', '2025-06-01', '2025-04-20', 'SAKINAH MUTIARA', '29', 'BANTAL LEHER', 'Tunai', NULL, 0, '081216177815', 1, '081216177815', 0, 17, 0, NULL),
(NULL, 'T0082004258be9', 'Ibu Monika', '081234540567', '2025-05-14', '2025-04-20', 'LISIYANI RAHMA', '29', 'PAYUNG', 'Tunai', NULL, 0, '081353409455', 1, '08192009899', 1, NULL, 0, NULL),
(NULL, 'T011200425f19c', 'yuanita anggit', '081232713042', '2025-05-31', '2025-04-20', 'RAFLY AGUNG', '28', 'BANTAL LEHER', 'BNI', NULL, 0, '081334700094', 1, '081334700094', 0, 17, 0, NULL),
(NULL, 'T008200425a195', 'Bp Reza', '081234540567', '2025-05-14', '2025-04-20', 'LISIYANI RAHMA', '29', 'PAYUNG', 'Tunai', NULL, 0, '081353409454', 1, '08196084777', 1, NULL, 0, NULL),
(NULL, 'T004200425b03c', 'Ibu amelia', '081331555330', '2025-04-20', '2025-04-20', 'DWI SULVIATI', '29', 'BANTAL LEHER', 'BNI', NULL, 0, '082257992999', 1, '082257992999', 0, 17, 0, NULL),
(NULL, 'T0132004257842', 'harita', '082138653824', '2025-05-14', '2025-04-20', 'SAKINAH MUTIARA', '29', 'BANTAL LEHER', 'BNI', NULL, 0, '081353409365', 1, '081259480234', 0, 17, 0, NULL),
(NULL, 'T018200425023f', 'Ibu ruli', '081234566264', '2025-04-30', '2025-04-20', 'SANDRA', '28', 'PAYUNG', 'Mandiri', NULL, 0, '081353409388', 1, '0811321280', 1, 17, 0, NULL),
(NULL, 'T005200425b760', 'Ibu Siti Mariatul Ibtiyah', '082231455001', '2025-05-14', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'TAS SERUT', 'BNI', NULL, 0, '081230056809', 1, '081230056809', 0, 17, 0, NULL),
(NULL, 'T01320042546a4', 'ibu siti markamah', '082138653824', '2025-05-14', '2025-04-20', 'SAKINAH MUTIARA', '29', 'PAYUNG', 'Tunai', NULL, 0, '081217674530', 1, '082230072700', 0, 17, 0, NULL),
(NULL, 'T0132004251480', 'bpk suwondo', '082138653824', '2025-05-14', '2025-04-20', 'SAKINAH MUTIARA', '29', 'PAYUNG', 'Tunai', NULL, 0, '082230072700', 1, '082230072700', 0, 17, 0, NULL),
(NULL, 'T027200425b588', 'EMI FITRI', '085138003282', '2025-05-16', '2025-04-20', 'DANISH', '18', 'PAYUNG', 'BNI', NULL, 0, '081330056420', 1, '081330056420', 0, NULL, 0, NULL),
(NULL, 'T0052004251eda', 'Ibu Endang Tri Sundari', '082231455001', '2025-05-14', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'TUMBLER', 'Tunai', NULL, 0, '082139038000', 1, '082139038000', 0, 17, 0, NULL),
(NULL, 'T004200425b5d2', 'Bpk ali machfud', '081331555330', '2025-05-15', '2025-04-20', 'DWI SULVIATI', '29', 'PAYUNG', 'Mandiri', NULL, 0, '081310755086', 1, '081310755086', 0, NULL, 0, NULL),
(NULL, 'T008200425fc45', 'Bp CHAMIM ROSYIDI IRSYAD', '081234540567', '2025-05-19', '2025-04-20', 'LISIYANI RAHMA', '29', 'TUMBLER', 'Mandiri', NULL, 0, '081312185350', 1, '081312185350', 0, NULL, 0, NULL),
(NULL, 'T011200425e0c9', 'ibu nanik', '081232713042', '2025-06-01', '2025-04-20', 'RAFLY AGUNG', '28', 'PAYUNG', 'Tunai', NULL, 0, '08123093444', 1, '08123093444', 0, 17, 0, NULL),
(NULL, 'T008200425c607', 'Ibu Endang setiowati', '081234540567', '2025-05-14', '2025-04-20', 'LISIYANI RAHMA', '29', 'BANTAL LEHER', 'Tunai', NULL, 0, '081216903674', 1, '081216903674', 0, 17, 0, NULL),
(NULL, 'T0182004257675', 'Bu siswanti', '081234566264', '2025-04-30', '2025-04-20', 'SANDRA', '29', 'BANTAL LEHER', 'BNI', NULL, 0, '081334522513', 1, '081334522513', 0, 17, 0, NULL),
(NULL, 'T0082004259cd3', 'Bp sukarlan', '081234540567', '2025-05-14', '2025-04-20', 'LISIYANI RAHMA', '29', 'TUMBLER', 'Tunai', NULL, 0, '081234294510', 1, '081234294510', 0, 17, 0, NULL),
(NULL, 'T013200425dd85', 'ibu peny', '082138653824', '2025-05-14', '2025-04-20', 'SAKINAH MUTIARA', '29', 'PAYUNG', 'Mandiri', NULL, 0, '081233030513', 1, '081233030513', 0, NULL, 0, NULL),
(NULL, 'T01120042525f1', 'emi fitri', '081232713042', '2025-05-15', '2025-04-20', 'RAFLY AGUNG', '29', 'PAYUNG', NULL, NULL, 0, '081330056420', 0, '081330056420', 0, NULL, 0, NULL),
(NULL, 'T0182004252fb3', 'Alif', '081234566264', '2025-05-14', '2025-04-20', 'SANDRA', '29', 'TUMBLER', 'BNI', NULL, 0, '085273397357', 1, '085273397357', 0, 17, 0, NULL),
(NULL, 'T008200425b6dc', 'ibu sunarsih', '081234540567', '2025-05-19', '2025-04-20', 'LISIYANI RAHMA', '29', 'PAYUNG', 'Tunai', NULL, 0, '081252353587', 1, '081252353587', 0, NULL, 0, NULL),
(NULL, 'T0132004253983', 'bpk hendra', '082138653824', '2025-05-14', '2025-04-20', 'SAKINAH MUTIARA', '29', 'TUMBLER', 'Mandiri', NULL, 0, '08123587324', 1, '08123587324', 0, NULL, 0, NULL),
(NULL, 'T027200425cc68', 'danish coba', '085138003282', '2025-04-23', '2025-04-20', 'DANISH', '22', 'BANTAL LEHER', NULL, NULL, 0, '73738372882', 0, '7273638373', 0, NULL, 0, NULL),
(NULL, 'T0052004253f82', 'Ibu Chusnul Chotimah', '082231455001', '2025-05-30', '2025-04-20', 'FARAH ALINDA SAFITRI', '28', 'BANTAL LEHER', 'Tunai', NULL, 0, '081232455928', 1, '081232455928', 0, 17, 0, NULL),
(NULL, 'T005200425e413', 'Ibu Lilik Setyowati', '082231455001', '2025-05-30', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'TAS SERUT', 'Mandiri', NULL, 0, '082141577072', 1, '082141577072', 0, 17, 0, NULL),
(NULL, 'T0042004254246', 'Ibu lilik', '081331555330', '2025-05-30', '2025-04-20', 'DWI SULVIATI', '29', 'BANTAL LEHER', 'Mandiri', NULL, 0, '081310755086', 1, '081330007938', 0, NULL, 0, NULL),
(NULL, 'T005200425d18b', 'Bapak Riza Husein Aziz', '082231455001', '2025-05-14', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'PAYUNG', 'Mandiri', NULL, 0, '081231463200', 1, '081231463200', 0, NULL, 0, NULL),
(NULL, 'T00520042515d3', 'Ibu Senny Wulandewi', '082231455001', '2025-05-14', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'PAYUNG', 'Mandiri', NULL, 0, '082140830003', 1, '082140830003', 0, NULL, 0, NULL),
(NULL, 'T02420042516b6', 'Indah Sri Wahyuni', '085138003282', '2025-05-19', '2025-04-20', 'NABILA', '26', 'BANTAL LEHER', 'Mandiri', NULL, 0, '082333299699', 1, '082333299699', 0, NULL, 0, NULL),
(NULL, 'T01120042576da', 'bapak zainal arifin', '081232713042', '2025-05-19', '2025-04-20', 'RAFLY AGUNG', '26', 'BANTAL LEHER', 'BNI', NULL, 0, '085231877777', 1, '085231877777', 0, NULL, 0, NULL),
(NULL, 'T013200425bacf', 'ibu dania maharani', '082138653824', '2025-05-14', '2025-04-20', 'SAKINAH MUTIARA', '29', 'PAYUNG', 'Mandiri', NULL, 0, '081331283177', 1, '081331283177', 0, 17, 0, NULL),
(NULL, 'T0132004252b25', 'eko aries', '082138653824', '2025-05-14', '2025-04-20', 'SAKINAH MUTIARA', '29', 'TUMBLER', 'Mandiri', NULL, 0, '081331283178', 1, '081331283178', 0, 17, 0, NULL),
(NULL, 'T01820042518d6', 'Ibu Endang', '081234566264', '2025-05-14', '2025-04-20', 'SANDRA', '29', 'PAYUNG', 'Mandiri', NULL, 0, '081331723408', 1, '08989707763', 0, 17, 0, NULL),
(NULL, 'T018200425c957', 'Pak basuki', '081234566264', '2025-05-14', '2025-04-20', 'SANDRA', '29', 'TUMBLER', 'Mandiri', NULL, 0, '081232979924', 1, '08989707763', 0, 17, 0, NULL),
(NULL, 'T0042004253eab', 'Ibu ika dewi', '081331555330', '2025-05-15', '2025-04-20', 'DWI SULVIATI', '29', 'PAYUNG', 'Mandiri', NULL, 0, '081233701395', 1, '081233701395', 0, NULL, 0, NULL),
(NULL, 'T008200425ef57', 'Ibu yayuk', '081234540567', '2025-06-01', '2025-04-20', 'LISIYANI RAHMA', '25', 'PAYUNG', 'Tunai', NULL, 0, '082220059909', 1, '082220059909', 0, 17, 0, NULL),
(NULL, 'T008200425f102', 'bp joko', '081234540567', '2025-06-01', '2025-04-20', 'LISIYANI RAHMA', '25', 'TUMBLER', 'Tunai', NULL, 0, '081231781118', 1, '081231781118', 0, 17, 0, NULL),
(NULL, 'T005200425912d', 'Ibu Ifana Dwi Susanti', '082231455001', '2025-05-15', '2025-04-20', 'FARAH ALINDA SAFITRI', '26', 'TUMBLER', 'Mandiri', NULL, 0, '081332095158', 1, '081332095158', 0, 17, 0, NULL),
(NULL, 'T005200425f2a2', 'Bapak Indra tyasmanto', '082231455001', '2025-05-15', '2025-04-20', 'FARAH ALINDA SAFITRI', '26', 'TUMBLER', 'Mandiri', NULL, 0, '081332095159', 1, '081332095159', 0, 17, 0, NULL),
(NULL, 'T011200425308a', 'handri', '081232713042', '2025-05-21', '2025-04-20', 'RAFLY AGUNG', '25', 'TUMBLER', 'BNI', NULL, 0, '081325078299', 1, '081325078299', 0, 17, 0, NULL),
(NULL, 'T0082004257e42', 'ibu widya', '081234540567', '2025-06-01', '2025-04-20', 'LISIYANI RAHMA', '28', 'PAYUNG', 'Mandiri', NULL, 0, '081212018889', 1, '081212018889', 0, 17, 0, NULL),
(NULL, 'T008200425c088', 'Ibu sriyani', '081234540567', '2025-06-01', '2025-04-20', 'LISIYANI RAHMA', '28', 'TUMBLER', 'BNI', NULL, 0, '082141549199', 1, '082141549199', 0, 17, 0, NULL),
(NULL, 'T01820042552d5', 'Syahrul alim', '081234566264', '2025-05-19', '2025-04-20', 'SANDRA', '29', 'BANTAL LEHER', 'BNI', NULL, 0, '082155622244', 1, '082155622244', 0, 17, 0, NULL),
(NULL, 'T005200425c6af', 'Ibu Nur Hamidiah', '082231455001', '2025-05-14', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'TAS SERUT', 'Tunai', NULL, 0, '081332208373', 1, '081332208373', 0, 15, 0, NULL),
(NULL, 'T01820042569f2', 'Erma yusida', '081234566264', '2025-05-19', '2025-04-20', 'SANDRA', '29', 'TAS SERUT', 'BNI', NULL, 0, '081252450272', 1, '081252450272', 0, 17, 0, NULL),
(NULL, 'T0052004256709', 'Bapak Njunariadi', '082231455001', '2025-05-14', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'PAYUNG', 'Tunai', NULL, 0, '082139197772', 1, '082139197772', 0, 15, 0, NULL),
(NULL, 'T0112004251ec5', 'diah puspita sari', '081232713042', '2025-04-20', '2025-04-20', 'RAFLY AGUNG', '28', 'BANTAL LEHER', 'Mandiri', NULL, 0, '081252097949', 1, '081252097949', 0, 17, 0, NULL),
(NULL, 'T018200425bb3c', 'Bapak bambang', '081234566264', '2025-05-19', '2025-04-20', 'SANDRA', '26', 'PAYUNG', 'BNI', NULL, 0, '082141755555', 1, '082141755555', 0, 17, 0, NULL),
(NULL, 'T018200425a540', 'Bu Evi Dwitasari', '081234566264', '2025-05-19', '2025-04-20', 'SANDRA', '27', 'BANTAL LEHER', 'Mandiri', NULL, 0, '081335815555', 1, '081335815555', 0, 17, 0, NULL),
(NULL, 'T0182004253797', 'Pak hidayat', '081234566264', '2025-05-14', '2025-04-20', 'SANDRA', '29', 'BANTAL LEHER', 'Tunai', NULL, 0, '081359403700', 1, '08179301130', 0, 17, 0, NULL),
(NULL, 'T018200425ea5d', 'Bu Dita', '081234566264', '2025-05-14', '2025-04-20', 'SANDRA', '29', 'BANTAL LEHER', 'Tunai', NULL, 0, '08121718451', 1, '08121718451', 0, 17, 0, NULL),
(NULL, 'T013200425b289', 'ibu firas', '082138653824', '2025-05-30', '2025-04-20', 'SAKINAH MUTIARA', '28', 'BANTAL LEHER', 'Mandiri', NULL, 0, '081233300214', 1, '081233300214', 0, 17, 0, NULL),
(NULL, 'T004200425ea15', 'Bpk wahyu nugroho', '081331555330', '2025-06-01', '2025-04-20', 'DWI SULVIATI', '28', 'TUMBLER', 'Mandiri', NULL, 0, '082261233939', 1, '082261233939', 0, 15, 0, NULL),
(NULL, 'T004200425108f', 'Ibu sumiati', '081331555330', '2025-06-01', '2025-04-20', 'DWI SULVIATI', '28', 'TUMBLER', 'Mandiri', NULL, 0, '081331860328', 1, '081331860328', 0, 15, 0, NULL),
(NULL, 'T01320042500df', 'ibu lilis', '082138653824', '2025-05-30', '2025-04-20', 'SAKINAH MUTIARA', '29', 'BANTAL LEHER', 'Tunai', NULL, 0, '081335558870', 1, '081335558870', 0, 17, 0, NULL),
(NULL, 'T01820042523a7', 'Ibu Endang dwi astuti', '081234566264', '2025-05-30', '2025-04-20', 'SANDRA', '26', 'TUMBLER', 'Mandiri', NULL, 0, '08123230635', 1, '08123230635', 0, 17, 0, NULL),
(NULL, 'T018200425f744', 'Rasya Firmana', '081234566264', '2025-05-30', '2025-04-20', 'SANDRA', '29', 'TUMBLER', 'Mandiri', NULL, 0, '082143037835', 1, '082143037835', 0, 17, 0, NULL),
(NULL, 'T0052004250c4d', 'Ibu Nur Lathifah', '082231455001', '2025-05-14', '2025-04-20', 'FARAH ALINDA SAFITRI', '29', 'BANTAL LEHER', 'Mandiri', NULL, 0, '081357210123', 1, '081357210123', 0, 15, 0, NULL),
(NULL, 'T013200425b94d', 'Ibu indah cahyani', '082138653824', '2025-05-14', '2025-04-20', 'SAKINAH MUTIARA', '29', 'BANTAL LEHER', 'BNI', NULL, 0, '081330652300', 1, '081330652300', 0, 15, 0, NULL),
(NULL, 'T013200425f6a4', 'ibu ira', '082138653824', '2025-05-30', '2025-04-20', 'SAKINAH MUTIARA', '28', 'PAYUNG', 'Mandiri', NULL, 0, '081357885906', 1, '081357885906', 0, 15, 0, NULL),
(NULL, 'T0052004257ecd', 'Ibu Takari', '082231455001', '2025-05-30', '2025-04-20', 'FARAH ALINDA SAFITRI', '28', 'TAS SERUT', 'Mandiri', NULL, 0, '081218341702', 1, '081218341702', 0, 17, 0, NULL),
(NULL, 'T0112004255690', 'yustiana', '081232713042', '2025-05-14', '2025-04-20', 'RAFLY AGUNG', '26', 'TUMBLER', 'Tunai', NULL, 0, '082232899888', 1, '082232899888', 0, 17, 0, NULL),
(NULL, 'T004200425b1bf', 'Ibu lita', '081331555330', '2025-05-14', '2025-04-20', 'DWI SULVIATI', '29', 'TUMBLER', 'Tunai', NULL, 0, '081334614712', 1, '081334614712', 0, 15, 0, NULL),
(NULL, 'T013200425645d', 'bpk dwi', '082138653824', '2025-05-18', '2025-04-20', 'SAKINAH MUTIARA', '29', 'BANTAL LEHER', 'Mandiri', NULL, 0, '082143996547', 1, '082143044946', 0, 17, 0, NULL),
(NULL, 'T0082004253950', 'ibu endah', '081234540567', '2025-05-18', '2025-04-20', 'LISIYANI RAHMA', '29', 'BANTAL LEHER', 'Mandiri', NULL, 0, '081330524802', 1, '895335466373', 0, 17, 0, NULL),
(NULL, 'T0142004250775', 'Agus', '081330737303', '2025-04-20', '2025-04-20', 'SARAH NAULITA', '24', 'TAS SERUT', 'BCA', NULL, 0, '085257377002', 1, '085257377002', 0, 16, 0, NULL),
(NULL, 'T012220425fb82', 'Bu tisa', '081230763574', '2025-04-22', '2025-04-22', 'SAKINA RISMA', '19', 'MINI FAN (KBIH TAKHOBAR)', NULL, NULL, 0, '082144663669', 0, '081233696968', 1, NULL, 0, NULL),
(NULL, 'T011240425a866', 'BPK MUHAMMAD', '081232713042', '2025-11-04', '2025-04-24', 'RAFLY AGUNG', '19', 'PAYUNG', 'Tunai', NULL, 0, '085230622241', 1, '085230622241', 0, 2, 0, NULL),
(NULL, 'T0112404253aad', 'latif', '081232713042', '2025-04-28', '2025-04-24', 'RAFLY AGUNG', '30', 'TUMBLER', 'Tunai', NULL, 0, '081242372297', 1, '081242372297', 0, 7, 0, NULL),
(NULL, 'T011240425508a', 'ibu nadia', '081232713042', '2025-04-28', '2025-04-24', 'RAFLY AGUNG', '30', 'TUMBLER', 'Tunai', NULL, 0, '081353409345', 1, '081242372297', 0, 7, 0, NULL),
(NULL, 'T00325042561f4', 'valen', '081231780991', '2025-05-25', '2025-04-25', 'Sales', '15', 'BANTAL LEHER', 'BCA', NULL, 0, '0', 1, '087753150059', 0, 2, 0, NULL),
(NULL, 'T003250425e50e', 'lilin', '081231780991', '2025-05-01', '2025-04-25', 'Sales', '21', 'PAYUNG', 'BCA', NULL, 0, '145673', 1, '081327416375', 1, 2, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `budget_histories`
--
ALTER TABLE `budget_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budget_histories_budget_insentif_id_foreign` (`budget_insentif_id`);

--
-- Indexes for table `budget_insentif`
--
ALTER TABLE `budget_insentif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `insentifs`
--
ALTER TABLE `insentifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insentifs_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandises`
--
ALTER TABLE `merchandises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandise_produk`
--
ALTER TABLE `merchandise_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchandise_produk_produk_id_foreign` (`produk_id`),
  ADD KEY `merchandise_produk_merchandise_id_foreign` (`merchandise_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_merchandise_id_foreign` (`merchandise_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_users_email_unique` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stock_histories`
--
ALTER TABLE `stock_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_histories_product_id_foreign` (`product_id`),
  ADD KEY `stock_histories_merchandise_id_foreign` (`merchandise_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD KEY `transaksis_id_supervisor_foreign` (`id_supervisor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget_histories`
--
ALTER TABLE `budget_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget_insentif`
--
ALTER TABLE `budget_insentif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insentifs`
--
ALTER TABLE `insentifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchandises`
--
ALTER TABLE `merchandises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `merchandise_produk`
--
ALTER TABLE `merchandise_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `stock_histories`
--
ALTER TABLE `stock_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budget_histories`
--
ALTER TABLE `budget_histories`
  ADD CONSTRAINT `budget_histories_budget_insentif_id_foreign` FOREIGN KEY (`budget_insentif_id`) REFERENCES `budget_insentif` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `insentifs`
--
ALTER TABLE `insentifs`
  ADD CONSTRAINT `insentifs_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`);

--
-- Constraints for table `merchandise_produk`
--
ALTER TABLE `merchandise_produk`
  ADD CONSTRAINT `merchandise_produk_merchandise_id_foreign` FOREIGN KEY (`merchandise_id`) REFERENCES `merchandises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `merchandise_produk_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_merchandise_id_foreign` FOREIGN KEY (`merchandise_id`) REFERENCES `merchandises` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_histories`
--
ALTER TABLE `stock_histories`
  ADD CONSTRAINT `stock_histories_merchandise_id_foreign` FOREIGN KEY (`merchandise_id`) REFERENCES `merchandises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_histories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_id_supervisor_foreign` FOREIGN KEY (`id_supervisor`) REFERENCES `role_users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
