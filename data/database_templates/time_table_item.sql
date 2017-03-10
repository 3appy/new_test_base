-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 26/12 2013 kl. 20:42:13
-- Serverversion: 5.1.72
-- PHP version: 5.3.3-7+squeeze18
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `time_table_item`
-- 

CREATE TABLE `time_table_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `control_time_table_item_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `time_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- 
-- Data dump for tabellen `time_table_item`
-- 

