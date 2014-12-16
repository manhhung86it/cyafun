-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.16


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema ci_cyafun
--

CREATE DATABASE IF NOT EXISTS ci_cyafun;
USE ci_cyafun;

--
-- Definition of table `ad_groups`
--

DROP TABLE IF EXISTS `ad_groups`;
CREATE TABLE `ad_groups` (
  `adg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adg_name` varchar(45) NOT NULL,
  `adg_order` int(10) unsigned NOT NULL DEFAULT '0',
  `adg_permissions` text NOT NULL,
  `adg_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0: disable, 1 active',
  `adg_date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`adg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_groups`
--

/*!40000 ALTER TABLE `ad_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `ad_groups` ENABLE KEYS */;


--
-- Definition of table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `ad_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_username` varchar(45) NOT NULL,
  `ad_password` varchar(45) NOT NULL,
  `ad_fullname` varchar(45) DEFAULT NULL,
  `ad_group` int(10) unsigned NOT NULL,
  `ad_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0: disable, 1: active',
  `ad_email` varchar(45) NOT NULL,
  `ad_date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `us_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `us_email` varchar(100) NOT NULL,
  `us_username` varchar(45) NOT NULL,
  `us_password` varchar(45) NOT NULL,
  `us_balance` double NOT NULL DEFAULT '0',
  `us_avatar` varchar(45) DEFAULT NULL,
  `us_name_display` varchar(20) NOT NULL,
  `us_fullname` varchar(45) DEFAULT NULL,
  `us_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0: disabled, 1: active, 2: wait active',
  `us_key` varchar(255) DEFAULT NULL COMMENT 'key dung cho active hoac lay lai mat khau',
  `us_date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
