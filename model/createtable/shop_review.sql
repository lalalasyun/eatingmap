use ramenlog;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `shop_review` (
  `shop_review_id` bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` bigint(20) NOT NULL,
  `shop_id` bigint(20) NOT NULL,
  `shop_review_text` nvarchar(1000),
  `shop_review_score` int(1) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;