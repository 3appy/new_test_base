-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 30/05 2013 kl. 09:41:01
-- Serverversion: 5.1.67
-- PHP version: 5.3.3-7+squeeze15
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `team`
-- 

CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE latin1_german2_ci NOT NULL,
  `year` smallint(6) NOT NULL,
  `month` smallint(6) NOT NULL,
  `day` smallint(6) NOT NULL,
  `image_id` int(11) NOT NULL,
  `private_information_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=16 ;

-- 
-- Data dump for tabellen `team`
-- 

INSERT INTO `team` VALUES (11, 0, 0, 'Familie SchrÃ¶der', 2005, 5, 4, 0, 0);
INSERT INTO `team` VALUES (14, 0, 0, 'The chainless bike', 2005, 5, 4, 0, 0);
INSERT INTO `team` VALUES (13, 0, 0, 'Geestbogen', 2005, 5, 4, 0, 0);
INSERT INTO `team` VALUES (12, 0, 0, 'Der wahre Kreisel', 2005, 5, 4, 0, 0);
INSERT INTO `team` VALUES (15, 0, 0, 'Ein test', 2005, 5, 4, 0, 0);
