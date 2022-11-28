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

 Date: 08/11/2022 15:09:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `account` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(255) DEFAULT '',
  `point` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL DEFAULT '',
  `shop_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT current_timestamp(),
  `update_time` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `create_user` bigint(20) NOT NULL DEFAULT 1,
  `update_user` bigint(20) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` (`id`, `name`, `account`, `password`, `profile`, `point`, `mail`, `shop_id`, `create_time`, `update_time`, `create_user`, `update_user`) VALUES (1584733862100410370, 'vp', 'jellyman1234', '123456', '', '500', '', NULL, NULL, NULL, 0, 0);
INSERT INTO `user` (`id`, `name`, `account`, `password`, `profile`, `point`, `mail`, `shop_id`, `create_time`, `update_time`, `create_user`, `update_user`) VALUES (1584734797547642882, 'tom', 'jellyman3333', '123456', '', '500', '', NULL, NULL, NULL, 0, 0);
INSERT INTO `user` (`id`, `name`, `account`, `password`, `profile`, `point`, `mail`, `shop_id`, `create_time`, `update_time`, `create_user`, `update_user`) VALUES (1584743578595680258, 'kuma', 'jellyman3333', '123456', '', '500', '', NULL, NULL, NULL, 0, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
