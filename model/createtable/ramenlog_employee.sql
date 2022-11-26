-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 163.44.251.186    Database: ramenlog
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `position` int NOT NULL COMMENT 'ポジション',
  `name` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL COMMENT '名前',
  `username` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL COMMENT 'ユーザー名',
  `password` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL COMMENT 'パスワード',
  `sex` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL COMMENT '性別',
  `status` int NOT NULL DEFAULT '1' COMMENT 'ステータス 0:禁止，1:正常',
  `create_time` datetime NOT NULL COMMENT '作成時間',
  `update_time` datetime NOT NULL COMMENT '更新時間',
  `create_user` bigint NOT NULL COMMENT '作成者',
  `update_user` bigint NOT NULL COMMENT '修正者',
  `phone` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `idx_username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin ROW_FORMAT=DYNAMIC COMMENT='スタッフ情報';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,1,'pin','admin','e10adc3949ba59abbe56e057f20f883e','1',1,'2021-05-06 17:20:07','2022-06-21 14:31:39',0,1,12345678),(2,2,'pin1','staff1','e10adc3949ba59abbe56e057f20f883e','1',1,'2022-06-16 02:16:10','2022-06-16 02:16:10',1,1,123456),(3,2,'tom','staff2','e10adc3949ba59abbe56e057f20f883e','0',0,'2022-06-21 13:37:07','2022-06-21 14:31:43',0,1,123456),(4,2,'jerry','staff3','e10adc3949ba59abbe56e057f20f883e','1',1,'2022-06-21 14:41:49','2022-06-21 14:42:08',0,1,666677777),(5,2,'naibi','21jn0202','e10adc3949ba59abbe56e057f20f883e','1',1,'2022-06-28 14:15:27','2022-06-28 14:15:42',1,1,804177777),(6,2,'testuser3','testuser3','e10adc3949ba59abbe56e057f20f883e','1',1,'2022-09-18 00:08:42','2022-09-18 00:08:42',1,1,123456789),(7,2,'test333','test3333','e10adc3949ba59abbe56e057f20f883e','0',1,'2022-09-19 01:50:27','2022-09-19 01:50:27',1,1,11111111),(8,2,'4444','test444','e10adc3949ba59abbe56e057f20f883e','1',1,'2022-09-19 01:52:59','2022-10-18 11:44:39',0,1,4444),(9,2,'555','test555','e10adc3949ba59abbe56e057f20f883e','1',0,'2022-09-19 01:54:12','2022-10-18 11:43:06',0,1,555),(10,2,'1','1111','e10adc3949ba59abbe56e057f20f883e','1',1,'2022-10-25 10:46:09','2022-10-25 10:46:09',1,1,1),(11,2,'11111','111111','e10adc3949ba59abbe56e057f20f883e','1',1,'2022-10-25 10:47:57','2022-10-25 10:47:57',1,1,1111),(12,2,'11','11111','e10adc3949ba59abbe56e057f20f883e','1',1,'2022-10-25 11:21:20','2022-10-25 11:21:20',1,1,1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-29  1:59:52
