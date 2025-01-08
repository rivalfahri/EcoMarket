-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 10:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `alamat` varchar(255) DEFAULT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `alamat`, `phone`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$vGwMalQhW0z8GdRpMJx5t..5dBAdKfzdd46ZJesW04X1yq2pOveh2', '2024-11-27 20:45:13', '2024-12-26 12:27:38', 'jl.1234', '123456789012'),
(2, 'admin1', 'admin1@gmail.com', '$2y$12$hiumfCIXm/rCx99QiSVtL.9NJRsATl3.CGjfppLKusJlMiBv2aWdi', '2024-11-27 20:47:10', '2024-12-26 12:27:54', 'jl321', '0987654321');

-- --------------------------------------------------------

--
-- Table structure for table `affiliates`
--

CREATE TABLE `affiliates` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) DEFAULT NULL,
  `affiliate_code` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affiliates`
--

INSERT INTO `affiliates` (`id`, `name`, `password`, `email`, `nomor_hp`, `affiliate_code`, `created_at`, `updated_at`) VALUES
(1, 'rival', '$2y$12$kBuQy9q1Qv.6SWshBmD2rOcmL.ON8qvBz0VNHwGjsnVjd2Nf3bIEi', 'rivalfahri@gmail.com', '', '677c32e447608', '2025-01-06 12:45:40', '2025-01-06 20:31:59'),
(2, 'roma', '$2y$12$FQJg6EsiYNWV9TyrXEHBTuypHyvm5awXvPloJ9FhBLJA0PiztBOlu', 'roma@gmail.com', '', '677c3d970a859', '2025-01-06 13:31:19', '2025-01-06 20:31:54'),
(3, 'malkis', '$2y$12$wWKyg8TP77cDeBvKT6vhveaJp7CgYtb//1ZFK.EKrrBIZqVecDZku', 'malkis@gmail.com', NULL, '677c3e10a7a1d', '2025-01-06 13:33:20', '2025-01-06 13:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `animal_category`
--

CREATE TABLE `animal_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal_category`
--

INSERT INTO `animal_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kucing', '2024-11-27 20:48:06', '2024-11-27 20:48:06'),
(2, 'Hamster', '2024-11-27 20:48:17', '2024-11-27 20:48:17'),
(4, 'Ayam', '2024-11-27 20:58:37', '2024-11-27 20:58:37');

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `total_price`, `created_at`, `updated_at`) VALUES
(12, 1, 6500.00, '2024-12-26 04:32:39', '2024-12-26 04:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(24, 12, 8, 1, 6500.00, '2024-12-26 04:32:39', '2024-12-26 04:32:39');

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
-- Table structure for table `jenis_category`
--

CREATE TABLE `jenis_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_category`
--

INSERT INTO `jenis_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', '2024-11-27 20:47:37', '2024-11-27 20:47:37'),
(2, 'Obat', '2024-11-27 20:47:45', '2024-11-27 20:47:45'),
(3, 'Pasir', '2024-11-27 20:47:54', '2024-11-27 20:47:54'),
(4, 'Aksesoris', '2024-11-27 21:08:54', '2024-11-27 21:08:54');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_27_162037_create_personal_access_tokens_table', 1),
(5, '2024_11_27_162802_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` enum('Menunggu','Diterima','Gagal') DEFAULT 'Menunggu',
  `order_status` enum('Proses','Dikirim','Diterima','Ditolak') DEFAULT 'Proses',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `city`, `province`, `postal_code`, `phone`, `email`, `message`, `subtotal`, `shipping_fee`, `total`, `payment_method`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
(2, 1, 'itn malang', 'jln.itn', 'karangploso', 'malang', '65318', '12345678', 'itn@scholar.gmail.com', 'cek exp', 52500.00, 15000.00, 67500.00, 'bca', 'Diterima', 'Dikirim', '2024-11-14 14:25:57', '2024-12-28 19:42:06'),
(9, 1, 'a', 'a', 'a', 'a', '1', '1234', 'itn@scholar.gmail.com', 'cek', 45000.00, 15000.00, 60000.00, 'bca', 'Menunggu', 'Proses', '2024-12-19 04:59:27', '2024-12-19 04:59:27'),
(10, 1, 'b', 'b', 'b', 'b', '0', '0', 'itn@scholar.gmail.com', 'c', 7500.00, 15000.00, 22500.00, 'bca', 'Menunggu', 'Proses', '2024-12-19 09:15:33', '2024-12-19 09:15:33'),
(11, 1, 'z', 'z', 'z', 'z', '8', '567890457', 'itn@scholar.gmail.com', 'x', 32500.00, 30000.00, 62500.00, 'bca', 'Menunggu', 'Proses', '2024-10-11 09:43:17', '2024-12-28 19:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `quantity`, `price`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 7500.00, 7500.00, '2024-12-13 14:25:57', '2024-12-13 14:25:57'),
(2, 2, 2, 1, 15000.00, 15000.00, '2024-12-13 14:25:57', '2024-12-13 14:25:57'),
(3, 2, 7, 1, 30000.00, 30000.00, '2024-12-13 14:25:57', '2024-12-13 14:25:57'),
(10, 9, 2, 2, 15000.00, 30000.00, '2024-12-19 04:59:27', '2024-12-19 04:59:27'),
(11, 9, 1, 2, 7500.00, 15000.00, '2024-12-19 04:59:27', '2024-12-19 04:59:27'),
(12, 10, 1, 1, 7500.00, 7500.00, '2024-12-19 09:15:33', '2024-12-19 09:15:33'),
(13, 11, 8, 1, 6500.00, 6500.00, '2024-12-26 09:43:17', '2024-12-26 09:43:17'),
(14, 11, 12, 2, 13000.00, 26000.00, '2024-12-26 09:43:17', '2024-12-26 09:43:17');

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
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `name`, `email`, `password`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'itn malang 2', 'itn@scholar.gmail.com', '$2y$12$/N27HERrEC2hRowMGyYH..oJhsE86znnr3SqgkU.2wVr9al1wrAqC', '0895330834779', '2024-12-04 15:45:20', '2024-12-29 21:31:29'),
(2, 'gg', 'gg@gmail.com', '$2y$12$JZBNe3V455yYJrWlp/2Mz.uoag8dxSz.K808xz8CHC237s3Lejpu6', '0927265643', '2024-12-08 21:09:25', '2024-12-08 21:09:25');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `animal_category_id` int(11) DEFAULT NULL,
  `jenis_category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `berat`, `stock`, `description`, `image_url`, `animal_category_id`, `jenis_category_id`, `created_at`, `updated_at`) VALUES
(1, 'Hamster Mix', 7500.00, 250, 10, 'Makanan hamster berbasis biji-bijian dan kacang-kacangan.', 'imgProduk/vsnQGDQOmhthD1yKhLoVe4ChmBDvZROaYaHMQk2O.jpg', 2, 1, '2024-11-27 20:56:11', '2024-12-19 02:15:33'),
(2, 'Pasir Hamster', 15000.00, 250, 4, 'Pasir yang digunakan sebagai alas kandang hamster. Fungsinya untuk menyerap urin dan bau, serta memberikan tempat yang nyaman bagi hamster untuk bermain dan beristirahat. Pasir ini aman dan lembut untuk hamster.', 'imgProduk/zRUZ0XSWnYWFWvFNparRQfm3Hy74szE2hNgN5kuq.jpg', 2, 3, '2024-11-27 20:57:17', '2024-12-18 21:59:27'),
(3, 'Pur Ayam CP511', 15000.00, 1000, 10, '511	Pur Ayam Hi Pro Vite 511 Charoen Pokphand merupakan pakan anak ayam ras pedaging yang bergizi lengkap dan berenergi seimbang untuk anak ayam pedaging anda.', 'imgProduk/fYUaCOLSDrLkfJ2ofro0jXLas1CLx1ex6StSZIN4.jpg', 4, 1, '2024-11-27 21:02:00', '2024-11-27 21:02:00'),
(4, 'Neobro', 36000.00, 250, 10, 'Neobro adalah serbuk larut air yang mengandung multivitamin (A, D, E, K, dan C), mineral dan asam amino komplit. Neobro sangat efektif untuk menunjang pertumbuhan ayam khususnya ayam pedaging / broiler.', 'imgProduk/3hOxmTAOERf2hUgJJbaUzco4t9R2xZ4fDME2drHb.jpg', 4, 2, '2024-11-27 21:05:37', '2024-11-27 21:05:37'),
(5, 'Vitachicks', 1500.00, 100, 7, 'Vita Chick merupakan vitamin untuk anak ayam dan ayam dewasa, berupa serbuk yang dapat dilarutkan dengan air berwarna coklat muda yang mengandung banyak multivitamin yang dikombinasikan dengan growth promoter antibiotic (Probiotik pemacu pertumbuhan) agar pertumbuhan anak ayam menjadi maksimal.', 'imgProduk/IJrxZkH5fz27LXqCZEWaFQFzJuxyw4De2ln7c9R2.jpg', 4, 2, '2024-11-27 21:08:11', '2024-11-27 21:08:11'),
(6, 'Tas Ayam / Kisa Ayam', 28000.00, 1000, 9, 'Kisa ayam adalah perlengkapan penting bagi Anda yang memelihara ayam di rumah. Terbuat dari bahan semi kulit sepatu yang sangat awet sehingga tidak mudah jebol ketika terkena cakar ayam.', 'imgProduk/qX469le4psDfLM9yZCQihot4PuLJBgmyesagGpxk.jpg', 4, 4, '2024-11-27 21:10:16', '2024-11-27 21:10:16'),
(7, 'Cat Choize Plus Adult Tuna & Salmon', 30000.00, 500, 13, '\"Cat Choize Plus Adult Cat Food Tuna & Salmon 500gr Cat Choize Plus mengandung nutrisi lengkap, vitamin dan mineral yang membuat kucing Anda sehat. Cat Choize Plus cocok untuk semua jenis kucing dewasa, yang dikembangkan dengan pola diet yang seimbang untuk memastikan pertumbuhan kucing yang optimal.', 'imgProduk/dAX2ySdI6aaNVcXdKXaZ0V8GQDnbL5XqHHCBD8aO.png', 1, 1, '2024-11-27 21:16:10', '2024-11-27 21:16:47'),
(8, 'Whiskas Ocean Fish', 6500.00, 1200, 14, 'Kucing dengan usia 1-6 tahun membutuhkan banyak latihan dan bermain serta makanan yang seimbang untuk menjaganya tetap aktif dan sehat. Kucing adalah karnivora, sedangkan manusia , omnivora, jadi kucing membutuhkan 2 kali lebih banyak protein daripada manusia. Mereka juga membutuhkan 41 kandungan nutrisi esensial untuk kesehatan yang optimum. WHISKAS mengerti akan kandungan nutrisi yang dibutuhkan oleh kucing dan setiap produk secara spesifik di formulasikan dengan kandungan nutrisi yang lengkap dan seimbang.', 'imgProduk/eqYgjMFsVc0ZqNBILNYvOwbfeCojG5iT35ft5DSK.jpg', 1, 1, '2024-11-28 00:35:34', '2024-12-26 02:43:17'),
(9, 'Cat Choize Plus Adult Tuna & Salmon', 30000.00, 500, 10, '\"Cat Choize Plus Adult Cat Food Tuna & Salmon 500gr Cat Choize Plus mengandung nutrisi lengkap, vitamin dan mineral yang membuat kucing Anda sehat. Cat Choize Plus cocok untuk semua jenis kucing dewasa, yang dikembangkan dengan pola diet yang seimbang untuk memastikan pertumbuhan kucing yang optimal.', 'imgProduk/twvqvCgZPmMll5q736REHa8uXNAra07eqqAQmdsa.png', 1, 1, '2024-11-28 00:38:17', '2024-11-28 00:52:32'),
(10, 'NICE CAT Food Tuna', 10000.00, 800, 19, 'Nice merupakan makanan kucing yang mengandung protein sebanyak 28%. Pakan ini termasuk salah satu produk buatan Indonesia yang memiliki kualitas tidak kalah dengan produk-produk lainnya. Lengkap dengan nutrisi seimbang. Mengandung taurine yang baik untuk kesehatan mata, yucca extract yang dapat mengurangi bau pada kotoran kucing serta omega 3 dan 6 untuk kesehatan kulit dan bulu kucing. Cocok untuk berbagai jenis kucing baik kucing dengan tipe long hair maupun short hair.', 'imgProduk/NLX4xom5WwB05nMMS0k4ECwSayquBGPip08EMxSM.jpg', 1, 1, '2024-11-28 00:42:51', '2024-11-28 00:42:51'),
(11, 'Sheba Treats Katsuo', 12000.00, 12, 15, 'Puree lembut yang menggoda ini akan menjadi pengalaman yang tidak terlupakan untuk kamu dan kucing kesayangan. Sachet premium ukuran 12g dirancang khusus untuk pengalaman memberikan snack dengan tangan yang akan membuat kucing tetap bersama kamu hingga tetes terakhir. Cocok untuk semua jenis kucing dengan umur di atas 12 bulan, baik kucing dewasa maupun senior.', 'imgProduk/mjclns1K7DTTHxuIt4kMQ1mEpH4znBb3TKE66mvQ.png', 1, 1, '2024-11-28 00:53:48', '2024-11-28 03:16:38'),
(12, 'Junior Kaleng Tuna Crab', 13000.00, 400, 20, 'Ingredients List/Bahan Pembuat:\r\nTuna, Fish Oil, Taurine, Citric Acid, Vitamin E, Xanthan Gum\r\n\r\nNutrition List/Kandungan Nutrisi:\r\nCrude Protein (Protein Kasar) > 10.0%\r\nCrude Fat (Lemak Kasar) >1.5%\r\nAsh (Abu) < 1.8%\r\nCrude Fiber (Serat Kasar) < 1.0%\r\nMoisture (Kelembaban) < 86%\r\nCrude F', 'imgProduk/h3FMdvveKsSfRGFtAlHomRqEPSDPXrYVbgpx1dDc.jpg', 1, 1, '2024-11-28 01:26:19', '2024-12-26 02:43:17'),
(13, 'Life Cat Kaleng Salmon Kitten', 15000.00, 400, 33, 'Makanan untuk Kucing\r\nLife Cat merupakan salah satu makanan basah atau wet food berkualitas yang terbuat dari bahan-bahan alami pilihan dan mengandung banyak vitamin dan mineral seperti Vitamin A, Vitamin B12, Vitamin D, dan masih banyak kandungan lainnya yang bermanfaat untuk kucing Anda.', 'imgProduk/4nMQOIvEHO39atkhrxM5Cqr97JhYftGf3dPzcndT.jpg', 1, 1, '2024-11-28 02:26:41', '2024-11-28 03:24:19'),
(14, 'Me-O Maguro 60gr', 18000.00, 60, 34, 'Makanan kucing kering rasa maguro (tuna segar), kaya nutrisi dan serat.Me-O Creamy Treats Maguro\r\nSnack kucing\r\nBerat netto 4 x 15gr', 'imgProduk/LAP5kjYaUZauqcyYfCk3s7N3lpTdvkR93xlHCfEh.jpg', 1, 1, '2024-11-28 03:26:20', '2024-11-28 03:26:20');

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
('MOdLImZ2d00nIoumGv8flT17E2oH3JmtGxM3lkXL', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTDR3Z1lFT0c0RDREbmYzTW5xbktNRDBpaE15RnJoTWhyWEVIVDg4UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hZmZpbGlhdGVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxMjoiYWZmaWxpYXRlX2lkIjtpOjM7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWlucyI7fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1736197043);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `method` varchar(50) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL,
  `tracking_number` varchar(50) DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `user_id`, `address`, `method`, `shipping_fee`, `tracking_number`, `sent_at`, `received_at`, `created_at`, `updated_at`) VALUES
(6, 2, 1, 'jln.itn', 'JNE', 15000.00, '123098', '2024-12-26 16:21:00', NULL, '2024-12-26 09:21:14', '2024-12-26 09:21:14');

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
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `affiliates`
--
ALTER TABLE `affiliates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `affiliate_code` (`affiliate_code`);

--
-- Indexes for table `animal_category`
--
ALTER TABLE `animal_category`
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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_category`
--
ALTER TABLE `jenis_category`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_category_id` (`jenis_category_id`),
  ADD KEY `animal_category_id` (`animal_category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `affiliates`
--
ALTER TABLE `affiliates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `animal_category`
--
ALTER TABLE `animal_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_category`
--
ALTER TABLE `jenis_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `shippings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
