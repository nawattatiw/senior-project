-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 12:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phonenumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `zipcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_district` varchar(255) COLLATE utf8_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `phonenumber`, `email`, `address`, `district`, `province`, `zipcode`, `country`, `created_at`, `updated_at`, `sub_district`) VALUES
(1, 'Nawattakron Somboonma', '0800598435', 'nawattakron09@gmail.com', '51/2 สน.ทุ่งมหาเมฆ หมู่บ้านสวนพูลปาร์ตี้', 'สวนพูล', 'กรุงเทพมหานคร', '10120', 'Thailand', '2019-04-17 08:29:54', '2019-04-17 03:55:49', NULL),
(2, 'test08', '0689969629', 'r99@hotmail.com', '9963631', 'KOKKO', 'BANGKOK', '10120', 'Thailand', '2019-04-18 03:21:40', '2019-04-18 03:21:40', NULL),
(3, 'แก้วขวัญ ชาญชัย', '0814526598', 'BecatYo@hotmail.com', 'หมู่บ้านวิลพาเลส 78/4  ข้างป้อมรปภ.  ถ. บางนา-ตราด', 'บางนา', 'กรุงเทพ', '591002', 'Thailand', '2019-04-18 04:21:28', '2019-04-18 04:21:28', NULL),
(4, 'yuna', '0862242421', 'nawattakron07@gmail.com', 'ร่มเกล้าปกสอง', 'เชียงของ', 'เชียงใหม่', '191203', 'Thailand', '2019-04-18 04:36:23', '2019-04-18 04:36:23', NULL),
(5, '1', '1', '1', '1', '1', '1', '1', 'Thailand', '2019-04-24 09:49:14', '2019-04-24 09:49:14', NULL),
(6, '1', '1', '1', '1', '1', '1', '1', 'Thailand', '2019-04-24 09:50:06', '2019-04-24 09:50:06', NULL),
(7, 'Sra S', '0897101988', 'arttioz@gmail.com', '10/121', 'ดอน', 'กทม', '210', '', '2019-05-03 08:26:35', '2019-05-03 08:41:15', 'บิน'),
(9, 'แกว้ว กาว', '0899569379', 'kwatqwle@hotmail.com', '522/4', 'ฟ้า', 'กรุทเทพ', '101200', '', '2019-05-03 10:18:17', '2019-05-03 10:19:07', 'ชี้'),
(10, '', '08000001', '', '', '', '', '', '', '2019-05-03 10:32:01', '2019-05-03 10:32:01', ''),
(11, 'Nawattakron Somboonma', '123456999', 'mark.bc.16@m.com', 'here', 'b', 'c', 'd', '', '2019-05-03 10:36:32', '2019-05-03 10:45:15', 'a'),
(12, 'Nawattakron Somboonma', '0800598439', 'nawattakron09@gmail.com', '125/9 หมู่บ้าน เกสวิลล่า ใกล้ตลาดโรงเกลือ', 'เค็มปี๋', 'กรุงเทพ', '10121', '', '2019-05-07 07:12:13', '2019-05-07 07:13:25', 'โรงเกลือ'),
(13, 'กิจการ บ้าบอ', '0800598433', 'hoolel@hotmail.com', '188/3 หมู่บ้าน เกจมณีศรีมหาราชันย์เกร็ดประทุมมทมาศ', 'แก้วมณีมหาคนอง', 'พระไม่เคยอภัยมณี', '103332', '', '2019-05-07 10:00:52', '2019-05-07 10:05:43', 'ขรจศรีมหาเกตุชัยตุมิ'),
(14, 'มหาสมกลอง มองแยงแยง', '0805984552', 'mahasumpong99@hotmail.com', '127/6 ข้างวัดศรีมหาราราม', 'แก้วตา', 'อุบลราชธาหนิ', '552103', '', '2019-05-07 10:17:33', '2019-05-07 10:19:13', 'โรงเกลือ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `order_id` int(20) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `created_by` int(255) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_bin DEFAULT 'TO PAY',
  `ship_plan` varchar(255) COLLATE utf8_bin DEFAULT '',
  `ship_cost` double(255,0) DEFAULT NULL,
  `product_cost` double(10,2) DEFAULT NULL,
  `slip_image_url` varchar(255) COLLATE utf8_bin DEFAULT '',
  `expire_at` datetime(6) DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `phone`, `created_at`, `updated_at`, `created_by`, `total`, `status`, `ship_plan`, `ship_cost`, `product_cost`, `slip_image_url`, `expire_at`) VALUES
(2, 1556870057, '0800598439', '2019-05-03 14:54:29.000000', '2019-05-07 12:22:16.453231', NULL, 1035.00, 'TO CHECK', 'ไปรษณีย์-ลงทะเบียน', 35, 0.00, 'http://localhost/senior-project/public/images/slip/1556874129.jpg', '2019-05-07 15:13:23.637809'),
(3, 1557213088, '0800598439', '2019-05-07 14:11:46.208242', '2019-05-07 14:13:25.494287', NULL, 1850.00, 'COMPLETE', 'ไปรษณีย์ไทย-EMS', 50, 1800.00, 'http://127.0.0.1:8000/images/slip/1557213205.jpg', '2019-05-07 16:17:21.496559'),
(5, 1557222816, '0800598433', '2019-05-07 16:54:07.833926', '2019-05-07 17:05:42.907600', NULL, NULL, 'TO CHECK', 'ไปรษณีย์-ลงทะเบียน', 35, 234.00, 'http://127.0.0.1:8000/images/slip/1557223542.jpg', '2019-05-07 17:05:42.908620'),
(6, 1557224174, '0805984552', '2019-05-07 17:16:35.322809', '2019-05-07 17:19:13.585418', NULL, NULL, 'TO CHECK', 'ไปรษณีย์ไทย-EMS', 50, 750.00, 'http://127.0.0.1:8000/images/slip/1557224353.jpg', '2019-05-07 17:19:13.586245');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
