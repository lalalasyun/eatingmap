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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` int DEFAULT NULL,
  `name` varchar(255) NOT NULL COMMENT '分類名',
  `sort` int NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `create_user` int NOT NULL,
  `update_user` int NOT NULL,
  `is_deleted` int DEFAULT NULL,
  PRIMARY KEY (`id`,`update_time`) USING BTREE,
  UNIQUE KEY `idx_category_name` (`name`) USING BTREE,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,1,'和食',0,'2022-09-19 02:05:37','2022-10-04 10:09:15',0,1,NULL),(2,1,'日本料理',0,'2022-09-19 02:13:29','2022-09-19 02:13:29',1,1,NULL),(3,1,'魚介料理',0,'2022-09-19 02:14:56','2022-09-19 02:14:56',1,1,NULL),(4,1,'そば（蕎麦）',0,'2022-09-19 02:15:17','2022-09-19 02:15:17',1,1,NULL),(5,1,'うどん',0,'2022-09-19 02:15:24','2022-09-19 02:15:24',1,1,NULL),(7,1,'焼き鳥',0,'2022-09-19 02:15:39','2022-09-19 02:15:39',1,1,NULL),(8,2,'定食・食堂',0,'2022-09-28 03:50:11','2022-09-28 03:50:11',1,1,NULL),(10,1,'焼肉',0,'2022-10-04 10:12:21','2022-10-04 10:12:21',1,1,NULL),(11,1,'yakiniku',0,'2022-10-18 11:16:35','2022-10-18 11:16:35',1,1,NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-29  1:59:53
