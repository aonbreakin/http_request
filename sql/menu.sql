-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 12, 2021 at 03:53 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `sunvending`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `menu`
-- 

CREATE TABLE `menu` (
  `name` varchar(20) collate tis620_bin NOT NULL,
  `type` varchar(20) collate tis620_bin NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY  (`name`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 COLLATE=tis620_bin;

-- 
-- Dumping data for table `menu`
-- 

INSERT INTO `menu` VALUES (0x54686169, 0x49636564, 55);
INSERT INTO `menu` VALUES (0x416d65726963616e6f, 0x486f74, 50);
INSERT INTO `menu` VALUES (0x416d65726963616e6f, 0x49636564, 55);
INSERT INTO `menu` VALUES (0x4c61747465, 0x486f74, 60);
INSERT INTO `menu` VALUES (0x4c61747465, 0x49636564, 65);
INSERT INTO `menu` VALUES (0x4d6f636861, 0x486f74, 65);
INSERT INTO `menu` VALUES (0x4d6f636861, 0x49636564, 70);
INSERT INTO `menu` VALUES (0x477265656e546561, 0x486f74, 65);
INSERT INTO `menu` VALUES (0x477265656e546561, 0x49636564, 70);
INSERT INTO `menu` VALUES (0x436f636f61, 0x486f74, 60);
INSERT INTO `menu` VALUES (0x436f636f61, 0x49636564, 65);
INSERT INTO `menu` VALUES (0x4d6174636861, 0x486f74, 55);
INSERT INTO `menu` VALUES (0x4d6174636861, 0x49636564, 60);
INSERT INTO `menu` VALUES (0x54686169, 0x486f74, 50);
INSERT INTO `menu` VALUES (0x4c656d6f6e, 0x49636564, 40);
INSERT INTO `menu` VALUES (0x4c656d6f6e, 0x486f74, 50);
INSERT INTO `menu` VALUES (0x5461726f, 0x49636564, 55);
INSERT INTO `menu` VALUES (0x5461726f, 0x486f74, 50);
