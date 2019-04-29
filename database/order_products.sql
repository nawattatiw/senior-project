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

 Date: 29/04/2019 14:05:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for order_products
-- ----------------------------
DROP TABLE IF EXISTS `order_products`;
CREATE TABLE `order_products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8, 2) NOT NULL,
  `total` double(8, 2) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `billaddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of order_products
-- ----------------------------
INSERT INTO `order_products` VALUES (9, '1556380979', '1', 100.00, 100.00, '2019-04-27 23:03:23', '2019-04-27 23:03:56', '0896665555', 84);
INSERT INTO `order_products` VALUES (10, '1556380979', '1', 100.00, 100.00, '2019-04-27 23:04:40', '2019-04-27 23:04:40', '0896665555', 101);
INSERT INTO `order_products` VALUES (11, '1556381264', '1', 100.00, 100.00, '2019-04-27 23:08:48', '2019-04-27 23:08:48', '0896665555', 101);
INSERT INTO `order_products` VALUES (12, '1556516000', '2', 100.00, 200.00, '2019-04-29 12:33:42', '2019-04-29 12:36:29', '025556666', 97);
INSERT INTO `order_products` VALUES (13, '1556516000', '2', 23.00, 46.00, '2019-04-29 13:01:14', '2019-04-29 13:05:38', '025556666', 27);
INSERT INTO `order_products` VALUES (14, '1556516000', '2', 2.00, 4.00, '2019-04-29 13:05:04', '2019-04-29 13:05:04', '2222', 102);

SET FOREIGN_KEY_CHECKS = 1;
