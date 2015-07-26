-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2015 at 06:57 PM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zarilph_zaril_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_delivery_trans`
--

CREATE TABLE IF NOT EXISTS `tbl_admin_delivery_trans` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(100) NOT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `delivery_id` varchar(100) NOT NULL,
  `quantity_received` int(11) DEFAULT NULL,
  `quantity_reported` int(11) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_sales_trans`
--

CREATE TABLE IF NOT EXISTS `tbl_admin_sales_trans` (
  `id` bigint(20) NOT NULL,
  `sales_transaction_id` varchar(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `item_code` varchar(100) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sales_tax_amount` decimal(10,2) NOT NULL,
  `total_sales_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`sales_transaction_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deliveries`
--

CREATE TABLE IF NOT EXISTS `tbl_deliveries` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `delivery_id` varchar(100) NOT NULL,
  `delivery_report_id` varchar(60) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `delivery_status` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_accepted` datetime DEFAULT '0000-00-00 00:00:00',
  `details` text NOT NULL,
  `item_code` varchar(60) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_received` bigint(20) NOT NULL,
  `sales_tax_amount` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`delivery_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_deliveries`
--

INSERT INTO `tbl_deliveries` (`id`, `delivery_id`, `delivery_report_id`, `brand_name`, `delivery_status`, `date_created`, `date_accepted`, `details`, `item_code`, `unit_price`, `quantity`, `quantity_received`, `sales_tax_amount`, `total_price`) VALUES
(1, 'D47115072651', 'DR815072651', 'brand6', 'pending', '2015-07-26 09:37:51', '0000-00-00 00:00:00', 'giant anthem', 'test item', '50000.00', 1, 0, '1500.00', '51500.00'),
(2, 'D26115072651', 'DR815072651', 'brand6', 'pending', '2015-07-26 09:37:51', '0000-00-00 00:00:00', 'giant reign', 'test item', '60000.00', 1, 0, '1800.00', '61800.00'),
(3, 'D7615072625', 'DR3515072625', 'brand6', 'pending', '2015-07-26 18:54:25', '0000-00-00 00:00:00', 'Race Face Atlas', 'test item', '2500.00', 1, 0, '75.00', '2575.00'),
(4, 'D74015072625', 'DR3515072625', 'brand6', 'pending', '2015-07-26 18:54:25', '0000-00-00 00:00:00', 'Truvativ AKA', 'test item', '3000.00', 1, 0, '90.00', '3090.00'),
(5, 'D47815072625', 'DR3515072625', 'brand6', 'pending', '2015-07-26 18:54:25', '0000-00-00 00:00:00', 'Atomic', 'test item', '1500.00', 2, 0, '45.00', '3045.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_report`
--

CREATE TABLE IF NOT EXISTS `tbl_delivery_report` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `delivery_report_id` varchar(60) CHARACTER SET utf8 NOT NULL,
  `brand_name` varchar(60) CHARACTER SET utf8 NOT NULL,
  `delivery_status` varchar(60) CHARACTER SET utf16 NOT NULL,
  `date_created` datetime NOT NULL,
  `date_accepted` datetime NOT NULL,
  PRIMARY KEY (`delivery_report_id`),
  KEY `ID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_delivery_report`
--

INSERT INTO `tbl_delivery_report` (`ID`, `delivery_report_id`, `brand_name`, `delivery_status`, `date_created`, `date_accepted`) VALUES
(1, 'DR3515072625', 'brand6', 'pending', '2015-07-26 18:54:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_trans`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_trans` (
  `id` bigint(20) NOT NULL,
  `sales_transaction_id` varchar(100) NOT NULL,
  `brand_name` varchar(20) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sales_tax_amount` decimal(10,2) NOT NULL,
  `total_sales_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `brand_name` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `username`, `brand_name`, `password`, `is_admin`, `date_created`) VALUES
(1, 'aaron_lague@yahoo.com', 'aaron', 'brand6', '2468', 0, '2015-07-22 10:15:55'),
(2, 'psalm@gmail.com', 'psalm', 'brand7', '123456', 0, '2015-07-22 10:16:40'),
(3, 'aaron.lague@isobar.com', 'aaronallan', 'admin', 'always', 1, '2015-07-22 14:26:49'),
(4, 'xtian@gmail.com', 'xtian', 'dabomb', '123456', 1, '2015-07-22 15:05:18'),
(5, 'psalmp2@gmail.com', 'psalmcute', 'psalmcute', '12345', 1, '2015-07-23 16:29:58'),
(6, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:21:08'),
(7, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:21:48'),
(8, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:22:31'),
(9, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:27:38'),
(10, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:31:45'),
(11, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:32:34'),
(12, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:38:06'),
(13, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:39:28'),
(14, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:42:51'),
(15, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:44:19'),
(16, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:44:38'),
(17, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:45:06'),
(18, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:45:16'),
(19, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:45:52'),
(20, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:46:20'),
(21, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:46:58'),
(22, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:48:24'),
(23, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:49:18'),
(24, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:50:05'),
(25, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:51:34'),
(26, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:52:01'),
(27, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:52:36'),
(28, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:52:52'),
(29, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:52:57'),
(30, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:53:04'),
(31, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:54:49'),
(32, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 15:59:52'),
(33, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 16:01:12'),
(34, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 16:03:38'),
(35, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 16:05:10'),
(36, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 16:06:50'),
(37, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 16:07:24'),
(38, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 16:08:32'),
(39, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 16:11:58'),
(40, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 16:14:15'),
(41, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 16:15:31'),
(42, '', '', '', '', 0, '2015-07-26 17:11:17'),
(43, '', '', '', '', 0, '2015-07-26 17:11:22'),
(44, '', '', '', '', 0, '2015-07-26 17:15:25'),
(45, '', '', '', '', 0, '2015-07-26 17:15:45'),
(46, '', '', '', '', 0, '2015-07-26 17:17:28'),
(47, '', '', '', '', 0, '2015-07-26 17:17:36'),
(48, '', '', '', '', 0, '2015-07-26 17:22:07'),
(49, '', '', '', '', 0, '2015-07-26 17:23:08'),
(50, '', '', '', '', 0, '2015-07-26 17:23:49'),
(51, '', '', '', '', 0, '2015-07-26 17:29:15'),
(52, '', '', '', '', 0, '2015-07-26 17:29:52'),
(53, '', '', '', '', 0, '2015-07-26 17:32:59'),
(54, '', '', '', '', 0, '2015-07-26 17:33:23'),
(55, '', '', '', '', 0, '2015-07-26 17:34:33'),
(56, '', '', '', '', 0, '2015-07-26 17:39:25'),
(57, '', '', '', '', 0, '2015-07-26 17:39:57'),
(58, '', '', '', '', 0, '2015-07-26 17:44:27'),
(59, '', '', '', '', 0, '2015-07-26 17:45:06'),
(60, '', '', '', '', 0, '2015-07-26 17:45:15'),
(61, '', '', '', '', 0, '2015-07-26 17:52:49'),
(62, '', '', '', '', 0, '2015-07-26 17:54:02'),
(63, '', '', '', '', 0, '2015-07-26 17:55:32'),
(64, '', '', '', '', 0, '2015-07-26 18:02:01'),
(65, '', '', '', '', 0, '2015-07-26 18:10:07'),
(66, '', '', '', '', 0, '2015-07-26 18:15:46'),
(67, '', '', '', '', 0, '2015-07-26 18:24:29'),
(68, '', '', '', '', 0, '2015-07-26 18:26:07'),
(69, '', '', '', '', 0, '2015-07-26 18:27:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
