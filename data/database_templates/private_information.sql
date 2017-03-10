-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 23/01 2013 kl. 12:45:33
-- Serverversion: 5.0.96
-- PHP version: 5.3.3-7+squeeze14
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `private_information`
-- 

CREATE TABLE `private_information` (
  `id` int(11) NOT NULL auto_increment,
  `mobile_phone` varchar(20) collate latin1_german2_ci NOT NULL,
  `home_phone` varchar(20) collate latin1_german2_ci NOT NULL,
  `work_phone` varchar(20) collate latin1_german2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- 
-- Data dump for tabellen `private_information`
-- 

