-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 23/01 2013 kl. 12:43:29
-- Serverversion: 5.0.96
-- PHP version: 5.3.3-7+squeeze14
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `address`
-- 

CREATE TABLE `address` (
  `id` int(11) NOT NULL auto_increment,
  `city_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `street_name` varchar(30) collate latin1_german2_ci NOT NULL,
  `house_number` varchar(10) collate latin1_german2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- 
-- Data dump for tabellen `address`
-- 

