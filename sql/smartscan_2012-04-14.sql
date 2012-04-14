# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.9)
# Database: smartscan
# Generation Time: 2012-04-14 15:36:07 +0000
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
  `description` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `description`, `photo`)
VALUES
	(1,'Groenten en fruit',NULL,'resources/img/categories/vegetables.jpg'),
	(2,'Vleeswaren',NULL,'resources/img/categories/meat.jpg'),
	(3,'Zuivel',NULL,'resources/img/categories/dairy.jpg'),
	(4,'Vis',NULL,'resources/img/categories/fish.jpg'),
	(5,'Dranken',NULL,'resources/img/categories/drinks.jpg');

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
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `lists_detail_lists` (`list_id`),
  KEY `lists_detail_products` (`product_id`),
  CONSTRAINT `lists_detail_lists` FOREIGN KEY (`list_id`) REFERENCES `lists` (`id`),
  CONSTRAINT `lists_detail_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `list_details` WRITE;
/*!40000 ALTER TABLE `list_details` DISABLE KEYS */;

INSERT INTO `list_details` (`id`, `list_id`, `product_id`)
VALUES
	(1,22,1),
	(2,22,2),
	(3,22,3),
	(10,24,2);

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
  KEY `user_id` (`user_id`),
  CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
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
  `description` text NOT NULL,
  `productPrijsStuk` int(11) NOT NULL,
  `productPrijsEenheid` int(11) NOT NULL,
  `productBarcode` int(20) NOT NULL,
  `productFoto` blob,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `name`, `description`, `productPrijsStuk`, `productPrijsEenheid`, `productBarcode`, `productFoto`, `category`)
VALUES
	(1,'Appelen','',0,0,0,NULL,NULL),
	(2,'Bananen','',0,0,0,NULL,NULL),
	(3,'Peren','',0,0,0,NULL,NULL);

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
	('20ce8e07b0ebfeb63461c7a7aa2a8c94','0.0.0.0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_3) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19',1334417404,'a:5:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:13:\"nielsdierickx\";s:5:\"email\";s:23:\"nielsdierickx@gmail.com\";s:7:\"user_id\";s:1:\"2\";s:14:\"old_last_login\";s:10:\"1334359574\";}');

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
	(2,0,'nielsdierickx','9e7a362ca58ade9ee1b7df1f0549640631b8e7a6',NULL,'nielsdierickx@gmail.com',NULL,'89bfd22904becefcfdd018afa175babc2905da3d',NULL,1328140487,1334402480,1,'Niels','Dierickx','Home','000-000-0000'),
	(3,0,'niels@gmail.com','ddf6ae987db3f98ee699e8e3d71936f99c9ffa41',NULL,'niels@gmail.com',NULL,NULL,NULL,1332087635,1334359525,1,NULL,NULL,NULL,NULL);

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
	(5,3,2);

/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
