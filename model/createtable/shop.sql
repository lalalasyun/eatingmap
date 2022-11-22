/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : ramenlog

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 08/11/2022 15:08:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for shop
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL COMMENT '店名',
  `info_1` text DEFAULT NULL COMMENT '情報',
  `info_2` text DEFAULT NULL,
  `info_3` text DEFAULT NULL,
  `score` double(2,1) DEFAULT NULL COMMENT '評価',
  `area` varchar(100) DEFAULT NULL COMMENT '区',
  `location_1` varchar(255) DEFAULT NULL COMMENT '場所',
  `location_2` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `close_station` varchar(255) DEFAULT NULL COMMENT '最近駅',
  `phone` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `longitude` double(50,6) DEFAULT NULL COMMENT '軽度',
  `latitude` double(50,6) DEFAULT NULL COMMENT '緯度',
  PRIMARY KEY (`id`,`status`) USING BTREE,
  KEY `fk_category` (`category_id`),
  KEY `id` (`id`),
  CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1589845589640687618 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of shop
-- ----------------------------
BEGIN;
INSERT INTO `shop` (`id`, `name`, `info_1`, `info_2`, `info_3`, `score`, `area`, `location_1`, `location_2`, `price`, `close_station`, `phone`, `status`, `image`, `category_id`, `create_time`, `update_time`, `create_user`, `update_user`, `longitude`, `latitude`) VALUES (1589845589640687617, '1', '111', NULL, NULL, 0.0, '代々木', '1', NULL, 1000, NULL, '1', 1, '', 10, '2022-11-08 14:01:41', '2022-11-08 14:01:41', 1, 1, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
