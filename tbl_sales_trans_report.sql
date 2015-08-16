-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2015 at 05:02 AM
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
-- Table structure for table `tbl_sales_trans_report`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_trans_report` (
  `id` bigint(20) NOT NULL auto_increment,
  `sales_transaction_id` varchar(60) character set utf8 NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `sales_tax_total` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `amount_given` decimal(10,2) NOT NULL,
  `change_amount` decimal(10,2) NOT NULL,
  `transaction_date` datetime NOT NULL,
  PRIMARY KEY  (`sales_transaction_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_sales_trans_report`
--

INSERT INTO `tbl_sales_trans_report` (`id`, `sales_transaction_id`, `subtotal`, `sales_tax_total`, `total_amount`, `amount_given`, `change_amount`, `transaction_date`) VALUES
(2, 'ST4915081647', 140000.00, 4200.00, 144200.00, 150000.00, 5800.00, '2015-08-16 04:20:47'),
(3, 'ST9315081618', 50000.00, 1500.00, 51500.00, 60000.00, 8500.00, '2015-08-16 04:34:18'),
(4, 'ST8915081610', 140800.00, 4224.00, 145024.00, 146000.00, 976.00, '2015-08-16 04:41:10');
