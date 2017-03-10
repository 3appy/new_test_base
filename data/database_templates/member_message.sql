-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 06/03 2013 kl. 09:40:22
-- Serverversion: 5.1.67
-- PHP version: 5.3.3-7+squeeze14
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `member_message`
-- 

CREATE TABLE `member_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `written_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reader_id` int(11) NOT NULL,
  `read_stamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `text` text COLLATE latin1_german2_ci NOT NULL,
  `ref_link` varchar(30) COLLATE latin1_german2_ci NOT NULL,
  `header` varchar(30) COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=38 ;

-- 
-- Data dump for tabellen `member_message`
-- 

