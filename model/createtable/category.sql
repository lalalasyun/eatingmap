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

 Date: 08/11/2022 15:08:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL COMMENT '分類名',
  `sort` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`update_time`) USING BTREE,
  UNIQUE KEY `idx_category_name` (`name`) USING BTREE,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of category
-- ----------------------------
BEGIN;
INSERT INTO `category` (`id`, `type`, `name`, `sort`, `create_time`, `update_time`, `create_user`, `update_user`, `is_deleted`) VALUES (1, 1, '和食', 0, '2022-09-19 02:05:37', '2022-10-04 10:09:15', 0, 1, NULL);
INSERT INTO `category` (`id`, `type`, `name`, `sort`, `create_time`, `update_time`, `create_user`, `update_user`, `is_deleted`) VALUES (2, 1, '日本料理', 0, '2022-09-19 02:13:29', '2022-09-19 02:13:29', 1, 1, NULL);
INSERT INTO `category` (`id`, `type`, `name`, `sort`, `create_time`, `update_time`, `create_user`, `update_user`, `is_deleted`) VALUES (3, 1, '魚介料理', 0, '2022-09-19 02:14:56', '2022-09-19 02:14:56', 1, 1, NULL);
INSERT INTO `category` (`id`, `type`, `name`, `sort`, `create_time`, `update_time`, `create_user`, `update_user`, `is_deleted`) VALUES (4, 1, 'そば（蕎麦）', 0, '2022-09-19 02:15:17', '2022-09-19 02:15:17', 1, 1, NULL);
INSERT INTO `category` (`id`, `type`, `name`, `sort`, `create_time`, `update_time`, `create_user`, `update_user`, `is_deleted`) VALUES (5, 1, 'うどん', 0, '2022-09-19 02:15:24', '2022-09-19 02:15:24', 1, 1, NULL);
INSERT INTO `category` (`id`, `type`, `name`, `sort`, `create_time`, `update_time`, `create_user`, `update_user`, `is_deleted`) VALUES (7, 1, '焼き鳥', 0, '2022-09-19 02:15:39', '2022-09-19 02:15:39', 1, 1, NULL);
INSERT INTO `category` (`id`, `type`, `name`, `sort`, `create_time`, `update_time`, `create_user`, `update_user`, `is_deleted`) VALUES (8, 2, '定食・食堂', 0, '2022-09-28 03:50:11', '2022-09-28 03:50:11', 1, 1, NULL);
INSERT INTO `category` (`id`, `type`, `name`, `sort`, `create_time`, `update_time`, `create_user`, `update_user`, `is_deleted`) VALUES (10, 1, '焼肉', 0, '2022-10-04 10:12:21', '2022-10-04 10:12:21', 1, 1, NULL);
INSERT INTO `category` (`id`, `type`, `name`, `sort`, `create_time`, `update_time`, `create_user`, `update_user`, `is_deleted`) VALUES (11, 1, 'yakiniku', 0, '2022-10-18 11:16:35', '2022-10-18 11:16:35', 1, 1, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
