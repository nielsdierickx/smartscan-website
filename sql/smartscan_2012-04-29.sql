# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.9)
# Database: smartscan
# Generation Time: 2012-04-28 23:10:04 +0000
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
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `lists_detail_lists` (`list_id`),
  KEY `lists_detail_products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `list_details` WRITE;
/*!40000 ALTER TABLE `list_details` DISABLE KEYS */;

INSERT INTO `list_details` (`id`, `list_id`, `product_id`, `amount`)
VALUES
	(1,22,1,2),
	(2,22,2,3),
	(3,22,3,1),
	(10,24,2,0),
	(12,31,1,0),
	(13,31,3,0),
	(16,31,2,0),
	(18,32,1,0),
	(19,32,3,0),
	(21,34,1,0),
	(22,22,4,2);

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
	(22,'BBQ','0000-00-00 00:00:00',2),
	(24,'Voor de bomma','0000-00-00 00:00:00',2),
	(25,'Jeroen Meus etentje','0000-00-00 00:00:00',2),
	(26,'Maandag','0000-00-00 00:00:00',3),
	(27,'Ronde van Vlaanderen','0000-00-00 00:00:00',2),
	(28,'Verjaardag','0000-00-00 00:00:00',2);

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
	(5,'Cecemel','','chocolademelk (fles) 75 cl',0.00,1.00,2,'0',5),
	(6,'Poco Loco','','8 Mexicaanse tortilla\'s 320 g',8.00,2.00,6,'0',2147483647),
	(7,'Everyday','','Atlantische zalmfilets 2x125 g',2.00,3.00,12,'0',4),
	(8,'PEANUTS ','','jumbo geroosterd 250 g',0.00,1.00,4,'0',2147483647),
	(9,'MILKA','','eitjes melk praliné hele noot 1kg',0.00,12.00,12,'0',2147483647),
	(10,'STELLA ARTOIS','','(bak) 24 x 25 cl',0.00,9.00,2,'0',5),
	(11,'ENERGIZER','','alkalinebatt. Ultra+ AAA 4 st.',0.00,5.00,5,'0',2147483647),
	(12,'PAMPERS','','New Baby Newborn 1 2-5kg 80stuks',0.00,14.00,0,'0',2147483647),
	(13,'PEDIGREE','','Adult Mini 5 soorten vlees 2 kg',0.00,6.00,3,'0',2147483647),
	(14,'PALMOLIVE','','Naturals olijf/kers 250ml',0.00,2.00,6,'0',2147483647),
	(15,'LU BELVITA','','Délices sinaas-choco 135 g',0.00,2.00,12,'0',2147483647),
	(16,'Wortelen','','Onverpakt',0.12,0.83,0,'resources/img/products/wortelen-onverpakt.jpg',1),
	(18,'Bloemkool','','',2.34,NULL,0,'resources/img/products/bloemkool.jpg',1);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
	('365ab99781a2493abd5f118c196182b5','0.0.0.0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_3) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.165 Safari/535.19',1335654159,'a:5:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:13:\"nielsdierickx\";s:5:\"email\";s:23:\"nielsdierickx@gmail.com\";s:7:\"user_id\";s:1:\"2\";s:14:\"old_last_login\";s:10:\"1335617377\";}');

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
	(2,0,'nielsdierickx','9e7a362ca58ade9ee1b7df1f0549640631b8e7a6',NULL,'nielsdierickx@gmail.com',NULL,'89bfd22904becefcfdd018afa175babc2905da3d',NULL,1328140487,1335650935,1,'Niels','Dierickx','Home','000-000-0000'),
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
