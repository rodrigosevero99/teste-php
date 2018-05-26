-- Database Manager 4.2.5 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tblProduct`;
CREATE TABLE `tblProduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tblProduct` (`id`, `name`, `description`, `quantity`, `price`, `created`, `modified`) VALUES
(1,	'Produto',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',	1,	1,	'2018-05-26 12:10:06',	'2018-05-26 15:33:26'),
(2,	'Produto',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',	10,	1.02,	'2018-05-26 12:10:13',	'2018-05-26 15:33:43'),
(3,	'Produto',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',	124,	1,	'2018-05-26 12:10:33',	'2018-05-26 15:33:33'),
(4,	'Produto teste1',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',	41,	1,	'2018-05-26 12:18:35',	'2018-05-26 15:34:33'),
(5,	'Produto',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',	0,	1,	'2018-05-26 12:38:18',	'2018-05-26 15:33:38'),
(6,	'Produto',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',	4,	3,	'2018-05-26 12:48:38',	'2018-05-26 15:35:11'),
(7,	'Produto',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',	3,	2,	'2018-05-26 12:54:44',	'2018-05-26 15:34:00'),
(8,	'Produto',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',	2,	56456,	'2018-05-26 13:01:51',	'2018-05-26 15:34:24'),
(9,	'Produto',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',	0,	23,	'2018-05-26 15:41:45',	'2018-05-26 15:34:08'),
(11,	'Produto teste2',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',	88,	12.01,	'2018-05-26 13:12:11',	'2018-05-26 15:33:54'),
(12,	'Produto teste 3',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',	55,	16.98,	'2018-05-26 13:12:58',	'2018-05-26 15:34:17');

-- 2018-05-26 18:36:21
