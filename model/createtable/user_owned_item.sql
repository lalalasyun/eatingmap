SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `user_owned_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `genre_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `is_set_avatar` boolean NOT NULL DEFAULT False,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;