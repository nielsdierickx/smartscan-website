# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.9)
# Database: smartscan
# Generation Time: 2012-05-25 15:28:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `description`, `photo`)
VALUES
	(1,'Groenten en fruit',NULL,'resources/img/categories/vegetables.jpg'),
	(2,'Vleeswaren',NULL,'resources/img/categories/meat.jpg'),
	(8,'Zuivel',NULL,'resources/img/categories/dairy.jpg'),
	(4,'Vis',NULL,'resources/img/categories/fish.jpg'),
	(5,'Dranken',NULL,'resources/img/categories/drinks.jpg'),
	(6,'Chocolade en koekjes',NULL,'resources/img/categories/chocolade-koekjes.jpg'),
	(7,'Snoep',NULL,'resources/img/categories/snoep.jpg'),
	(3,'Gevogelte en wild',NULL,'resources/img/categories/gevogelte.jpg');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `description`)
VALUES
	(1,'admin','Administrator'),
	(2,'members','General User');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table list_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `list_details`;

CREATE TABLE `list_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `list_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `lists_detail_lists` (`list_id`),
  KEY `lists_detail_products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `list_details` WRITE;
/*!40000 ALTER TABLE `list_details` DISABLE KEYS */;

INSERT INTO `list_details` (`id`, `list_id`, `product_id`, `amount`, `promotion_id`)
VALUES
	(3,15,25,1,NULL),
	(6,15,25,1,NULL),
	(7,15,25,1,NULL),
	(8,15,25,1,NULL),
	(9,15,25,1,NULL),
	(10,15,25,1,NULL),
	(11,15,25,1,NULL),
	(12,15,25,1,NULL),
	(13,15,25,1,NULL),
	(14,15,25,1,NULL),
	(20,15,25,1,NULL),
	(21,15,25,1,NULL),
	(24,15,25,1,NULL),
	(25,15,25,1,NULL),
	(26,15,25,1,NULL),
	(27,15,25,1,NULL),
	(28,15,25,1,NULL),
	(30,15,25,1,NULL),
	(31,15,25,1,NULL),
	(32,15,25,1,NULL),
	(35,15,25,1,NULL),
	(36,15,25,1,NULL),
	(46,14,4,3,NULL),
	(49,14,16,1,NULL),
	(56,17,3,5,NULL),
	(57,17,4,1,NULL),
	(58,16,21,4,NULL),
	(60,16,1,7,NULL),
	(61,16,2,3,NULL),
	(62,14,21,2,NULL),
	(63,18,2,3,NULL),
	(64,18,19,4,NULL),
	(65,18,27,3,NULL),
	(66,17,21,1,NULL),
	(67,17,18,1,NULL),
	(68,17,24,1,NULL),
	(69,17,23,1,NULL),
	(70,18,21,3,NULL),
	(71,18,23,1,NULL),
	(72,18,1,4,NULL),
	(74,18,3,5,NULL),
	(75,18,16,1,NULL),
	(76,18,18,6,NULL),
	(79,19,1,1,0),
	(82,20,22,2,2),
	(87,20,1,1,0),
	(89,20,21,3,0),
	(90,17,22,1,2),
	(91,20,30,4,3),
	(92,18,22,1,2),
	(93,20,26,1,0);

/*!40000 ALTER TABLE `list_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lists`;

CREATE TABLE `lists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL,
  `user_id` mediumint(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `lists` WRITE;
/*!40000 ALTER TABLE `lists` DISABLE KEYS */;

INSERT INTO `lists` (`id`, `name`, `date_created`, `user_id`)
VALUES
	(17,'Feestje','2012-05-14 02:05:35',2),
	(18,'BBQ','2012-05-23 06:05:02',2),
	(20,'promo','2012-05-24 04:05:36',2);

/*!40000 ALTER TABLE `lists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_amount` decimal(10,2) DEFAULT NULL,
  `barcode` int(20) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT '',
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `name`, `title`, `description`, `price`, `price_amount`, `barcode`, `photo`, `category`)
VALUES
	(1,'Appelen Jonagold','','Los',0.21,1.04,1,'resources/img/products/appelen-jonagold.jpg',1),
	(2,'Groene selder','','',1.09,NULL,0,'resources/img/products/groene-selder.jpg',1),
	(3,'Tomaten Bio-Time','','Onverpakt',0.30,1.99,0,'resources/img/products/tomaten-onverpakt.jpg',1),
	(4,'Braadkip','','± 1,2 kg',2.39,NULL,0,'resources/img/products/braadkip.jpg',3),
	(5,'Cecemel','','chocolademelk (fles) 75 cl',1.10,NULL,2,'resources/img/products/cecemel.jpg',5),
	(16,'Wortelen','','Onverpakt',0.12,0.83,0,'resources/img/products/wortelen-onverpakt.jpg',1),
	(18,'Bloemkool','','',2.34,NULL,0,'resources/img/products/bloemkool.jpg',1),
	(19,'Water Chaudfontaine','','Niet-bruisend natuurlijk mineraalwater',1.11,NULL,0,'resources/img/products/chaudfontaine.jpg',5),
	(20,'Jupiler','','Pils',1.15,NULL,0,'resources/img/products/jupiler.jpg',5),
	(21,'Vers mager spek','','',6.40,NULL,0,'resources/img/products/mager-spek.jpg',2),
	(22,'Biefstuk','','',15.00,NULL,0,'resources/img/products/biefstuk.jpg',2),
	(23,'Brugge jonge kaas','','',1.12,NULL,0,'resources/img/products/brugge-jonge-kaas.jpg',8),
	(24,'Passendale kaas in sneetjes','','',3.20,NULL,0,'resources/img/products/passendale-kaas.jpg',8),
	(25,'Eieren - Medium','','',1.30,NULL,0,'resources/img/products/eieren-medium.jpg',8),
	(26,'Kabeljauwfilet','','',3.51,NULL,0,'resources/img/products/kabeljauwfilet.jpg',4),
	(27,'Zalmfilet met vel','','',15.90,NULL,0,'resources/img/products/zalmfilet.jpg',4),
	(28,'Côte d\'Or melk','','',3.49,NULL,0,'resources/img/products/cote-dor-melk.jpg',6),
	(29,'Lotus speculoos','','',2.85,NULL,0,'resources/img/products/lotus-speculoos.jpg',6),
	(30,'Luikse wafels','','',1.28,NULL,0,'resources/img/products/luikse-wafels.jpg',6);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table promotions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `promotions`;

CREATE TABLE `promotions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `discount` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `promotions` WRITE;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;

INSERT INTO `promotions` (`id`, `product_id`, `date_start`, `date_end`, `discount`)
VALUES
	(1,18,'2012-05-20 00:00:00','2012-05-22 00:00:00',0.20),
	(2,22,'2012-05-20 00:00:00','2012-05-25 00:00:00',0.10),
	(3,30,'2012-05-23 00:00:00','2012-05-25 00:00:00',0.40);

/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`)
VALUES
	('dedd60e380b6cc19967d7ebd8cf2088c','0.0.0.0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_4) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.52 Safari/536.5',1337959706,'a:6:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:13:\"nielsdierickx\";s:5:\"email\";s:23:\"nielsdierickx@gmail.com\";s:7:\"user_id\";s:1:\"2\";s:14:\"old_last_login\";s:10:\"1337879441\";s:7:\"list-id\";s:2:\"17\";}');

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stores
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stores`;

CREATE TABLE `stores` (
  `winkelId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `winkelNaam` varchar(50) NOT NULL,
  `winkelStraat` varchar(50) NOT NULL DEFAULT '',
  `winkelStaatNr` int(11) NOT NULL,
  `winkelPostcode` int(4) NOT NULL,
  `winkelGemeente` varchar(50) NOT NULL DEFAULT '',
  `winkelSluitingsdag(en)` varchar(50) NOT NULL DEFAULT '',
  `winkelOpeningsuur` time NOT NULL,
  `winkelSluitingsuur` time DEFAULT NULL,
  PRIMARY KEY (`winkelId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `total_price` decimal(11,2) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;

INSERT INTO `transactions` (`id`, `product_id`, `promotion_id`, `date`, `amount`, `total_price`, `user_id`)
VALUES
	(1,18,NULL,'2012-05-25 00:00:00',2,4.68,2),
	(2,22,2,'2012-05-25 00:00:00',1,13.50,2),
	(3,22,NULL,'2012-04-25 00:00:00',1,15.00,2);

/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` int(10) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`)
VALUES
	(1,2130706433,'administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,NULL,1268889823,1334359484,1,'Admin','istrator','ADMIN','0'),
	(2,0,'nielsdierickx','9e7a362ca58ade9ee1b7df1f0549640631b8e7a6',NULL,'nielsdierickx@gmail.com',NULL,'89bfd22904becefcfdd018afa175babc2905da3d',NULL,1328140487,1337950173,1,'Niels','Dierickx','Home','000-000-0000'),
	(3,0,'niels@gmail.com','ddf6ae987db3f98ee699e8e3d71936f99c9ffa41',NULL,'niels@gmail.com',NULL,NULL,NULL,1332087635,1334359525,1,NULL,NULL,NULL,NULL),
	(4,0,'1','c4ca4238a0b923820dcc509a6f75849b',NULL,'1@mail.com',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),
	(5,2130706433,'sofie.hendrickx@hotmail.com','39b935c3f5da8e78d232423b10173fd2c4e98a2a',NULL,'sofie.hendrickx@hotmail.com',NULL,NULL,NULL,1334498869,1334561489,1,NULL,NULL,NULL,NULL),
	(6,0,'2','c81e728d9d4c2f636f067f89cc14862c',NULL,'2@mail.com',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,2,2),
	(4,3,2),
	(5,3,2),
	(6,5,2);

/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
