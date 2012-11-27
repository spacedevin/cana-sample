# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.25)
# Database: cana-sample
# Generation Time: 2012-11-27 18:18:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table sampleobject
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sampleobject`;

CREATE TABLE `sampleobject` (
  `id_sampleobject` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_sampleobject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sampleobject` WRITE;
/*!40000 ALTER TABLE `sampleobject` DISABLE KEYS */;

INSERT INTO `sampleobject` (`id_sampleobject`, `name`)
VALUES
	(1,'Sample');

/*!40000 ALTER TABLE `sampleobject` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sampleobject_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sampleobject_item`;

CREATE TABLE `sampleobject_item` (
  `id_sampleobject_item` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_sampleobject` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_sampleobject_item`),
  KEY `id_sampleobject` (`id_sampleobject`),
  CONSTRAINT `sampleobject_item_ibfk_1` FOREIGN KEY (`id_sampleobject`) REFERENCES `sampleobject` (`id_sampleobject`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sampleobject_item` WRITE;
/*!40000 ALTER TABLE `sampleobject_item` DISABLE KEYS */;

INSERT INTO `sampleobject_item` (`id_sampleobject_item`, `id_sampleobject`, `name`)
VALUES
	(1,1,'First'),
	(4,1,'Second');

/*!40000 ALTER TABLE `sampleobject_item` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
