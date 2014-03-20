-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2014 at 09:46 AM
-- Server version: 5.6.15
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dagal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(128) COLLATE utf32_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_name` (`category_name`),
  UNIQUE KEY `categories_category_name_unique` (`category_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Paint', '2014-01-18 19:28:49', '2014-01-18 19:28:49'),
(3, 'Electric equipments', '2014-01-19 04:34:36', '2014-01-19 04:34:36'),
(4, 'Plywood', '2014-01-19 04:36:48', '2014-01-19 04:36:48'),
(5, 'Glass and Mirrors', '2014-01-19 16:20:56', '2014-01-19 16:20:56'),
(6, 'Nets', '2014-01-20 03:40:16', '2014-01-20 03:40:16'),
(7, 'Batteries', '2014-01-20 04:37:38', '2014-01-20 04:37:38'),
(8, 'Cements', '2014-01-20 06:16:52', '2014-01-20 06:16:52'),
(9, 'Wallpaper', '2014-01-20 08:40:58', '2014-01-20 08:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf32_unicode_ci DEFAULT NULL,
  `owed` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `owed`, `created_at`, `updated_at`) VALUES
(1, 'CASH', 'cash', '0000000000', '100.00', '2014-01-19 18:03:33', '2014-02-10 12:06:45'),
(2, 'Mangzalian Suante', 'Churachandpur', '8983948392', '0.00', '2014-01-17 15:21:02', '2014-01-17 15:21:02'),
(3, 'Remtluangi', 'Chennai', '98783949', '3488.00', '2014-01-17 15:25:03', '2014-01-17 15:25:03'),
(4, 'Mawitea', 'Durtlang', '9829834829', '92310.00', '2014-01-17 15:30:57', '2014-01-21 05:57:04'),
(5, 'Rohluna', 'Aizawl', '9829384758', '0.00', '2014-01-17 15:31:09', '2014-01-17 15:31:09'),
(6, 'Denise', 'Khatla', '8765782933', '1000.00', '2014-01-17 15:31:27', '2014-02-01 10:21:00'),
(7, 'Hmangaiha', 'Leitan', '9827384923', '1900.00', '2014-01-17 15:31:39', '2014-01-28 07:42:11'),
(8, 'Damhauha', 'Upper Kanan', '1928374628', '0.00', '2014-01-17 15:31:54', '2014-01-17 15:31:54'),
(9, 'Thanhliri', 'Vaivakawn', '8728378199', '0.00', '2014-01-17 15:32:45', '2014-01-17 15:32:45'),
(10, 'Mangchhuana', 'Dampa', '9836478293', '1230.44', '2014-01-17 15:32:58', '2014-01-21 05:57:40'),
(11, 'Robert Romawia', 'ATC', '8722662738', '0.00', '2014-01-17 15:33:10', '2014-01-17 15:33:10'),
(12, 'Jonathan K Ralte', 'Kawrthindeng, Samuang Road', '0388-2837467', '23488.00', '2014-01-19 12:34:53', '2014-01-19 12:34:53'),
(13, 'Zorempuia Chuahuang', 'Chaltlang slum area', '9872837494', '2040.00', '2014-01-19 16:43:56', '2014-01-27 08:05:57'),
(14, 'Lalrinthanga Hauhnar', 'Durtlang', '9465658277', '0.00', '2014-01-17 15:09:18', '2014-01-17 15:09:18'),
(15, 'Gosa Ramdinmawia', 'Chawnpui', '9889283749', '1800.00', '2014-01-20 04:37:05', '2014-02-09 11:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `dailypurchases`
--

CREATE TABLE IF NOT EXISTS `dailypurchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` text COLLATE utf32_unicode_ci NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_rate` decimal(6,2) NOT NULL,
  `total_paid` decimal(7,2) NOT NULL,
  `total_credit` decimal(7,2) NOT NULL,
  `total_cost` decimal(7,2) NOT NULL,
  `supplier_name` text COLLATE utf32_unicode_ci NOT NULL,
  `purchase_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dailypurchases`
--

INSERT INTO `dailypurchases` (`id`, `item_name`, `item_qty`, `item_rate`, `total_paid`, `total_credit`, `total_cost`, `supplier_name`, `purchase_date`, `created_at`, `updated_at`) VALUES
(1, 'Red paint 1 ltrs', 100, '23.00', '2300.00', '0.00', '2300.00', 'Zakamlova Hardware Store', '2014-02-25 00:00:00', '2014-02-25 00:00:00', '2014-02-25 00:00:00'),
(2, 'Mirror 3x3', 20, '100.00', '1000.00', '1000.00', '2000.00', 'Aizawl Glass House', '2014-02-25 00:00:00', '2014-02-25 00:00:00', '2014-02-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dailysales`
--

CREATE TABLE IF NOT EXISTS `dailysales` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_name` text COLLATE utf32_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `credit` decimal(8,2) DEFAULT '0.00',
  `paid` decimal(8,2) DEFAULT '0.00',
  `repayment` decimal(8,2) DEFAULT '0.00',
  `sale_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dailysales`
--

INSERT INTO `dailysales` (`id`, `item_name`, `quantity`, `credit`, `paid`, `repayment`, `sale_date`, `created_at`, `updated_at`) VALUES
(1, 'Duraply 80mm', 10, '0.00', '1000.00', '0.00', '2014-02-25', '2014-02-25 00:00:00', '2014-02-25 00:00:00'),
(2, 'Red Paint 1 ltrs', 20, '0.00', '2000.00', '0.00', '2014-02-25', '2014-02-25 00:00:00', '2014-02-25 00:00:00'),
(3, 'Plastic net 5mtrs', 12, '0.00', '1200.00', '0.00', '2014-02-25', '2014-02-25 00:00:00', '2014-02-25 00:00:00'),
(4, 'Plastic net 5mtrs', 13, '0.00', '1300.00', '0.00', '2014-02-25', '2014-02-25 00:00:00', '2014-02-25 00:00:00'),
(5, 'Red Paint 1 ltrs', 11, '0.00', '1100.00', '0.00', '2014-02-25', '2014-02-25 00:00:00', '2014-02-25 00:00:00'),
(6, 'Red Paint 1ltrs', 10, '1700.00', '300.00', '0.00', '2014-02-25', '2014-02-25 00:00:00', '2014-02-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_migrations`
--

CREATE TABLE IF NOT EXISTS `laravel_migrations` (
  `bundle` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `laravel_migrations`
--

INSERT INTO `laravel_migrations` (`bundle`, `name`, `batch`) VALUES
('application', '2014_01_17_115220_create_users_table', 1),
('application', '2014_01_17_121737_create_customers_table', 2),
('application', '2014_01_17_150707_change_phonenumber_to_bigint_on_customers_table', 3),
('application', '2014_01_18_181952_create_categories_table', 3),
('application', '2014_01_18_183546_add_timestamps_to_categories_table', 4),
('application', '2014_01_18_190235_make_category_name_unique_on_categories_table', 5),
('application', '2014_01_19_122443_add_credit_and_debit_amount_to_suppliers_table', 6),
('application', '2014_01_19_145554_create_stocks_table', 7),
('application', '2014_01_02_101820_create_dailypurchases_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `customer_name` text COLLATE utf32_unicode_ci,
  `item1` text COLLATE utf32_unicode_ci,
  `item1_qty` int(11) DEFAULT '0',
  `item1_rate` decimal(6,2) DEFAULT '0.00',
  `item2` text COLLATE utf32_unicode_ci,
  `item2_qty` int(11) DEFAULT '0',
  `item2_rate` decimal(6,2) DEFAULT '0.00',
  `item3` text COLLATE utf32_unicode_ci,
  `item3_qty` int(11) DEFAULT '0',
  `item3_rate` decimal(6,2) DEFAULT '0.00',
  `item4` text COLLATE utf32_unicode_ci,
  `item4_qty` int(11) DEFAULT '0',
  `item4_rate` decimal(6,2) DEFAULT '0.00',
  `item5` text COLLATE utf32_unicode_ci,
  `item5_qty` int(11) DEFAULT '0',
  `item5_rate` decimal(6,2) DEFAULT '0.00',
  `item6` text COLLATE utf32_unicode_ci,
  `item6_qty` int(11) DEFAULT '0',
  `item6_rate` decimal(6,2) DEFAULT '0.00',
  `item7` text COLLATE utf32_unicode_ci,
  `item7_qty` int(11) DEFAULT '0',
  `item7_rate` decimal(6,2) DEFAULT '0.00',
  `item8` text COLLATE utf32_unicode_ci,
  `item8_qty` int(11) DEFAULT '0',
  `item8_rate` decimal(6,2) DEFAULT '0.00',
  `item9` text COLLATE utf32_unicode_ci,
  `item9_qty` int(11) DEFAULT '0',
  `item9_rate` decimal(6,2) DEFAULT '0.00',
  `item10` text COLLATE utf32_unicode_ci,
  `item10_qty` int(11) DEFAULT '0',
  `item10_rate` decimal(6,2) DEFAULT '0.00',
  `item11` text COLLATE utf32_unicode_ci,
  `item11_qty` int(11) DEFAULT '0',
  `item11_rate` decimal(6,2) DEFAULT '0.00',
  `item12` text COLLATE utf32_unicode_ci,
  `item12_qty` int(11) DEFAULT '0',
  `item12_rate` decimal(6,2) DEFAULT '0.00',
  `item13` text COLLATE utf32_unicode_ci,
  `item13_qty` int(11) DEFAULT '0',
  `item13_rate` decimal(6,2) DEFAULT '0.00',
  `item14` text COLLATE utf32_unicode_ci,
  `item14_qty` int(11) DEFAULT '0',
  `item14_rate` decimal(6,2) DEFAULT '0.00',
  `item15` text COLLATE utf32_unicode_ci,
  `item15_qty` int(11) DEFAULT '0',
  `item15_rate` decimal(6,2) DEFAULT '0.00',
  `item16` text COLLATE utf32_unicode_ci,
  `item16_qty` int(11) DEFAULT '0',
  `item16_rate` decimal(6,2) DEFAULT '0.00',
  `item17` text COLLATE utf32_unicode_ci,
  `item17_qty` int(11) DEFAULT '0',
  `item17_rate` decimal(6,2) DEFAULT '0.00',
  `item18` text COLLATE utf32_unicode_ci,
  `item18_qty` int(11) DEFAULT '0',
  `item18_rate` decimal(6,2) DEFAULT '0.00',
  `item19` text COLLATE utf32_unicode_ci,
  `item19_qty` int(11) DEFAULT '0',
  `item19_rate` decimal(6,2) DEFAULT '0.00',
  `item20` text COLLATE utf32_unicode_ci,
  `item20_qty` int(11) DEFAULT '0',
  `item20_rate` decimal(6,2) DEFAULT '0.00',
  `item21` text COLLATE utf32_unicode_ci,
  `item21_qty` int(11) DEFAULT '0',
  `item21_rate` decimal(6,2) DEFAULT '0.00',
  `total_cost` decimal(6,2) DEFAULT '0.00',
  `total_paid` decimal(6,2) DEFAULT '0.00',
  `discount` decimal(6,2) DEFAULT '0.00',
  `credit` decimal(6,2) DEFAULT '0.00',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `customer_name`, `item1`, `item1_qty`, `item1_rate`, `item2`, `item2_qty`, `item2_rate`, `item3`, `item3_qty`, `item3_rate`, `item4`, `item4_qty`, `item4_rate`, `item5`, `item5_qty`, `item5_rate`, `item6`, `item6_qty`, `item6_rate`, `item7`, `item7_qty`, `item7_rate`, `item8`, `item8_qty`, `item8_rate`, `item9`, `item9_qty`, `item9_rate`, `item10`, `item10_qty`, `item10_rate`, `item11`, `item11_qty`, `item11_rate`, `item12`, `item12_qty`, `item12_rate`, `item13`, `item13_qty`, `item13_rate`, `item14`, `item14_qty`, `item14_rate`, `item15`, `item15_qty`, `item15_rate`, `item16`, `item16_qty`, `item16_rate`, `item17`, `item17_qty`, `item17_rate`, `item18`, `item18_qty`, `item18_rate`, `item19`, `item19_qty`, `item19_rate`, `item20`, `item20_qty`, `item20_rate`, `item21`, `item21_qty`, `item21_rate`, `total_cost`, `total_paid`, `discount`, `credit`, `created_at`, `updated_at`) VALUES
(1, 2, 'Mangzalian Suante', 'Duraply 80mm', 10, '100.00', 'Black Paint 1 liter', 10, '10.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '1100.00', '0.00', '0.00', '0.00', '2014-01-27 13:28:33', '2014-01-27 13:28:33'),
(2, 7, 'Denise', 'Duraply 80mm', 10, '100.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '990.00', '990.00', '0.00', '10.00', '2014-01-28 07:41:07', '2014-01-28 07:41:07'),
(3, 7, 'Mawitea', 'Plastic net 5mts', 10, '200.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '2000.00', '1980.00', '0.00', '20.00', '2014-01-28 07:42:11', '2014-01-28 07:42:11'),
(4, 6, 'Denise', 'Black Paint 1 liter', 21, '100.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '2100.00', '1100.00', '0.00', '1000.00', '2014-02-01 10:21:00', '2014-02-01 10:21:00'),
(5, 15, 'Gosa Ramdinmawia', 'Black Paint 1 liter', 10, '100.00', 'Stained Glass 6x3', 2, '400.00', 'Wallpaper floral', 1, '1000.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '2800.00', '1000.00', '100.00', '1700.00', '2014-02-09 11:46:07', '2014-02-09 11:46:07'),
(6, 15, 'Gosa Ramdinmawia', 'Plastic net 5mts', 5, '100.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '500.00', '500.00', '0.00', '0.00', '2014-02-09 13:08:50', '2014-02-09 13:08:50'),
(7, 15, 'Gosa Ramdinmawia', 'Plastic net 5mts', 6, '100.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '600.00', '600.00', '0.00', '0.00', '2014-02-09 13:12:22', '2014-02-09 13:12:22'),
(8, 3, 'Remtluangi', 'Plastic net 5mts', 5, '100.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '500.00', '500.00', '0.00', '0.00', '2014-02-09 13:14:29', '2014-02-09 13:14:29'),
(9, 2, 'Mangzalian Suante', 'Battery 9 V', 10, '10.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '100.00', '100.00', '0.00', '0.00', '2014-02-09 13:25:57', '2014-02-09 13:25:57'),
(10, 1, 'CASH', 'Battery 9 V', 5, '100.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '0', 0, '0.00', '500.00', '400.00', '0.00', '100.00', '2014-02-10 12:06:45', '2014-02-10 12:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` text COLLATE utf32_unicode_ci NOT NULL,
  `brand` text COLLATE utf32_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` decimal(8,2) DEFAULT NULL,
  `threshold` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `sp` decimal(8,2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `item_name`, `brand`, `supplier_id`, `category_id`, `quantity`, `rate`, `threshold`, `userid`, `sp`, `created_at`, `updated_at`) VALUES
(2, 'White Distemper 1 liter', 'Dulux', 3, 1, 3, '202.00', 5, 1, '250.00', '2014-01-19 15:31:55', '2014-01-19 15:31:55'),
(3, 'Mirror 6x2', 'Nilkamal', 2, 5, 10, '300.00', 1, 1, '350.00', '2014-01-19 16:21:39', '2014-01-19 16:21:39'),
(4, 'Duraply 80mm', 'Duraply', 1, 4, 3, '2000.00', 1, 1, '2500.00', '2014-01-19 16:38:19', '2014-01-19 16:38:19'),
(5, 'Mirror 3x3', 'Rajus', 2, 5, 10, '100.00', 1, 1, '120.00', '2014-01-19 17:23:33', '2014-01-19 17:23:33'),
(6, 'Plastic net 5mts', 'Nilkamal', 1, 1, 5, '1000.00', 1, 1, '1200.00', '2014-01-20 03:41:27', '2014-01-20 03:41:27'),
(7, 'Battery 9 V', 'Nippon', 1, 7, 15, '10.00', 1, 1, '12.00', '2014-01-20 04:40:14', '2014-01-20 04:40:14'),
(8, 'Red paint 1 ltrs', 'Dulux', 3, 1, 10, '300.00', 1, 1, '350.00', '2014-01-20 04:41:01', '2014-01-20 04:41:01'),
(9, 'Black Paint 1 liter', 'Dulux', 3, 1, 10, '200.00', 1, 2, '250.00', '2014-01-20 05:01:58', '2014-01-20 05:01:58'),
(10, 'Wallpaper floral', 'Raju Wallpapers', 4, 9, 10, '1300.00', 1, 2, '1400.00', '2014-01-20 08:43:17', '2014-01-20 08:43:17'),
(11, 'Stained Glass 6x3', 'Kohinoor', 3, 5, 10, '350.00', 2, 2, '400.00', '2014-01-20 08:58:27', '2014-01-20 08:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(128) COLLATE utf32_unicode_ci NOT NULL,
  `address` text COLLATE utf32_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf32_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `credit` decimal(8,2) NOT NULL DEFAULT '0.00',
  `debit` decimal(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier_name` (`supplier_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `address`, `phone`, `created_at`, `updated_at`, `credit`, `debit`) VALUES
(1, 'Zakamlova Hardware Store', 'Lower Zarkawt', '9436362988', '2014-01-19 06:26:07', '2014-01-21 13:18:56', '9140.00', '0.00'),
(2, 'Ding Ding Glass Works', 'Bawngkawn', '9827638492', '2014-01-19 06:27:51', '2014-01-19 16:21:39', '1000.00', '0.00'),
(3, 'Aizawl Paint House', 'Kulikawn', '0389-2344323', '2014-01-19 12:35:31', '2014-01-20 18:53:39', '750.00', '0.00'),
(4, 'Veraz', 'Zarkawt', '0389-2387628', '2014-01-20 08:41:59', '2014-01-20 08:43:17', '500.00', '0.00'),
(5, 'Bawngkawn Hardware Depot', 'Bawngkawn', '9834829344', '2014-01-20 12:26:56', '2014-01-20 12:26:56', '0.00', '0.00'),
(6, 'Liando Stores', 'Bungbangla', '0389-2938783', '2014-01-20 12:34:37', '2014-01-20 12:34:37', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf32_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2a$08$v3DbfLEHKvk3kakVo2LpC.qU38sa3GoU2/lYIjHyDKvY4MoDrdH1.', '2014-01-17 12:07:50', '2014-02-13 15:28:24'),
(2, 'Sena', '$2a$08$8xOGnxCrzSgMGOIi.YKqTuc4d1Ucpctpn193wnrAmk7UczjaDbKZe', '2014-01-17 16:24:06', '2014-01-17 16:24:06'),
(3, 'sales', '$2a$08$r0XGFIMkiKpNz4AaFTnUIuozoqixJIyliDk9d.t4KxNtIpQYstBty', '2014-01-18 18:15:58', '2014-01-18 18:15:58'),
(4, 'mizo', '$2a$08$WRyOAQgBD/mLhwBqiQn/Zehdu0dFDiYFOJgvq/2NSY9GeHkRcapIi', '2014-01-20 03:39:13', '2014-01-20 03:39:13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;