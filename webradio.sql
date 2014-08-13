-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: ASGARDS    Database: webradio
-- ------------------------------------------------------
-- Server version	5.5.38-0+wheezy1

--
-- Table structure for table `radios`
--

DROP TABLE IF EXISTS `radios`;
CREATE TABLE `radios` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `short_desc` varchar(150) NOT NULL,
  `long_desc` text,
  `url` varchar(50) NOT NULL,
  `radio_mountpoint` varchar(100) NOT NULL,
  `img_filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(4) DEFAULT NULL,
  `creation_ts` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dump completed on 2014-08-13 11:57:20
