use ramenlog;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;


CREATE TABLE `shop_favorite` (
  `id` bigint(20) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;