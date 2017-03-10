-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 13/05 2013 kl. 20:42:00
-- Serverversion: 5.1.67
-- PHP version: 5.3.3-7+squeeze15
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `event_article`
-- 

CREATE TABLE `event_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(1) NOT NULL,
  `safety_level` tinyint(4) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `written_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `header` varchar(40) COLLATE latin1_german2_ci NOT NULL,
  `text` text COLLATE latin1_german2_ci NOT NULL,
  `image_id` int(11) NOT NULL,
  `ref_link` varchar(40) COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- 
-- Data dump for tabellen `event_article`
-- 

