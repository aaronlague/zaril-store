-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2015 at 04:13 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `tbl_deliveries`
--

INSERT INTO `tbl_deliveries` (`id`, `delivery_id`, `brand_name`, `delivery_status`, `date_created`, `date_accepted`, `details`, `item_code`, `unit_price`, `quantity`, `quantity_received`, `sales_tax_amount`, `total_price`) VALUES
(5, '106226316820150724', 'brand7', 'pending', '2015-07-24 10:24:31', '0000-00-00 00:00:00', 'BBS rims', '0', '8000.00', 4, 0, '240.00', '32240.00'),
(6, '193862363120150725', 'brand7', 'pending', '2015-07-25 09:36:09', '0000-00-00 00:00:00', 'Belt', '0', '0.00', 0, 0, '0.00', '0.00'),
(7, '203448808420150725', 'brand7', 'pending', '2015-07-25 09:36:29', '0000-00-00 00:00:00', '', '0', '0.00', 0, 0, '0.00', '0.00'),
(8, '176688917620150725', 'brand7', 'pending', '2015-07-25 09:37:38', '0000-00-00 00:00:00', '', '0', '0.00', 0, 0, '0.00', '0.00'),
(9, '26239314220150725', 'brand7', 'pending', '2015-07-25 10:06:23', '0000-00-00 00:00:00', '', '0', '0.00', 0, 0, '0.00', '0.00'),
(10, '57516081520150725', 'brand7', 'pending', '2015-07-25 10:06:33', '0000-00-00 00:00:00', '', '0', '0.00', 0, 0, '0.00', '0.00'),
(11, '97105792020150725', 'brand7', 'pending', '2015-07-25 10:07:07', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(12, '173920125220150725', 'brand7', 'pending', '2015-07-25 10:08:55', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(13, '150281604520150725', 'brand7', 'pending', '2015-07-25 10:09:24', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(14, '84683560520150725', 'brand7', 'pending', '2015-07-25 10:15:04', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(15, '130170501720150725', 'brand7', 'pending', '2015-07-25 10:17:20', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(16, '193599238220150725', 'brand7', 'pending', '2015-07-25 10:18:57', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(17, '28245236920150725', 'brand7', 'pending', '2015-07-25 10:25:00', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(18, '19335364520150725', 'brand7', 'pending', '2015-07-25 10:25:16', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(19, '165808288320150725', 'brand7', 'pending', '2015-07-25 10:25:46', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(20, '207360526420150725', 'brand7', 'pending', '2015-07-25 10:35:26', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(21, '51467339520150725', 'brand7', 'pending', '2015-07-25 10:42:53', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(22, '172542973620150725', 'brand7', 'pending', '2015-07-25 10:43:18', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(24, '177532562920150725', 'brand7', 'pending', '2015-07-25 10:49:26', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(25, '177793183520150725', 'brand7', 'pending', '2015-07-25 10:49:35', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(26, '100530638420150725', 'brand7', 'pending', '2015-07-25 10:49:46', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(27, '95138449320150725', 'brand7', 'pending', '2015-07-25 10:50:41', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(28, '181538430720150725', 'brand7', 'pending', '2015-07-25 10:52:32', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(29, '145318313020150725', 'brand7', 'pending', '2015-07-25 10:53:34', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(30, '118131007020150725', 'brand7', 'pending', '2015-07-25 10:55:16', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(31, '40194281420150725', 'brand7', 'pending', '2015-07-25 10:55:55', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(32, '65740332020150725', 'brand7', 'pending', '2015-07-25 10:56:51', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(33, '9202488820150725', 'brand7', 'pending', '2015-07-25 10:57:25', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(34, '50381650120150725', 'brand7', 'pending', '2015-07-25 10:57:53', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(35, '184588227220150725', 'brand7', 'pending', '2015-07-25 10:58:15', '0000-00-00 00:00:00', 'goto', '0', '15.00', 5, 0, '0.45', '75.45'),
(36, '67563806520150725', 'brand7', 'pending', '2015-07-25 11:08:00', '0000-00-00 00:00:00', 'mami', '0', '1.00', 1, 0, '0.03', '1.03'),
(37, '85436409820150725', 'brand7', 'pending', '2015-07-25 11:12:13', '0000-00-00 00:00:00', 'mami', '0', '1.00', 1, 0, '0.03', '1.03'),
(38, '122799390320150725', 'brand7', 'pending', '2015-07-25 11:14:50', '0000-00-00 00:00:00', 'mami', '0', '1.00', 1, 0, '0.03', '1.03'),
(39, '174782232520150725', 'brand7', 'pending', '2015-07-25 11:16:01', '0000-00-00 00:00:00', 'mami', '0', '1.00', 1, 0, '0.03', '1.03'),
(56, '180671574520150725', 'brand7', 'pending', '2015-07-25 16:52:45', '0000-00-00 00:00:00', 'sando ', '0', '600.00', 7, 0, '18.00', '4218.00'),
(54, '587150725211', 'brand6', 'pending', '2015-07-25 08:29:21', '0000-00-00 00:00:00', 'da bomb tora bora', '0', '22000.00', 1, 0, '660.00', '22660.00'),
(55, '154150725070', 'brand6', 'pending', '2015-07-25 08:47:07', '0000-00-00 00:00:00', '', '0', '0.00', 0, 0, '0.00', '0.00'),
(52, '100150725260', 'brand6', 'pending', '2015-07-25 08:28:26', '0000-00-00 00:00:00', 'giant anthem x', '0', '25000.00', 2, 0, '750.00', '50750.00'),
(53, '939150725210', 'brand6', 'pending', '2015-07-25 08:29:21', '0000-00-00 00:00:00', 'giant reign', '0', '30000.00', 2, 0, '900.00', '60900.00'),
(57, '724150725300', 'brand6', 'pending', '2015-07-25 09:08:30', '0000-00-00 00:00:00', 'Hydraulic Seatpost', 'test item', '2500.00', 2, 0, '75.00', '5075.00'),
(58, '740150725260', 'brand6', 'pending', '2015-07-25 11:16:26', '0000-00-00 00:00:00', 'race face atlas', 'test item', '1000.00', 2, 0, '30.00', '2030.00'),
(59, '224150725261', 'brand6', 'pending', '2015-07-25 11:16:26', '0000-00-00 00:00:00', 'truvativ AKA', 'test item', '2500.00', 2, 0, '75.00', '5075.00'),
(60, '210150725000', 'brand6', 'pending', '2015-07-25 19:21:00', '0000-00-00 00:00:00', 'Shimano Saint', 'test item', '5000.00', 3, 0, '150.00', '15150.00'),
(61, '804150725001', 'brand6', 'pending', '2015-07-25 19:21:00', '0000-00-00 00:00:00', 'Shimano alivio', 'test item', '4500.00', 2, 0, '135.00', '9135.00'),
(62, '311150726330', 'brand7', 'pending', '2015-07-26 14:39:33', '0000-00-00 00:00:00', 'bumper', 'test item', '1000.00', 5, 0, '30.00', '5030.00'),
(63, '522150726331', 'brand7', 'pending', '2015-07-26 14:39:33', '0000-00-00 00:00:00', 'fog lamps', 'test item', '5000.00', 10, 0, '150.00', '50150.00'),
(64, '835150726332', 'brand7', 'pending', '2015-07-26 14:39:33', '0000-00-00 00:00:00', 'tail light', 'test item', '3000.00', 10, 0, '90.00', '30090.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_report`
--

CREATE TABLE IF NOT EXISTS `tbl_delivery_report` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `delivery_report_id` varchar(60) NOT NULL,
  `brand_name` varchar(60) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_accepted` datetime NOT NULL,
  PRIMARY KEY (`delivery_report_id`),
  KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `username`, `brand_name`, `password`, `is_admin`, `date_created`) VALUES
(1, 'aaron_lague@yahoo.com', 'aaron', 'brand6', 'always', 0, '2015-07-22 10:15:55'),
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
(39, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, '2015-07-26 16:11:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
