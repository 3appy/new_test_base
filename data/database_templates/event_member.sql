-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 12/03 2013 kl. 09:04:23
-- Serverversion: 5.1.67
-- PHP version: 5.3.3-7+squeeze15
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `event_member`
-- 

CREATE TABLE `event_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `requested` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- 
-- Data dump for tabellen `event_member`
-- 

