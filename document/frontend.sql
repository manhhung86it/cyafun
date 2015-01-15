CREATE TABLE IF NOT EXISTS `frontend` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `page` int(16) NOT NULL COMMENT '1: features, 2: abouts',
  `status` int(16) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(8) DEFAULT NULL,
  `title` varchar(258) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;
