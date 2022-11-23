SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `avatar_item` (
  `avatar_item_id` bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `avatar_item_genre_id` bigint(20) NOT NULL,
  `avatar_item_name` nvarchar(20) NOT NULL,
  `avatar_item_image` nvarchar(50) NOT NULL,
  `avatar_item_point` nvarchar(5) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;