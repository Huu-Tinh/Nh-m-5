-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2023 at 11:27 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom_5`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `h1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `h2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `update_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `h1`, `h2`, `img`, `content`, `active`, `update_at`) VALUES
(1, 'Jordan Stadium 90 ', '', 'Jordan_Stadium_90-removebg-preview.png', ' Kết hợp các yếu tố thiết kế mang tính biểu tượng từ AJ1 và AJ5, đây là mẫu giày cổ điển mới tập trung vào sự thoải mái, độ bền và độ ổn định.', 'active', '2023-12-15 00:45:17'),
(2, 'Nike Air Force 1 EasyOn ', '', 'Nike_Air_Force_1__07_EasyOn-removebg-preview.png', 'Da sắc nét mang lại màu sắc sạch sẽ nhất để mang lại khả năng đeo tối ưu.       Từ những đường khâu chắc chắn, chất liệu nguyên sơ cho đến thiết kế đế cốc, nó mang đến phong cách bền bỉ, mịn màng hơn so với mặt kính sau.', '', '2023-12-15 00:47:10'),
(3, 'Nike Court Vision Low Next Nature ', '', 'Nike_Court_Vision_Low_Next_Nature-1-removebg-preview.png', 'Được làm từ ít nhất 20% vật liệu tái chế tính theo trọng lượng.  Yêu thích vẻ ngoài cổ điển của bóng rổ thập niên 80 nhưng lại thích văn hóa nhịp độ nhanh của trò chơi ngày nay? Gặp gỡ Nike Court Vision Low.  Một sản phẩm cổ điển được phối lại với ít nhất 20% vật liệu tái chế tính theo trọng lượng,  lớp phủ trên và đường khâu sắc nét vẫn giữ được linh hồn của phong cách nguyên bản. ', '', '2023-12-15 00:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categori` int NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name_ct` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `note` text COLLATE utf8mb4_general_ci,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categori`, `img`, `name_ct`, `note`, `create_at`) VALUES
(1, 'brand_03.png', ' NIKE ', 'bbbbbbbbbb', '2023-11-15 19:15:03'),
(10, 'jordan.png', 'JORDAN', '', '2023-12-06 18:13:19'),
(21, 'brand_02.png', 'ADIDAS', NULL, '2023-12-14 21:49:34'),
(22, NULL, 'BOSTON', '', '2023-12-15 16:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_cmt` int NOT NULL,
  `cmt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_cmt`, `cmt`, `create_at`, `user_id`, `product_id`) VALUES
(24, 'sp tốt chất lượng ạ', '2023-12-15 18:01:07', 8, 26),
(26, 'Nên mua tiếp', '2023-12-15 18:01:25', 8, 26),
(27, '', '2023-12-15 18:01:29', 8, 26),
(28, 'giày chất lượng\r\n\r\n', '2023-12-15 18:06:01', 8, 28),
(29, '', '2023-12-15 18:06:04', 8, 28),
(30, 'giay dep\r\n', '2023-12-15 18:06:25', 8, 33),
(31, 'giay dep\r\n', '2023-12-15 18:06:30', 8, 33);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int DEFAULT NULL,
  `total` double NOT NULL,
  `username_od` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address_od` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_od` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `pttt` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `code`, `status`, `total`, `username_od`, `address_od`, `phone_od`, `pttt`, `user_id`, `created_at`) VALUES
(50, 'ZCT970873', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', 'Thanh toán khi nhận hàng', NULL, '2022-12-14 10:14:03'),
(51, 'ZCT929413', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '1', NULL, '2023-12-14 13:43:29'),
(52, 'ZCT732452', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 13:43:40'),
(53, 'ZCT691317', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-08-14 13:52:28'),
(54, 'ZCT788049', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 13:52:32'),
(55, 'ZCT424131', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 13:53:57'),
(56, 'ZCT971504', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:06:14'),
(57, 'ZCT143265', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:06:43'),
(58, 'ZCT133029', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:06:45'),
(59, 'ZCT801097', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:23:18'),
(60, 'ZCT859352', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:24:09'),
(61, 'ZCT204439', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:24:20'),
(62, 'ZCT638047', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:24:30'),
(63, 'ZCT885191', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:25:46'),
(64, 'ZCT575071', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:27:11'),
(65, 'ZCT525679', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:27:12'),
(66, 'ZCT961510', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:27:20'),
(67, 'ZCT404722', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:33:25'),
(68, 'ZCT397481', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:33:32'),
(69, 'ZCT500198', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:40:26'),
(70, 'ZCT969597', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:40:52'),
(71, 'ZCT608922', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:48:16'),
(72, 'ZCT32768', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:48:33'),
(73, 'ZCT662947', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:48:36'),
(74, 'ZCT919475', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:48:55'),
(75, 'ZCT336546', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:49:24'),
(76, 'ZCT741325', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:51:14'),
(77, 'ZCT569526', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 14:59:53'),
(78, 'ZCT3864', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:00:05'),
(79, 'ZCT374487', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:02:32'),
(80, 'ZCT757032', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:03:14'),
(81, 'ZCT163741', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:03:23'),
(82, 'ZCT832892', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:07:10'),
(83, 'ZCT53777', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:09:58'),
(84, 'ZCT396110', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:14:11'),
(85, 'ZCT136713', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:14:12'),
(86, 'ZCT167608', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:14:31'),
(87, 'ZCT359989', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:14:54'),
(88, 'ZCT952201', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:20:04'),
(89, 'ZCT171047', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:20:12'),
(90, 'ZCT284174', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:29:48'),
(91, 'ZCT622257', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:30:20'),
(92, 'ZCT582880', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:42:28'),
(93, 'ZCT375038', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:42:29'),
(94, 'ZCT822762', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:44:24'),
(95, 'ZCT587454', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:49:29'),
(96, 'ZCT256398', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:50:40'),
(97, 'ZCT665225', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:51:29'),
(98, 'ZCT74974', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:51:33'),
(99, 'ZCT237679', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:51:49'),
(100, 'ZCT252802', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:51:57'),
(101, 'ZCT467123', NULL, 4200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:54:23'),
(102, 'ZCT726220', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:55:34'),
(103, 'ZCT948222', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 15:58:44'),
(104, 'ZCT288460', NULL, 2884200, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 16:00:21'),
(105, 'ZCT235555', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 16:01:29'),
(106, 'ZCT582475', NULL, 4002880, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 16:09:50'),
(107, 'ZCT203271', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 16:12:19'),
(108, 'ZCT329810', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 16:14:55'),
(109, 'ZCT424834', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 16:18:24'),
(110, 'ZCT676382', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 16:21:17'),
(111, 'ZCT611109', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 16:22:03'),
(112, 'ZCT982177', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 16:22:16'),
(113, 'ZCT317751', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 16:23:06'),
(114, 'ZCT825960', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', NULL, '2023-12-14 16:23:17'),
(115, 'ZCT444343', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '1', 8, '2023-12-14 16:35:06'),
(116, 'ZCT869067', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 16:38:53'),
(117, 'ZCT337348', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 16:39:43'),
(118, 'ZCT408748', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 16:41:58'),
(119, 'ZCT974823', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 16:45:48'),
(120, 'ZCT158501', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 16:47:02'),
(121, 'ZCT980113', NULL, 2880000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '1', 8, '2023-12-14 16:54:17'),
(122, 'ZCT492511', NULL, 385000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 17:10:07'),
(123, 'ZCT384049', NULL, 385000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 17:10:28'),
(124, 'ZCT107017', NULL, 385000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 17:11:11'),
(125, 'ZCT616630', NULL, 385000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 17:12:56'),
(126, 'ZCT797081', NULL, 385000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 17:17:28'),
(127, 'ZCT189842', NULL, 385000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 17:19:11'),
(128, 'ZCT846043', NULL, 385000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 17:23:29'),
(129, 'ZCT943087', NULL, 385000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 17:23:44'),
(130, 'ZCT192919', NULL, 385000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 17:27:28'),
(131, 'ZCT146931', NULL, 385000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 17:30:04'),
(132, 'ZCT104559', NULL, 4000000, 'HTinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-14 17:34:14'),
(133, 'ZCT986560', NULL, 360, 'htinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-15 12:49:26'),
(134, 'ZCT421319', NULL, 360360, 'htinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-15 12:55:03'),
(135, 'ZCT518625', NULL, 360360, 'htinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-15 12:56:16'),
(136, 'ZCT316827', NULL, 360360, 'htinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-15 12:59:48'),
(137, 'ZCT369847', NULL, 360360, 'htinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-15 13:01:16'),
(138, 'ZCT775750', NULL, 360360, 'htinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-15 13:01:26'),
(139, 'ZCT554512', NULL, 360360, 'htinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-15 13:02:18'),
(140, 'ZCT938955', NULL, 360360, 'htinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-15 13:02:51'),
(141, 'ZCT5970', 1, 360360, 'htinh', '274 hẻm 56, Phường xuân khánh, Quận ninh kiều, Cần thơ', '373336483', '2', 8, '2023-12-15 13:05:26'),
(142, 'ZCT558386', NULL, 1440000, 'htinzz', '274 hẻm 56, Phường xuân khánh, Qư', '0373336483', '1', 8, '2023-09-15 18:00:49'),
(143, 'ZCT593093', NULL, 1440000, 'htinzz', '274 hẻm 56, Phường xuân khánh, Qư', '0373336483', '1', 8, '2022-12-15 18:01:58'),
(144, 'ZCT779923', NULL, 165000, 'htinzz', '274 hẻm 56, Phường xuân khánh, Qư', '0373336483', '1', 8, '2023-12-15 18:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `order_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img_odt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity_odt` int NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `product_id`, `order_id`, `name`, `img_odt`, `quantity_odt`, `unit_price`, `created_at`) VALUES
(41, 14, 50, 'HT New5', 'Jordan Stadium 90.png', 1, 420, '2023-08-14 10:14:03'),
(42, 14, 51, 'HT New5', 'Jordan Stadium 90.png', 1, 420, '2023-10-14 13:43:29'),
(43, 27, 103, 'Jordan Stadium 90', 'Jordan Stadium 90(2).png', 1, 360000, '2023-12-14 15:58:44'),
(44, 14, 104, 'HT New5', 'Jordan Stadium 90.png', 1, 420, '2022-06-14 16:00:21'),
(45, 27, 104, 'Jordan Stadium 90', 'Jordan Stadium 90(2).png', 1, 360000, '2023-10-14 16:00:21'),
(46, 27, 105, 'Jordan Stadium 90', 'Jordan Stadium 90(2).png', 1, 360000, '2023-12-14 16:01:29'),
(47, 26, 106, 'Jordan One Take 4', 'Jordan One Take 4 PF(3).png', 1, 360, '2023-12-14 16:09:50'),
(48, 29, 106, 'Nike Phantom GX Club', 'Nike Phantom GX Club(3).png', 1, 500000, '2023-12-14 16:09:50'),
(49, 27, 107, 'Jordan Stadium 90', 'Jordan Stadium 90(2).png', 1, 360000, '2023-12-14 16:12:19'),
(50, 27, 108, 'Jordan Stadium 90', 'Jordan Stadium 90(2).png', 1, 360000, '2023-12-14 16:14:55'),
(51, 27, 115, 'Jordan Stadium 90', 'Jordan Stadium 90(2).png', 1, 360000, '2023-12-14 16:35:06'),
(52, 27, 121, 'Jordan Stadium 90', 'Jordan Stadium 90(2).png', 1, 360000, '2023-12-14 16:54:17'),
(53, 31, 131, 'Nike Air Max', 'Nike Air Max SYSTM.png', 1, 55000, '2023-12-14 17:33:05'),
(54, 29, 132, 'Nike Phantom GX Club', 'Nike Phantom GX Club(3).png', 1, 500000, '2023-12-14 17:34:38'),
(55, 26, 141, 'Jordan One Take 4', 'Jordan One Take 4 PF(3).png', 1, 360, '2023-12-15 13:08:21'),
(56, 27, 141, 'Jordan Stadium 90', 'Jordan Stadium 90(2).png', 1, 360000, '2023-12-15 13:08:21'),
(57, 26, 142, 'Jordan One Take 4', 'Jordan One Take 4 PF(3).png', 4, 360000, '2023-12-15 18:00:49'),
(58, 27, 143, 'Jordan Stadium 90', 'Jordan Stadium 90(2).png', 4, 360000, '2023-12-15 18:01:58'),
(59, 31, 144, 'Nike Air Max', 'Nike Air Max SYSTM.png', 3, 55000, '2023-12-15 18:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int NOT NULL,
  `name_pr` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img_1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img_2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img_3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `categori_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name_pr`, `price`, `quantity`, `img`, `img_1`, `img_2`, `img_3`, `describe`, `categori_id`, `created_at`) VALUES
(26, 'Jordan One Take 4', 360000, 8, 'Jordan One Take 4 PF(3).png', '', '', '', 'Đạt được tốc độ bạn cần, giống như Russ. Lấy cảm hứng từ mẫu giày đặc trưng mới nhất của Russell Westbrook, đế ngoài của Jordan One Take 4 gần như ôm sát đế giữa để bạn có thể bắt đầu, dừng hoặc đổi hướng ngay lập tức. Trong khi đó, đệm Zoom Air hoàn trả năng lượng ở bàn chân trước giúp bạn tiếp tục di chuyển (và tiếp tục di chuyển).', 1, '2023-12-11 00:53:07'),
(27, 'Jordan Stadium 90', 360000, 8, 'Jordan Stadium 90(2).png', '', '', '', 'Phát triển trò chơi của bạn. Stadium 90 lấy các yếu tố từ những người vĩ đại và biến chúng thành thứ gì đó hoàn toàn độc đáo. Kết hợp các yếu tố thiết kế mang tính biểu tượng từ AJ1 và AJ5, đây là mẫu giày cổ điển mới tập trung vào sự thoải mái, độ bền và độ ổn định.', 10, '2023-12-11 00:53:07'),
(28, 'Nike Air Max SYSTM', 420000, 8, 'Nike Air Max SYSTM(1).png', 'Nike Air Max SYSTM(4).png', 'Nike Air Max SYSTM(4).png', 'Nike Air Max SYSTM(3).png', 'Giày thời trang Nike Air Max SYSTM Chính hãng - FQ8106-133\r\nPhong cách của Max, sự thoải mái của Max. Air Max SYSTM mang lại tất cả những yếu tố phổ biến của phong cách thập niên 80. Đệm Nike Air đã được chứng minh được kết hợp với phần trên tinh xảo, lấy cảm hứng từ thể thao để mang lại sự thoải mái lâu dài. Đây là sự tái sinh của Air Max.', 1, '2023-12-11 00:53:07'),
(29, 'Nike Phantom GX Club', 500000, 8, 'Nike Phantom GX Club(3).png', '', '', '', 'Thực sự nguyên bản, cung cấp giá thấp nhất và chất lượng tốt nhất, khuyến mãi trong thời gian có hạn, thực sự nguyên bản, cung cấp giá thấp nhất và chất lượng tốt nhất, khuyến mãi trong thời gian có hạn, khuyến mãi trong thời gian có hạn.\r\nHình ảnh sản phẩm là ảnh thật.', 1, '2023-12-11 00:53:07'),
(31, 'Nike Air Max', 55000, 7, 'Nike Air Max SYSTM.png', '', '', '', 'Nike là một trong những thương hiệu nổi tiếng và được yêu thích hàng đầu của giới trẻ. Chính vì “tiếng tăm” này mà hàng nhái, kém chất lượng “đầy rẫy” trên thị trường hiện nay. Làm thế nào để phân biết được giày Nike chính hãng? Cùng theo dõi bài viết bên dưới và có chọn lựa chính xác nhé!', 1, '2023-12-11 00:53:07'),
(33, 'AF1 Full Black', 670000, 20, '73a7c5cd701b4a05864668be68100c34.jpg', '55994c30007649d0baabdfea44fa5a37.jpg', '265591fe53f54dbf991a0a7200581be4.jpg', 'e2a3ce0db67e4dea9c666c490c77fa68.jpg', 'Không phải tự nhiên những mẫu giày Nike Air Force 1 dễ dàng gọi là vượt thời gian. Những tiêu chuẩn mà hiếm đôi giày thể rhao nào đạt được thì dòng giày này dường như đáp ứng đủ.\r\nLà một trong thiết kế bán chạy nhất, nay được Nike Air nâng cấp hơn với phiên bản mới gọi là Nike Air Force 1 ’07 ‘Triple Black’.  Nhằm hướng tới một tương lai bền vững hơn đôi giày này đã sử dụng vải tái chế và chính điều này đã khiến phiên bản này của nhà Nike gây sự chú ý', 1, '2023-12-15 15:47:19'),
(34, 'SNEAKER MLB BIG BALL CHUNKY BOSTON', 1290000, 20, 'img_4069_b32922a325554a6c8ec4b049d46039dc_master.webp', 'img_9464_2_ea354e2cdf1d4991b26f63b4c85f94d3_master.jpg', 'img_9388_a20c62e769ec4f668e93ffc735ce8622_master.webp', 'img_9466_02cd232a869245ecb99d92200884e0ad_master.webp', 'MLB là tên viết tắt của Major League Baseball – tổ chức thể thao chuyên nghiệp của môn bóng chày. Các sản phẩm của MLB lấy cảm hứng từ sự pha trộn giữa thể thao, thời trang đường phố và văn hóa. Thương hiệu chuyên thiết kế và sản xuất trang phục, giày & phụ kiện cho nam, nữ lấy cảm hứng từ logo của những đội bóng chày danh tiếng đem đến những bộ sưu tập là sự kết hợp giữa tiện ích và thời trang.', 22, '2023-12-15 16:13:28'),
(35, 'SNEAKER MLB BIG BALL CHUNKY A NEW YORK YANKEES', 405500, 9, 'nky-a-new-york-yankees-mau-trang-logo-den-5e44abbe2673f-13022020085158_2465c2e394f24e2d8f0a6b8de57f2f24_master.webp', 'nky-a-new-york-yankees-mau-trang-logo-den-5e44abbebe5f1-13022020085158_395faa857ac94a4ab7480d742acf5de9_master.webp', 'york-yankees-mau-trang-logo-den-size-240-jpg-1603094398-19102020145958_f9e3c2d7fe42402f8d829ffa7647e03e_master.webp', 'ankees-mau-trang-logo-den-size-240-anh-1-jpg-1603094500-19102020150140_530f7890b9d6429e9baf1c39cac96528_master.webp', 'Lót giày dày dặn, êm ái giúp chân luôn thoải mái dù mang giày suốt cả ngày. MLB Big Ball Chunky với vác đường chỉ khâu thẳng hàng rất tinh tế và chắc chắn. Logo hãng MLB và chữ MLB ở mặt trên rất tinh tế và tạo điểm nhấn riêng cho đôi giày. Đế giày được thiết kế có độ ma sát cao, hạn chế trơn trượt. ', 22, '2023-12-15 16:25:05'),
(36, 'Giày Asics Court MZ màu xám mẫu mới nhất', 400000, 8, 'vn-11134207-7r98o-lobeo7q3uxvbb9.jpg', 'vn-11134207-7r98o-lobeo7q3tjavc3.jpg', 'vn-11134207-7r98o-lobeo7q3wcfr81.jpg', 'vn-11134207-7r98o-lobeo7q3xr076f.jpg', 'Đôi giày có thể được thiết kế với nhiều kiểu dáng và chất liệu khác nhau, từ giày thể thao thông dụng, giày cao gót sang trọng cho đến giày bốt cá tính. Với sự phát triển của công nghệ và sự sáng tạo của các nhà thiết kế, thị trường giày cũng ngày càng đa dạng với hàng ngàn mẫu mã, màu sắc và kiểu dáng khác nhau.', 1, '2023-12-15 18:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `tocart`
--

CREATE TABLE `tocart` (
  `id_cart` int NOT NULL,
  `quantity_cart` double NOT NULL,
  `size` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tocart`
--

INSERT INTO `tocart` (`id_cart`, `quantity_cart`, `size`, `user_id`, `product_id`) VALUES
(3, 2, 12, 12, 28);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `role_id` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` int DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `role_id`, `email`, `username`, `password`, `phone`, `address`, `avatar`, `gender`, `create_at`) VALUES
(8, 1, 'tinhnhpc05990@fpt.edu.vn', 'htinzz', '1234', '0373336483', '274 hẻm 56, Phường xuân khánh, Qư', 'user-1.jpg', 1, '2023-11-24 19:02:38'),
(12, 1, 'LanNg0c11@gmail.com', 'tinhh', '123', '0123456789', 'Can tho', '2.png', 1, '2023-12-05 11:37:04'),
(42, 2, 'tinh14404@gmail.com', 'HT New', '1234', '1123456789', '123Phường xuân khánh, Quận ninh kiều, Cần thơ', 'user-1.jpg', 1, '2023-12-15 13:53:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categori`),
  ADD UNIQUE KEY `name_ct` (`name_ct`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `comments_ibfk_1` (`user_id`),
  ADD KEY `comments_ibfk_2` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `orders_detail_ibfk_1` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD UNIQUE KEY `name_pr` (`name_pr`),
  ADD KEY `products_ibfk_1` (`categori_id`);

--
-- Indexes for table `tocart`
--
ALTER TABLE `tocart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_cmt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tocart`
--
ALTER TABLE `tocart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categori_id`) REFERENCES `categories` (`id_categori`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tocart`
--
ALTER TABLE `tocart`
  ADD CONSTRAINT `tocart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tocart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
