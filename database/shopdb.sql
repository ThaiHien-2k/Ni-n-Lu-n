-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 12:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `parent_id`, `body`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, NULL, 'Sản phẩm này chỗ khác rẻ hơn', 2, '2022-11-23 09:26:50', '2022-11-23 09:26:50', NULL),
(2, 1, 2, 1, 'Qua chỗ đó mà mua', 1, '2022-11-23 09:27:57', '2022-11-23 09:27:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `battery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technology` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operaring` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chipset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `product_id`, `card`, `screen`, `battery`, `technology`, `ram`, `memory`, `operaring`, `chipset`, `port`, `created_at`, `updated_at`) VALUES
(1, 1, 'AMD', 'infinity 15 inch', '10', 'wifi 5, sạc nhanh, gập 360 độ', '16GB', 'SSD 512G', 'win 10', 'itel core i5', '2 cổng USB A, 1 HTML, 1 LAN', NULL, '2022-11-21 03:45:09'),
(2, 2, 'GTX1650', '15.6\"Full HD (1920 x 1080) 144Hz', '10', 'đèn bàn phím chuyển màu RGB độc đáo', '8GB', '512GB', 'Win11', 'i5 10300H', '2 cổng USB A, 1 HTML, 1 LAN', '2022-11-21 03:20:16', '2022-11-21 03:20:16'),
(3, 3, 'GTX1650', '15.6\"Full HD (1920 x 1080) 144Hz', '10', 'wifi 5, sạc nhanh, gập 360 độ, mở khóa vân tay', '8GB', '512GB', 'win 10', 'i5 10300H', '2 cổng USB A, 1 HTML, 1 LAN', '2022-11-21 03:37:19', '2022-11-21 03:37:19'),
(4, 4, 'RTX3060 Max-Q', '15.6\"Full HD (1920 x 1080) 144Hz', '12', 'Có đèn bàn phím', '16GB', '512GB', 'Win10', 'i5 10500H', 'LAN (RJ45)2 x USB Type-CHDMIJack tai nghe 3.5 mm2 x USB 3.2', '2022-11-21 03:40:09', '2022-11-21 03:40:09'),
(5, 5, 'Card tích hợp16 nhân GPU', '16.2\"Liquid Retina XDR display (3456 x 2234)120Hz', '8', 'Bluetooth 5.0, Wi-Fi 6 (802.11ax), bảo mật vân tay', '16GB', 'SSD 512G', 'Mac OS', 'Apple M1 Pro200GB/s', 'HDMIJack tai nghe 3.5 mm3 x Thunderbolt 4 USB-C', '2022-11-21 03:43:59', '2022-11-21 03:43:59'),
(6, 6, 'Card tích hợpIntel Iris Xe', '13.3\"2.8K (2880 x 1800) - OLED', '10', 'HP Audio Boost và Bang & Olufsen audio, Gập màn hình', '16GB', '512GB', 'Win11', 'i71250U1.1GHz', 'Jack tai nghe 3.5 mm2 x USB 3.22 x Thunderbolt 4 with USB-C (Power Delivery and DisplayPort)', '2022-11-21 03:49:08', '2022-11-21 03:49:08'),
(7, 7, 'Card tích hợpIntel UHD', '16.2\"Liquid Retina XDR display (3456 x 2234)120Hz', '12', 'wifi 5, sạc nhanh, gập 360 độ, mở khóa vân tay', '8GB', '512GB', 'Win11', 'i5 12500H', 'LAN (RJ45)2 x USB Type-CHDMIJack tai nghe 3.5 mm2 x USB 3.2', '2022-11-21 03:52:59', '2022-11-21 03:52:59'),
(8, 8, 'GTX1650', '15.6\"Full HD (1920 x 1080) 144Hz', '10', 'Bluetooth 5.0, Wi-Fi 6 (802.11ax), bảo mật vân tay', '8GB', '512GB', 'Win11', 'i5 10300H', 'LAN (RJ45)2 x USB Type-CHDMIJack tai nghe 3.5 mm2 x USB 3.2', '2022-11-21 03:54:39', '2022-11-21 03:54:39'),
(9, 9, 'Card rờiNVIDIA Geforce MX570, 2 GB', '13.3\"2.8K (2880 x 1800) - OLED', '10', 'HP Audio Boost và Bang & Olufsen audio, Gập màn hình', '16GB', '512GB', 'Win11', 'i5 1240P', 'Jack tai nghe 3.5 mm2 x USB 3.22 x Thunderbolt 4 with USB-C (Power Delivery and DisplayPort)', '2022-11-21 03:56:24', '2022-11-21 03:56:24'),
(10, 10, 'Card tích hợp8 nhân GPU', '13.6\"Liquid Retina (2560 x 1664)', '12', 'Bluetooth 5.0, Wi-Fi 6 (802.11ax), bảo mật vân tay', '16GB', '512GB', 'Mac OS', 'Apple M2100GB/s', 'Jack tai nghe 3.5 mmMagSafe 32 x Thunderbolt 3', '2022-11-21 03:58:45', '2022-11-21 03:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `nameStaff` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` int(10) UNSIGNED NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT 'Đã nhận máy',
  `dateTake` datetime DEFAULT NULL,
  `dateReturn` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurances`
--

INSERT INTO `insurances` (`id`, `serial`, `phone`, `body`, `order_id`, `nameStaff`, `cost`, `status`, `dateTake`, `dateReturn`, `created_at`, `updated_at`) VALUES
(4, 'APPLE01', '0937760152', 'Màn hình sọc', 4, 'Phan Thái Hiền', 80000, 'Đã giao', '2022-11-23 16:35:59', '2022-11-23 16:39:25', '2022-11-23 09:35:59', '2022-11-23 09:39:25'),
(5, 'APPLE01', '0937760152', 'Lỗi sạc pin', 4, 'Phan Thái Hiền', 120000, 'Đã nhận máy', '2022-11-23 17:25:39', NULL, '2022-11-23 10:25:39', '2022-11-23 10:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_details`
--

CREATE TABLE `insurance_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `fix` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `insurance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_details`
--

INSERT INTO `insurance_details` (`id`, `date`, `fix`, `image`, `created_at`, `updated_at`, `insurance_id`) VALUES
(15, '2022-11-24 00:00:00', 'Gửi máy về trung tâm', 'insurances/c2g6LpxXOXKiHzZJYa5RE6rOLPgpB0dht8KpRXY2.jpg', '2022-11-23 09:37:39', '2022-11-23 09:37:39', 4),
(16, '2022-11-26 00:00:00', 'Máy sửa xong đưa về cửa hàng', 'insurances/toRsTlnBjAjz1zqB6XfsyWDe2oZFIYKYZvCiYGPp.jpg', '2022-11-23 09:39:23', '2022-11-23 09:39:23', 4);

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateInsurance` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nameOwner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `order_id`, `serial`, `dateInsurance`, `created_at`, `updated_at`, `nameOwner`, `phone`, `productName`, `model`) VALUES
(25, 4, 'APPLE01', '2022-11-23 16:35:17', '2022-11-23 09:35:17', '2022-11-23 09:35:17', 'Phan Thái Hiền', '0937760152', 'Laptop Apple MacBook Air M2 2022 16GB/256GB/8-core GPU (Z16000051)', 'Jack type-C');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2022_09_25_140529_comments_table', 1),
(20, '2022_10_12_000000_create_users_table', 1),
(21, '2022_10_18_101953_create_products_table', 1),
(22, '2022_10_18_132841_create_profiles_table', 1),
(23, '2022_10_21_154729_create_stocks_table', 1),
(24, '2022_10_23_143115_insurance', 1),
(25, '2022_10_24_084350_create_orders_table', 1),
(26, '2022_10_26_143529_laptop', 1),
(27, '2022_11_03_121416_configs', 1),
(28, '2022_11_12_185609_insurance_detail', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `user_id`, `name`, `cart`, `phonenumber`, `address`, `payment`, `status`) VALUES
(4, '2022-11-23 09:32:32', '2022-11-23 09:32:32', 4, 'Phan Thái Hiền', 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:0;a:5:{s:8:\"quantity\";i:1;s:5:\"price\";i:38000000;s:5:\"model\";s:11:\"Jack type-C\";s:4:\"item\";O:11:\"App\\Product\":27:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:10;s:4:\"name\";s:66:\"Laptop Apple MacBook Air M2 2022 16GB/256GB/8-core GPU (Z16000051)\";s:5:\"brand\";s:5:\"APPLE\";s:5:\"price\";i:38000000;s:5:\"image\";s:53:\"products/365lhkRVkJ8w3u3XmAhwPaqG6FGfLHWwWFaCayY6.jpg\";s:9:\"insurance\";i:12;s:8:\"quantity\";i:1;s:10:\"created_at\";s:19:\"2022-11-21 10:58:45\";s:10:\"updated_at\";s:19:\"2022-11-21 10:58:45\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:10;s:4:\"name\";s:66:\"Laptop Apple MacBook Air M2 2022 16GB/256GB/8-core GPU (Z16000051)\";s:5:\"brand\";s:5:\"APPLE\";s:5:\"price\";i:38000000;s:5:\"image\";s:53:\"products/365lhkRVkJ8w3u3XmAhwPaqG6FGfLHWwWFaCayY6.jpg\";s:9:\"insurance\";i:12;s:8:\"quantity\";i:1;s:10:\"created_at\";s:19:\"2022-11-21 10:58:45\";s:10:\"updated_at\";s:19:\"2022-11-21 10:58:45\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:10:\"product_id\";i:10;}}s:13:\"totalQuantity\";i:1;s:10:\"totalPrice\";i:38000000;}', '0937760152', 'KTX B Đại Học Cần Thơ', 'Giao Hàng Nhận Tiền', 'Đã đặt hàng');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `price`, `image`, `insurance`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Acer TravelMate B3 TMB311 31 P49D N5030/4GB/256GB/Win11 (NX.VNFSV.005)', 'ACER', 18000000, 'products/rXSUKmkUDDKXfLr67Cfb5rbEMJ9G2HKTEgG3Lp1B.jpg', 12, 1, '2022-11-03 05:54:02', '2022-11-03 05:54:02'),
(2, 'Laptop Asus TUF Gaming FX506LHB i5 10300H/8GB/512GB/4GB GTX1650/144Hz/Win11 (HN188W)', 'ASUS', 19000000, 'products/rIzJGCXBqAPeBW2ELkrBEZdVcthZBBSd40jWUTB3.jpg', 12, 1, '2022-11-21 03:20:16', '2022-11-21 03:20:16'),
(3, 'Laptop Dell Vostro 5620 i5 1240P/8GB/256GB/OfficeHS/Win11 (V6I5001W1)', 'DELL', 21000000, 'products/Mhj5jkDLeAHTbW5TxnasbVTP0XIiJ6D6V42pbVat.jpg', 12, 1, '2022-11-21 03:37:19', '2022-11-21 03:37:19'),
(4, 'Laptop MSI Gaming GF65 Thin 10UE i5 10500H/16GB/512GB/6GB RTX3060 Max-Q/144Hz/Balo/Win10 (286VN)', 'MSI', 24000000, 'products/kFVyGc7tz69UAMWXLKIW2XpRZfy58g9DJfA3OgNo.jpg', 12, 1, '2022-11-21 03:40:09', '2022-11-21 03:45:19'),
(5, 'Laptop Apple MacBook Pro 16 M1 Pro 2021 10 core-CPU/16GB/512GB/16 core-GPU (MK183SA/A)', 'APPLE', 70000000, 'products/XSoQz2qNuyoNhad59wOWPGrrFIcDVwzEdTHnIzdZ.jpg', 12, 1, '2022-11-21 03:43:59', '2022-11-21 03:43:59'),
(6, 'Laptop HP Envy X360 13 bf0090TU i7 1250U/16GB/512GB/Touch/Pen/Win11 (76B13PA)', 'ACER', 32000000, 'products/iBbqB2XTyJTfH8hORMSleN6B49Pt8aaM0jj4sFsG.jpg', 12, 1, '2022-11-21 03:49:08', '2022-11-21 03:49:08'),
(7, 'Laptop Asus VivoBook 15X OLED A1503ZA i5 12500H/8GB/512GB/Win11 (L1290W)', 'ASUS', 20000000, 'products/mpQNOMeUEzcg2NyqgV5fYNBo2S8ur6VPsVL7w8SA.jpg', 12, 1, '2022-11-21 03:52:59', '2022-11-21 03:52:59'),
(8, 'Laptop Asus TUF Gaming FX506LHB i5 10300H/8GB/512GB/4GB GTX1650/144Hz/Win11 (HN188W)', 'ASUS', 18000000, 'products/78Er3HDbAvYHXEp9HFsJBQmMdKFGcLE7YbLlcjyH.jpg', 12, 1, '2022-11-21 03:54:39', '2022-11-21 03:54:39'),
(9, 'Laptop Dell Inspiron 16 5620 i5 1240P/16GB/512GB/2GB MX570/OfficeHS/Win11 (N6I5003W1)', 'DELL', 29000000, 'products/kS6oCOzipGDprtyznFBERgr3vfPfA0PAwCxea22r.jpg', 12, 1, '2022-11-21 03:56:24', '2022-11-21 03:56:24'),
(10, 'Laptop Apple MacBook Air M2 2022 16GB/256GB/8-core GPU (Z16000051)', 'APPLE', 38000000, 'products/365lhkRVkJ8w3u3XmAhwPaqG6FGfLHWwWFaCayY6.jpg', 12, 1, '2022-11-21 03:58:45', '2022-11-21 03:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `phonenumber`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, '0937760152', 'KTX B Đại Học Cần Thơ', NULL, '2022-11-23 10:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `name`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Trắng', 7, '2022-11-12 12:24:51', '2022-11-14 10:58:17'),
(2, 1, 'Đen', 10, '2022-11-12 12:25:05', '2022-11-12 12:25:05'),
(3, 2, 'Đen', 10, '2022-11-21 04:39:56', '2022-11-21 04:39:56'),
(4, 2, 'Xám', 20, '2022-11-21 04:40:06', '2022-11-21 04:40:06'),
(5, 3, '512GB Bộ nhớ', 10, '2022-11-21 04:40:18', '2022-11-21 04:42:52'),
(6, 3, '1T Bộ nhớ', 20, '2022-11-21 04:40:30', '2022-11-21 04:42:36'),
(7, 4, 'Thường', 20, '2022-11-21 04:40:41', '2022-11-21 04:40:41'),
(8, 4, 'Kỉ niệm', 20, '2022-11-21 04:41:00', '2022-11-21 04:41:00'),
(9, 5, 'Xám', 20, '2022-11-21 04:41:19', '2022-11-21 04:41:19'),
(10, 6, 'Hồng', 20, '2022-11-21 04:41:33', '2022-11-21 04:41:33'),
(11, 7, '8G RAM', 10, '2022-11-21 04:41:59', '2022-11-21 04:41:59'),
(12, 7, '16GB RAM', 20, '2022-11-21 04:42:15', '2022-11-21 04:42:15'),
(13, 8, 'Mặc định', 20, '2022-11-21 04:43:22', '2022-11-21 04:43:22'),
(14, 9, 'Hợp kim', 20, '2022-11-21 04:44:09', '2022-11-21 04:44:09'),
(15, 9, 'Nhựa', 20, '2022-11-21 04:44:20', '2022-11-21 04:44:20'),
(16, 10, 'Jack 3.5', 20, '2022-11-21 04:44:32', '2022-11-21 04:44:32'),
(17, 10, 'Jack type-C', 19, '2022-11-21 04:44:50', '2022-11-23 09:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$.HQIgQH1Is7eE/XKX.lHOO3SYmiXgnqkeeKeTDUuS94iwV0Uz2kXa', 'Admin', NULL, NULL),
(2, 'Phan Thái Hiền', 'phanthaihien000@gmail.com', '$2y$10$hnWoSH/HnO/D0YWL/4wObeP6YhIPSBR5.LNi1w6Fw8VALOcFCrVaW', 'Customer', '2022-11-23 07:30:21', '2022-11-23 07:30:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_details`
--
ALTER TABLE `insurance_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_index` (`user_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_product_id_index` (`product_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `insurance_details`
--
ALTER TABLE `insurance_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
