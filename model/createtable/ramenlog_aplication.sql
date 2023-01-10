CREATE TABLE `application` (
  `id` bigint NOT NULL,
  `type` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `status` int NOT NULL,
  `shop_id` bigint DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci