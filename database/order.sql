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

 Date: 29/04/2019 12:18:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `order_id` int(20) NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `created_at` datetime(6) NULL DEFAULT NULL,
  `updated_at` datetime(6) NULL DEFAULT NULL,
  `created_by` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
