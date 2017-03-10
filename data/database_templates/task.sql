-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 05/01 2014 kl. 16:38:41
-- Serverversion: 5.1.72
-- PHP version: 5.3.3-7+squeeze18
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `task`
-- 

CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `est_duration` smallint(6) NOT NULL,
  `real_duration` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `task_description` text COLLATE latin1_german2_ci NOT NULL,
  `author_comment` text COLLATE latin1_german2_ci NOT NULL,
  `receiver_comment` text COLLATE latin1_german2_ci NOT NULL,
  `start_time_table_item_id` int(11) NOT NULL,
  `end_time_table_item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- 
-- Data dump for tabellen `task`
-- 

