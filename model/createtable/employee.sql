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

 Date: 08/11/2022 15:08:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `position` int(11) NOT NULL COMMENT 'ポジション',
  `name` varchar(32) COLLATE utf8_bin NOT NULL COMMENT '名前',
  `username` varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'ユーザー名',
  `password` varchar(64) COLLATE utf8_bin NOT NULL COMMENT 'パスワード',
  `sex` varchar(2) COLLATE utf8_bin NOT NULL COMMENT '性別',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'ステータス 0:禁止，1:正常',
  `create_time` datetime NOT NULL COMMENT '作成時間',
  `update_time` datetime NOT NULL COMMENT '更新時間',
  `create_user` bigint(20) NOT NULL COMMENT '作成者',
  `update_user` bigint(20) NOT NULL COMMENT '修正者',
  `phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `idx_username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC COMMENT='スタッフ情報';

-- ----------------------------
-- Records of employee
-- ----------------------------
BEGIN;
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (1, 1, 'pin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', 1, '2021-05-06 17:20:07', '2022-06-21 14:31:39', 0, 1, 12345678);
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (2, 2, 'pin1', 'staff1', 'e10adc3949ba59abbe56e057f20f883e', '1', 1, '2022-06-16 02:16:10', '2022-06-16 02:16:10', 1, 1, 123456);
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (3, 2, 'tom', 'staff2', 'e10adc3949ba59abbe56e057f20f883e', '0', 0, '2022-06-21 13:37:07', '2022-06-21 14:31:43', 0, 1, 123456);
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (4, 2, 'jerry', 'staff3', 'e10adc3949ba59abbe56e057f20f883e', '1', 1, '2022-06-21 14:41:49', '2022-06-21 14:42:08', 0, 1, 666677777);
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (5, 2, 'naibi', '21jn0202', 'e10adc3949ba59abbe56e057f20f883e', '1', 1, '2022-06-28 14:15:27', '2022-06-28 14:15:42', 1, 1, 804177777);
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (6, 2, 'testuser3', 'testuser3', 'e10adc3949ba59abbe56e057f20f883e', '1', 1, '2022-09-18 00:08:42', '2022-09-18 00:08:42', 1, 1, 123456789);
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (7, 2, 'test333', 'test3333', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, '2022-09-19 01:50:27', '2022-09-19 01:50:27', 1, 1, 11111111);
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (8, 2, '4444', 'test444', 'e10adc3949ba59abbe56e057f20f883e', '1', 1, '2022-09-19 01:52:59', '2022-10-18 11:44:39', 0, 1, 4444);
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (9, 2, '555', 'test555', 'e10adc3949ba59abbe56e057f20f883e', '1', 0, '2022-09-19 01:54:12', '2022-10-18 11:43:06', 0, 1, 555);
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (10, 2, '1', '1111', 'e10adc3949ba59abbe56e057f20f883e', '1', 1, '2022-10-25 10:46:09', '2022-10-25 10:46:09', 1, 1, 1);
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (11, 2, '11111', '111111', 'e10adc3949ba59abbe56e057f20f883e', '1', 1, '2022-10-25 10:47:57', '2022-10-25 10:47:57', 1, 1, 1111);
INSERT INTO `employee` (`id`, `position`, `name`, `username`, `password`, `sex`, `status`, `create_time`, `update_time`, `create_user`, `update_user`, `phone`) VALUES (12, 2, '11', '11111', 'e10adc3949ba59abbe56e057f20f883e', '1', 1, '2022-10-25 11:21:20', '2022-10-25 11:21:20', 1, 1, 1);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
