-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 04:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shoelala`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `name`, `logo`, `slug`, `deleted_at`) VALUES
(1, 'Nike', '/seeds/brands/NIKE-LOGO.png', 'Nike', NULL),
(2, 'Puma', '/seeds/brands/PUMA-LOGO.png', 'Puma', NULL),
(3, 'Vans', '/seeds/brands/VANS-LOGO.png', 'Vans', NULL),
(4, 'Jordan', '/seeds/brands/JORDAN-LOGO.png', 'Jordan', NULL),
(5, 'Adidas', '/seeds/brands/ADIDAS-LOGO.png', 'Adidas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Running'),
(2, 'Basketball'),
(3, 'Sneakers'),
(4, 'Chuck Taylor'),
(5, 'Lifestyle'),
(6, 'Casual'),
(7, 'Sportswear');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_angles`
--

CREATE TABLE `image_angles` (
  `image_angle_id` bigint(20) UNSIGNED NOT NULL,
  `angle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_angles`
--

INSERT INTO `image_angles` (`image_angle_id`, `angle`) VALUES
(1, 'Front'),
(2, 'Back'),
(3, 'Right'),
(4, 'Left'),
(5, 'Insole'),
(6, 'Outsole');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_06_01_133821_create_brands_table', 1),
(4, '2021_06_01_134038_create_transactions_table', 1),
(5, '2021_06_18_092840_create_types_table', 1),
(6, '2021_06_18_093046_create_image_angles_table', 1),
(7, '2021_06_18_093116_create_sizes_table', 1),
(8, '2021_06_19_054715_create_categories_table', 1),
(9, '2021_06_19_132858_create_shoes_table', 1),
(10, '2021_06_19_133904_create_shoe_images_table', 1),
(11, '2021_06_27_074239_create_roles_table', 1),
(12, '2021_06_27_074902_create_permissions_table', 1),
(13, '2021_06_27_083444_create_permission_role_table', 1),
(14, '2021_06_27_999999_create_users_table', 1),
(15, '2021_06_30_134021_create_orders_table', 1),
(16, '2021_07_11_134153_create_stocks_table', 1),
(17, '2021_07_11_161234_create_order_items_table', 1),
(18, '2021_07_11_171548_create_cart_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pickup_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(3) UNSIGNED NOT NULL,
  `completed_date` date DEFAULT NULL,
  `completed_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_uuid`, `user_id`, `order_date`, `pickup_date`, `status`, `completed_date`, `completed_by`) VALUES
(1, '07ed3936-b774-46f2-a268-212c50f7baa6', 4, '2021-07-19 09:34:36', '2021-07-26 01:26:01', 2, '2021-07-19', 2),
(2, '533c0d28-64d3-43b6-addf-693630424f01', 4, '2021-07-19 01:26:42', '2021-07-26 01:26:42', 1, NULL, NULL),
(3, '20eab071-7b08-4c0e-bc79-5379120e4c5f', 4, '2021-07-19 09:27:54', '2021-07-26 01:27:17', 3, '2021-07-19', 4),
(4, 'f78e9afb-9c0f-482a-86ab-d127ebb2762d', 4, '2021-07-19 09:35:02', '2021-07-17 01:28:57', 4, '2021-07-19', 2),
(5, '2a2226b4-5377-457e-a3c5-e86a1c495da5', 5, '2021-07-19 09:41:21', '2021-07-26 01:38:10', 2, '2021-07-19', 2),
(6, 'cb9cf06e-e7eb-4fe9-a955-d1cc4f97de7f', 5, '2021-07-19 01:38:26', '2021-07-26 01:38:26', 1, NULL, NULL),
(7, '20f72362-f7cb-4646-bb19-f330495ec9de', 5, '2021-07-19 09:39:21', '2021-07-26 01:38:44', 3, '2021-07-19', 5),
(8, 'd7489efe-3dd3-4c60-adba-039e59c86539', 5, '2021-07-19 09:42:11', '2021-07-08 01:39:44', 4, '2021-07-19', 2),
(9, '80de6c9b-8129-41c2-807c-401ca91b389c', 7, '2021-07-19 09:54:44', '2021-07-26 01:52:23', 2, '2021-07-19', 2),
(10, '69a23e2a-51ee-4867-9509-aaa02389f7d0', 7, '2021-07-19 09:55:09', '2021-07-26 01:52:42', 2, '2021-07-19', 2),
(11, '4a27e87d-5283-4a32-ae9a-a2cdeb0a1877', 7, '2021-07-19 09:55:35', '2021-07-26 01:53:06', 2, '2021-07-19', 2),
(12, '83f42efa-b2fe-4cc5-bceb-5da33e93c8fc', 7, '2021-07-19 09:57:37', '2021-07-26 01:56:44', 3, '2021-07-19', 7),
(13, '3971d201-9ca5-4e90-86e2-3d7f671b9adc', 7, '2021-07-19 09:57:40', '2021-07-26 01:57:11', 3, '2021-07-19', 7),
(14, '1cd2d8c9-c621-4f3b-a3ef-e81dee946bac', 7, '2021-07-19 09:57:43', '2021-07-26 01:57:29', 3, '2021-07-19', 7),
(15, '8f7c5a47-f1c3-4809-a3f9-01c278666468', 7, '2021-07-19 09:59:13', '2021-06-26 01:58:06', 1, NULL, NULL),
(16, 'b294c15f-c477-4b63-88fb-ee1816753ffc', 7, '2021-07-19 10:01:37', '2021-06-26 01:58:06', 4, '2021-07-19', 1),
(17, '0812c135-dfd6-4a38-9092-ad21bc3ee688', 7, '2021-07-19 10:01:38', '2021-06-26 01:58:06', 4, '2021-07-19', 1),
(18, '4068b0c7-859d-4304-99a4-cb230e76037f', 7, '2021-07-19 01:59:54', '2021-07-26 01:59:54', 1, NULL, NULL),
(19, '513445af-3dc5-4699-ae41-5466cfbe899b', 7, '2021-07-19 02:00:13', '2021-07-26 02:00:13', 1, NULL, NULL),
(20, '5c3aa4ed-a32a-44f5-8805-2a98a27a9096', 7, '2021-07-19 02:00:29', '2021-07-26 02:00:29', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `stock_id`, `quantity`) VALUES
(1, 1, 20, 5),
(2, 2, 22, 1),
(3, 3, 18, 3),
(4, 4, 1, 1),
(5, 5, 12, 2),
(6, 5, 13, 2),
(7, 6, 5, 1),
(8, 7, 2, 1),
(9, 8, 1, 2),
(10, 8, 7, 1),
(11, 9, 20, 5),
(12, 10, 4, 5),
(13, 11, 6, 3),
(14, 11, 9, 2),
(15, 12, 17, 2),
(16, 13, 7, 2),
(17, 14, 11, 1),
(18, 15, 22, 3),
(19, 16, 1, 1),
(20, 17, 3, 1),
(21, 18, 19, 3),
(22, 19, 18, 1),
(23, 20, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `description`) VALUES
(1, 'User', 'Shoe Buyer'),
(2, 'Admin', 'Cashier'),
(3, 'Super Admin', 'Main Admin');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `shoe_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoe_id`, `name`, `category_id`, `brand_id`, `type_id`, `sku`, `price`, `description`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CORTEZ BASIC PRM', 5, 1, 1, 'CQ6663-001', 4150, 'Inspired by Bill Bowerman\'s first masterpiece, the Nike Cortez Basic Premium pays homage to the iconic running shoe as it celebrates the Earth with a medley of recycled materials. The reclaimed canvas upper has a richly textured appearance while the classic foam midsole keeps the iconic look you love with its wedge of super-soft Crater foam. This product is made from at least 20% recycled materials by weight.', 'CORTEZ-BASIC-PRM-CQ6663-001', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(2, 'Kd Trey 5 Vii Ep', 2, 1, 1, 'AT1198-004', 3400, 'Kevin Durant likes a shoe that feels broken-in straight away but still provides containment and support. The KD Trey 5 VII EP hits the ground running with a combination of bouncy cushioning with a precise, supportive fit that\'s ready to go right out of the box.', 'Kd-Trey-5-Vii-Ep-AT1198-004', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(3, 'Lebron Witness Iv Ep', 2, 1, 1, 'CD0188-102', 3800, 'Be a force on the court in the LeBron Witness 4: a great fit for powerful players who want good ankle support from a shoe that still feels light. Durably built for playing on outdoor courts, its sculpted, padded collar and exterior heel counter provide a stable fit, while visible cushioning units under the forefoot return energy with every step.', 'Lebron-Witness-Iv-Ep-CD0188-102', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(4, 'Capri Black', 6, 2, 1, '369246-01', 2400, 'The PUMA Capri \'Black\' sneaker blends 80s tennis-inspired style with modern engineering.', 'Capri-Black-369246-01', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(5, 'Overcast-Heather', 7, 2, 1, '369798-05', 4000, 'The PUMA Storm Street Trainers feature a silhouette and lines that throw back to running styles from at least two decades ago.', 'Overcast-Heather-369798-05', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(6, 'RS-X Tracks', 7, 2, 1, '369332-01', 5100, 'The PUMA RS series is back from the \'80s archives and better than ever.', 'RS-X-Tracks-369332-01', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(7, 'Old Skool Navy', 7, 3, 1, 'VN000D3HNVY', 4000, 'The Vans Old Skool is a classic sneaker with a low-profile silhouette, seen here in a \'Navy\' colorway. A canvas denim upper gets treated with navy suede on the toe cap, heel and eyestays. Custom leather jazz stripes detail the sides, while a lightly padded collar is trimmed with a leather interior. A double stitch technique utilized throughout offers improved durability. Iconic branding is found on the footbed and heel license plate. The signature vulcanized construction and Waffle tread sole round out this iconic skate silhouette.', 'Old-Skool-Navy-VN000D3HNVY', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(8, 'Anaheim Factory Sid DX OG RED', 7, 3, 1, 'VN0A4BTXVTM', 3800, 'New to the Anaheim Factory pack, the SID DX features high-gloss, heritage-inspired color palettes, our iconic flying-V logo, and sturdy suede uppers for a unique look, feel, and construction. Paying tribute to our first Vans factory in Anaheim, California, it also includes throwback details, cotton laces, striped sidewalls, and the modernized comfort of upgraded OrthoLite sockliners.', 'Anaheim-Factory-Sid-DX-OG-RED-VN0A4BTXVTM', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(9, 'Anaheim Factory Sid DX WHITE', 7, 3, 1, 'VN0A4BTXUL4', 3800, 'New to the Anaheim Factory pack, the SID DX features high-gloss, heritage-inspired color palettes, our iconic flying-V logo, and sturdy suede uppers for a unique look, feel, and construction. Paying tribute to our first Vans factory in Anaheim, California, it also includes throwback details, cotton laces, striped sidewalls, and the modernized comfort of upgraded OrthoLite sockliners.', 'Anaheim-Factory-Sid-DX-WHITE-VN0A4BTXUL4', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(10, 'Air Max 90', 1, 1, 1, 'DC9845-100', 6495, 'COMFORT, HERITAGE AND NOTHING BETTER. Nothing as fly, nothing as comfortable, nothing as proven—the Nike Air Max 90 stays true to its roots with the iconic Waffle sole, stitched overlays and classic TPU accents. Fresh colors give a modern look while Max Air cushioning adds comfort to your journey. Originally designed for performance running, the Max Air unit in the heel adds unbelievable cushioning. The low-top design combines with a padded collar for a sleek look that feels soft and comfortable. The rubber Waffle sole adds a heritage look, traction and durability. The stitched overlays and TPU accents add durability, comfort and the iconic \'90s look you love.', 'Air-Max-90-DC9845-100', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(11, 'RYZ 365 2', 1, 1, 2, 'CU4874-100', 4295, 'The Nike RYZ 365 2 brings you a futuristic take to classic \'90s sneakers. The eye-catching midsole with stylized cutouts modernizes the chunky style with an airy aesthetic. A rich mixture of materials on the upper adds texture and style versatility. To top it off, the DIY lacing lets you personalize your style—wrap under the midsole or through webbing on the side and heel for a delicate touch to your bold look.', 'RYZ-365-2-CU4874-100', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(12, 'ZX 2K BOOST', 1, 5, 3, 'GY2689', 4500, 'The adidas ZX 2K Florine Shoes are for the ladies. The progressive, fashion-forward ladies, that is. The tech-savvy and digitally minded. Those who appreciate vintage style, yet are inspired by modern aesthetics.', 'ZX-2K-BOOST-GY2689', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(13, 'Suede Heart Galaxy Black', 5, 2, 2, '369232-03-4', 3450, 'A feminine update to the classic Suede, the Suede Heart features a large satin bow lacing. Inspired by the shimmer of stars in the galaxy, this version features a full suede upper with a shimmer suede accent on the heel cap and satin bow lacing with metallic trim.', 'Suede-Heart-Galaxy-Black-369232-03-4', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(14, 'ULTRABOOST DNA', 1, 5, 3, 'GW4924', 5340, 'Run to move your body. Run to clear your head. The adidas Ultraboost DNA Shoes give you endless energy over the miles. The sleek silhouette makes them a favourite beyond the world of running. An adidas Primeknit upper brings comfort to your everyday wandering too. This product is made with Primeblue, a high-performance recycled material made in part with Parley Ocean Plastic.', 'Ultraboost-DNA-GW4924', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(15, 'Falcon', 7, 5, 2, 'F37016', 7000, 'heritage design and cutting-edge technology. With the latest collection of adidas Falcon shoes, the retro-inspired design is available in more styles than ever before. If you prefer a pared-back and minimalist style, all-white or all-black pairs are perfect additions to your wardrobe.', 'Falcon-F37016', '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoe_images`
--

CREATE TABLE `shoe_images` (
  `shoe_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_angle_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoe_images`
--

INSERT INTO `shoe_images` (`shoe_id`, `image`, `image_angle_id`, `deleted_at`) VALUES
(1, 'seeds/shoeimages/NIKE-CORTEZ BASIC PRM-F.jpg', 1, NULL),
(1, 'seeds/shoeimages/NIKE-CORTEZ BASIC PRM-L.jpg', 4, NULL),
(1, 'seeds/shoeimages/NIKE-CORTEZ BASIC PRM-R.jpg', 3, NULL),
(2, 'seeds/shoeimages/NIKE-Kd Trey 5 Vii Ep-F.jpg', 1, NULL),
(2, 'seeds/shoeimages/NIKE-Kd Trey 5 Vii Ep-L.jpg', 4, NULL),
(2, 'seeds/shoeimages/NIKE-Kd Trey 5 Vii Ep-R.jpg', 3, NULL),
(3, 'seeds/shoeimages/NIKE-Lebron Witness Iv Ep-F.jpg', 1, NULL),
(3, 'seeds/shoeimages/NIKE-Lebron Witness Iv Ep-L.jpg', 4, NULL),
(3, 'seeds/shoeimages/NIKE-Lebron Witness Iv Ep-R.jpg', 3, NULL),
(4, 'seeds/shoeimages/PUMA-Capri Black-F.jpg', 1, NULL),
(4, 'seeds/shoeimages/PUMA-Capri Black-L.jpg', 4, NULL),
(4, 'seeds/shoeimages/PUMA-Capri Black-R.jpg', 3, NULL),
(5, 'seeds/shoeimages/PUMA-Overcast-Heather-F.jpg', 1, NULL),
(5, 'seeds/shoeimages/PUMA-Overcast-Heather-L.jpg', 4, NULL),
(5, 'seeds/shoeimages/PUMA-Overcast-Heather-R.jpg', 3, NULL),
(6, 'seeds/shoeimages/PUMA-RS-X Tracks-F.jpg', 1, NULL),
(6, 'seeds/shoeimages/PUMA-RS-X Tracks-L.jpg', 4, NULL),
(6, 'seeds/shoeimages/PUMA-RS-X Tracks-R.jpg', 3, NULL),
(7, 'seeds/shoeimages/VANS-Old Skool Navy-F.jpg', 1, NULL),
(7, 'seeds/shoeimages/VANS-Old Skool Navy-L.jpg', 4, NULL),
(7, 'seeds/shoeimages/VANS-Old Skool Navy-R.jpg', 3, NULL),
(8, 'seeds/shoeimages/VANS-Anaheim Factory Sid DX OG RED-F.jpg', 1, NULL),
(8, 'seeds/shoeimages/VANS-Anaheim Factory Sid DX OG RED-L.jpg', 4, NULL),
(8, 'seeds/shoeimages/VANS-Anaheim Factory Sid DX OG RED-R.jpg', 3, NULL),
(9, 'seeds/shoeimages/VANS-Anaheim Factory Sid DX WHITE-F.jpg', 1, NULL),
(9, 'seeds/shoeimages/VANS-Anaheim Factory Sid DX WHITE-L.jpg', 4, NULL),
(9, 'seeds/shoeimages/VANS-Anaheim Factory Sid DX WHITE-R.jpg', 3, NULL),
(10, 'seeds/shoeimages/NIKE-Air Max 90-F.jpg', 1, NULL),
(10, 'seeds/shoeimages/NIKE-Air Max 90-L.jpg', 4, NULL),
(10, 'seeds/shoeimages/NIKE-Air Max 90-R.jpg', 3, NULL),
(11, 'seeds/shoeimages/NIKE-Ryz 365 2-F.jpg', 1, NULL),
(11, 'seeds/shoeimages/NIKE-Ryz 365 2-L.jpg', 4, NULL),
(11, 'seeds/shoeimages/NIKE-Ryz 365 2-R.jpg', 3, NULL),
(12, 'seeds/shoeimages/ADIDAS-ZX 2K BOOST-F.jpg', 1, NULL),
(12, 'seeds/shoeimages/ADIDAS-ZX 2K BOOST-L.jpg', 4, NULL),
(12, 'seeds/shoeimages/ADIDAS-ZX 2K BOOST-R.jpg', 3, NULL),
(13, 'seeds/shoeimages/PUMA-Seude Heart Galaxy Black-F.jpg', 1, NULL),
(13, 'seeds/shoeimages/PUMA-Seude Heart Galaxy Black-R.jpg', 3, NULL),
(14, 'seeds/shoeimages/ADIDAS-Ultra Boost Dna-F.jpg', 1, NULL),
(14, 'seeds/shoeimages/ADIDAS-Ultra Boost Dna-R.jpg', 3, NULL),
(15, 'seeds/shoeimages/ADIDAS-Falcon-F.jpg', 1, NULL),
(15, 'seeds/shoeimages/ADIDAS-Falcon-R.jpg', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `us` double(4,1) NOT NULL,
  `eur` double(4,1) NOT NULL,
  `uk` double(4,1) NOT NULL,
  `cm` double(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `type_id`, `us`, `eur`, `uk`, `cm`) VALUES
(1, 1, 6.0, 38.5, 5.5, 24.0),
(2, 1, 6.5, 39.0, 6.0, 24.5),
(3, 1, 7.0, 40.0, 6.5, 25.0),
(4, 1, 7.5, 42.0, 7.0, 25.5),
(5, 1, 8.0, 42.5, 7.5, 26.0),
(6, 1, 8.5, 43.0, 8.0, 26.5),
(7, 1, 9.0, 43.5, 8.5, 27.0),
(8, 1, 9.5, 44.0, 9.0, 27.5),
(9, 1, 10.0, 44.5, 9.5, 28.0),
(10, 1, 10.5, 45.0, 10.0, 28.5),
(11, 1, 11.0, 45.5, 10.5, 29.0),
(12, 1, 11.5, 46.0, 11.0, 29.5),
(13, 1, 12.0, 46.5, 11.5, 30.0),
(14, 1, 12.5, 47.0, 12.0, 30.5),
(15, 1, 13.0, 47.5, 12.5, 31.0),
(16, 2, 4.5, 38.5, 5.5, 24.0),
(17, 2, 5.0, 39.0, 6.0, 24.5),
(18, 2, 5.5, 40.0, 6.5, 25.0),
(19, 2, 6.0, 42.0, 7.0, 25.5),
(20, 2, 6.5, 42.5, 7.5, 26.0),
(21, 2, 7.0, 43.0, 8.0, 26.5),
(22, 2, 7.5, 43.5, 8.5, 27.0),
(23, 2, 8.0, 44.0, 9.0, 27.5),
(24, 2, 8.5, 44.5, 9.5, 28.0),
(25, 2, 9.0, 45.0, 10.0, 28.5),
(26, 2, 9.5, 45.5, 10.5, 29.0),
(27, 2, 10.0, 46.0, 11.0, 29.5),
(28, 2, 10.5, 46.5, 11.5, 30.0),
(29, 2, 11.0, 47.0, 12.0, 30.5),
(30, 2, 11.5, 47.5, 12.5, 31.0),
(31, 3, 3.5, 35.5, 3.0, 22.5),
(32, 3, 4.0, 36.0, 3.5, 23.0),
(33, 3, 4.5, 36.5, 4.0, 23.5),
(34, 3, 5.0, 37.5, 4.5, 23.5),
(35, 3, 5.5, 38.0, 5.0, 24.0),
(36, 3, 6.0, 38.5, 5.5, 24.0),
(37, 3, 6.5, 39.0, 6.0, 24.5),
(38, 3, 7.0, 40.0, 6.5, 25.0);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `shoe_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `stocks` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_id`, `shoe_id`, `size_id`, `stocks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 5, 100, '2021-07-19 01:14:20', '2021-07-19 02:01:37', NULL),
(2, 1, 1, 20, '2021-07-19 01:14:31', '2021-07-19 01:39:21', NULL),
(3, 2, 3, 10, '2021-07-19 01:14:40', '2021-07-19 02:01:38', NULL),
(4, 3, 5, 45, '2021-07-19 01:14:52', '2021-07-19 01:14:52', NULL),
(5, 2, 9, 19, '2021-07-19 01:15:01', '2021-07-19 01:15:01', NULL),
(6, 3, 9, 17, '2021-07-19 01:15:13', '2021-07-19 01:15:13', NULL),
(7, 4, 5, 100, '2021-07-19 01:15:34', '2021-07-19 01:57:40', NULL),
(8, 4, 1, 20, '2021-07-19 01:15:43', '2021-07-19 01:15:43', NULL),
(9, 5, 9, 18, '2021-07-19 01:15:51', '2021-07-19 01:15:51', NULL),
(10, 5, 3, 20, '2021-07-19 01:16:00', '2021-07-19 01:16:00', NULL),
(11, 6, 11, 20, '2021-07-19 01:16:11', '2021-07-19 01:57:43', NULL),
(12, 7, 3, 198, '2021-07-19 01:16:24', '2021-07-19 01:16:24', NULL),
(13, 8, 1, 8, '2021-07-19 01:16:34', '2021-07-19 01:16:34', NULL),
(14, 8, 9, 10, '2021-07-19 01:16:44', '2021-07-19 01:16:44', NULL),
(15, 9, 3, 20, '2021-07-19 01:16:52', '2021-07-19 01:16:52', NULL),
(16, 9, 9, 10, '2021-07-19 01:17:00', '2021-07-19 01:17:00', NULL),
(17, 10, 3, 100, '2021-07-19 01:21:09', '2021-07-19 01:57:37', NULL),
(18, 11, 7, 99, '2021-07-19 01:21:18', '2021-07-19 01:27:54', NULL),
(19, 12, 38, 197, '2021-07-19 01:21:36', '2021-07-19 01:21:36', NULL),
(20, 13, 25, 190, '2021-07-19 01:22:02', '2021-07-19 01:22:02', NULL),
(21, 14, 36, 199, '2021-07-19 01:22:16', '2021-07-19 01:22:16', NULL),
(22, 15, 27, 196, '2021-07-19 01:22:29', '2021-07-19 01:22:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Kid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `birth_date`, `address`, `contact_number`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'superadmin@email.com', '$2y$10$FT5BcnoMqKTEM/T6MXyyUuPxgXZsZYCjCcpSh5mZBg03LhCR5LthK', 'Super Admin', 'Super Admin', 'Super Admin', '2000-01-01', 'Super Admin Address', '+639429755930', '2021-07-19 00:05:38', NULL, '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(2, 2, 'admin@email.com', '$2y$10$Y/vH41eZtPXbyvDNEbcCuu..LMe6EonGIZCtmzbhR3AVHgP85uGJG', 'Admin', 'Admin', 'Admin', '2000-01-01', 'Admin Address', '+639429755931', '2021-07-19 00:05:38', NULL, '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(3, 1, 'user@email.com', '$2y$10$KXSL2G2XFJCc.GMlxwZMQ.ookiPB7rygZrfS1DVGUsIH.8Lcr68pa', 'Tucker', 'Black', 'Porter', '2000-01-01', 'User Address', '+639429755932', '2021-07-19 00:05:38', NULL, '2021-07-19 00:05:38', '2021-07-19 00:05:38', NULL),
(4, 1, 'nobuhihyke@mailinator.com', '$2y$10$kyOy2PW20.iAWM5bcXyh4.LhdUjJIwBq/Le1Qs7OZKA4PRWaAHRkm', 'Jermaine', 'Ivan Salas', 'Page', '1999-08-09', 'Voluptatem labo', '+639429755999', '2021-06-20 09:12:59', NULL, '2021-06-19 01:04:02', '2021-07-19 01:04:02', NULL),
(5, 1, 'tozy@mailinator.com', '$2y$10$d053gFE2IhnfSkegGkCTUuR98MAdsDuOZ2/Kx/OBjSGSz22vRtqXu', 'Jana', 'Giacomo Jefferson', 'Mooney', '1990-06-03', 'Ipsa doloremque', '+639429755978', '2021-06-20 09:13:08', NULL, '2021-06-19 01:08:44', '2021-07-19 01:08:44', NULL),
(6, 1, 'komigypy@mailinator.com', '$2y$10$FKvSW//dBbQfKCY.w/jJD.Y.hpB7xmValvzn2UIZTAsub3QjIOdCy', 'Admin Mallory', 'Emma', 'Jimenez', '1987-08-18', 'Similique ea exc', '+639429755987', '2021-06-15 09:44:00', NULL, '2021-05-19 01:43:44', '2021-07-19 01:43:44', NULL),
(7, 1, 'imrich@mailinator.com', '$2y$10$9AdulWcwfjPQW25d/G8IE.gTY9QVTb5Mm94WSchVRfKx7sKK.m0Gu', 'Kaye Rich', 'Doll', 'Alford', '1990-06-09', 'Officia exercita', '+639429755934', '2021-06-20 09:51:46', NULL, '2021-06-19 01:51:13', '2021-06-19 01:51:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image_angles`
--
ALTER TABLE `image_angles`
  ADD PRIMARY KEY (`image_angle_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `orders_order_uuid_unique` (`order_uuid`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_completed_by_foreign` (`completed_by`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoe_id`),
  ADD UNIQUE KEY `shoes_sku_unique` (`sku`),
  ADD KEY `shoes_category_id_foreign` (`category_id`),
  ADD KEY `shoes_brand_id_foreign` (`brand_id`),
  ADD KEY `shoes_type_id_foreign` (`type_id`);

--
-- Indexes for table `shoe_images`
--
ALTER TABLE `shoe_images`
  ADD KEY `shoe_images_shoe_id_foreign` (`shoe_id`),
  ADD KEY `shoe_images_image_angle_id_foreign` (`image_angle_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `sizes_type_id_foreign` (`type_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `stocks_shoe_id_foreign` (`shoe_id`),
  ADD KEY `stocks_size_id_foreign` (`size_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contact_number_unique` (`contact_number`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_angles`
--
ALTER TABLE `image_angles`
  MODIFY `image_angle_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoe_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`stock_id`),
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_completed_by_foreign` FOREIGN KEY (`completed_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`stock_id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE;

--
-- Constraints for table `shoes`
--
ALTER TABLE `shoes`
  ADD CONSTRAINT `shoes_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shoes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `shoes_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`type_id`);

--
-- Constraints for table `shoe_images`
--
ALTER TABLE `shoe_images`
  ADD CONSTRAINT `shoe_images_image_angle_id_foreign` FOREIGN KEY (`image_angle_id`) REFERENCES `image_angles` (`image_angle_id`),
  ADD CONSTRAINT `shoe_images_shoe_id_foreign` FOREIGN KEY (`shoe_id`) REFERENCES `shoes` (`shoe_id`) ON DELETE CASCADE;

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`type_id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_shoe_id_foreign` FOREIGN KEY (`shoe_id`) REFERENCES `shoes` (`shoe_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`size_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
