-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 14/12 2012 kl. 23:11:22
-- Serverversion: 5.0.96
-- PHP version: 5.3.3-7+squeeze14
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `member`
-- 

CREATE TABLE `member` (
  `id` int(11) NOT NULL auto_increment,
  `address_id` int(11) NOT NULL,
  `name` varchar(30) collate latin1_german2_ci NOT NULL,
  `year` tinyint(6) NOT NULL,
  `month` tinyint(4) NOT NULL,
  `day` tinyint(4) NOT NULL,
  `picture_link` varchar(40) collate latin1_german2_ci NOT NULL,
  `forename` varchar(30) collate latin1_german2_ci NOT NULL,
  `password` varchar(40) collate latin1_german2_ci NOT NULL,
  `mail_address` varchar(40) collate latin1_german2_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `last_activity` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `private_information_id` int(11) NOT NULL,
  `language` varchar(4) collate latin1_german2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- 
-- Data dump for tabellen `member`
-- 

