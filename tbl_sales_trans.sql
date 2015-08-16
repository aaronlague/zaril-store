-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2015 at 05:09 AM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zarilph_zaril_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_trans`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_trans` (
  `id` bigint(20) NOT NULL auto_increment,
  `sales_transaction_item_id` varchar(100) NOT NULL,
  `sales_transaction_id` varchar(100) NOT NULL,
  `brand_name` varchar(20) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sales_tax_amount` decimal(10,2) NOT NULL,
  `total_sales_price` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`sales_transaction_item_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_sales_trans`
--

