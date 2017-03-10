-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 29/04 2013 kl. 22:03:30
-- Serverversion: 5.1.67
-- PHP version: 5.3.3-7+squeeze15
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `image`
-- 

CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(1) NOT NULL,
  `safety_level` tinyint(4) NOT NULL,
  `owner_group` varchar(1) COLLATE latin1_german2_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE latin1_german2_ci NOT NULL,
  `type` varchar(3) COLLATE latin1_german2_ci NOT NULL,
  `header` varchar(20) COLLATE latin1_german2_ci NOT NULL,
  `text` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `upload_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `size` int(11) NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `clicked` int(11) NOT NULL,
  `small` tinyint(1) NOT NULL,
  `medium` tinyint(1) NOT NULL,
  `article` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- 
-- Data dump for tabellen `image`
-- 

