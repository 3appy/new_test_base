-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Vært: db427163562.db.1and1.com
-- Genereringstid: 10/01 2013 kl. 10:46:42
-- Serverversion: 5.0.96
-- PHP version: 5.3.3-7+squeeze14
-- 
-- Database: `db427163562`
-- 

-- --------------------------------------------------------

-- 
-- Struktur-dump for tabellen `member_friend`
-- 

CREATE TABLE `member_friend` (
  `id` int(11) NOT NULL auto_increment,
  `member_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `requested` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- 
-- Data dump for tabellen `member_friend`
-- 

