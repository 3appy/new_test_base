-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 06/02 2014 kl. 14:38:13
-- Serverversion: 5.1.73
-- PHP version: 5.3.3-7+squeeze18
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `event`
-- 

CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE latin1_german2_ci NOT NULL,
  `year` smallint(6) NOT NULL,
  `month` smallint(6) NOT NULL,
  `day` smallint(6) NOT NULL,
  `image_id` int(11) NOT NULL,
  `private_information_id` int(11) NOT NULL,
  `max_value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=26 ;

-- 
-- Data dump for tabellen `event`
-- 

INSERT INTO `event` VALUES (21, 178, 0, 'TPT-L', 2014, 1, 9, 0, 0, 0);
INSERT INTO `event` VALUES (22, 180, 36, 'test event', 2014, 1, 12, 0, 36, 200);
INSERT INTO `event` VALUES (23, 178, 0, 'LÃ¸vebrÃ¸l', 2014, 1, 13, 0, 0, 0);
INSERT INTO `event` VALUES (24, 178, 0, 'Korpsturnering 2014', 2014, 1, 13, 0, 0, 0);
INSERT INTO `event` VALUES (25, 180, 39, 'blabla', 2014, 3, 22, 262, 39, 1100);
