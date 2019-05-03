/*
 Navicat Premium Data Transfer

 Source Server         : Localhost Mysql
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : 127.0.0.1:3306
 Source Schema         : inventory

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 03/05/2019 16:05:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phonenumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `zipcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `sub_district` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES (1, 'Nawattakron Somboonma', '0800598435', 'nawattakron09@gmail.com', '51/2 สน.ทุ่งมหาเมฆ หมู่บ้านสวนพูลปาร์ตี้', 'สวนพูล', 'กรุงเทพมหานคร', '10120', 'Thailand', '2019-04-17 15:29:54', '2019-04-17 10:55:49', NULL);
INSERT INTO `address` VALUES (2, 'test08', '0689969629', 'r99@hotmail.com', '9963631', 'KOKKO', 'BANGKOK', '10120', 'Thailand', '2019-04-18 10:21:40', '2019-04-18 10:21:40', NULL);
INSERT INTO `address` VALUES (3, 'แก้วขวัญ ชาญชัย', '0814526598', 'BecatYo@hotmail.com', 'หมู่บ้านวิลพาเลส 78/4  ข้างป้อมรปภ.  ถ. บางนา-ตราด', 'บางนา', 'กรุงเทพ', '591002', 'Thailand', '2019-04-18 11:21:28', '2019-04-18 11:21:28', NULL);
INSERT INTO `address` VALUES (4, 'yuna', '0862242421', 'nawattakron07@gmail.com', 'ร่มเกล้าปกสอง', 'เชียงของ', 'เชียงใหม่', '191203', 'Thailand', '2019-04-18 11:36:23', '2019-04-18 11:36:23', NULL);
INSERT INTO `address` VALUES (5, '1', '1', '1', '1', '1', '1', '1', 'Thailand', '2019-04-24 16:49:14', '2019-04-24 16:49:14', NULL);
INSERT INTO `address` VALUES (6, '1', '1', '1', '1', '1', '1', '1', 'Thailand', '2019-04-24 16:50:06', '2019-04-24 16:50:06', NULL);
INSERT INTO `address` VALUES (7, 'Sra S', '0897101988', 'arttioz@gmail.com', '10/121', 'ดอน', 'กทม', '210', '', '2019-05-03 15:26:35', '2019-05-03 15:41:15', 'บิน');

SET FOREIGN_KEY_CHECKS = 1;
