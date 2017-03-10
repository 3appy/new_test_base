-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 28/12 2013 kl. 20:35:51
-- Serverversion: 5.1.72
-- PHP version: 5.3.3-7+squeeze18
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `control_time_table_item`
-- 

CREATE TABLE `control_time_table_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `start_week` smallint(6) NOT NULL,
  `start_year` int(11) NOT NULL,
  `end_week` smallint(6) NOT NULL,
  `end_year` int(11) NOT NULL,
  `day_number` smallint(6) NOT NULL,
  `time_number` smallint(6) NOT NULL,
  `generated` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- 
-- Data dump for tabellen `control_time_table_item`
-- 

