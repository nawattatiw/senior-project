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

 Date: 03/05/2019 16:05:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `order_id` int(20) NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `created_at` datetime(6) NULL DEFAULT NULL,
  `updated_at` datetime(6) NULL DEFAULT NULL,
  `created_by` int(255) NULL DEFAULT NULL,
  `total` double(10, 2) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'TO PAY',
  `ship_plan` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '',
  `ship_cost` double(255, 0) NULL DEFAULT NULL,
  `product_cost` double(10, 2) NULL DEFAULT NULL,
  `slip_image_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 1556516000, '025556666', NULL, '2019-04-29 12:33:42.000000', '2019-04-29 13:05:38.000000', NULL, NULL, 'TO PAY', NULL, NULL, NULL, NULL);
INSERT INTO `orders` VALUES (2, 1556870057, '0897101988', NULL, '2019-05-03 14:54:29.000000', '2019-05-03 16:02:09.000000', NULL, NULL, 'TO CHECK', 'ไปรษณีย์-ลงทะเบียน', 35, 1000.00, 'http://localhost/senior-project/public/images/slip/1556874129.jpg');

SET FOREIGN_KEY_CHECKS = 1;
