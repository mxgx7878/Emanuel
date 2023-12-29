-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 04:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodstadium_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `variation` longtext DEFAULT NULL,
  `instruction` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `quantity`, `variation`, `instruction`, `created_at`, `updated_at`) VALUES
(5, 2, 3, 2, '{\"1\":2,\"2\":5,\"4\":3}', 'test', '2023-12-06 06:12:48', '2023-12-06 06:12:48'),
(6, 2, 3, 2, '{\"1\":2,\"2\":5,\"4\":4}', 'test', '2023-12-06 06:22:15', '2023-12-06 06:22:25'),
(7, 68, 3, 2, '{\"1\":2,\"2\":5,\"4\":12}', 'test', '2023-12-29 07:24:10', '2023-12-29 07:24:10'),
(8, 68, 3, 4, '{\"1\":2,\"2\":5,\"4\":3}', 'test', '2023-12-29 07:35:40', '2023-12-29 07:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hamburgers', 'images/categoryimages/1698691338.png', 1, '2023-10-31 01:42:18', '2023-10-31 01:43:37'),
(2, 'Fast Food', 'images/categoryimages/1699434514.png', 1, '2023-11-03 16:48:22', '2023-11-08 14:08:34'),
(3, 'Asian', 'images/categoryimages/1699434532.png', 1, '2023-11-03 16:52:04', '2023-11-08 14:08:52'),
(4, 'Pizza', 'images/categoryimages/1699434552.png', 1, '2023-11-03 16:52:19', '2023-11-08 14:09:12'),
(5, 'Tacos', 'images/categoryimages/1699434574.png', 1, '2023-11-03 16:52:39', '2023-11-08 14:09:34'),
(6, 'American', 'images/categoryimages/1700694922.jpg', 1, '2023-11-23 04:15:22', '2023-11-23 04:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `contact_queries`
--

CREATE TABLE `contact_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `appartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_queries`
--

INSERT INTO `contact_queries` (`id`, `full_name`, `email`, `first_name`, `last_name`, `company`, `address`, `appartment`, `city`, `state`, `zipcode`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Israel Legros', 'Clarabelle74@yahoo.com', 'Caroline', 'Bartoletti', 'O\'Connell Group', '4203 Kilback Place', '763 Eldred Landing', 'Wellington', 'sindh', '4', '45-509-291-5093', '2023-12-28 02:31:34', '2023-12-28 02:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `discount` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `code`, `discount`, `expiry_date`, `created_at`, `updated_at`) VALUES
(5, 5, '132321a', 10, '2023-12-24', '2023-12-05 10:28:05', '2023-12-05 10:28:05'),
(6, 5, 'asd123', 20, '2023-12-30', '2023-12-05 10:29:06', '2023-12-05 10:29:06'),
(7, 5, '12323d12', 15, '2023-12-26', '2023-12-05 10:29:09', '2023-12-05 10:29:09'),
(8, 5, '12321r23', 14, '2023-12-13', '2023-12-05 10:29:13', '2023-12-05 10:36:43'),
(9, 5, '12321r23a', 24, '2023-12-05', '2023-12-05 10:33:37', '2023-12-05 10:33:37'),
(10, 5, '12321r23b', 10, '2024-01-02', '2023-12-27 10:13:25', '2023-12-27 10:13:25'),
(11, 5, '12321r23bas', 10, '2024-01-26', '2023-12-27 10:13:32', '2023-12-27 10:13:32'),
(12, 5, '12321r23basa', 10, '2024-01-03', '2023-12-27 10:14:37', '2023-12-27 10:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `customize_menus`
--

CREATE TABLE `customize_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_pic` varchar(255) NOT NULL,
  `item_price` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customize_menus`
--

INSERT INTO `customize_menus` (`id`, `vendor_id`, `category_id`, `item_name`, `item_pic`, `item_price`, `status`, `created_at`, `updated_at`) VALUES
(2, 5, 4, 'burgers', 'images/customizemenuimages/1699454375.png', 200.00, 1, '2023-11-03 10:20:59', '2023-11-08 19:39:35'),
(3, 5, 2, 'burgers', 'images/customizemenuimages/1699025150.png', 20.00, 1, '2023-11-03 10:25:50', '2023-11-03 10:25:50'),
(4, 5, 2, 'burgers', 'images/customizemenuimages/1699025274.png', 20.00, 1, '2023-11-03 10:27:54', '2023-11-03 10:27:54'),
(5, 5, 2, 'burger', 'images/customizemenuimages/1699432302.png', 20.00, 1, '2023-11-08 13:31:42', '2023-11-08 13:31:42'),
(6, 5, 2, 'pizza', 'images/customizemenuimages/1699435694.png', 20.00, 1, '2023-11-08 14:28:14', '2023-11-08 14:28:14'),
(7, 5, 2, 'pizza', 'images/customizemenuimages/1699445027.png', 20.00, 1, '2023-11-08 17:03:47', '2023-11-08 17:03:47'),
(8, 5, 2, 'pizza', 'images/customizemenuimages/1699445134.png', 20.00, 1, '2023-11-08 17:05:34', '2023-11-08 17:05:34'),
(9, 5, 2, 'pizza', 'images/customizemenuimages/1699445245.png', 20.00, 1, '2023-11-08 17:07:25', '2023-11-08 17:07:25'),
(10, 5, 2, 'Britanni Leonard', 'images/customizemenuimages/1699451786.png', 890.00, 1, '2023-11-08 18:56:26', '2023-11-08 18:56:26'),
(11, 5, 1, 'Food', 'images/customizemenuimages/1700235957.png', 50.00, 1, '2023-11-17 20:45:57', '2023-11-17 20:45:57'),
(12, 5, 4, 'mashrooms', 'images/customizemenuimages/1700693977.jpg', 10.00, 1, '2023-11-23 03:59:37', '2023-11-23 03:59:37'),
(13, 5, 4, 'Olives', 'images/customizemenuimages/1700694099.jpg', 10.00, 1, '2023-11-23 04:01:40', '2023-11-23 04:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `dietary`
--

CREATE TABLE `dietary` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dietary`
--

INSERT INTO `dietary` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vegetarian', 1, '2023-10-31 01:59:24', '2023-10-31 01:59:24'),
(2, 'Vegan', 1, '2023-10-31 01:59:37', '2023-10-31 01:59:37'),
(3, 'Gluten-free', 1, '2023-10-31 01:59:49', '2023-10-31 01:59:49'),
(4, 'Pure Halal', 1, '2023-10-31 02:00:01', '2023-11-03 17:12:44'),
(6, 'Non Halal', 1, '2023-11-03 17:11:41', '2023-11-03 17:11:41');

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Main', 1, '2023-10-31 01:52:36', '2023-11-03 17:14:00'),
(2, 'Sides', 1, '2023-10-31 01:52:50', '2023-10-31 01:52:50'),
(3, 'Desserts', 1, '2023-10-31 01:52:58', '2023-10-31 01:52:58'),
(4, 'Beverage', 1, '2023-10-31 01:53:21', '2023-10-31 01:53:21'),
(5, 'Appetizers', 1, '2023-10-31 01:53:30', '2023-10-31 01:53:30'),
(6, 'DHGJKSHD', 1, '2023-11-03 17:03:24', '2023-11-03 17:05:26'),
(7, 'Main Course', 1, '2023-11-03 17:14:13', '2023-11-03 17:14:13'),
(8, 'Midnight', 1, '2023-11-23 04:17:08', '2023-11-23 04:17:08');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_03_142330_create_customize_menus_table', 2),
(6, '2023_11_07_101205_create_products_table', 3),
(7, '2023_11_07_101919_create_product_images_table', 4),
(8, '2023_11_27_081748_create_product_remarks_table', 5),
(9, '2023_12_18_112038_create_orders_table', 6),
(10, '2023_12_18_113133_create_order_products_table', 7),
(12, '2023_12_27_150706_create_contact_queries_table', 8),
(13, '2023_12_28_135125_create_favorites_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `total` double(8,2) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `delivery_date` date NOT NULL,
  `delivery_type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `vendor_id`, `user_name`, `user_address`, `sub_total`, `discount`, `total`, `zipcode`, `coupon_code`, `message`, `delivery_date`, `delivery_type`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 'rafay', '9740 Kathleen Trail', 4000.00, 500.00, 3500.00, 52100, '2347941', NULL, '2023-12-29', 1, '2023-12-29 07:03:01', '2023-12-29 07:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `variation_item` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `product_price`, `variation_item`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 0.00, '{\"1\":1,\"2\":5,\"4\":3}', NULL, '2023-12-29 07:03:01', '2023-12-29 07:03:01');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'MyApp', 'e31c26b9929c62f2d7afe662e795cec5186641611ac5b712ac81f2644fbc9e37', '[\"*\"]', NULL, NULL, '2023-10-30 09:12:14', '2023-10-30 09:12:14'),
(4, 'App\\Models\\User', 2, 'MyApp', '6662b978b8609fdf65192ab70d2234eb7d864537940fb4cc847b4e725a100d7c', '[\"*\"]', '2023-11-03 16:18:30', NULL, '2023-10-31 01:39:12', '2023-11-03 16:18:30'),
(5, 'App\\Models\\User', 3, 'MyApp', 'bb0da92f83ed02df8aa4e8bb1bcb6ce1ec50305b48aed4eaea44eb301ae6662e', '[\"*\"]', NULL, NULL, '2023-11-03 16:17:09', '2023-11-03 16:17:09'),
(6, 'App\\Models\\User', 2, 'MyApp', '3d8c44dbb2733996b884943f1c83311863a2a39219097f943c05f236d3b0feb4', '[\"*\"]', NULL, NULL, '2023-11-03 16:31:05', '2023-11-03 16:31:05'),
(7, 'App\\Models\\User', 2, 'MyApp', '35f4645f4cbbf36222d7cc6edea666b13dfa2eacaf45016ebfee234487534c6a', '[\"*\"]', NULL, NULL, '2023-11-03 16:41:31', '2023-11-03 16:41:31'),
(8, 'App\\Models\\User', 2, 'MyApp', 'd880b2fe0a4e2fea42269d79f60e98157b692c228e5c97e94b479acf7b1fc37c', '[\"*\"]', NULL, NULL, '2023-11-03 16:42:03', '2023-11-03 16:42:03'),
(9, 'App\\Models\\User', 2, 'MyApp', 'c818b980cf9bb50acf16850775c4327ee302ac97b9ab8aaec0be72e999d6756f', '[\"*\"]', NULL, NULL, '2023-11-03 16:42:25', '2023-11-03 16:42:25'),
(10, 'App\\Models\\User', 2, 'MyApp', 'd2691ddf0ba6da66be22e01c3fada4dfea3c18f4f6eb3491b5af77f38d910e9e', '[\"*\"]', '2023-11-03 17:14:13', NULL, '2023-11-03 16:46:19', '2023-11-03 17:14:13'),
(11, 'App\\Models\\User', 2, 'MyApp', '9905f98a7bfaa89d72148d2a71bac54a8a68a1f5677d7b7e682f9361d0854a2e', '[\"*\"]', '2023-12-18 08:06:03', NULL, '2023-11-03 17:30:22', '2023-12-18 08:06:03'),
(12, 'App\\Models\\User', 5, 'MyApp', 'cade7b12f0ca2112a8092479f2a3bfdcbded53d8159d168acc00e0e771fd6a76', '[\"*\"]', '2023-11-03 09:54:22', NULL, '2023-11-03 09:54:13', '2023-11-03 09:54:22'),
(13, 'App\\Models\\User', 5, 'MyApp', '7cf7905ed699680e4a34b786d5158e5a69825b8101328bce832663bce18ae0d3', '[\"*\"]', '2023-12-29 10:00:41', NULL, '2023-11-03 09:56:40', '2023-12-29 10:00:41'),
(14, 'App\\Models\\User', 5, 'MyApp', 'a73c418228b3f73c8e08eb91097f275e13610d2fc4e8df68ade6941aa7d6b593', '[\"*\"]', NULL, NULL, '2023-11-08 13:49:26', '2023-11-08 13:49:26'),
(15, 'App\\Models\\User', 2, 'MyApp', '82207e3582498bc777a86ca86d9dff6752275592c101c69a80db29ecffa91193', '[\"*\"]', '2023-11-08 16:49:36', NULL, '2023-11-08 13:51:06', '2023-11-08 16:49:36'),
(18, 'App\\Models\\User', 5, 'MyApp', 'ac546cab71f3397dbc30d43a19bbdadaf938cdb8e27106a3cf0579046934a141', '[\"*\"]', '2023-11-08 20:50:50', NULL, '2023-11-08 18:29:01', '2023-11-08 20:50:50'),
(19, 'App\\Models\\User', 5, 'MyApp', '5c579061975c6b1c280cb997038e3f81c0d39e4cf1a357d69fa57e2ee45f40c7', '[\"*\"]', '2023-11-08 20:55:42', NULL, '2023-11-08 20:55:25', '2023-11-08 20:55:42'),
(20, 'App\\Models\\User', 2, 'MyApp', '999d1731ab653f508e83744a624b36edaa10b7f08050ee550adeecd220ffe0ae', '[\"*\"]', '2023-11-09 19:33:00', NULL, '2023-11-09 19:32:57', '2023-11-09 19:33:00'),
(21, 'App\\Models\\User', 2, 'MyApp', '27ce36ebd4b787437835c89d42398d652fc1ec19c86f5929715034ecd9bbd33b', '[\"*\"]', '2023-11-09 19:33:53', NULL, '2023-11-09 19:33:13', '2023-11-09 19:33:53'),
(22, 'App\\Models\\User', 5, 'MyApp', '8a1c7946fb0dc1ac62e3e75a1c589332a7c44047373caf4f59c5dd271f8eebe7', '[\"*\"]', '2023-11-09 19:36:52', NULL, '2023-11-09 19:35:25', '2023-11-09 19:36:52'),
(23, 'App\\Models\\User', 2, 'MyApp', 'ae248955558ad8e09b9b1476dda85f67af23a1189ef6b82bdade680301c647b6', '[\"*\"]', '2023-11-09 23:30:18', NULL, '2023-11-09 23:30:10', '2023-11-09 23:30:18'),
(24, 'App\\Models\\User', 5, 'MyApp', '5639386907bd50b116b1a950d46561d0e7271d6a86a69779b9936b7ad87fac59', '[\"*\"]', '2023-11-27 15:02:52', NULL, '2023-11-10 15:37:02', '2023-11-27 15:02:52'),
(25, 'App\\Models\\User', 5, 'MyApp', '5239023bde5ab491ca71069596e2424b3ff2a9fe8002f460ca28b32f42b258c2', '[\"*\"]', '2023-11-14 15:22:31', NULL, '2023-11-14 15:20:04', '2023-11-14 15:22:31'),
(26, 'App\\Models\\User', 5, 'MyApp', 'f419e118d8d3cf73b6d17d0a614cf273550ac18fd504d4a3924dc187c3e78e24', '[\"*\"]', '2023-11-14 18:03:38', NULL, '2023-11-14 17:19:10', '2023-11-14 18:03:38'),
(27, 'App\\Models\\User', 5, 'MyApp', '1aa47d7b51c8af340afa5c7ef01a5c247b31991cee4e188f655a26ad913c5220', '[\"*\"]', '2023-11-15 21:01:28', NULL, '2023-11-15 14:59:24', '2023-11-15 21:01:28'),
(28, 'App\\Models\\User', 5, 'MyApp', '190c9fbfc1198f661121665f6474192f8ed83e4a8697c38f14ff2f4fb315ab30', '[\"*\"]', '2023-11-15 21:07:52', NULL, '2023-11-15 21:07:40', '2023-11-15 21:07:52'),
(29, 'App\\Models\\User', 5, 'MyApp', '781944c5b361fc20ec9247b18f577ecd1a515722c80e7320253f1c7523ce70ae', '[\"*\"]', '2023-11-16 19:06:00', NULL, '2023-11-16 14:11:53', '2023-11-16 19:06:00'),
(30, 'App\\Models\\User', 5, 'MyApp', '88af402ab109d59b2a1733f54825682bc118dc5a8d183b0976aaea191a202b8f', '[\"*\"]', '2023-11-16 21:31:29', NULL, '2023-11-16 21:24:08', '2023-11-16 21:31:29'),
(31, 'App\\Models\\User', 5, 'MyApp', '2e1028ce09ce701e1e5bf2f5fde63406db90ccd8d2c5b4b26cf5bb740d631c61', '[\"*\"]', '2023-11-16 21:34:40', NULL, '2023-11-16 21:34:27', '2023-11-16 21:34:40'),
(33, 'App\\Models\\User', 5, 'MyApp', '0bc13b40561eae69201744a2f0aa82b438750a835e4c12aa88bbd40f142ebaf2', '[\"*\"]', '2023-11-17 14:47:57', NULL, '2023-11-17 14:47:55', '2023-11-17 14:47:57'),
(34, 'App\\Models\\User', 5, 'MyApp', '066360ce268e8fb301f5786b515442e12d6f754b0318236e5bd748d45380cfe0', '[\"*\"]', '2023-11-17 17:20:01', NULL, '2023-11-17 17:16:08', '2023-11-17 17:20:01'),
(35, 'App\\Models\\User', 5, 'MyApp', '9ca4a150ced160fe0d05130b26370354a91ba82d4ec05de1a4e3488591a9e9b4', '[\"*\"]', '2023-11-17 21:00:38', NULL, '2023-11-17 20:23:10', '2023-11-17 21:00:38'),
(36, 'App\\Models\\User', 5, 'MyApp', 'bce33ceb83ca3b48b0bc29fab808cd71fd3ce03908b170e33b65a4b37e83fbb8', '[\"*\"]', '2023-11-17 20:57:41', NULL, '2023-11-17 20:45:13', '2023-11-17 20:57:41'),
(37, 'App\\Models\\User', 5, 'MyApp', 'c644b850a1d8d1529ab780204def84c0ae60e1d501bdf41754946d86e92d18a9', '[\"*\"]', '2023-11-18 01:52:49', NULL, '2023-11-18 01:31:24', '2023-11-18 01:52:49'),
(38, 'App\\Models\\User', 5, 'MyApp', 'd6166913ac40bebfeb41fda6f0e9669ccc920e8e03619fddb2c81dacf6b8d297', '[\"*\"]', '2023-11-18 02:50:54', NULL, '2023-11-18 02:50:35', '2023-11-18 02:50:54'),
(39, 'App\\Models\\User', 5, 'MyApp', 'fd8cdaf7d515841cf4ec0d1e31fc62d1e60ecb71bc7c2af61f028ded1ba6fc9f', '[\"*\"]', '2023-11-20 17:12:51', NULL, '2023-11-20 14:42:43', '2023-11-20 17:12:51'),
(40, 'App\\Models\\User', 5, 'MyApp', 'd88282fc8a1867734e61c70aa43be6aace6154eae0b36ccbab1e3be01f6f02b1', '[\"*\"]', '2023-11-20 19:34:18', NULL, '2023-11-20 14:52:13', '2023-11-20 19:34:18'),
(41, 'App\\Models\\User', 5, 'MyApp', 'd24caa629ac7b6647edd0d4e55339b062ec6a9d6daca7b564f01d0b75cd14d1e', '[\"*\"]', '2023-11-21 17:21:06', NULL, '2023-11-21 17:01:55', '2023-11-21 17:21:06'),
(42, 'App\\Models\\User', 5, 'MyApp', '26c3b70b62f5bd57c77742dcc1f9ca993cefc1aabbb80af33d47443c9389be13', '[\"*\"]', '2023-11-23 04:10:24', NULL, '2023-11-23 03:47:17', '2023-11-23 04:10:24'),
(43, 'App\\Models\\User', 2, 'MyApp', '36635ec205bb061f12d35054dbe3307afba37e543e6b07253f302e873f39e18b', '[\"*\"]', '2023-11-23 04:19:08', NULL, '2023-11-23 04:11:14', '2023-11-23 04:19:08'),
(44, 'App\\Models\\User', 5, 'MyApp', '50f4e5d6640b315b38f36840eb61a539504ee109510490be9da614fc538924f5', '[\"*\"]', '2023-11-23 21:19:22', NULL, '2023-11-23 19:03:15', '2023-11-23 21:19:22'),
(45, 'App\\Models\\User', 5, 'MyApp', '1be0f45425dc77722ba40b36620e5b27945b88a633daf6aaeac36730d41f0b78', '[\"*\"]', '2023-11-23 20:41:45', NULL, '2023-11-23 20:05:22', '2023-11-23 20:41:45'),
(46, 'App\\Models\\User', 5, 'MyApp', 'e907ab9a1f65424f875fd1482bac3e35bf2f6bbad3bbadaf08b8c3ee2b085996', '[\"*\"]', '2023-11-23 21:26:55', NULL, '2023-11-23 21:26:46', '2023-11-23 21:26:55'),
(47, 'App\\Models\\User', 5, 'MyApp', '28254ccac75b94b44a4e40c0565850dc16ce854432a7a654a95e5e4fc74b6d28', '[\"*\"]', '2023-11-24 17:21:06', NULL, '2023-11-24 15:55:21', '2023-11-24 17:21:06'),
(48, 'App\\Models\\User', 5, 'MyApp', '17804bc3b93753894e188d4595fe3d9c9dace3c246e6f4eaa5a90bf255d2ab74', '[\"*\"]', '2023-11-24 17:23:51', NULL, '2023-11-24 17:23:17', '2023-11-24 17:23:51'),
(49, 'App\\Models\\User', 5, 'MyApp', '83415fe5ce5d5d913d09427d616fc5447be04bb390a1b0a5fab559a6bc5edb48', '[\"*\"]', '2023-11-24 17:29:05', NULL, '2023-11-24 17:25:57', '2023-11-24 17:29:05'),
(50, 'App\\Models\\User', 5, 'MyApp', '3765cbfb5acfd82bcb09148a0a61337849a98838aab270b6c64df40470a35e49', '[\"*\"]', '2023-11-30 03:07:26', NULL, '2023-11-24 21:03:34', '2023-11-30 03:07:26'),
(51, 'App\\Models\\User', 5, 'MyApp', 'a11878d6a9501d39f0c0b3495d493f3f43bce22c8a869f1db67c5db28a7f3183', '[\"*\"]', '2023-11-27 15:08:05', NULL, '2023-11-27 14:05:13', '2023-11-27 15:08:05'),
(52, 'App\\Models\\User', 3, 'MyApp', '3684c9359eb2e05b862738170e6e64c53be5a1526a5b4b480d98ab99af8303fd', '[\"*\"]', '2023-12-29 08:15:37', NULL, '2023-11-27 14:13:47', '2023-12-29 08:15:37'),
(53, 'App\\Models\\User', 5, 'MyApp', '11132c1074b8a4635985a9c7fc892df87737cf8ee36a55d0f75d0107d8877031', '[\"*\"]', '2023-11-27 15:20:20', NULL, '2023-11-27 15:14:34', '2023-11-27 15:20:20'),
(55, 'App\\Models\\User', 5, 'MyApp', '72f59d1d3b6f02393c066feb8ff563097a261b4127c1940d34b878391905b504', '[\"*\"]', '2023-11-28 12:07:10', NULL, '2023-11-27 19:58:25', '2023-11-28 12:07:10'),
(56, 'App\\Models\\User', 5, 'MyApp', 'b0a610f411a9b523c9ff31d32868362f7d29f0d0e5c26db91f11a1f4213f9e8e', '[\"*\"]', '2023-11-28 16:39:09', NULL, '2023-11-28 16:29:18', '2023-11-28 16:39:09'),
(58, 'App\\Models\\User', 5, 'MyApp', '2bf0fcca7129e31ad046b1714114e1e311eb9aeeee3235309095e9e33c5b0ecb', '[\"*\"]', '2023-11-28 20:54:33', NULL, '2023-11-28 20:20:06', '2023-11-28 20:54:33'),
(59, 'App\\Models\\User', 5, 'MyApp', '260411b604ff4c1288dd51fbf59c06f798a9cb62eb69b85a90eca6ff5864d930', '[\"*\"]', '2023-11-30 00:57:45', NULL, '2023-11-30 00:57:39', '2023-11-30 00:57:45'),
(60, 'App\\Models\\User', 5, 'MyApp', '15353be4af74c89ac248165e95a462db2dfb3412f4e2517ae72a6348aafd6262', '[\"*\"]', '2023-11-30 03:34:48', NULL, '2023-11-30 03:08:27', '2023-11-30 03:34:48'),
(61, 'App\\Models\\User', 5, 'MyApp', '9883cad2e5db0c6f52da10b7ca749661fff1276590a5605be2bd8315ec5e316f', '[\"*\"]', '2023-12-01 18:41:35', NULL, '2023-11-30 12:13:52', '2023-12-01 18:41:35'),
(62, 'App\\Models\\User', 5, 'MyApp', '59b98dcd9e41e996dddcc0a76ad0cc69a4b578f34baac4bd5fb0525d93d08d62', '[\"*\"]', '2023-11-30 14:17:04', NULL, '2023-11-30 14:15:09', '2023-11-30 14:17:04'),
(63, 'App\\Models\\User', 5, 'MyApp', '8bff656fbcdfd79649d0ac03b5cfbce37ce04d2e08e84ff784aecc69b990807b', '[\"*\"]', '2023-11-30 20:23:58', NULL, '2023-11-30 14:19:55', '2023-11-30 20:23:58'),
(64, 'App\\Models\\User', 5, 'MyApp', '8df4d3d8e5ed2c68a4a0f3e4003d35fcc4c93d2d651d03ec71ae1ffe07487e40', '[\"*\"]', '2023-12-01 16:54:12', NULL, '2023-12-01 16:36:12', '2023-12-01 16:54:12'),
(65, 'App\\Models\\User', 5, 'MyApp', '50bc4ef809d0104733e99e43331b972db39810d704398cd5d1d1187b5bdd5807', '[\"*\"]', '2023-12-01 17:24:31', NULL, '2023-12-01 16:55:36', '2023-12-01 17:24:31'),
(66, 'App\\Models\\User', 5, 'MyApp', '9386f023f7297b170ee69675c67091dfc284b5347b84008ce69bd561a3f86c22', '[\"*\"]', '2023-12-01 19:17:13', NULL, '2023-12-01 19:16:52', '2023-12-01 19:17:13'),
(67, 'App\\Models\\User', 5, 'MyApp', 'cc233e4107d9de2bcd9e540c303296425c51acaed9614b723e99bc44a74c8cc7', '[\"*\"]', '2023-12-06 15:42:08', NULL, '2023-12-01 20:14:14', '2023-12-06 15:42:08'),
(68, 'App\\Models\\User', 3, 'MyApp', '596684857ae400d27ef1cdec412e1c017cab4f573482365b2b520bab08d76dea', '[\"*\"]', NULL, NULL, '2023-12-05 13:16:28', '2023-12-05 13:16:28'),
(69, 'App\\Models\\User', 5, 'MyApp', '63d66bef924a1b099c8fa37c0ff08c21c052fde3bdf62bfab20d8dcda6c8968e', '[\"*\"]', '2023-12-05 21:14:53', NULL, '2023-12-05 16:05:50', '2023-12-05 21:14:53'),
(70, 'App\\Models\\User', 5, 'MyApp', '9cae39151cc61f0a06275a231d614718cfbd7ccab9640aa63fc6b901b3860cae', '[\"*\"]', '2023-12-06 18:36:19', NULL, '2023-12-06 14:16:09', '2023-12-06 18:36:19'),
(71, 'App\\Models\\User', 5, 'MyApp', '7a831fe82e9314a5525ede54f33515555335844546fb3b19b794da1d50bf785c', '[\"*\"]', '2023-12-28 07:33:47', NULL, '2023-12-28 07:27:52', '2023-12-28 07:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `feature_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `stock` int(20) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `dietary_id` int(11) DEFAULT NULL,
  `store_id` int(11) NOT NULL COMMENT 'vendor id',
  `is_trending` tinyint(4) NOT NULL DEFAULT 0,
  `is_popular` tinyint(4) NOT NULL DEFAULT 0,
  `customize_item_id` longtext DEFAULT NULL,
  `variation_id` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `feature_image`, `description`, `product_price`, `stock`, `category_id`, `menu_id`, `dietary_id`, `store_id`, `is_trending`, `is_popular`, `customize_item_id`, `variation_id`, `created_at`, `updated_at`) VALUES
(1, 'Update Food New', 'images/productimages/1699356226-logo2.png', 'testaaaa', 100.00, 50, 2, 5, 2, 6, 1, 0, '[3,7]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-07 06:23:46', '2023-12-01 16:26:19'),
(2, 'Fires Pro', 'images/productimages/1701185206-c1.png', 'testsdsdd', 40.00, 50, 4, 2, 2, 5, 1, 0, '[2]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-07 06:31:26', '2023-11-28 20:26:46'),
(63, 'test', 'images/productimages/1700828257-b3.png', 'test', 40.00, 50, 2, 2, 3, 5, 1, 0, '[4,5,9]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-17 15:11:55', '2023-12-06 17:46:37'),
(64, 'small pizza', 'images/productimages/1699356226-logo2.png', 'test', 40.00, 50, 2, 2, 2, 5, 1, 1, '[3,8]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-17 15:30:50', '2023-11-30 15:37:09'),
(65, 'Potato New Custom', 'images/productimages/1699356226-logo2.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...eaeeeeea', 7000.00, 50, 1, 3, 6, 5, 0, 0, '[2,11]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-17 15:37:42', '2023-11-20 19:33:07'),
(66, 'small pizza', 'images/productimages/1699356226-logo2.png', 'test', 40.00, 50, 5, 2, NULL, 5, 1, 1, NULL, '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-17 15:57:41', '2023-11-30 16:06:30'),
(67, 'Maxine Glenn', 'images/productimages/1699356226-logo2.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 814.00, 50, 2, 5, 4, 5, 0, 0, '[9,7,5,10]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-17 16:04:45', '2023-11-17 16:04:45'),
(68, 'small pizza', 'images/productimages/1699356226-logo2.png', 'test', 40.00, 50, 5, 2, 2, 5, 1, 1, NULL, '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-17 16:06:35', '2023-11-30 15:59:05'),
(69, 'Papuri', 'images/productimages/1699356226-logo2.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 300.00, 50, 2, 3, 1, 5, 0, 0, '[3,4,7,8,5]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-18 01:34:26', '2023-11-18 01:34:26'),
(70, 'Potato New', 'images/productimages/1699356226-logo2.png', 'test', 50.00, 50, 2, 3, 2, 5, 0, 0, '[3,7]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-20 16:15:35', '2023-11-20 16:15:35'),
(71, 'Rylee Stone', 'images/productimages/1700748784-choose.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum..', 892.00, 50, 2, 1, 3, 5, 0, 0, '[3,4,5]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-23 19:13:04', '2023-11-23 19:13:04'),
(72, 'Kendall Todd', 'images/productimages/1700748931-b1.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum..', 46.00, 50, 4, 4, 6, 5, 0, 0, '[2,12,13]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-23 19:15:31', '2023-11-23 19:15:31'),
(73, 'McKenzie Graves', 'images/productimages/1700827941-male4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions ofsds Lorem Ipsum.dddsdgggdd', 133.00, 50, 2, 3, 2, 5, 0, 0, '[3,4,6,7,9]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-23 19:30:49', '2023-11-24 17:12:21'),
(74, 'small pizza', 'images/productimages/1700749984-download (1).jfif', 'test', 40.00, 50, 4, 2, NULL, 5, 1, 1, '[2]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-23 19:33:04', '2023-11-30 16:13:18'),
(75, 'small pizza', 'images/productimages/1700750230-download (1).jfif', 'test', 40.00, 50, 5, 2, NULL, 5, 1, 1, '[2,8,2]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-23 19:37:10', '2023-11-23 19:37:10'),
(76, 'small pizza', 'images/productimages/1700750365-download (1).jfif', 'test', 40.00, 50, 5, 2, NULL, 5, 1, 1, '[2,8,2]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-23 19:39:25', '2023-11-23 19:39:25'),
(77, 'Test Food', 'images/productimages/1700828440-b1.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum..', 300.00, 50, 4, 2, 3, 5, 0, 0, '[2,12]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-24 17:20:40', '2023-11-24 17:20:40'),
(78, 'Fries', 'images/productimages/1700841938-IMG_0605.jpg', 'sdfd', 10.00, 50, 4, 2, 2, 5, 0, 0, '[12,13]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-11-24 21:05:38', '2023-11-24 21:05:38'),
(79, 'Burger Zipato', 'images/productimages/1701430666-choose.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 479.00, 50, 2, 4, 1, 5, 0, 0, '[3,6,9,10,7]', '{\"1\":[1,2],\"2\":[5,6],\"4\":[3,4]}', '2023-12-01 16:37:46', '2023-12-01 16:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(4, 2, 'images/productimages/1699356686-logo2.png', '2023-11-07 06:31:26', '2023-11-07 06:31:26'),
(16, 62, 'images/productimages/1700215869-download - Copy.jfif', '2023-11-17 15:11:09', '2023-11-17 15:11:09'),
(17, 62, 'images/productimages/1700215869-download.jfif', '2023-11-17 15:11:09', '2023-11-17 15:11:09'),
(35, 64, 'images/productimages/1700217050-download - Copy.jfif', '2023-11-17 15:30:50', '2023-11-17 15:30:50'),
(36, 64, 'images/productimages/1700217050-download.jfif', '2023-11-17 15:30:50', '2023-11-17 15:30:50'),
(37, 65, 'images/productimages/1700217462-b1.png', '2023-11-17 15:37:42', '2023-11-17 15:37:42'),
(38, 65, 'images/productimages/1700217462-b2.png', '2023-11-17 15:37:42', '2023-11-17 15:37:42'),
(39, 65, 'images/productimages/1700217462-b3.png', '2023-11-17 15:37:42', '2023-11-17 15:37:42'),
(40, 65, 'images/productimages/1700217462-c1.png', '2023-11-17 15:37:42', '2023-11-17 15:37:42'),
(41, 66, 'images/productimages/1700218661-download - Copy.jfif', '2023-11-17 15:57:41', '2023-11-17 15:57:41'),
(42, 66, 'images/productimages/1700218661-download.jfif', '2023-11-17 15:57:41', '2023-11-17 15:57:41'),
(49, 67, 'images/productimages/1700219085-b1.png', '2023-11-17 16:04:45', '2023-11-17 16:04:45'),
(50, 67, 'images/productimages/1700219085-b2.png', '2023-11-17 16:04:45', '2023-11-17 16:04:45'),
(51, 67, 'images/productimages/1700219085-b3.png', '2023-11-17 16:04:45', '2023-11-17 16:04:45'),
(52, 67, 'images/productimages/1700219085-c1.png', '2023-11-17 16:04:45', '2023-11-17 16:04:45'),
(53, 68, 'images/productimages/1700219195-download - Copy.jfif', '2023-11-17 16:06:35', '2023-11-17 16:06:35'),
(54, 68, 'images/productimages/1700219195-download.jfif', '2023-11-17 16:06:35', '2023-11-17 16:06:35'),
(55, 2, 'images/productimages/1700222961-b2.png', '2023-11-17 17:09:21', '2023-11-17 17:09:21'),
(56, 2, 'images/productimages/1700222961-b3.png', '2023-11-17 17:09:21', '2023-11-17 17:09:21'),
(57, 2, 'images/productimages/1700222961-banner.png', '2023-11-17 17:09:21', '2023-11-17 17:09:21'),
(63, 69, 'images/productimages/1700253266-i1.jpg', '2023-11-18 01:34:26', '2023-11-18 01:34:26'),
(64, 69, 'images/productimages/1700253266-i2.jpg', '2023-11-18 01:34:26', '2023-11-18 01:34:26'),
(65, 69, 'images/productimages/1700253266-i3.jpg', '2023-11-18 01:34:26', '2023-11-18 01:34:26'),
(66, 65, 'images/productimages/1700474448-authImage.jpg', '2023-11-20 15:00:48', '2023-11-20 15:00:48'),
(67, 65, 'images/productimages/1700474448-authImage.png', '2023-11-20 15:00:48', '2023-11-20 15:00:48'),
(69, 70, 'images/productimages/1700478935-download (1).jfif', '2023-11-20 16:15:35', '2023-11-20 16:15:35'),
(70, 70, 'images/productimages/1700478935-images (1).jfif', '2023-11-20 16:15:35', '2023-11-20 16:15:35'),
(71, 70, 'images/productimages/1700478935-images.jfif', '2023-11-20 16:15:35', '2023-11-20 16:15:35'),
(72, 64, 'images/productimages/1700479444-download (2).jfif', '2023-11-20 16:24:04', '2023-11-20 16:24:04'),
(73, 64, 'images/productimages/1700479444-download (3).jfif', '2023-11-20 16:24:04', '2023-11-20 16:24:04'),
(74, 73, 'images/productimages/1700749849-b2.png', '2023-11-23 19:30:49', '2023-11-23 19:30:49'),
(75, 73, 'images/productimages/1700749849-b3.png', '2023-11-23 19:30:49', '2023-11-23 19:30:49'),
(76, 73, 'images/productimages/1700749849-banner.png', '2023-11-23 19:30:49', '2023-11-23 19:30:49'),
(77, 73, 'images/productimages/1700749849-c1.png', '2023-11-23 19:30:49', '2023-11-23 19:30:49'),
(78, 74, 'images/productimages/1700749984-download (3).jfif', '2023-11-23 19:33:04', '2023-11-23 19:33:04'),
(79, 74, 'images/productimages/1700749984-download (4).jfif', '2023-11-23 19:33:04', '2023-11-23 19:33:04'),
(80, 76, 'images/productimages/1700750365-download (3).jfif', '2023-11-23 19:39:25', '2023-11-23 19:39:25'),
(81, 76, 'images/productimages/1700750365-download (4).jfif', '2023-11-23 19:39:25', '2023-11-23 19:39:25'),
(82, 73, 'images/productimages/1700827941-authImage.jpg', '2023-11-24 17:12:21', '2023-11-24 17:12:21'),
(83, 73, 'images/productimages/1700827941-authImage.png', '2023-11-24 17:12:21', '2023-11-24 17:12:21'),
(88, 77, 'images/productimages/1700828440-footerBanner.png', '2023-11-24 17:20:40', '2023-11-24 17:20:40'),
(89, 77, 'images/productimages/1700828440-menuOrder.png', '2023-11-24 17:20:40', '2023-11-24 17:20:40'),
(90, 77, 'images/productimages/1700828440-pp.png', '2023-11-24 17:20:40', '2023-11-24 17:20:40'),
(91, 1, 'images/productimages/1700828680-download (1).jfif', '2023-11-24 17:24:40', '2023-11-24 17:24:40'),
(93, 78, 'images/productimages/1700841938-IMG_0605.jpg', '2023-11-24 21:05:38', '2023-11-24 21:05:38'),
(94, 1, 'images/productimages/1701338283-download (4).jfif', '2023-11-30 14:58:03', '2023-11-30 14:58:03'),
(98, 79, 'images/productimages/1701430666-b1.png', '2023-12-01 16:37:46', '2023-12-01 16:37:46'),
(99, 79, 'images/productimages/1701430666-b2.png', '2023-12-01 16:37:46', '2023-12-01 16:37:46'),
(100, 79, 'images/productimages/1701430666-b3.png', '2023-12-01 16:37:46', '2023-12-01 16:37:46'),
(101, 79, 'images/productimages/1701430666-c1.png', '2023-12-01 16:37:46', '2023-12-01 16:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_remarks`
--

CREATE TABLE `product_remarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `user_role` int(11) NOT NULL COMMENT '1: Admin, 2: User, 3: Vendor',
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `store_name` varchar(100) DEFAULT NULL,
  `store_description` text DEFAULT NULL,
  `store_timing` text DEFAULT NULL,
  `vendor_zipcodes` text DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_role`, `address`, `city`, `state`, `country`, `zipcode`, `logo`, `store_name`, `store_description`, `store_timing`, `vendor_zipcodes`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@gmail.com', NULL, '$2y$10$/xCZ0kNGAeAXgNCXNcFpzOHkMIGiZ78C5RrHef30705t8ZkDjAtfe', 2, NULL, 'Auburn', 'Alabama', 'USA', '89545', 'images/userlogo/logo1.png', NULL, NULL, NULL, NULL, 1, NULL, '2023-10-30 09:12:14', '2023-10-30 09:12:14'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$/xCZ0kNGAeAXgNCXNcFpzOHkMIGiZ78C5RrHef30705t8ZkDjAtfe', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(3, 'rafay', 'user1@gmail.com', NULL, '$2y$10$phdcFd.u9/Uoly2I81GtgOtqi/0V7SOfROl6KKl8Q80hYwhNiDt76', 2, '9740 Kathleen Trail', 'Towneview', '040 Terence Row', 'USA', '89545', 'images/userlogo/1703776324.jfif', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-12-28 10:27:19'),
(4, 'user2', 'user2@gmail.com', NULL, '$2y$10$/xCZ0kNGAeAXgNCXNcFpzOHkMIGiZ78C5RrHef30705t8ZkDjAtfe', 2, NULL, 'Auburn', 'New York', 'USA', '546131', 'images/userlogo/logo3.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(5, 'vendor1', 'vendor1@gmail.com', NULL, '$2y$10$/xCZ0kNGAeAXgNCXNcFpzOHkMIGiZ78C5RrHef30705t8ZkDjAtfe', 3, NULL, 'Auburn', 'New York', 'USA', '567', 'images/userlogo/logo4.png', 'mcdonald', 'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"4563\",\"4567\",\"45615\",\"89545\",\"88745\",\"558459\",\"789545\",\"55642145\",\"546131\",\"43234\"]', 1, NULL, NULL, '2023-12-01 20:15:24'),
(6, 'vendor2', 'vendor2@gmail.com', NULL, '$2y$10$/xCZ0kNGAeAXgNCXNcFpzOHkMIGiZ78C5RrHef30705t8ZkDjAtfe', 3, NULL, 'Auburn', 'Alabama', 'USA', '838', 'images/userlogo/logo5.png', 'mcdonald', 'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"4563\",\"4567\",\"45615\",\"89545\",\"88745\",\"558459\",\"789545\",\"55642145\",\"546131\",\"43234\"]', 1, NULL, NULL, NULL),
(7, 'vendor3', 'vendor3@gmail.com', NULL, '$2y$10$/xCZ0kNGAeAXgNCXNcFpzOHkMIGiZ78C5RrHef30705t8ZkDjAtfe', 3, NULL, 'Auburn', 'New York', 'USA', '567', 'images/userlogo/logo6.png', 'mcdonald', 'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"4563\",\"4567\",\"45615\",\"89545\",\"88745\",\"558459\",\"789545\",\"55642145\",\"546131\",\"43234\"]', 1, NULL, NULL, NULL),
(9, 'vendor4', 'vendor4@gmail.com', NULL, '$2y$10$/xCZ0kNGAeAXgNCXNcFpzOHkMIGiZ78C5RrHef30705t8ZkDjAtfe', 3, NULL, 'Auburn', 'New York', 'USA', '567', 'images/userlogo/logo6.png', 'mcdonald', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"4563\",\"4567\",\"45615\",\"89545\",\"88745\",\"558459\",\"789545\",\"55642145\",\"546131\",\"43234\"]', 1, NULL, NULL, NULL),
(10, 'vendor5', 'vendor5@gmail.com', NULL, '$2y$10$/xCZ0kNGAeAXgNCXNcFpzOHkMIGiZ78C5RrHef30705t8ZkDjAtfe', 3, NULL, 'Auburn', 'New York', 'USA', '567', 'images/userlogo/logo6.png', 'mcdonald', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"4563\",\"4567\",\"45615\",\"89545\",\"88745\",\"558459\",\"789545\",\"55642145\",\"546131\",\"43234\"]', 1, NULL, NULL, NULL),
(11, 'vendor6', 'vendor6@gmail.com', NULL, '$2y$10$/xCZ0kNGAeAXgNCXNcFpzOHkMIGiZ78C5RrHef30705t8ZkDjAtfe', 3, NULL, 'Auburn', 'New York', 'USA', '567', 'images/userlogo/logo6.png', 'mcdonald', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"4563\",\"4567\",\"45615\",\"89545\",\"88745\",\"558459\",\"789545\",\"55642145\",\"546131\",\"43234\"]', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 5, 'pizzaaa', '2023-11-28 14:30:07', '2023-11-28 14:30:44'),
(2, 5, 'burger', '2023-11-28 14:30:25', '2023-11-28 14:30:25'),
(3, 5, 'Cheese', '2023-11-28 20:52:24', '2023-11-28 20:52:24'),
(4, 5, 'Burger Bun', '2023-11-28 20:53:52', '2023-11-28 20:53:52'),
(5, 5, 'Burger Cheese', '2023-11-28 20:54:32', '2023-11-28 20:54:32'),
(6, 5, 'Pizza Dow', '2023-11-30 14:15:23', '2023-11-30 14:15:23'),
(7, 5, 'Test Variation', '2023-12-05 18:48:31', '2023-12-05 18:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `variation_items`
--

CREATE TABLE `variation_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variation_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variation_items`
--

INSERT INTO `variation_items` (`id`, `variation_id`, `title`, `image`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'small', 'images/variationitemimages/1701163906.jfif', 50.00, 30, '2023-11-28 14:31:46', '2023-11-28 14:32:56'),
(2, 1, 'Pizza Cheese', 'images/variationitemimages/1701775043.png', 30.00, 30, '2023-12-05 16:17:23', '2023-12-05 16:17:23'),
(3, 4, 'Jana Camacho', 'images/variationitemimages/1701778969.png', 211.00, 30, '2023-12-05 17:22:49', '2023-12-05 17:22:49'),
(4, 4, 'Griffith Tanner', 'images/variationitemimages/1701779016.png', 563.00, 30, '2023-12-05 17:23:36', '2023-12-05 17:23:36'),
(5, 2, 'Ginger Welch', 'images/variationitemimages/1701779104.png', 846.00, 30, '2023-12-05 17:25:04', '2023-12-05 17:25:04'),
(6, 2, 'Lunea Beck', 'images/variationitemimages/1701779140.png', 953.00, 30, '2023-12-05 17:25:40', '2023-12-05 17:25:40'),
(7, 7, 'Item 1', 'images/variationitemimages/1701784154.png', 10.00, 30, '2023-12-05 18:49:14', '2023-12-05 18:49:14'),
(8, 7, 'Item 2', 'images/variationitemimages/1701784165.png', 10.00, 30, '2023-12-05 18:49:25', '2023-12-05 18:49:25'),
(9, 7, 'Item 3', 'images/variationitemimages/1701784174.png', 10.00, 30, '2023-12-05 18:49:34', '2023-12-05 18:49:34'),
(10, 4, 'Soft Bun', 'images/variationitemimages/1701791549.png', 456.00, 30, '2023-12-05 20:52:29', '2023-12-05 20:52:29'),
(11, 4, 'Thin Bun', 'images/variationitemimages/1701791561.png', 456.00, 30, '2023-12-05 20:52:41', '2023-12-05 20:52:41'),
(12, 4, 'Thik Bun', 'images/variationitemimages/1701791570.png', 456.00, 30, '2023-12-05 20:52:50', '2023-12-05 20:52:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_queries`
--
ALTER TABLE `contact_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customize_menus`
--
ALTER TABLE `customize_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dietary`
--
ALTER TABLE `dietary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
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
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_remarks`
--
ALTER TABLE `product_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variation_items`
--
ALTER TABLE `variation_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_queries`
--
ALTER TABLE `contact_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customize_menus`
--
ALTER TABLE `customize_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dietary`
--
ALTER TABLE `dietary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `product_remarks`
--
ALTER TABLE `product_remarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `variation_items`
--
ALTER TABLE `variation_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
