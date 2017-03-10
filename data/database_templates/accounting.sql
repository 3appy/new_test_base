-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 06/02 2014 kl. 14:06:05
-- Serverversion: 5.1.73
-- PHP version: 5.3.3-7+squeeze18
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `accounting`
-- 

CREATE TABLE `accounting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accounting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `firma` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `reference` tinyint(4) NOT NULL,
  `description` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `revenue` int(11) NOT NULL,
  `expenses` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=13 ;

-- 
-- Data dump for tabellen `accounting`
-- 

INSERT INTO `accounting` VALUES (1, '0000-00-00 00:00:00', 22, 0, 'citty', 3, 'Ein Kottlett', 7, 0, 0);
INSERT INTO `accounting` VALUES (2, '0000-00-00 00:00:00', 22, 0, 'None', 1, '500 km', 25, 0, 0);
INSERT INTO `accounting` VALUES (3, '0000-00-00 00:00:00', 22, 0, 'tes', 5, 'Hdudhfhdjdhfh', 214, 0, 0);
INSERT INTO `accounting` VALUES (4, '0000-00-00 00:00:00', 22, 0, 'dfdffd', 4, 'kjaskld fjaskldf jaskldf jasdklf ', 86, 0, 0);
INSERT INTO `accounting` VALUES (5, '2014-01-19 22:20:21', 25, 22, 'ddddd', 5, 'vsfasdfsd', 10, 20, 0);
INSERT INTO `accounting` VALUES (6, '2014-01-21 10:54:52', 25, 22, 'dfsdfsdf', 1, 'sdfsdfdf', 23, 23, 0);
INSERT INTO `accounting` VALUES (7, '2014-01-21 12:00:30', 25, 22, 'qwe', 2, 'asd', 1, 2, 0);
INSERT INTO `accounting` VALUES (8, '2014-01-21 12:00:43', 25, 22, 'asdf', 2, 'asdfasdf', 3, 2, 0);
INSERT INTO `accounting` VALUES (9, '2014-01-21 12:06:30', 25, 22, 'sdf', 3, 'sdf', 0, 0, 0);
INSERT INTO `accounting` VALUES (10, '2014-01-21 12:17:23', 25, 22, 'sdfgsdf', 4, 'sdfgsdfg', 0, 67, 0);
INSERT INTO `accounting` VALUES (11, '2014-01-23 16:19:10', 25, 22, 'Jjjj', 3, 'Hhhh', 0, 37, 0);
INSERT INTO `accounting` VALUES (12, '2014-01-24 20:02:32', 25, 22, 'Hffvgh', 3, 'Fghjj', 0, 1, 0);
